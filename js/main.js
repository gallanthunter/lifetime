$(document).ready(function () {
  //固定footer在页面底部
  function footerPosition() {
    var contentHeight = document.body.scrollHeight,//网页正文全文高度
      winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
    if (!(contentHeight > winHeight)) {
      //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
      $("footer").addClass("fixed-bottom");
    }
  }

  footerPosition();
  $(window).resize(footerPosition);

  function remove_header_ul_li_a_title() {
    var header_ul_li_a = $("ul li a");
    if (header_ul_li_a) {
      for (var i in header_ul_li_a) {
        i.removeAttr("title");
      }
    }

    // header_ul_li_a.removeAttribute("title");
  }

  // remove_header_ul_li_a_title();
});
