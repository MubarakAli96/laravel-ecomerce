$("body").keypress(function(){
  let text = $('#search').val();
  console.log(text);
  if(text.length > 0){
    $.ajax({
      data: {search:text},
      url: "http://ecommerce_new.test/",
      method: 'post',
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      success: function(result){
        $('#searchProduct').html(result)
      }
    });

  }

});