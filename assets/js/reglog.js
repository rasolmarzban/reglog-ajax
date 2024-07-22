jQuery(document).ready(function ($) {
    $('#reglog-login').on('submit',function (event){
            event.preventDefault();
            let user_email = $('#user-email').val();
            let user_password = $('#user-password').val();
            let notify = $('.alert');
            $.ajax({
                url: my_ajax_object.ajax_url,
                type: 'post',
                dataType: 'json',
                data:{
                    action:'login_reglog',
                    user_email: user_email,
                    user_password: user_password
                },
                success: function(response){
                        notify.addClass('.success-alert');
                        notify.append('<p>logged in successfully!</p>');
                        notify.css('display','block');
                        notify.css('background','#3db53d78');
                        notify.css('text-align','center');
                        
                },
                error: function (error){
                    if(error){
                        //alert(1231231);
                        notify.addClass('.error-alert');
                        notify.append('<p>Something Went Wrong!</p>');
                        notify.css('display','block',);
                        notify.css('background','#b53d3d78');
                        notify.css('text-align','center');
                    }
                }
            });
        });

    //register ajax 

    $('#reglog-register').on('submit',function (event){
        event.preventDefault();
        let username = $('#username').val();
        let user_email = $('#user-email').val();
        let user_password = $('#user-password').val();
        let notify = $('.alert');
        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'post',
            dataType: 'json',
            data:{
                action:'register_reglog',
                username: username,
                user_email: user_email,
                user_password: user_password
            },
            success: function(response){
                notify.addClass('.success-alert');
                    notify.append('<p>Registered successfully!</p>');
                    notify.css('display','block');
                    notify.css('background','#3db53d78');
                    notify.css('text-align','center');
            },
            error: function (error){
                if(error){
                    notify.addClass('.error-alert');
                    notify.append('<p>Something Went Wrong!</p>');
                    notify.css('display','block',);
                    notify.css('background','#b53d3d78');
                    notify.css('text-align','center');                
                }
            }
        });
    });
});