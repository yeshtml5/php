window.addEventListener('load', function () {
    common = new Vue({
        el: '#msg',
        data: {
            message: 'common.js'
        },
        method: {
            test: function () {
                alert('222');
            },
            log: function () {
                console.log('test');
            }
        }

    });


});


var _setup = function () {
    window.common = {
        //description: php의 time()함수를 가져와서 ajax로 1초마다 가져와서 target에 적용
        time: function (target, mode) {
            if (typeof(target) === "object") {
                target = target;
            } else if (typeof(target) === "string") {
                target = $(target);
            }
            setInterval(function () {
                var _url = "/php/api/time.php?mode=" + mode;
                var _target = target || $("time");
                $.ajax({
                    url: _url, success: function (result) {
                        _target.html(result);
                    }
                });
            }, 1000);
        }
    }
}
var _bind = function () {

}
$(document).ready(function () {
    // _setup();
    // _bind();
});
