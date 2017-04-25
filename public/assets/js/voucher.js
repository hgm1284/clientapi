$( document ).ready(function() {
	$.get( "http://localhost:3000/users/1/vouchers", function( data ) {
console.log( data );
return (data);
  alert( "Load was performed." );
});
    
});
