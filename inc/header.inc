<!Doctype html>
<html>
<head>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DEV.YESHTML5.COM</title>
    <link rel="shortcut icon" type="image/gif" href="<?= theme(); ?>src/images/common/favicon.gif">
    <link rel="shortcut icon" type="image/gif" href="<?= theme(); ?>src/images/common/favicon.png">
    <!--[style]-->
    <!--    <link type="text/css" rel="stylesheet" href="--><? //= theme(); ?><!--src/css/fontawesome.css"/>-->

    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/basic.css"/>
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400">
    <link type="text/css" rel="stylesheet" href="/php/src/css/style.css">
    <!--[javascript]-->
    <script type="text/javascript" src="<?= theme(); ?>src/js/jquery.js"></script>
    <script type="text/javascript" src="<?= theme(); ?>src/js/lib.masonry.js"></script>
    <script type="text/javascript" src="<?= theme(); ?>src/js/core.js"></script>
    <script type="text/javascript" src="<?= theme(); ?>src/js/common.js"></script>
    <script type="text/javascript" src="/php/src/js/common.js"></script>
</head>
<body>
<header>
    <p class="logo regular">YESHTML5.COM</p>
    <p class="ip thin">IP : <?= getIP(); ?></p>
    <time class="thin"></time>
    <nav>
        <dl>
            <dt>module</dt>
            <dd><a href="/php/module/bookmark">bookmark</a></dd>
        </dl>
        <dl>
            <dt>tutorial</dt>
            <dd><a href="/php/tutorial/">Tutorial</a></dd>
        </dl>
        <dl>
            <dt>api</dt>
            <dd><a href="/php/api/time.php">API::time</a></dd>
            <dd><a href="/php/api/kakao_map.php">API::map</a></dd>
            <dd><a href="/php/api/geolocation.php">API::geolocation</a></dd>
        </dl>
        <dl>
            <dt>R&D</dt>
            <dd><a href="https://opentutorials.org/course/3130" target="_blank">PHP</a></dd>
            <dd><a href="https://steemit.com/kr/@twinbraid/74kjhu" target="_blank">BlockChain steemit</a></dd>
        </dl>

        <dl>
            <dt>Useful link</dt>
            <dd><a href="https://themeforest.net/" target="_blank">themeforest.net</a></dd>
            <dd><a href="https://material.io/tools/icons/?style=baseline" target="_blank">Icons</a></dd>
            <dd><a href="https://material.io/design/" target="_blank">material designs</a></dd>
            <dd><a href="https://goo.gl/" target="_blank">goo.gl</a></dd>
            <dd><a href="https://developers.google.com/speed/" target="_blank">google->speed</a></dd>
            <dd><a href="http://superieur-admin-templates.multipurposethemes.com/main/pages/icons_fontawesome.html"
                   target="_blank">designs</a></dd>
        </dl>
    </nav>
</header>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            common.time("header>time", "&format=m/d  h:m:s");
        });
    })($);
</script>