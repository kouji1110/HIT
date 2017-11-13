<div id="questions">
<h2><?php echo $year; ?> 年度 <?php echo Util\Common::GetCategoryName($cat); ?></h2>
<?php

//    var_dump($questions);
$list = array();
foreach ($questions as $q) {
//        echo $q["question"];
//    $disp = str_pad($q["question_no"], 2, "0", STR_PAD_LEFT)." ";
    
    $disp = "問". $q["question_no"]."　";
    $url = "/user/question?year=".$q["year"]."&category=".$q["category"]."&markno=".$q["question_sub_no"];
    $disp .= Html::anchor($url,$q["question"]);
    
    array_push($list, $disp);
}
$attr = array("class"=>"pqlist");

echo Html::ul($list,$attr);
?>
</div>