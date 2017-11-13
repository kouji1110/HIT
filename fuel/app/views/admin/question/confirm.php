<?php
if ($mode == 1) {
    echo "下記の内容で新規登録します。 <br />";
} else {
    echo "下記の内容で更新登録します。 <br />";
}
echo "年度: " . $_POST["year"] . "<br>";
echo "分野: " . $_POST["category"] . "<br>";
echo "問題番号: " . $_POST["questionno"] . "<br>";
echo "マーク番号: " . $_POST["markno"] . "<br>";
echo "問題文: " . $_POST["question"] . "<br>";
echo "選択肢1: " . $_POST["select1"] . "<br>";
echo "選択肢2: " . $_POST["select2"] . "<br>";
echo "選択肢3: " . $_POST["select3"] . "<br>";
echo "選択肢4: " . $_POST["select4"] . "<br>";
echo "選択肢5: " . $_POST["select5"] . "<br>";
echo "選択肢6: " . $_POST["select6"] . "<br>";
echo "選択肢7: " . $_POST["select7"] . "<br>";
echo "選択肢8: " . $_POST["select8"] . "<br>";
echo "選択肢9: " . $_POST["select9"] . "<br>";
echo "解答1: " . $_POST["answer1"] . "<br>";
echo "解答2: " . $_POST["answer2"] . "<br>";
echo "解答3: " . $_POST["answer3"] . "<br>";
echo "解答4: " . $_POST["answer4"] . "<br>";
echo "解答5: " . $_POST["answer5"] . "<br>";
echo "解説: " . $_POST["explain"] . "<br>";
echo "フリーコメント: " . $_POST["freecmt"] . "<br>";
?>
<form action="./regist.php" method="post">
    <input type="hidden" name="mode" value="<?php echo $_POST["mode"];
; ?>">
    <input type="hidden" name="questionid" value="<?php echo $_POST["questionid"]; ?>">
    <input type="hidden" name="year" value="<?php echo $_POST["year"]; ?>">
    <input type="hidden" name="category" value="<?php echo $_POST["category"]; ?>">
    <input type="hidden" name="questionno" value="<?php echo $_POST["questionno"]; ?>">
    <input type="hidden" name="markno" value="<?php echo $_POST["markno"]; ?>">
    <input type="hidden" name="question" value="<?php echo $_POST["question"]; ?>">
    <input type="hidden" name="select1" value="<?php echo $_POST["select1"]; ?>">
    <input type="hidden" name="select2" value="<?php echo $_POST["select2"]; ?>">
    <input type="hidden" name="select3" value="<?php echo $_POST["select3"]; ?>">
    <input type="hidden" name="select4" value="<?php echo $_POST["select4"]; ?>">
    <input type="hidden" name="select5" value="<?php echo $_POST["select5"]; ?>">
    <input type="hidden" name="select6" value="<?php echo $_POST["select6"]; ?>">
    <input type="hidden" name="select7" value="<?php echo $_POST["select7"]; ?>">
    <input type="hidden" name="select8" value="<?php echo $_POST["select8"]; ?>">
    <input type="hidden" name="select9" value="<?php echo $_POST["select9"]; ?>">
    <input type="hidden" name="answer1" value="<?php echo $_POST["answer1"]; ?>">
    <input type="hidden" name="answer2" value="<?php echo $_POST["answer2"]; ?>">
    <input type="hidden" name="answer3" value="<?php echo $_POST["answer3"]; ?>">
    <input type="hidden" name="answer4" value="<?php echo $_POST["answer4"]; ?>">
    <input type="hidden" name="answer5" value="<?php echo $_POST["answer5"]; ?>">
    <input type="hidden" name="explain" value="<?php echo $_POST["explain"]; ?>">
    <input type="hidden" name="freecmt" value="<?php echo $_POST["freecmt"]; ?>">
    <input type="submit" name="submit"  value="登録" />
</form>