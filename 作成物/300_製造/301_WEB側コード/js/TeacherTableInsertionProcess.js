function teacherTableInsertionProcess(data) {
    $obj = JSON.parse(data);
    $("#table_body").empty();
    $.each($obj,function (key,value) {
        $("#table_body").append("<tr></tr>");
        $.each(value,function (index,value) {
            console.log(index,value);
                $("#table_body > tr:last-child").append("<td>"+value+"</td>");

        })
    })
}