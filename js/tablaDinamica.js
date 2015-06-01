     $(document).ready(function(){
      var i=1;
      $.post('consultaRepuestos.php', function(data) {
        $('#addr0 select').html(data);
      });

     $("#add_row").click(function(){
      $('#addr'+i).html("<td class='hidden'>"+ (i+1) +"</td><td><select name='referencias"+i+"' class='form-control select-md'></select></td><td><input type='number' min='1' max='50' name='unidades"+i+"' class='form-control'/></td><td><a class='delete_row pull-right btn btn-danger'>Eliminar fila</a></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      $.post('consultaRepuestos.php', function(data) {
    $('.select-md').html(data);
  });

      i++; 
  });
  $('body').on('click', '.delete_row', function(event) {
    
       $(this).parents('tr').html('');
     
  });



});

