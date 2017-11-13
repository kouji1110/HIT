<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Main extends Controller_Template {

    public function before() {
        parent::before();
        
        $method = Uri::segment(2);
        $auth_methods = array(
            'logined',
            'logout',
            'update',
            'remove',
        );
        // ログインチェック 
        // ログインしてない場合はログイン画面へリダイレクト
        if (!Auth::check()) {
            Response::redirect('auth');
        }
//        $method = Uri::segment(2);
//        if (Input::method() !== 'POST' && in_array($method, $post_methods)) {
//            Response::redirect('auth/timeout');
//        }
//        // ログインチェック
//        $auth_methods = array(
//            'logined',
//            'logout',
//            'update',
//            'remove',
//        );
//        if (in_array($method, $auth_methods) && !Auth::check()) {
//            Response::redirect('auth/login');
//        }
//        // ログイン済みチェック
//        $nologin_methods = array(
//            'login',
//        );
//        if (in_array($method, $nologin_methods) && Auth::check()) {
//            Response::redirect('auth/logined');
//        }
//        // CSRFチェック
//        if (Input::method() === 'POST') {
//            if (!Security::check_token()) {
//                Response::redirect('auth/timeout');
//            }
//        }
    }

    private function validate_login() {
        // 入力チェック
        $validation = Validation::forge();
        $validation->add('username', 'ユーザー名')
                ->add_rule('required')
                ->add_rule('min_length', 4)
                ->add_rule('max_length', 15);
        $validation->add('password', 'パスワード')
                ->add_rule('required')
                ->add_rule('min_length', 6)
                ->add_rule('max_length', 20);
        $validation->run();
        return $validation;
    }

    public function action_index() {

        // ログイン処理
//        $username = Input::post('username', null);
//        $password = Input::post('password', null);
//        $result_validate = '';
//        if ($username !== null && $password !== null) {
//            $validation = $this->validate_login();
//            $errors = $validation->error();
//            if (empty($errors)) {
//                // ログイン認証を行う
//                $auth = Auth::instance();
//                if ($auth->login($username, $password)) {
//                    // ログイン成功
//                    Response::redirect('auth/logined');
//                }
//                $result_validate = "ログインに失敗しました。";
//            } else {
//                $result_validate = $validation->show_errors();
//            }
//        }

        
        $this->template->header = View::forge('layout/header');
        $this->template->contents = "ログイン成功";
        $this->template->footer = View::forge('layout/footer');
    }

}
