<?php

use Orm\Model;

class Model_Question extends Model {

    protected static $_properties = array(
        'question_id',
        'year',
        'question_no',
        'question_sub_no',
        'category',
        'question_type',
        'question_option',
        'answer_num',
        'question',
        'sel1',
        'sel2',
        'sel3',
        'sel4',
        'sel5',
        'sel6',
        'sel7',
        'sel8',
        'sel9',
        'ans1',
        'ans2',
        'ans3',
        'ans4',
        'ans5',
        'explaination',
        'free_cmt',
        'update_date',
    );
    protected static $_primary_key = array('question_id');
    
    /**
     * 
     * @param type $year_
     * @param type $category_
     */
    public static function GetQuestions($year_, $category_)
    {
        
    }
    
    /**
     * GetNextQuestionNo 同じカテゴリ内の次の質問を取得する。見つからなければ0を返す
     * @param type $year_
     * @param type $category_
     * @param type $sub_no_
     * @return int
     */
    public static function GetNextQuestionNo($year_, $category_, $sub_no_) {
        $result = Fuel\Core\DB::select('question_sub_no')
                ->from('questions')
                ->where('year', $year_)
                ->and_where('category', $category_)
                ->and_where('question_sub_no', '>', $sub_no_)
                ->order_by('question_sub_no')
                ->limit('1')
                ->execute();

        $res = $result->as_array();

        if (count($res) == 0) { // 結果がない場合
            return 0;
        }
        return $res[0]["question_sub_no"];
    }

    public static function GetPrevQuestionNo($year_, $category_, $sub_no_) {
        $result = Fuel\Core\DB::select('question_sub_no')
                ->from('questions')
                ->where('year', $year_)
                ->and_where('category', $category_)
                ->and_where('question_sub_no', '<', $sub_no_)
                ->order_by('question_sub_no', 'desc')
                ->limit('1')
                ->execute();

        $res = $result->as_array();

        if (count($res) == 0) { // 結果がない場合
            return 0;
        }
        return $res[0]["question_sub_no"];
    }

    /*
     * 問題情報をインサートする
     */
    public static function createQuestion($data) {

        $same_questions = \DB::select()
                ->where('year', '=', $data['year'])
                ->and_where('question_no', '=', $data['question_no'])
                ->and_where('question_sub_no', '=', $data['question_sub_no'])
                ->from('questions')
                ->execute();

        if ($same_questions->count() > 0) {
            throw new \Exception('既に登録されている問題です。');
        }

        $question = array(
            'year' => $data['year'],
            'question_no' => $data['question_no'],
            'question_sub_no' => $data['question_sub_no'],
            'category' => $data['category'],
            'question_type' => $data['question_type'],
            'question_option' => $data['question_option'],
            'answer_num' => $data['answer_num'],
            'question' => $data['question'],
            'sel1' => $data['sel1'],
            'sel2' => $data['sel2'],
            'sel3' => $data['sel3'],
            'sel4' => $data['sel4'],
            'sel5' => $data['sel5'],
            'sel6' => $data['sel6'],
            'sel7' => $data['sel7'],
            'sel8' => $data['sel8'],
            'sel9' => $data['sel9'],
            'ans1' => isset($data['ans1']) && $data['ans1'] != NULL ? $data['ans1'] : "",
            'ans2' => isset($data['ans2']) && $data['ans2'] != NULL ? $data['ans2'] : "",
            'ans3' => isset($data['ans3']) && $data['ans3'] != NULL ? $data['ans3'] : "",
            'ans4' => isset($data['ans4']) && $data['ans4'] != NULL ? $data['ans4'] : "",
            'ans5' => isset($data['ans5']) && $data['ans5'] != NULL ? $data['ans5'] : "",
            'explaination' => $data['explaination'],
            'free_cmt' => $data['free_cmt'],
            'update_date' => \Date::forge()->get_timestamp(),
        );

        $result = \DB::insert('questions')
                ->set($question)
                ->execute();

        return ($result[1] > 0) ? $result[0] : false;

    }
    
    /*
     * 問題情報をアップデートする
     */
    public static function updateQuestion($data) {

        $same_questions = \DB::select()
                ->where('year', '=', $data['year'])
                ->and_where('question_no', '=', $data['question_no'])
                ->and_where('question_sub_no', '=', $data['question_sub_no'])
                ->from('questions')
                ->execute();

        if ($same_questions->count() == 0) {
            throw new \Exception('問題情報の更新に失敗しました。');
        }

        $question = array(
            'question_type' => $data['question_type'],
            'question_option' => $data['question_option'],
            'answer_num' => $data['answer_num'],
            'question' => $data['question'],
            'sel1' => $data['sel1'],
            'sel2' => $data['sel2'],
            'sel3' => $data['sel3'],
            'sel4' => $data['sel4'],
            'sel5' => $data['sel5'],
            'sel6' => $data['sel6'],
            'sel7' => $data['sel7'],
            'sel8' => $data['sel8'],
            'sel9' => $data['sel9'],
            'ans1' => isset($data['ans1']) && $data['ans1'] != NULL ? $data['ans1'] : "",
            'ans2' => isset($data['ans2']) && $data['ans2'] != NULL ? $data['ans2'] : "",
            'ans3' => isset($data['ans3']) && $data['ans3'] != NULL ? $data['ans3'] : "",
            'ans4' => isset($data['ans4']) && $data['ans4'] != NULL ? $data['ans4'] : "",
            'ans5' => isset($data['ans5']) && $data['ans5'] != NULL ? $data['ans5'] : "",
            'explaination' => $data['explaination'],
            'free_cmt' => $data['free_cmt'],
            'update_date' => \Date::forge()->get_timestamp(),
        );

        $affected_rows = \DB::update('questions')
                ->set($question)
                ->where('year', '=', $data['year'])
                ->and_where('question_no', '=', $data['question_no'])
                ->and_where('question_sub_no', '=', $data['question_sub_no'])
                ->execute();

        return $affected_rows > 0;
    }

}
