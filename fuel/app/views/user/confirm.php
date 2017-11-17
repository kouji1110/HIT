<?php $user=Model_User::login();?>

<div id="confirm">
    <h3>ユーザ情報</h3>
    <table>
<?php 
    echo "<tr>";
    echo "<td>ユーザID</td><td>".$user['username'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>ニックネーム（表示名）</td><td>".  Utility::get_field_from_user($user,'dispname') . "(". Fuel\Core\Html::anchor("/register/modifydispname/","変更する") .")</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>メールアドレス</td><td>" . $user['email'] . "(". Fuel\Core\Html::anchor("/register/update/","変更する") .")</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>パスワード</td><td>" . "*****(セキュリティのため非表示)(". Fuel\Core\Html::anchor("/register/update/","変更する") .")</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>登録日</td><td>".date("Y年m月d日",$user['created_at']) . "</td>";
    echo "</tr>";
?>
    </table>
</div>