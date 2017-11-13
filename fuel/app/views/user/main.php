
    <div class="menu">
        <a href="<?php echo Uri::create('user/questions'); ?>">
            <?php echo Asset::img(array('question-list-64.png')); ?>
            <p class="menu-main">過去問演習</p>
            <p class="menu-description">
                医療情報技師検定試験の過去問の一覧です。
                年度、分野毎に別れているので苦手な分野に挑戦しましょう。
            </p>
        </a>
    </div>
    <div class="menu">
        <a href="#">
            <?php echo Asset::img(array('about-64.png')); ?>
            <p class="menu-main">医療情報技師について</p>
            <p class="menu-description">
                医療情報技師検定試験についてご紹介します。
            </p>
        </a>
    </div>
    <div class="menu">
        <a href="<?php echo Uri::create('user/confirm'); ?>">
            <?php echo Asset::img(array('about-64.png')); ?>
            <p class="menu-main">ユーザ情報</p>
            <p class="menu-description">
                ユーザー情報の確認、修正を行います。
            </p>
        </a>
    </div>
    <div class="menu">
        <a href="#">
            <?php echo Asset::img(array('about-64.png')); ?>
            <p class="menu-main">コミュニケーション</p>
            <p class="menu-description">
                コミュニケーション用掲示板です。
            </p>
        </a>
    </div>
    
    <div class="menu">
        <a href="#">
            <?php echo Asset::img(array('about-64.png')); ?>
            <p class="menu-main">Wikipedia</p>
            <p class="menu-description">
                医療情報ウィキです。だれでも編集できます。
            </p>
        </a>
    </div>
    
    <?php if(Auth::member(100)){ ?>
    <div class="menu">
        <a href="#">
            <?php echo Asset::img(array('about-64.png')); ?>
            <p class="menu-main">マスタメンテ</p>
            <p class="menu-description">
                ユーザ情報の参照、設定および、
                問題情報の参照、追加、編集を行います。
            </p>
        </a>
    </div>
    <?php } ?>
<div class="clearboth"></div>