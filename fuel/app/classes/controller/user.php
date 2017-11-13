<?php

use model\question;

class Controller_User extends Controller_Template {

    public function before() {
        parent::before();

        // ログインチェック 
        // ログインしてない場合はログイン画面へリダイレクト
        if (!Auth::check()) {
            Response::redirect('auth');
        }
    }

    /**
     * ログイン後のメイン画面
     */
    public function action_index() {

        $this->template->nomenu = true; // メニュー非表示

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('user/main');
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * ユーザー情報の確認
     */
    public function action_confirm() {

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('user/confirm');
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * 過去問一覧
     */
    public function action_questions() {

        $questions = DB::query('SELECT YEAR,CATEGORY,COUNT(YEAR),MIN(QUESTION_SUB_NO) FROM questions GROUP BY YEAR, CATEGORY')
                ->execute()
                ->as_array();
        $yearlist = array();
        foreach ($questions as $row) {
            $array["MARK_NO"] = $row["MIN(QUESTION_SUB_NO)"];
            $array["QUESTION_NUM"] = $row["COUNT(YEAR)"];
            $yearlist[$row["YEAR"] . $row["CATEGORY"]] = $array;
        }
        $data["yearlist"] = $yearlist;

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('user/past_questionlist', $data);
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * 選択した年度、カテゴリーの問題一覧
     */
    public function action_pqlist() {
        $year = $_GET["year"];
        $cat = $_GET["category"];

        $data["year"] = $year;
        $data["cat"] = $cat;

        $data['questions'] = Model_Question::find('all', array(
                    'where' => array(
                        array('year', $year),
                        array('category', $cat)
                    ),
                    'order_by' => array(
                        array('category', 'ASC'),
                        array('question_no', 'ASC'),
                        array('question_sub_no', 'ASC'),
                    )
        ));
        
        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('user/questions', $data);
        $this->template->footer = View::forge('layout/footer');
    }

    /**
     * 過去問メイン
     */
    public function action_question() {
        $year = $_GET["year"];
        $cat = $_GET["category"];
        $markno = $_GET["markno"];

        $data["year"] = $year;
        $data["cat"] = $cat;
        $data["question_sub_no"] = $markno;

        // 次の問題番号
        $data["nextNo"] = Model_Question::GetNextQuestionNo($year, $cat, $markno);
        $data["nextEnabled"] = $data["nextNo"] == "0" ? "disabled" : "";

        // 前の問題番号
        $data["prevNo"] = Model_Question::GetPrevQuestionNo($year, $cat, $markno);
        $data["prevEnabled"] = $data["prevNo"] == "0" ? "disabled" : "";

        // 問題情報取得
        $qustions = Model_Question::find('all', array(
                    'where' => array(
                        array('year', $year),
                        array('category', $cat),
                        array('question_sub_no', $markno),
                    ),
        ));
        // 表示用にデータを作成
        foreach ($qustions as $row) {
            // 質問文
            $data["question"] = $row["question"];
            $data["question_no"] = $row["question_no"];

            // 選択肢1〜9
            $selection = array();
            for ($i = 1; $i <= 9; $i ++) {
                $val = "sel" . $i;
                if ($row[$val] != NULL) {
                    array_push($selection, $row[$val]);
                }
            }
            $data["selection"] = $selection;

            // 回答1〜5
            $answers = array();
            for ($i = 1; $i <= 5; $i ++) {
                $val = "ans" . $i;
                if ($row[$val] != NULL) {
                    array_push($answers, $row[$val]);
                }
            }
            $data["answers"] = $answers;
            $data["explain"] = $row["explaination"];
            $data["freeCmt"] = $row["free_cmt"];
        }

        $this->template->header = View::forge('layout/header');
        $this->template->contents = View::forge('user/question', $data);
        $this->template->footer = View::forge('layout/footer');
    }

}
