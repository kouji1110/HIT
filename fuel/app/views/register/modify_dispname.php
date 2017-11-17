<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="<?php echo Fuel\Core\Uri::create("/register/modify"); ?>" method="post" id="registerForm">

    <p>
        新しい表示名を入力してください
    </p>
    <div>
        <input type="text" name="dispname" />
    </div>
    <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key'); ?>" value="<?php echo \Security::fetch_token(); ?>" />
    <input type="submit" value="登録" />

</form>

