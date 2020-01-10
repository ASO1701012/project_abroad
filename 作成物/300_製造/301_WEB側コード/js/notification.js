//       ドロップボックスにチェックボックスを埋め込む処理
$(function() {
    $('#my-select').multiSelect();
});

//フォーム送信時確認用
function check(){

    if(window.confirm('選択した条件で送信してよろしいですか？')){ // 確認ダイアログを表示

        return true; // 「OK」時は送信を実行

    }
    else{ // 「キャンセル」時の処理

        window.alert('キャンセルされました'); // 警告ダイアログを表示
        return false; // 送信を中止

    }

}

//フォーム送信時確認用2
function check2(){

    if(window.confirm('全員に通知をします。よろしいですか？')){ // 確認ダイアログを表示

        return true; // 「OK」時は送信を実行

    }
    else{ // 「キャンセル」時の処理

        window.alert('キャンセルされました'); // 警告ダイアログを表示
        return false; // 送信を中止

    }

}