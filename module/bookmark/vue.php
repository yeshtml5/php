<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>

<!Doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[script]-->
    <!--[style]-->
    <script type="text/javascript" src="/php/src/js/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/basic.css"/>
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>
<!--contents-->
<article>
    <section id="vue" class="bookmark-wrap">
        <dl v-for="(item,index) in items">{{index}} {{item.id}}
            <dt>{{item.memo}}</dt>
            <dd>{{item.favorite}}</dd>
        </dl>
    </section>
</article>
<!--//contents-->
<script type="text/javascript">
    var _url = 'http://localhost/php/module/bookmark/api/read.php';
    var _model = {};
    var app = new Vue({
        el: "#vue",
        data: {
            items: []
        },
        mounted: function () {
            var _self = this;
            axios.get(_url)
                .then(function (response) {
                    _self.items = response.data;
                    console.log(app.items);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        methods: {}
    });
    // app.getList(_url);
</script>
</body>
</html>