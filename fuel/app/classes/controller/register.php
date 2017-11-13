<?php

class Controller_Register extends Controller_Template {

    /**
     * ユーザ作成時の入力チェック
     * @return type
     */
    private function validate_create() {
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
        $validation->add('email', 'Eメール')
                ->add_rule('required')
                ->add_rule('valid_email');
        $validation->run();
        return $validation;
    }

    /**
     * ユーザ登録画面
     */
    public function action_index() {
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('register/index');
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * ユーザ登録
     */
    public function action_create() {
        // ユーザー登録
        $validation = $this->validate_create();
        $errors = $validation->error();
        try {
            if (empty($errors)) {
                $auth = Auth::instance();
                $input = $validation->input();
                if ($auth->create_user($input['username'], $input['password'], $input['email'])) {
                    $this->template->header = View::forge('layout/header');
                    $this->template->contents = "登録完了";
                    $this->template->footer = View::forge('layout/footer');
                    return;
                }
                $result_validate = 'ユーザー作成に失敗しました。';
            } else {
                $result_validate = $validation->show_errors();
            }
        } catch (SimpleUserUpdateException $e) {
            $result_validate = $e->getMessage();
        }
        $this->template->header = View::forge('layout/header');
//        $this->template->contents = View::forge('register/index');
        $this->template->contents = $result_validate;
        $this->template->footer = View::forge('layout/footer');
    }

}
