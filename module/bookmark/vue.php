<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>

<!Doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[script]-->
    <!--[style]-->
    <script type="text/javascript" src="/php/src/js/vue.js"></script>
    <link type="text/css" rel="stylesheet" href="<?= __THEME__; ?>src/css/basic.css"/>
    <link type="text/css" rel="stylesheet" href="<?= __THEME__; ?>src/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>
<!--contents-->
<article>
    <section id="vue" class="bookmark-wrap">
        <dl :data-index="index" :data-id="item.id" :class="{'on':toggle}" v-for="(item,index) in items">
            <dt v-on:click="check($event,index)">{{index}}</dt>
            <dd><a :href="item.url"><h1>{{item.memo}}</h1></a></dd>
        </dl>
    </section>
</article>
<!--//contents-->
<style>
    section dl > * {display:inline-block;}
    section dl dt {width:50px;color:#ff0000;font-size:20px; }
</style>
<script type="text/javascript">
    let _url = 'http://localhost/php/module/bookmark/api/read.php';
    let app = new Vue({
        el: "#vue",
        data: {
            toggle: [],
            items: []
        },
        mounted: function () {
            let _self = this;
            fetch(_url).then(res => res.json()).then(function (data) {
                _self.items = data;
            });
            /*
            //----------
            axios.get(_url)
                .then(function (response) {
                    _self.items = response.data;
                    console.log(app.items);
                })
                .catch(function (error) {
                    console.log(error);
                });
                */
        },
        methods: {
            check: function (event, index) {
                // var element = event.target.parentElement.parentElement.parentElement.getAttribute('data-index');
                var element = event.target.parentElement;

                this.toggle = !this.toggle;

                console.log(this.toggle);
            }
        }
    });
    // app.getList(_url);
</script>
</body>
</html>