<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
<!--contents-->

<article>
    <?php
        function getPHP() {
            $_GET['width'] = '100%';
            $_GET['height'] = '600px';
            $_GET['level'] = '8';
            include_once(__ROOT__ . "/php/api/kakao_map.php");
        }
        if (isset($_GET['mode'])) {
            getPHP();
            debug($_GET);
        }
    ?>
    <div class="panel">
        <p>
            <button onclick="geoFindMe()">현 위치구하기</button>
        </p>
        <div id="out"></div>
        <img id="test" src="" alt="">
        <script>
            function geoFindMe() {
                var output = document.getElementById("out");

                if (!navigator.geolocation) {
                    output.innerHTML = "<p>사용자의 브라우저는 지오로케이션을 지원하지 않습니다.</p>";
                    return;
                }

                function success(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    output.innerHTML = '<p>위도 : ' + latitude + '° <br>경도 : ' + longitude + '°</p>';

                    var img = new Image(600, 600);
                    img.src = "https://maps.googleapis.com/maps/api/staticmap?--unsafely-treat-insecure-origin-as-secure=\"https://dev.yeshtml6.com\" &center=" + latitude + "," + longitude + "&zoom=13&size=500x500&sensor=false";
                    output.appendChild(img);
                    window.location.href = "?mode=false&lat=" + latitude + "&lon=" + longitude;

                };

                function error() {
                    output.innerHTML = "사용자의 위치를 찾을 수 없습니다.";
                };

                output.innerHTML = "<p>Locating…</p>";

                navigator.geolocation.getCurrentPosition(success, error);
            }

        </script>
    </div>

</article>
<!--//contents-->
<?= footer(); ?>

