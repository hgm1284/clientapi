$( document ).ready(function() {
 //  $.post("https://apimaricells.herokuapp.com/login",
 // {
 //     email: "cisco@gmail.com",
 //     password: "12345678"
 // },
 // function(data, status){
 //     alert("Data: " + data + "\nStatus: " + status);
 // });

 data= {
      email: "cisco@gmail.com",
     password: "12345678"
   }
 $.ajax({
     url: 'https://apimaricells.herokuapp.com/login',
     async:false,
     type: "POST",
     dataType: "json",
     data: data,
     success: function (result) {
         JSON.parse(result);
     },
     error: function (xhr, ajaxOptions, thrownError) {
         console.log(xhr);
     }
 });
});
