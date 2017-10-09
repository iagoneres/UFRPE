// Alterar classe "active" do menu.

$(document).ready(function(){

  var links = $('li').children();

  $.each(links, function(key, value){
    if(value.href == document.URL){
     $(this).parent().addClass('active');
    }
  });

  // Chamada para exibir Singular.
  $('#view-modal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    $user = {};
    ['register', 'name', 'type', 'brand', 'birthdate', 'email', 'phone', 'mobile', 'adress', 'picture'].forEach(function(value, key) {
        $user[value] = $(event.relatedTarget).data(value);
    });
    var modal = $(this);

    var img = document.getElementById('picture_brand');
    if($user.picture != ""){
      img.src = '../../assets/img/faces/' + $user.picture;
    }
    else{
      img.src = '../../assets/img/faces/default-image.png';
    }

    var edt = document.getElementById('edit');

    edt.href = 'edit.php?id_singular=' + $user.register;

    modal.find('.register_singular').text('Registro: ' + $user.register);
    modal.find('.name_singular').text($user.name);
    modal.find('.brand_singular').text($user.brand);
    modal.find('.type_singular').text('Tipo: ' + $user.type);
    modal.find('.birthdate_singular').text('Aniversário: ' + $user.birthdate);
    modal.find('.email_singular').text('Email: ' + $user.email);
    modal.find('.phone_singular').text('Telefone: ' + $user.phone);
    modal.find('.mobile_singular').text('Celular: ' + $user.mobile);
    modal.find('.adress_singular').text('Endereço: ' + $user.adress);

  });

  // Chamada para excluir Singular.
  $('#delete-modal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('user');

    var modal = $(this);
    modal.find('.modal-title').text('Singular #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  });

  $('#occurrence-modal').on('show.bs.modal', function (event) {
    // Verifica se o browser do usuario tem suporte a Geolocation
    if ( navigator.geolocation ){
      navigator.geolocation.getCurrentPosition( function( posicao ){
        $('#lat').val(posicao.coords.latitude);
        $('#lon').val(posicao.coords.longitude);
      });
    }
  });

});
