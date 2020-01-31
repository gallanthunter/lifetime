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


  function remove_header_ul_li_a_title() {
    var header_ul_li_a = $("ul li a");
    if (header_ul_li_a) {
      for (var i in header_ul_li_a) {
        i.removeAttr("title");
      }
    }
  }

  /**
   * Description:获取文章标题链接，并生成二维码
   * Author: Zhang Zhijun
   * Date: 2019/5/10 20:43
   */
  function generate_article_qrcode() {
    var article_link = $('#title-link').attr('href');
    if (!article_link) {
      article_link = 'http://www.jungedushu.com';
    }
    $('#qrcode').qrcode({
      width: 100,
      height: 100,
      foreground: "#ffc107",
      text: article_link,
    });
  }

  /**
   * Description:获取文章内容p标签，并打印
   * Author: Zhang Zhijun
   * Date: 2019/5/10 20:43
   */
  function get_and_print_ptag() {
    var contents = $("article-content p");
    var i;
    if (contents) {
      for (i = 0; i < contents.length; i++) {
        document.writeln(contents[0]);
      }
    }
  }

  /**
   * Description:动态生成时间轴
   * Author: Zhang Zhijun
   * Date: 2019/5/10 20:43
   */
  function create_timeline() {
    var timeline_items = $("article-content p");
  }


  footerPosition();
  $(window).resize(footerPosition);
  generate_article_qrcode();

});
