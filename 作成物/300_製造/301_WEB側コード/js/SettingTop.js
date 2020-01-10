$(function () {
    $('#form_button').on('click',function () {
        let result = false;
        if (!($('#mail1').val() ==='') || !($('#text1').val() === '')){
            result = true;
        }
        if(($('#pass1').val() === $('#pass2').val) && !($('#pass1').val() === '')){
            result = true;
        }

        if(!result) {
            alert('エラーです！！！');
            return false
        }
    })
    // ボタンが押された場合
            //入力されている項目があるかチェック
                //一つでもあれば遷移
                //一つもなければアラートを表示
});