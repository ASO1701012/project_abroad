function userTableInsertionProcess(data) {
    $obj = JSON.parse(data);
    $("#table_body").empty();
    let tmp = 0;
    $.each($obj,function (value) {
        $("#table_body").append("<tr></tr>");
        $.each($obj[value],function (index,value) {
            // console.log(index + ':' + value);
            if(index===5 || index===6){
                if(index===5){
                    tmp = value + " ";
                }else{
                    tmp += value;
                    $("#table_body > tr:last-child").append("<td>"+tmp+"</td>");
                    tmp = 0;
                }
            }
            if(index===7 || index===8){
                if(index===7){
                    tmp = value + " ";
                }else{
                    tmp += value;
                    $("#table_body > tr:last-child").append("<td>"+tmp+"</td>");
                    tmp = 0;
                }

            }
            if(index===9){
                if(index===null){
                    $("#table_body > tr:last-child").append("<td>"+"いいえ"+"</td>");
                }else{
                    $("#table_body > tr:last-child").append("<td>"+"はい"+"</td>");
                }
            }
            if(!(index===5 || index===6 ||index===7 || index===8 || index===9)){
                $("#table_body > tr:last-child").append("<td>"+value+"</td>");
            }else{

            }

        })
    })
}