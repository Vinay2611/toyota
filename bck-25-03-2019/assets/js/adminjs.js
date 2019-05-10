/**
 * Created by Vinay Jaiswal.
 * User: Toyota
 * Date: 26-02-2019
 * Time: 12:04
 */


//function to validate email
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}


function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    } else{
        return true;
    }
}


$( function () {


    /*Admin Login*/
    $("#adminLogin").submit( function (e) {
        e.preventDefault();
        var userName = $("#username").val();
        var password = $("#password").val();
        if( userName == '' || password == '' ){
            alertify.error('User name and Password  cannot be empty!');
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "../config/adminresponse.php",
                data: {
                    user_name : userName,
                    password : password,
                    type : "AdminLogin"
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    console.log(data);
                    if(data.valid){
                        alertify.success(data.message);
                        setTimeout(function(){
                            window.location.href = "dashboard.php";
                        },1000);
                    }else{
                        alertify.error(data.message);
                        /*setTimeout(function(){
                            location.reload();
                        },3000);*/
                    }
                }
            });
        }
    });


    //User registration
    $("#add_edit_user").submit( function ( e ) {
        e.preventDefault();
        var full_name = $('#full_name').val();
        var email_id = $('#email_id').val();
        var mobile = $('#mobile').val();
        var password  = $('#password').val();
        var confirm_password  = $('#confirm_password').val();
        var location_id  = $('#location_id').val();
        var validate = true;
        if ( full_name == '' || email_id == '' || mobile == '' || password == '' || confirm_password == '' || location_id == '' ){
            validate = false;
            alertify.error('All fields are compulsory!');
            return false;
        }
        if ( password != confirm_password ) {
            validate = false;
            alertify.error('Password and Confirm Password must be same!');
            return false;
        }
        if( IsEmail( email_id ) == false ){
            validate = false;
            alertify.error('Invalid Email!');
            return false;
        }
        var formData = new FormData($(this)[0]);

        if (validate == true) {
            $.ajax({
                type: "POST",
                url: "../config/adminresponse.php",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                //data: form.serialize(),
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.success) {
                        alertify.success( data.msg);
                        setTimeout(function(){ location.reload(); }, 3000);
                        //location.reload();
                        //$("#post_msg_div").prepend(body);

                    } else {
                        alertify.error( data.msg);
                        //setTimeout(function(){ location.reload(); }, 3000);
                    }

                }
            });
        }
    });


    /*Delete users*/
    $('.delete_user').click(function(){
        var id = $(this).attr("data-id");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                delete_user : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });

    /*Status users*/
    $('.status_user').click(function(){
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                status : status,
                status_user : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


    /*Admin Login*/
    $("#add_edit_location").submit( function (e) {
        e.preventDefault();
        var location = $("#location").val();
        var location_id = $("#location_id").val();
        if( location == '' ){
            alertify.error('Location cannot be empty!');
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "../config/adminresponse.php",
                data: {
                    location : location,
                    Record_id : location_id,
                    type : "AddEditLocation"
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    console.log(data);
                    if(data.success){
                        alertify.success(data.message);
                        setTimeout(function(){
                            window.location.href = "location.php";
                        },1000);
                    }else{
                        alertify.error(data.message);
                        /*setTimeout(function(){
                            location.reload();
                        },3000);*/
                    }
                }
            });
        }
    });


    /*Delete users*/
    $('.delete_location').click(function(){
        var id = $(this).attr("data-id");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                delete_location : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


    /*Status users*/
    $('.status_location').click(function(){
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                status : status,
                status_location : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


    /*City */
    $("#add_edit_city").submit( function (e) {
        e.preventDefault();
        var city_name = $("#city_name").val();
        var city_id = $("#city_id").val();
        if( city_name == '' ){
            alertify.error('City cannot be empty!');
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "../config/adminresponse.php",
                data: {
                    city_name : city_name,
                    Record_id : city_id,
                    type : "AddEditCity"
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    console.log(data);
                    if(data.success){
                        alertify.success(data.message);
                        setTimeout(function(){
                            window.location.href = "cities.php";
                        },1000);
                    }else{
                        alertify.error(data.message);
                        /*setTimeout(function(){
                            location.reload();
                        },3000);*/
                    }
                }
            });
        }
    });


    /*Delete cities*/
    $('.delete_city').click(function(){
        var id = $(this).attr("data-id");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                delete_cities : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });

    /*Status cities*/
    $('.status_city').click(function(){
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                status : status,
                status_city : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


    /*Add Dealer */
    $("#add_edit_dealer").submit( function (e) {
        e.preventDefault();
        var dealer_name = $("#dealer_name").val();
        var dealer_location = $("#dealer_location").val();
        var city_id = $("#city_id").val();
        var dealer_id = $("#dealer_id").val();
        if( dealer_name == '' || dealer_location == '' || city_id == '' ){
            alertify.error('Dealer name , Dealer location and city cannot be empty!');
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "../config/adminresponse.php",
                data: {
                    dealer_name : dealer_name,
                    dealer_location : dealer_location,
                    city_id : city_id,
                    Record_id : dealer_id,
                    type : "AddEditDealer"
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    console.log(data);
                    if(data.success){
                        alertify.success(data.message);
                        setTimeout(function(){
                            window.location.href = "add_dealer.php?id="+data.city_id;
                        },1000);
                    }else{
                        alertify.error(data.message);
                        /*setTimeout(function(){
                            location.reload();
                        },3000);*/
                    }
                }
            });
        }
    });


    /*Delete Dealer*/
    $('.delete_dealer').click(function(){
        var id = $(this).attr("data-id");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                delete_dealer : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


    /*Status dealer*/
    $('.status_dealer').click(function(){
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");
        $elm = $(this);
        $elm.hide();
        $elm.after('<i class="fa fa-spinner fa-pulse fa-1x fa-fw submit-loading"></i>');
        $.ajax({
            type : 'POST',
            url	: "../config/adminresponse.php",
            data :  {
                id : id,
                status : status,
                status_dealer : true
            },
            success : function(data)
            {
                $(".submit-loading").remove();
                $elm.show();
                var data = jQuery.parseJSON(data);
                if(data.valid)
                {
                    /*$('#product_'+id).hide();*/
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
                else
                {
                    alertify.success( data.msg);
                    setTimeout(function(){ location.reload(); }, 3000);
                    return false;
                }
            }
        });

    });


}); // script end here

