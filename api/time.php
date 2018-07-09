<?php
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $date->setTimezone(new DateTimeZone('Asia/Seoul'));
    $mode = $_GET['mode'];
    if ($_GET['mode'] == 'time'):
        echo $date->format('h:i:s A');
    else:
        echo $date->format('Y-m-d h:i:sA');
    endif;
?>
<?php
    /**
     * 스크립트로만 사용할때
     *
     * <script>
     * var now = new Date(<?php echo time(); ?>*1000);
     * Number.prototype.zf = function(){return (this > 9 ? '' : '0') + this;};
     * function startTime() {
     * now.setSeconds(now.getSeconds() + 1);
     * var h = now.getHours().zf(), m = now.getMinutes().zf(), s = now.getSeconds().zf();
     * document.getElementById('time').innerHTML = h + ':' + m + ':' + s;
     * setTimeout('startTime()',1000);
     * }
     * </script>
     */
?>