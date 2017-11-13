/*
 * 
 */
$(function() {
    $("button.ShowAnswer").click(function() {
        $("div.answer").toggle("show");
    });
});

$(function() {
    $("div.menu").click(function() {
        $(this).parent("li").children("ul").slideToggle("fast");
    });
});
// 選択肢が変更された
$(function() {
    $('select#questionType').change(function() {
        if ($(this).val() == 1) {
            $("table#inputTypeNormal").hide();
            $("table#inputTypeSpecial").show();
        } else if ($(this).val() == 2) {
            $("table#inputTypeNormal").show();
            $("table#inputTypeSpecial").hide();
        }
    })
});

$(function() {

    //data-hrefの属性を持つtrを選択しclassにclickableを付加
    $('tr[data-href]').addClass('clickable')

            //クリックイベント
            .click(function(e) {

                //e.targetはクリックした要素自体、それがa要素以外であれば
                if (!$(e.target).is('a')) {

                    //その要素の先祖要素で一番近いtrの
                    //data-href属性の値に書かれているURLに遷移する
                    window.location = $(e.target).closest('tr').data('href');
                }
            });
});
/* 背景色をロールオーバーで変更する */
$(function() {
    $(".menu").hover(function() {
        $(this).stop().animate({backgroundColor: "#FAD091"}, 400);
    }, function() {
        $(this).stop().animate({backgroundColor: "#ffffff"}, 400);
    });
});

$(function() {
    $(".login-submit").hover(function() {
        $(this).stop().animate({backgroundColor: "#e74c8c"}, 400);
    }, function() {
        $(this).stop().animate({backgroundColor: "#EE7337"}, 400);
    });
});

$(function() {
    $("#question-list .menubox a.type1").hover(function() {
        $(this).stop().animate({backgroundColor: "#75B9E7"}, 200);
    }, function() {
        $(this).stop().animate({backgroundColor: "#3498db"}, 200);
    });
    $("#question-list .menubox a.type2").hover(function() {
        $(this).stop().animate({backgroundColor: "#B8E557"}, 200);
    }, function() {
        $(this).stop().animate({backgroundColor: "#98D020"}, 200);
    });
    $("#question-list .menubox a.type3").hover(function() {
        $(this).stop().animate({backgroundColor: "#FFC0CB"}, 200);
    }, function() {
        $(this).stop().animate({backgroundColor: "#F1A9A0"}, 200);
    });
});

/*
 * お気に入りに登録するAjax
 */
function registerFavorite(param1, param2) { //param3:1:insert 2:delete
    var alertStr;
    var mode;
    var changeImagePath;
    var timestamp = new Date().getTime();
    if (document.favorite.elements[0].checked) {
        alertStr = "お気に入りに登録しました。";
        mode = 1;
    } else {
        mode = 2;
        changeImagePath = "../img/star-64-yellow.png?" + timestamp;
    }
    $.post(
            "../php/favorite_post.php",
            {
                userid: param1,
                questionid: param2,
                mode: mode
            },
    function(json) {
    });
}

function registMemo(obj) {
    $.post(
            "../php/memo_post.php",
            {
                userid: param1,
                questionid: param2,
                mode: mode
            },
    function(json) {
    });
}

$(function() {
    $('a[rel*=leanModal]').leanModal({
        top: 100, // モーダルウィンドウの縦位置を指定
        overlay: 0.5, // 背面の透明度 
        closeButton: ".modal_close"  // 閉じるボタンのCSS classを指定
    });
});
