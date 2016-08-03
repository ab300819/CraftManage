function tabContent(url) {
    return '<iframe style="width:100%;height:100%;" scrolling="auto" frameborder="0" src="' + url + '"></iframe>';
}

/* 打开一个标签 */
function openTab(title, url) {
    /**
     如果这个标题的标签存在，则选择该标签
     否则添加一个标签到标签组
     */
    if ($("#tabs").tabs('exists', title)) {
        $("#tabs").tabs('select', title);
    } else {
        $("#tabs").tabs('add', {
            title: title,
            content: tabContent(url),
            closable: true
        });
    }
}


$(function () {

    //刷新
    $("#m-refresh").click(function () {
        var currTab = $('#tabs').tabs('getSelected');	//获取选中的标签项
        var url = $(currTab.panel('options').content).attr('src');	//获取该选项卡中内容标签（iframe）的 src 属性
        /* 重新设置该标签 */
        $('#tabs').tabs('update', {
            tab: currTab,
            options: {
                content: tabContent(url)
            }
        })
    });

    //关闭所有
    $("#closeall").click(function () {
        $(".tabs li").each(function (i, n) {
            var title = $(n).text();
            $('#tabs').tabs('close', title);
        });
    });

    //除当前之外关闭所有
    $("#closeother").click(function () {
        var currTab = $('#tabs').tabs('getSelected');
        var currTitle = currTab.panel('options').title;

        $(".tabs li").each(function (i, n) {
            var title = $(n).text();

            if (currTitle != title) {
                $('#tabs').tabs('close', title);
            }
        });
    });

    //关闭当前
    $("#close").click(function () {
        var currTab = $('#tabs').tabs('getSelected');
        var currTitle = currTab.panel('options').title;
        $('#tabs').tabs('close', currTitle);
    });
});

