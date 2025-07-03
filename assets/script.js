jQuery(document).ready(function($) {
  $('.mc-item').on('click', function() {
    var index = $(this).data('index');
    
    $('.mc-panel').fadeOut(200, function() {
      $('.mc-panel[data-index="' + index + '"]').fadeIn(200);
    });

    $('.mc-item').removeClass('active');
    $(this).addClass('active');
  });

  // Ativa o primeiro item automaticamente
  $('.mc-item').first().addClass('active');
});
