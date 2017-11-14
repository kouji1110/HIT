<div class="contents_login">

    <?php
    
    if($message != "")
    {
        echo "<div class=\"auth_error\">";
        echo "$message";
        echo "</div>";
    }
    echo Form::open(array('action' => 'auth', 'method' => 'POST', 'id' => 'hitForm'));
    echo "<p>ユーザ名とパスワードを入力してください。</p>";
    echo "<p class=\"item-title\">名前</p>";
    echo Form::input('username', '', array('style' => 'border: 2px;'));
    echo "<div class=\"floatleft\" />";
    echo "<p class=\"item-title\">パスワード</p>";
    echo Form::password('password', '', array('style' => 'border: 2px;'));

    $name = \Config::get('security.csrf_token_key');
    $token = \Security::fetch_token();
    echo Form::input($name, $token, array('type' => 'hidden'));
    echo Form::submit('ログイン', 'ログイン');
    echo Form::close();
    ?>
</div>