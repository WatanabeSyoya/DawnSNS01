$(function () {
  $('.js-nav-menu').on('click', function () {
    $(this).toggleClass('on');
    $("+.gnavi", this).slideToggle()
    return false;
  });
});
