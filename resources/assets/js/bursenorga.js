// JavaScript of bursenorga

$(document).ready(function () {
  //Off-Canvas
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active');
  });
  
  if( $( '.listdropdown' ).length > 1 ) {
    $( '.listdropdown').last().addClass('dropup');
  }
  
  $('.autofadeout').delay(2000).fadeOut(500, function () {
    $('.autofadeout').remove();
  });
});