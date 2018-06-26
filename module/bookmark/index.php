<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    $sql = "SELECT * FROM `php_bookmark` ";
    $result = db_query($sql);
?>
<?php head(); ?>
<!--contents-->
<article>
    <section>
        <div class="bookmark">
            <div>
                <a href="#">create</a>
            </div>
            <form action="/php/module/bookmark/create.php" method="POST">
                <p><input type="text" name="memo" placeholder="memo"></p>
                <p><input type="text" name="url" placeholder="url"></p>
                <p><input type="submit"></p>
            </form>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <dl data-id="<?php echo $row['id']; ?>">
                    <dt><input type="checkbox" <?php if ($row['favorite'] == "Y") {
                            echo "checked = 'checked'";
                        } ?> ></dt>
                    <dd>
                        <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['memo']; ?></a>
                    </dd>
                    <dd>
                        <form action="/php/module/bookmark/delete.php" method="post">
                            <input type="hidden" name="id" value="<?=$row['id'];?>">
                            <input type="submit" value="delete" >
                        </form>
                    </dd>

                </dl>
            <?php endwhile; ?>
        </div>
    </section>
</article>
<!--//contents-->
<?php footer(); ?>
<style>
    section {display:block;width:100%;padding:50px;text-align:left;}
    .bookmark {display:inline-block;width:500px;margin:0 auto;}
    .bookmark dl {border-bottom:1px solid #111;}
    .bookmark dl > * {display:inline-block;padding:10px;}
    .bookmark dl dd a:hover {color:#ff0000;}
</style>
