<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    $query = "SELECT * FROM `php_bookmark` ";
    $result = db_query($query);
?>
<?php head(); ?>
<!--contents-->
<article>
    <section>
        <div class="bookmark">
            <div>
                <a href="#">create</a>
            </div>
            <form action="create.php" method="POST">
                <p><input type="text" name="memo" placeholder="memo"></p>
                <p><input type="text" name="url" placeholder="url"></p>
                <p><input type="submit"></p>
            </form>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <dl data-id="<?php echo $row['id'];?>">
                    <dt><input type="checkbox" <?php if ($row['favorite'] == "Y") {
                            echo "checked = 'checked'";
                        } ?> ></dt>
                    <dd>
                        <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['memo']; ?></a>
                    </dd>
                    <dd>
                        <form action="delete.php">

                        </form>
                    </dd>

                </dl>
            <?php endwhile; ?>
        </div>
    </section>
</article>
<section>

    <ul>
        <li><a href="/php/memo/" target="_blank">메모장</a></li>
        <li><a href="https://opentutorials.org/course/3167/19600" target="_blank">https://opentutorials.org/course/3167/19600</a>
        </li>
        <li><a href="https://opentutorials.org/course/3130" target="_blank">생활코딩 PHP</a></li>
    </ul>
    <h1>참고파일</h1>
    <ul>
        <li><p>https://material.io/design/</p></li>
    </ul>
</section>
<!--//contents-->
<?php footer(); ?>
<style>
    section {display:block;width:100%;padding:50px;text-align:left;}
    .bookmark {display:inline-block;width:500px;margin:0 auto;}
    .bookmark dl {border-bottom:1px solid #111;}
    .bookmark dl > * {display:inline-block;padding:10px;}
    .bookmark dl dd a:hover {color:#ff0000;}
</style>
