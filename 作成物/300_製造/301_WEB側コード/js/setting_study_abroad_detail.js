$(function () {
    $('#input_country_select').change(function () {
        $.ajax({
            url:'../class/Executionfile/CountryGet.php',
            type:'POST',
            data:{
                'country':$(this).val()
            }
        }).then(
            function (data) {
                console.log(data);
                $('#input_school_select').empty().append(data);

            },
            function (data) {

            }
        )
    });

    $('#country_refine').change(function () {
        if($(this).val() === 'all'){
            $.ajax({
                url:'../class/Executionfile/study_abroad_all_get.php',
                type:'POST',
                data:{
                    'country':$(this).val()
                }
            }).then(
                function (data) {
                    console.log(data);
                    $('#table_body').empty().append(data);

                },
                function (data) {

                }
            )
        }else{
            $.ajax({
                url:'../class/Executionfile/study_abroad_refine.php',
                type:'POST',
                data:{
                    'country':$(this).val()
                }
            }).then(
                function (data) {
                    console.log(data);
                    $('#table_body').empty().append(data);

                },
                function (data) {

                }
            )
        }

    }),
        $('#button2').submit(function () {
            if (true){//入力チャック

            }else{
                alert('dfsdfs');
                return false;
            }
        })
});