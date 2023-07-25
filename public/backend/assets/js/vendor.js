$(function() {
	"use strict";

$(document).ready(function(){
 $('select[name="category_id"]').on('change', function(){
  var category_id =$(this).val();
  if(category_id){
    $.ajax({
      url: '/vendor_product/vendor/'+category_id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('select[name="sub_category_id"]').html( ' ');
        var d = $('select[name="sub_category_id"]').empty();
        $.each(data, function(key, value){
          // console.log({value})
          $('select[name="sub_category_id"]').append('<option value=" ' + value.id+ ' ">'
          + value.name+ '</option>');
      
          
        });

      },
    });
  }else{
    alert('danger');
  }

 });

});
});