/**
 * Created by Paradise on 2016/2/14.
 */

var width = $(window).width();
var height = $(window).height();


$(document).ready(function () {

    $(".middle").css('height', height - 180 + 'px');
    $(".content").css('height', height - 180 + 'px');

    $(".heading").load("head.html");
    $(".left_menu").css('height', height - 180 + 'px').load("tree_menu.html");
    $(".footer").load("footer.html");
});


