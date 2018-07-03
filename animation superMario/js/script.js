$(document).keydown(function(e) {
  if (e.which == 39) {
    m = parseInt($('mario').css('left'));
    if (m < 280)
      $('mario').css('left', m + 30);
  }
  if (e.which == 37) {
    m = parseInt($('mario').css('left'));
    if (m > 70)
      $('#vj').css('left', m - 30);
  }
});
