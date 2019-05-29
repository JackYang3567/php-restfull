layui.use(['form', 'layer', 'jquery', 'element', 'util'], function() {
    var form = layui.form,
        layer = layui.layer,
        element = layui.element,
        util = layui.util,
        $ = layui.jquery;
    $('.logi_logout').click(function() {
        loading = layer.load(2, {
            shade: [0.2, '#000']
        });
        var url = $(this).data('url');
        var locationurl = $(this).attr('location-url');
        $.getJSON(url, function(data) {
            if (data.code == 200) {
                layer.close(loading);
                layer.msg(data.msg, { icon: 1, time: 1000 }, function() {
                    location.href = locationurl;
                });
            } else {
                layer.close(loading);
                layer.msg(data.msg, { icon: 2, anim: 6, time: 1000 });
            }
        });
    });



    //杩斿洖椤堕儴鍥炬爣
    util.fixbar({
        bar: '&#xe642;',
        bgcolor: '#009688',
        click: function(type) {

            if (type === 'bar') {
               // location.href = '/bbs/artadd.html';
                //layer.msg('鎵撳紑 index.js锛屽紑鍚彂琛ㄦ柊甯栫殑璺緞');

            }
        }
    });
})

var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b5880f1f60fb61bb13e5376a3ad10fce";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();

(function(){
var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?4c2ddb91d25afae2e0016fb2be8670fd":"https://jspassport.ssl.qhimg.com/11.0.1.js?4c2ddb91d25afae2e0016fb2be8670fd";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();