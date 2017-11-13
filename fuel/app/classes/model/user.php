<?php

class Model_User extends \Orm\Model {

    //テーブル名の指定(モデル名の複数形なら省略可）
    protected static $_table_name = 'users';
    //プロパティのセット
    protected static $_properties = array(
        'id',
        'username',
        'password',
        'group',
        'email',
        'last_login',
        'login_hash',
        'profile_fields',
        'created_at'
    );
//    protected static $_observers = array(
//        'Orm\Observer_CreatedAt' => array(
//            'events' => array('before_insert'),
//            'mysql_timestamp' => false,
//        ),
//        'Orm\Observer_UpdatedAt' => array(
//            'events' => array('before_save'),
//            'mysql_timestamp' => false,
//        ),
//    );
//
//    //バリデーションの設定
//    public static function validate($factory) {
//        //バリデーションのインスタンス化
//        $val = Validation::forge($factory);
//        //バリデーションフィールドの追加
//        $val->add_field('username', 'ユーザー名', 'required|max_length[255]');
//        $val->add_field('password', 'パスワード', 'required|max_length[100]');
//        return $val;
//    }

    // ログイン中のユーザデータの取得
    public static function login() {
        //data配列の初期化
        $data = array();
        //Authのインスタンス化
        $auth = Auth::instance();
        $email = $auth->get_email();
        $data = Model_User::find('first', array('where' => array('email' => $email)));
        return $data;
    }
}