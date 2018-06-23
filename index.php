<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
$query = "SELECT * FROM `php_bookmark` ";
$result = db_query($query);
?>
<?php head(); ?>
<!--contents-->
<article>
    <div class="bookmark">
		<?php while ($row = mysqli_fetch_array($result)): ?>
            <dl>
                <dt><input type="checkbox" <?php if ($row['favorite'] == "Y"){
						echo "checked = 'checked'"; } ?> ></dt>
                <dd>
                    <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['memo']; ?></a>
                </dd>

            </dl>
		<?php endwhile; ?>
    </div>
</article>
<section>
     <pre>
        </pre>
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
    .bookmark {display: inline-block;width: 500px;margin: 0 auto;}
    .bookmark dl {border-bottom: 1px solid #111;}
    .bookmark dl > * {display: inline-block;padding: 10px;}
    .bookmark dl dd a:hover {color: #ff0000;}
</style>
