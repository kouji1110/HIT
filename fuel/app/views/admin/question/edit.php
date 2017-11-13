
<div id="question-edit">
    
    <div class="center">
    <?php echo Html::anchor('/admin/questions/'.$year,'一覧へ戻る'); ?>
    </div>
    
    <form action="<?php echo Fuel\Core\Uri::create('/admin/question_register'); ?>" method="post">
        <table class="edit-table">
            <tr>
                <th class="year">年度</th>
                <td><?php echo $year . "年度"; ?></td>
                <th class="year">分野</th>
                <td>
                    <select class="content" id="category" name="category">
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                            if ($mode == "2" && $i == $category) {
                                echo "<option value=\"$i\" selected>" . Util\Common::GetCategoryName($i) . "</option> \n";
                            } else {
                                echo "<option value=\"$i\">" . Util\Common::GetCategoryName($i) . "</option> \n";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>問題番号</th>
                <td>
                    <select class="content" id="questionno" name="question_no">
                        <?php
                        for ($i = 1; $i < 100; $i++) {
                            if ($mode == "2" && $i == $questionno) {
                                echo "<option value=\"$i\" selected>$i</option> \n";
                            } else {
                                echo "<option value=\"$i\">$i</option> \n";
                            }
                        }
                        ?>
                    </select>
                </td>
                <th>マーク番号</th>
                <td>
                    <select class="content" id="markno" name="question_sub_no">
                        <?php
                        for ($i = 1; $i < 100; $i++) {
                            if ($mode == "2" && $i == $markno) {
                                echo "<option value=\"$i\" selected>$i</option> \n";
                            } else {
                                echo "<option value=\"$i\">$i</option> \n";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>問題文</th>
                <td colspan="3">
                    <textarea name="question"><?php if(isset($content)) echo $content; ?></textarea>
                </td>
            </tr>
            <tr>
                <th>選択肢1</th>
                <td><input class="content" type="text" name="input_sel1" value="<?php if(isset($selection[0])) echo $selection[0]; ?>"/></td>
                <th>選択肢6</th>
                <td><input class="content" type="text" name="input_sel6" value="<?php if(isset($selection[5])) echo $selection[5]; ?>"/></td>
            </tr>
            <tr>
                <th>選択肢2</th>
                <td><input class="content" type="text" name="input_sel2" value="<?php if(isset($selection[1])) echo $selection[1]; ?>"/></td>
                <th>選択肢7</th>
                <td><input class="content" type="text" name="input_sel7" value="<?php if(isset($selection[6])) echo $selection[6]; ?>"/></td>
            </tr>
            <tr>
                <th>選択肢3</th>
                <td><input class="content" type="text" name="input_sel3" value="<?php if(isset($selection[2])) echo $selection[2]; ?>"/></td>
                <th>選択肢8</th>
                <td><input class="content" type="text" name="input_sel8" value="<?php if(isset($selection[7])) echo $selection[7]; ?>"/></td>
            </tr>
            <tr>
                <th>選択肢4</th>
                <td><input class="content" type="text" name="input_sel4" value="<?php if(isset($selection[3])) echo $selection[3]; ?>"/></td>
                <th>選択肢9</th>
                <td><input class="content" type="text" name="input_sel9" value="<?php if(isset($selection[8])) echo $selection[8]; ?>"/></td>
            </tr>
            <tr>
                <th>選択肢5</th>
                <td><input class="content" type="text" name="input_sel5" value="<?php if(isset($selection[4])) echo $selection[4]; ?>"/></td>
                <th></th>
                <td></td>
            </tr>
            <tr>
                <th>解答</th>
                <td colspan="3">
                    <input type="checkbox" name="input_ans1" value="1" <?php if (isset($answers) && in_array("1", $answers)) echo "checked"; ?>> 1
                    <input type="checkbox" name="input_ans2" value="2" <?php if (isset($answers) && in_array("2", $answers)) echo "checked"; ?>> 2
                    <input type="checkbox" name="input_ans3" value="3" <?php if (isset($answers) && in_array("3", $answers)) echo "checked"; ?>> 3
                    <input type="checkbox" name="input_ans4" value="4" <?php if (isset($answers) && in_array("4", $answers)) echo "checked"; ?>> 4
                    <input type="checkbox" name="input_ans5" value="5" <?php if (isset($answers) && in_array("5", $answers)) echo "checked"; ?>> 5
                    <input type="checkbox" name="input_ans6" value="6" <?php if (isset($answers) && in_array("6", $answers)) echo "checked"; ?>> 6
                    <input type="checkbox" name="input_ans7" value="7" <?php if (isset($answers) && in_array("7", $answers)) echo "checked"; ?>> 7
                    <input type="checkbox" name="input_ans8" value="8" <?php if (isset($answers) && in_array("8", $answers)) echo "checked"; ?>> 8
                    <input type="checkbox" name="input_ans9" value="9" <?php if (isset($answers) && in_array("9", $answers)) echo "checked"; ?>> 9
                </td>
            </tr>
            <tr>
                <th>解説</th>
                <td colspan="3">
                    <textarea name="explaination"><?php if(isset($explaination)) echo $explaination; ?></textarea>
                </td>
            </tr>
            <tr>
                <th>フリーコメント</th>
                <td colspan="3">
                    <textarea name="free_cmt"><?php if(isset($freeCmt)) echo $freeCmt; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="hidden" name="year" value="<?php echo $year ?>">
                    <input type="hidden" name="question_type" value="">
                    <input type="hidden" name="question_option" value="">
                    <?php /* <input type="hidden" name="questionid" value="<? echo $question->question_id ?>"> */ ?>
                    <input type="hidden" name="mode" value="<?php echo $mode ?>">
                    <button type="submit">
                        <?php
                        if ($mode == "2") {
                            echo "更新登録";
                        } else {
                            echo "新規登録";
                        }
                        ?>
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
