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
});
