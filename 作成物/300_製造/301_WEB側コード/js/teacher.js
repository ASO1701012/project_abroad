$(function () {
    function categoryAjax($id,$attribute) {
        // console.log($attribute,$($id).val())
        if($($id).val() == 'all'){
            console.log('全件');
            $.ajax({
                url:'../class/Controll/account/operation/Teacher/TearcherListAcquisition.php',
                type:'POST',
                data:{
                    'attribute':$attribute,
                    'content':$($id).val(),
                }
            })
                .then(
                    function (data) {
                        teacherTableInsertionProcess(data)
                    },
                    function (data) {
                        console.log('失敗')
                    }
                )
        }
        $.ajax({
            url:'../class/Executionfile/TeacherListRefineAjax.php',
            type:'POST',
            async:false,
            data:{
                'attribute':$attribute,
                'content':$($id).val(),

            }
        })
            .then(
                function (data) {
                    console.log("成功");
                    console.log(data);
                    teacherTableInsertionProcess(data)
                    //書き込み処理
                },
                function () {
                    console.log('失敗')
                }
            )
    }

    $('#select-1').change(function () {
        // console.log($('#select-1'),$('#select-1').val())
        categoryAjax($('#select-1'),'school_name')
    });
    $('#select-2').change(function () {
        categoryAjax($('#select-2'),'country_name')
    })

});


