<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="医療情報技師検定試験の勉強サイトです。">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <?php echo Asset::css(array('common.css')); ?>
        <?php echo Asset::js('myScript.js'); ?>
        <title>医療情報技師検定試験 勉強サイト</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php echo $header; ?>
            </div>
            <div id="top">
                <form id="loginForm" name="loginForm" action="auth" method="POST">
                    <fieldset>
                        <!--<p class="form-title">ログイン</p>-->
                        <p class="item-title">ユーザID</p>
                        <input type="text" id="userid" name="username" value="">
                        <div class="floatleft" />
                        <p class="item-title">パスワード</p>
                        <input type="password" id="password" name="password" value="" />
                        <br>
                        <div class="description">
                            ※IDを取得していない方は<a href="#">こちら</a>から登録を行ってください。<br />
                        </div>
                        <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key');?>" value="<?php echo \Security::fetch_token();?>" />
                        <div class="button-submit">
                            <input type="submit" id="login" name="login" value="ログイン" class="login-submit" />
                        </div>                        
                    </fieldset>
                </form>
            </div>
            <div id="footer">
                <?php echo $footer ?>
            </div>
        </div>
    </body>
</html>
