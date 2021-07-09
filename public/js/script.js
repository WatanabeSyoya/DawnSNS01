$(function () {
  $(function () {
    $('.ac-parent').on('click', function () {
      $(this).next('.ac-child').slideToggle();
      //openクラスをつける
      $(this).toggleClass("open");
      //クリックされていないac-parentのopenクラスを取る
      $('.ac-parent').not(this).removeClass('open');

      $('.ac-parent').not($(this)).next('.ac-child').slideUp();
    });
  });

  $(function () {
    $('.js-modal-open').on('click', function () {
      $('.js-modal').fadeIn();
      return false;
    });
    $('.js-modal-close').on('click', function () {
      $('.js-modal').fadeOut();
      return false;
    });
  });




});
