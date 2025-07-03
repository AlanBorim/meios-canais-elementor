jQuery(document).ready(function ($) {
  const indicator = $('.mc-line-indicator');

  function moveIndicator($el) {
    const elTop = $el.position().top;
    const elHeight = $el.outerHeight();
    const indicatorTop = elTop + (elHeight / 2) - 2; // centraliza a linha
    indicator.removeClass('visible');
    setTimeout(() => {
      indicator.css('top', indicatorTop + 'px');
      indicator.addClass('visible');
    }, 200);
  }

  // Primeira ativação
  const $firstItem = $('.mc-item').first();
  $firstItem.addClass('active');
  moveIndicator($firstItem);

  $('.mc-item').on('click', function () {
    const index = $(this).data('index');

    // Troca de painel sem sobreposição
    $('.mc-panel:visible').fadeOut(200, function () {
      $('.mc-panel').hide(); // garante que todos estejam ocultos
      $('.mc-panel[data-index="' + index + '"]').fadeIn(200);
    });

    // Atualiza item ativo e anima linha
    $('.mc-item').removeClass('active');
    $(this).addClass('active');
    moveIndicator($(this));
  });
});
