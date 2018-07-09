<?php
    /**
     * Created by PhpStorm.
     * User: bos
     * Date: 2018. 7. 9.
     * Time: PM 6:42
     */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Daum 지도 시작하기</title>
</head>
<body>
<div id="map" style="width:500px;height:400px;"></div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3227b6ea97a2a7957abf90bb419542b5"></script>
<script>
    var container = document.getElementById('map');
    var options = {
        center: new daum.maps.LatLng(33.450701, 126.570667),
        level: 3
    };

    var map = new daum.maps.Map(container, options);
</script>
</body>
</html>
