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
        $validation->add('dispname', '表示名')
                ->add_rule('required')
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
                if ($auth->create_user($input['username'], $input['password'], $input['email'], 1, array(
                            'dispname' => $input['dispname'],
                        ))) {

                    // メール送信テスト
                    //作成日のタイムスタンプを取得します
                    // $created=Model_User::find('first',array('where'=>array('email'=>$email)))->created_at;
// //メール本文の作成
// $body='<h2>仮登録完了</h2>';
// $body.='<p>新規登録ありがとうございます。';
// $body.='登録が安全に行われるようにアクティベートをお願いします。</p>';
// $body.='<p>アクティベートするには下記のリンクをクリックして下さい。</p>';
// $body.= '<p>'.Html::anchor('user/activate/'.$input['email'].'/'."testtest",'登録完了（アクティベート）').'</p>';
// $body.='<p>48時間内にアクティベートを完了させて下さい。</p>';
// //Eメールのインスタンス化
// $sendmail=Email::forge();
// //メール情報の設定
// $sendmail->from('test@fankey.info','HIT事務局');
// $sendmail->to($input['email'],$input['username']);
// $sendmail->subject('アクティベート');
// $sendmail->html_body($body);
// //メールの送信
// $sendmail->send();
// //登録成功のメッセージ
// Session::set_flash('success', '<span class="btn btn-primary span8">『'.$input['username'].'』を仮登録しました</span><br>');
// //仮登録ページへ移動
// Response::redirect('user/provisional');
                    
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
    
    /*
     * 表示名の変更
     */
    public function action_modifydispname() {
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('register/modify_dispname');
        $this->template->footer = View::forge('layout/footer');
    }

}
