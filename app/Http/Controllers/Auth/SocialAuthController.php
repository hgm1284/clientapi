<?php
namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class SocialAuthController extends Controller
{
    protected $client;// client to API
    protected $userController; //User Controller

    /**
     * Constructor para inicializar la variable.
     */
     public function __construct(Client $client,User $userController){
         $this->client = $client;
         $this->$userController = $userController;

     }

    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->stateless()->user();
  
          try {
            $response=$this->client->request('GET', config('global.url').'users/verifyEmail/'.$social_user->email);
                $body =$response->getBody();
                $data = json_decode($body);
                $response = $this->client->request('post', config('global.url')."sessions", [
                  'form_params' => [             #Se obtienen los datos.
                  'email' => $social_user->email,
                  'password' =>" "
                ]
              ]);

              $user = User::create([
                  'name' => $social_user->name,
                  'email' => $social_user->email,
                  'avatar' => $social_user->avatar,
                  'role'=>$response->getHeaders()['Role'][0],
                  'token'=>$response->getHeaders()['Token'][0],
                  'id_user'=>$response->getHeaders()['Id'][0],
              ]);

                return $this->authAndRedirect($user); // Login y redirección
          } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            if ($response && $response->getStatusCode() == 422) {
              $response = $this->client->request('POST', config('global.url').'users', [
              'form_params' => [
              'name' => $social_user->name,
              'email' => $social_user->email,
              'password' => ' ',
              'role' => 'User'

             ]]);
                  // En caso de que no exista creamos un nuevo usuario con sus datos.
                  $user = User::create([
                      'name' => $social_user->name,
                      'email' => $social_user->email,
                      'avatar' => $social_user->avatar,
                      'role'=>$response->getHeaders()['Role'][0],
                      'token'=>$response->getHeaders()['Token'][0],
                      'id_user'=>$response->getHeaders()['Id'][0],
                  ]);
                  return $this->authAndRedirect($user); // Login y redirección
            }
            else {
              throw $e;
            }
          }

    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/home#');
    }

    public function verifyEmail($email)
    {

    }
}
