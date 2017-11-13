
<?php
$tmp = "";
for ($i = 2004; $i <= 2013; $i++) {

    $url = Uri::create('admin/questions/' . $i);


    if ($i == $year) {
        $tmp .= "<option value=\"$url\" selected>$i 年度 </option> \n";
    } else {
        $tmp .= "<option value=\"$url\">" . $i . " 年度 </option> \n";
    }
}
?>
<form class="menu-year">
    <select onChange="top.location.href = value" class="menu-year">
        <option value=".">選択してね</option>
        <?php echo $tmp; ?>
    </select>
</form>
<table class="editlist" id="editlist">
    <tr>
        <td colspan="5" class="addquestion"><?php echo Html::anchor('/admin/questionedit?year=' . $year, '問題追加') ?></td>
    </tr>
    <tr class="head"><th>分野</th><th>問題番号</th><th>マーク番号</th><th>問題文</th><th> </th></tr>
    <?php
    foreach ($questions as $row) {
        $url = Uri::create("/admin/questionedit?year=" . $year . "&cat=" . $row["category"] . "&no=" . $row["question_no"] . "&sub_no=" . $row["question_sub_no"]);
        echo "<tr data-href=\"$url\">";
        echo "<td class=\"category\">";
        echo Util\Common::GetCategoryName($row["category"]);
        echo "</td>";

        echo "<td class=\"no\">";
        echo $row["question_no"];
        echo "</td>";

        echo "<td class=\"markno\">";
        echo $row["question_sub_no"];
        echo "</td>";

        echo "<td class=\"question\">";
        echo $row["question"];
        echo "</td>";

        echo "<td class=\"edit\">";
        echo "<a href=\"./questionedit.php?year=$year&category=" . $row["category"] . "&questionno=" . $row["question_no"] . "&markno=" . $row["question_sub_no"] . "\">編集</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
    <tr>
        <td colspan="5" class="addquestion"><?php echo Html::anchor('/admin/questionedit?year=' . $year, '問題追加') ?></td>
    </tr>
</table>