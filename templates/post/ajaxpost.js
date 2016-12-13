$(document).ready(function(){

    $(".ajax_post").on('click',function(){
         var postId = $(this).attr('data');
        $.ajax(
            {
                url: "/post/get_ajax_post_content",
                method: "GET",
                data: {'post_id': postId},
                success: function(result){
                      var ajaxResult = $.parseJSON(result);
                      var content  = ajaxResult.content;
                       $('#post_content').html("<h1>"+content+"</h1>");
                },
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function(){
                    $('#loader').hide();
                },
            }
        );
    });

    $("#subm_ajax").on('click',
        function() {
                var form = $('form');
                $.ajax({
                    type: 'post',
                    url: form.attr('action'),
                    data: {"title":$("input[name='title']").val(), "body":$("textarea[name='body']").val()}
            // data: form.serialize(),
        }).success(function(result) {
                        console.log(result);

                    if (result.status =="success")
                    {
                    $('#save_post').html("<h2>"+result.message+"</h2>");
                            $('form')[0].reset();
                    }
                    else {
                        // var ajaxResult = $.parseJSON(result);  //don't parse result because we have already had Object because of using JSonREsponse
                        var errors = result.errors;
                        if (typeof errors.title != "undefined") {
                            $("input").siblings("span.title").html("* " + errors.title);
                        }
                        if (typeof errors.body != "undefined") {
                            $("textarea").siblings("span.body").html("* " + errors.body);
                        }
                        // var status  = ajaxResult.status;
                        // var message  = ajaxResult.message;
                        // var prefix = ajaxResult.prefix;
                        // $('.error'+prefix).html("<p>"+error+"</p>");
                        // console.log($('form'));
                        // console.log($('form')[0]);
                        //
                        //


                        $('#save_post').html("<h2>"+result.message+"</h2>");
                    }

                });
        });

    $("input,textarea").on('change', function(){
        $(this).siblings("span.error").html("*");
    });


    $(".p_id").on('click',
        function() {
            var postId = $(this).attr('post_id');
            var rowElement=$(this).parents("tr");
            console.log(this);
            console.log(rowElement);
             $.ajax({
                url: "/post/delete",
                 method: "GET",
                 data: {"post_id": postId},  //GET data to server
            }).success(function(result) {
                 console.log(this);
                 rowElement.hide(3000);
                 var ajaxResult = $.parseJSON(result);
                 var message=ajaxResult.message;
                 $("#dlt_msg").html(message);
            });
        });




    /*
     form validation
     */

    $(function() {

        $('.rf').each(function(){
            // Объявляем переменные (форма и кнопка отправки)
            var form = $(this),
                btn = form.find('.btn_submit');

            // Добавляем каждому проверяемому полю, указание что поле пустое
            form.find('.rfield').addClass('empty_field');

            // Функция проверки полей формы
            function checkInput(){
                form.find('.rfield').each(function(){
                    if($(this).val() != ''){
                        // Если поле не пустое удаляем класс-указание
                        $(this).removeClass('empty_field');
                    } else {
                        // Если поле пустое добавляем класс-указание
                        $(this).addClass('empty_field');
                    }
                });
            }

            // Функция подсветки незаполненных полей
            function lightEmpty(){
                form.find('.empty_field').css({'border-color':'#d8512d'});
                // Через полсекунды удаляем подсветку
                setTimeout(function(){
                    form.find('.empty_field').removeAttr('style');
                },500);
            }

            // Проверка в режиме реального времени
            setInterval(function(){
                // Запускаем функцию проверки полей на заполненность
                checkInput();
                // Считаем к-во незаполненных полей
                var sizeEmpty = form.find('.empty_field').length;
                // var sizeEmpty = form.find('.empty_field').length;
                // Вешаем условие-триггер на кнопку отправки формы
                if(sizeEmpty > 0){
                    if(btn.hasClass('disabled')){
                        return false
                    } else {
                        btn.addClass('disabled').attr("disabled", "disabled")
                    }
                } else {
                    btn.removeClass('disabled').removeAttr("disabled")
                }
            },500);

            // Событие клика по кнопке отправить
            btn.click(function(){
                if($(this).hasClass('disabled')){
                    // подсвечиваем незаполненные поля и форму не отправляем, если есть незаполненные поля
                    lightEmpty();
                    return false;
                }
                // else {
                //     // Все хорошо, все заполнено, отправляем форму
                //     form.submit();
                // }
            });
        });
    });

    $("button.btn_submit").on('click',
    // $(".btn_submit").on('click',
        function(e) {
            e.preventDefault();
            var form = $('form');
            $.ajax({
                type: 'post',
                url: '/user/save-new-user-ajax',
                data: form.serialize(),
            }).success(function(result) {
                console.log(result);
                console.log($('form'));
                var ajaxResult = $.parseJSON(result);
                var status  = ajaxResult.status;
                var message  = ajaxResult.message;
                $('#save_user').html("<h1>"+status+" "+message+"</h1>").hide(5000);
                console.log($('form')[0]);
                $('form')[0].reset();

            });
        });
    
   /*
   change currencies
     */

    $(".currency").on('click',function(){
        // var curr = '<?php echo(15-1) ?>';
        // var x = <?php echo $result ;?>;
        console.log(x);
        $.ajax(
            {
                // url: "/curl",
                // method: "GET",
                // data: {'post_id': postId},
                // success: function(result){
                //     var ajaxResult = $.parseJSON(result);
                //     var content  = ajaxResult.content;
                //     $('#post_content').html("<h1>"+content+"</h1>");
                // },
                // beforeSend: function() {
                //     $('#loader').show();
                // },
                // complete: function(){
                //     $('#loader').hide();
                // },
            }
        );
    });

});
