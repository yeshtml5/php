<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
    <!--contents-->
    <article id="article">
        <div class="panel">
            <?php
                if (isset($_GET['inc']) && !empty($_GET['inc'])):
                    include_once(__ROOT__ . $_GET['inc']);
                else:
                    $files = array_diff(scandir("./"), array(".", "..", "db", ".git", ".idea", ".gitignore", "README.md"));
                    foreach ($files as &$key) {
                        echo "<p><a href=\"index.php?$key\"><span>$key</span></a></p>";
                    }
                endif;
            ?>
        </div>

        <div class="mgt_50 mgb_50 panel">
            <img src="https://vuejs.org/images/logo.png" style="width:100px;">
            <p id="msg">{{message}}</p>
            <?php
            ?>
            <ol id="list">
                <li v-for="todo in todos">{{todo.text}}</li>
                <li v-if="Math.random() > 0.5">
                    이제 나를 볼 수 있어요
                </li>
                <li v-else>
                    이제는 안보입니다
                </li>

            </ol>
            <div id="evtHdr">
                <h2>{{ Date() }}</h2>
                <button v-on:click="check($event);">버튼</button>
            </div>
        </div>
    </article>
    <!--//contents-->
    <script type="text/javascript">
        /*
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hellow world'
            }
        });
        */
        var model = {
            seen: true,
            todos: [
                {text: 'data1'},
                {text: 'data2'},
                {text: 'data3'}
            ]
        };
        var app = new Vue({
            el: '#list',
            data: model,
            methods: {
                test: function () {
                    alert('test');
                }
            }
        });

        app.todos.push({text: 'some vars'});

        //
        var evt = new Vue({
            el: '#evtHdr',
            data: model,
            methods: {
                check: function (event) {
                    console.log(event.target);
                }
            }
        })
    </script>
<?= footer(); ?>
