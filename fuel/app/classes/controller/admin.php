<?php

class Controller_Admin extends Controller_Template {

    public function before() {
        parent::before();

        // ログインチェック 
        // ログインしてない場合はログイン画面へリダイレクト
        if (!Auth::check()) {
            Response::redirect('auth');
        }
    }
    
    /**
     * 管理者トップ画面（マスタメンテ）
     */
    public function action_index() {
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('admin/master_maintenance');
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * メンテナンス 過去問一覧
     * @param type $year
     */
    public function action_questions($year = 2013) {

        $data['year'] = $year;

        $data['questions'] = Model_Question::find('all', array(
                    'where' => array(
                        array('year', $year)
                    ),
                    'order_by' => array(
                        array('category', 'ASC'),
                        array('question_no', 'ASC'),
                        array('question_sub_no', 'ASC'),
                    )
        ));

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('admin/question/list', $data);
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * メンテナンス　問題編集
     */
    public function action_questionedit() {

        if (isset($_GET["year"])) {
            $year = $_GET["year"];
        }
        if (isset($_GET["cat"]) && isset($_GET["no"]) && isset($_GET["sub_no"])) {
            $cat = $_GET["cat"];
            $no = $_GET["no"];
            $sub_no = $_GET["sub_no"];
            $data["mode"] = "2"; // 更新
        } else {
            $data["mode"] = "1"; // 更新
        }

        if ($data["mode"] == 2) {
            $result = Model_Question::find('all', array(
                        'where' => array(
                            array('year', $year),
                            array('category', $cat),
                            array('question_no', $no),
                            array('question_sub_no', $sub_no),
                        ),
                        'order_by' => array(
                            array('category', 'ASC'),
                            array('question_no', 'ASC'),
                            array('question_sub_no', 'ASC'),
                        )
            ));

            if (count($result) != 1) { // エラー
                return;
            }
            // 1つめの要素を取り出す
            $row = current(array_slice($result, 0, 1, true));
            $data["year"] = $row["year"];
            $data["category"] = $row["category"];
            $data["questionno"] = $row["question_no"];
            $data["markno"] = $row["question_sub_no"];
            $data["content"] = $row["question"];

            // 選択肢1〜9
            $selection = array();
            for ($i = 1; $i <= 9; $i ++) {
                $val = "sel" . $i;
                if ($row[$val] != NULL) {
                    array_push($selection, $row[$val]);
                } else {
                    array_push($selection, "");
                }
            }
            $data["selection"] = $selection;

            // 回答1〜5
            $answers = array();
            for ($i = 1; $i <= 5; $i ++) {
                $val = "ans" . $i;
                if ($row[$val] != NULL) {
                    array_push($answers, $row[$val]);
                } else {
                    array_push($answers, "");
                }
            }
            $data["answers"] = $answers;

            $data["explaination"] = $row["explaination"];
            $data["freeCmt"] = $row["freeCmt"];
        } else {
            $data["year"] = $year;
//            $data["category"] = $cat;
//            $data["questionno"] = $no;
//            $data["markno"] = $sub_no;
//            $data["content"] = "";
            /* 取得エラー */
        }

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('admin/question/edit', $data);
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * 問題作成時の入力チェック
     * @return type
     */
    private function validate_question() {
        // 入力チェック
        $validation = Validation::forge();
        $validation->add('year', '年')
                ->add_rule('required');
        $validation->add('category', 'カテゴリー')
                ->add_rule('required');
        $validation->run();
        return $validation;
    }

    /**
     * 登録確認画面
     */
    public function action_question_register() {
        $validation = $this->validate_question(); // 入力チェック
        // 登録用のデータの作成
        $data['year'] = $_POST['year'];
        $create = $_POST;

        // 選択肢
        for ($i = 1; $i <= 9; $i++) {
            $input_val = "input_sel" . $i;
            $val = "sel" . $i;
            $create[$val] = $_POST[$input_val];
        }

        // 回答
        $answer_num = 0;
        for ($i = 1; $i <= 9; $i++) {
            $val = "input_ans" . $i;
            if (isset($_POST[$val])) { // 回答がセットされていたら
                $answer_num ++;
                $create["ans" . $answer_num] = $_POST[$val];
            }
        }

        $create["answer_num"] = $answer_num;

        $errors = $validation->error();
        try {
            if (empty($errors)) {
                $input = $validation->input();
                if ($_POST["mode"] == '1') { // 新規
                    if (Model_Question::createQuestion($create)) {
                        $data["message"] = "登録が完了しました。";
                        $this->template->header = View::forge('layout/header');
                        $this->template->contents = View::forge('admin/question/regist_success', $data);
                        $this->template->footer = View::forge('layout/footer');
                        return;
                    }
                    $result_validate = '登録に失敗しました。';
                } else { // 更新
                    if (Model_Question::updateQuestion($create)) {
                        $data["message"] = "更新登録が完了しました。";
                        $this->template->header = View::forge('layout/header');
                        $this->template->contents = View::forge('admin/question/regist_success', $data);
                        $this->template->footer = View::forge('layout/footer');
                        return;
                    }
                    $result_validate = '更新に失敗しました。';
                }
            } else {
                $result_validate = $validation->show_errors();
            }
        } catch (\Exception $e) {
            $result_validate = $e->getMessage();
        }


        $this->template->header = View::forge('layout/header');
//        $this->template->contents = View::forge('admin/question/confirm', $data);
        $this->template->contents = $result_validate;
        $this->template->footer = View::forge('layout/footer');
    }

}
