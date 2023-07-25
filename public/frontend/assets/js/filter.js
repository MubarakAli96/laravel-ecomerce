$(document).read( function(){
if($('#slider_range').length > 0){
  const max_price = parseInt($('#slider-range').data('max'));
  const min_price = parseInt($('#slider-range').data('min'));
  let price_range = min_price + "-"+ max_price;
  let price = price_range.split('-');
  $('#slider_range').slider({
    range: true,
  
    min: min_price,
    max: max_price,
    values: price,
    
    slide: function (event, ui) {
      $('#amount').val('$'+ui.values[0]+"-"+'$'+ui.values[1]);
      $('#max_price').val(ui.values[0]+"-"+ui.values[1]);
    }
  });

}
});
