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
                    if(response.success){
                        
                        notify.removeClass('alert_error').addClass('.success-alert');
                        notify.html('<p>'+ response.message +'</p>');
                        notify.css('display','block');
                        notify.css('background','#3db53d78');
                        notify.css('text-align','center');
                        notify.show(300)  
                        setTimeout(function() {
                            window.location.href = 'http://localhost/carvillage';
                        }, 2000);                 
                    }             
                },
                error: function (error){
                    if(error){
                        let message = error.responseJSON.message;
                        notify.addClass('.error-alert');
                        notify.html('<p>'+ message +'</p>');
                        notify.css('display','block',);
                        notify.css('background','#b53d3d78');
                        notify.css('text-align','center');
                        notify.delay(2000).hide(300);
                    }
                }
            });
        });

    //register ajax 

    $('#reglog-register').on('submit',function (event){
        event.preventDefault();
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let useremail = $('#useremail').val();
        let userpassword = $('#userpassword').val();
        let notify = $('.alert');
        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'post',
            dataType: 'json',
            data:{
                action:'register_reglog',
                firstname: firstname,
                lastname: lastname,
                useremail: useremail,
                userpassword: userpassword
            },
            success: function(response){
                if(response.success){
                        
                    notify.removeClass('alert_error').addClass('.success-alert');
                    notify.html('<p>'+ response.message +'</p>');
                    notify.show(300) 
                    //notify.css('display','block !important');
                    notify.css('background','#3db53d78');
                    notify.css('text-align','center'); 
                    setTimeout(function() {
                        window.location.href = 'http://localhost/carvillage/index.php/login';
                    }, 2000);                 
                } 
            },
            error: function (error){
                if(error){
                    console.log(error);
                    notify.show(300);
                    let message = error.responseJSON.message;
                    notify.addClass('.error-alert');
                    notify.html('<p>'+ message +'</p>');
                    notify.css('display','block',);
                    notify.css('background','#b53d3d78');
                    notify.css('text-align','center');
                    notify.delay(2000).hide(300);
                }
            }
        });
    });
});