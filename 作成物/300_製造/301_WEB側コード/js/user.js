$(function () {
    function categoryAjax($id,$attribute) {
        if($($id).val() == 'all'){
            console.log('全件');
            $.ajax({
                url:'../class/Controll/account/operation/UserListAcquisition.php',
                type:'POST',
                data:{
                    'attribute':$attribute,
                    'content':$($id).val(),
                }
            })
                .then(
                    function (data) {
                        userTableInsertionProcess(data);
                    },
                    function (data) {
                        console.log('失敗')
                    }
                )
        }
        $.ajax({
            url:'../class/Executionfile/UserListRefineAjax.php',
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
                    userTableInsertionProcess(data);
                },
                function () {
                    console.log('失敗')
                }
            )
    }

    $('#refine-select1').change(function () {
        categoryAjax($('#refine-select1'),$('#refine-select1').attr('name'))
    })
    $('#refine-select2').change(function () {
        categoryAjax($('#refine-select2'),'department_name')
    })
    $('#refine-select3').change(function () {
        categoryAjax($('#refine-select3'),'teacher.name')
    })
    $('#refine-select4').change(function () {
        categoryAjax($('#refine-select4'),$('#refine-select4').attr('name'))
    })
    $('#refine-select7').change(function () {
        categoryAjax($('#refine-select7'))
    })
});


