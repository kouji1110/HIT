<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="医療情報技師検定試験の勉強サイトです。">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <?php echo Asset::css(array('common.css')); ?>
        <?php echo Asset::js('myScript.js'); ?>
        <?php echo Asset::js('jquery.leanModal.min.js'); ?>
        <title>医療情報技師検定試験 勉強サイト</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php echo $header; ?>
            </div>

            <?php
            if (!isset($nomenu)) {
                ?>

                <div id="gnavi">
                    <ul id="navi">
                        <li class="TOP"><?php echo Html::anchor('user/', 'トップ'); ?></li>
                        <li class="PQ"><?php echo Html::anchor('user/questions/', '過去問演習'); ?></li>
                        <li class="ABOUT"><?php echo Html::anchor('media/', '医療情報とは？'); ?></li>
                        <li class="COMMUNITY"><?php echo Html::anchor('live/', 'コミュニティ'); ?></li>
                        <li class="WIKI"><?php echo Html::anchor('report/', 'ウィキ'); ?></li>
                        <li class="MAINTENANCE"><?php echo Html::anchor('admin/', 'マスタメンテ'); ?></li>
                    </ul>
                </div>
                <?php
            }
            ?>
            <div id="contents">
                <?php echo $contents ?>
            </div>
            <div id="footer">
                <?php echo $footer; ?>
            </div>
        </div>
    </body>
</html>
