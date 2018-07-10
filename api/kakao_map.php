<?php
    /**
     * 참고사이트 :http://apis.map.daum.net/web/sample/
     * 위도경도 찾기
     * http://map.esran.com/
     *
     * 사용예 : http://localhost/php/api/kakao_map.php?width=400px&height=500px&lat=37.40112&lon=126.8741&level=9
     */
    /*
     * DEFINE
     */
    define('APPKEY', 'ba0ed5790f29e178b96339e338616ea1');
    /*
     * Variables
     */
    $width = isset($_GET['width']) ? $_GET['width'] : '800px'; //지도넓이
    $height = isset($_GET['height']) ? $_GET['height'] : '600px'; //지도넓이
    $latitude = isset($_GET['lat']) ? $_GET['lat'] : '37.565682'; //위도
    $longitude = isset($_GET['lon']) ? $_GET['lon'] : '126.97684879999997'; //경도
    $level = isset($_GET['level']) ? $_GET['level'] : 3; //지도레벨높이
?>
<!DOCTYPE html>
<html>
<body>
<div id="map" style="width:<?= $width; ?>;height:<?= $height ?>;"></div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?= APPKEY; ?>"></script>
<script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
        mapOption = {
            center: new daum.maps.LatLng(<?= $latitude;?>, <?= $longitude;?>), // 지도의 중심좌표
            level: <?=$level;?> // 지도의 확대 레벨
        };
    var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
    // 지도를 클릭한 위치에 표출할 마커입니다
    var marker = new daum.maps.Marker({
        // 지도 중심좌표에 마커를 생성합니다
        position: map.getCenter()
    });
    // 지도에 마커를 표시합니다
    marker.setMap(map);
    // 지도에 클릭 이벤트를 등록합니다
    // 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
    daum.maps.event.addListener(map, 'click', function (mouseEvent) {
        // 클릭한 위도, 경도 정보를 가져옵니다
        var latlng = mouseEvent.latLng;

        // 마커 위치를 클릭한 위치로 옮깁니다
        marker.setPosition(latlng);

        var message = '클릭한 위치의 위도는 ' + latlng.getLat() + ' 이고, ';
        message += '경도는 ' + latlng.getLng() + ' 입니다';

        var resultDiv = document.getElementById('clickLatlng');
        resultDiv.innerHTML = message;
    });
</script>
</body>
</html>
