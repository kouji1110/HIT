<h1 class="title">医療情報技師検定試験 勉強サイト</h1>
<div class="navi">
    <?php
    if (Auth::check()) {
        echo Auth::get_screen_name() . " さん";
        echo Html::anchor('auth/logout/', 'ログアウト');
    }
    ?>
</div>
<div class = "floatclear"></div>