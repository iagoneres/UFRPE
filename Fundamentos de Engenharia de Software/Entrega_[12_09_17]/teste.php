<!DOCTYPE html>
<html>
<body>
<p id="demo">Clique no botão para receber sua localização em Latitude e Longitude:</p>
<button onclick="getLocation()">Clique Aqui</button>
<div id="mapholder"></div>
<script>
function getPosition(){
// Verifica se o browser do usuario tem suporte a Geolocation
if ( navigator.geolocation ){
navigator.geolocation.getCurrentPosition( function( posicao ){
$('#lat').val(posicao.coords.latitude);
$('#long').val(posicao.coords.longitude);
} );
}
}

$( document ).ready( function(){
getPosition();
});

</script>
</body>
