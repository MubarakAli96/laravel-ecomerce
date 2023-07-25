
  $('#flexCheckDefaultAll').click(function(){
if($(this).is(':checked')){
  $('input[type = checkbox]').prop('checked', true);
}else{
  $('input[type = checkbox]').prop('checked', false);
}
  });
