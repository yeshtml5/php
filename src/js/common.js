var _setup = function () {
    window.common = {
        /*
        function:time
        description: php의 time()함수를 가져와서 ajax로 1초마다 가져와서 target에 적용
         */
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
$(document).ready(function () {
    _setup();
    //	_symbol();
    //	_setup();

});
