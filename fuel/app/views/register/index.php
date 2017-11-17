<div class="center">
    <form action="create/" method="post" id="registerForm">
        <p>
        新規登録ユーザ登録を行います。<br />
        ユーザ名,パスワード,メールアドレスを入力して登録ボタンを押してください。
        </p>
        <div>
            <p class="item-title">ユーザ名</p>
            <input type="text" name="username" />
        </div>
        <div>
            <p class="item-title">パスワード</p>
            <input type="password" name="password" />
        </div>
        <div>
            <p class="item-title">表示名</p>
            <input type="text" name="dispname" />
        </div>
        <div>
            <p class="item-title">メールアドレス</p>
            <input type="text" name="email" />
        </div>
        <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key');?>" value="<?php echo \Security::fetch_token();?>" />
        <input type="submit" value="登録" />
    </form>
</div>