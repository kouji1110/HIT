<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Auth extends Controller_Template {

    public function before() {
        parent::before();
        // 初期処理
        // POSTチェック
        $post_methods = array(
            'created',
            'updated',
            'removed',
        );
        $method = Uri::segment(2);
        if (Input::method() !== 'POST' && in_array($method, $post_methods)) {
            Response::redirect('auth/timeout');
        }
        // ログインチェック
        $auth_methods = array(
            'logined',
            'logout',
            'update',
            'remove',
        );
        if (in_array($method, $auth_methods) && !Auth::check()) {
            Response::redirect('auth');
        }
        // ログイン済みチェック
        $nologin_methods = array(
            'login',
        );
        if (in_array($method, $nologin_methods) && Auth::check()) {
            Response::redirect('main');
        }
        // CSRFチェック
        if (Input::method() === 'POST') {
            if (!Security::check_token()) {
                Response::redirect('auth/timeout');
            }
        }
    }

    /**
     * ログイン時の入力チェック
     * @return type
     */
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
        $username = Input::post('username', null);
        $password = Input::post('password', null);
        $result_validate = '';
        if ($username !== null && $password !== null) {
            $validation = $this->validate_login();
            $errors = $validation->error();
            if (empty($errors)) {
                // ログイン認証を行う
                $auth = Auth::instance();
                if ($auth->login($username, $password)) {
                    // ログイン成功の場合、ユーザのメイン画面へリダイレクト
                    Response::redirect('user');
                }
                $result_validate = "ユーザ名 or パスワードが誤っています";
            } else {
                $result_validate = $validation->show_errors();
            }
        }
        
        $data = array();
        $data['message'] = $result_validate;

        // ログイン失敗時　再度ログインフォームを表示
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('auth/login',$data,false);
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * ログアウト
     */
    public function action_logout() {
        // ログアウト処理
        Auth::logout();
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('auth/logout');
        $this->template->footer = View::forge('layout/footer');
    }
    
    /**
     * ユーザ登録
     */
    public function action_register() {
        
    }
    
    /**
     * ログイン
     */
    public function action_timeout() {
        // トップページへリダイレクト
        Response::redirect('/');
    }

}
