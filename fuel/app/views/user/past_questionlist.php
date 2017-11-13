<div id="question-list">
    <?php
    for ($i = 2013; $i >= 2005; $i--) {
        ?>
        <div class="menubox">
            <h3><?php echo $i; ?>年度</h3>
            <ul>
                <?php
                for ($j = 1; $j <= 3; $j ++) {
                    $key = "$i$j";
                    if (isset($yearlist[$key])) {
                        $url = Uri::create("user/question?year=$i&category=$j&markno=" . $yearlist[$key]["MARK_NO"]);
                        echo "<li class=\"haslink\"><a href=\"$url\" class=\"type$j\">". Util\Common::GetCategoryName($j) ."</a></li>";
                    } else {
                        echo "<li class=\"nohaslink\">" . Util\Common::GetCategoryName($j) . "</li>";
                    }
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
    <div class="floatclear"> </div>
</div>
