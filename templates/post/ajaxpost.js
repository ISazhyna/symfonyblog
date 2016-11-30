$(document).ready(function(){
    $("#bajax").on('click',function(){
        // $.ajax({url: "/../demo_test.txt",
        $.ajax({url: "/post/ajax",
            success: function(result){
            $("#post").html(result);
        }});
    });



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



    $("#subm_ajax").on('click',function(){
               $.ajax(
            {
                url: "/post/add_new_post_ajax",
                method: "POST",
                // data: {'post_id': postId},
                success: function(result){
                    var ajaxResult = $.parseJSON(result);
                    var status  = ajaxResult.status;
                    var message  = ajaxResult.message;
                    $('#save_post').html("<h1>"+status+message+"</h1>");
                },
                // beforeSend: function() {
                //     $('#loader').show();
                // },
                // complete: function(){
                //     $('#loader').hide();
                // }
            }
        );
    });



});



