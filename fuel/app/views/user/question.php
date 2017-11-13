
<div id="question">
    <!--年度、分野-->
    <h2><?php echo $year; ?> 年度 <?php echo Util\Common::GetCategoryName($cat); ?></h2>

    <div class="lNavi">
        <?php echo Html::anchor('/user/questions/', 'カテゴリ選択') ?> | <?php echo Html::anchor('/user/pqlist?year=' . $year . '&category=' . $cat, '問題一覧') ?>  
    </div>

    <hr class="leaf-line">
    <div id="disp_q">
        <div class="question_main">
            問 <?php echo $question_no; ?> <br />
            <?php echo $question ?> <br />
        </div>

        <!-- 選択肢 -->
        <div class="choices">
            <?php
            $items = array();
            for ($i = 0; $i < count($selection); $i++) {
                array_push($items, $selection[$i]);
            }
            echo Html::ol($items);
            ?>
        </div>
    </div>
    <button <?php echo $prevEnabled; ?> class="prevButton" type=button onClick="location.href = '<?php echo "./question.php?year=" . $year . "&category=" . $cat . "&markno=" . $prevNo ?>'">前の問題</button>
    <a rel="leanModal" href="#modalAnswer" class="ShowAnswer">解答を見る</a>
    <button <?php echo $nextEnabled; ?> class="nextButton" type=button onClick="location.href = '<?php echo "./question.php?year=" . $year . "&category=" . $cat . "&markno=" . $nextNo ?>'">次の問題</button>


    <!-- 「解答を見る」を選択すると表示されるモーダル -->
    <div id="modalAnswer">
        <dl class="answer">
            <!--解答-->
            <dt class="title">問題</dt>
            <dd class="qestion">
                <?php echo $question; ?>
            </dd>
            <dd class="choices">
                <?php
                echo "<ol>";
                for ($i = 0; $i < count($selection); $i++) {
                    echo "<li>";
                    echo $selection[$i] . ""; //選択肢項目
                    echo "</li>";
                }
                echo "</ol>";
                ?>
            </dd>

            <!--解答-->
            <dt class="title">答え</dt>

            <dd class="ansNo">
                <?php
                for ($i = 0; $i < count($answers); $i++) {
                    if ($answers[$i] == "0")
                        continue;
                    if ($i != 0)
                        echo ".　";
                    echo $answers[$i]; //解答番号
                }
                ?>
            </dd>
            <!--解説-->
            <dd class="explain">
                <?php echo nl2br($explain) ?>
            </dd>

        </dl>
    </div>
</div>