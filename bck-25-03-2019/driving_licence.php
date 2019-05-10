<?php

include('config/db.php');
include('function.php');
include('auth.php');
$userId = fetchUserId();
$locationId = fetchLocationId();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Toyota Yaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <!--<script src="admin/javascript/javascript.js"></script>-->

    <script src="js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="upload.js"></script>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        #feedback_id{
            width: 50% !important;
            background: #eaeaea !important;
            border: none !important;
            color: #545454;
            font-size: 14px;
            height: 44px !important;
        }
    </style>
</head>

<body>

<div class="header" style="height: 80px;padding: 20px 0px; ">
    <div style="float: left;margin-left: 30px;">
        <img src="images/Toyota.jpg" alt="" height="40">
    </div>
    <div style="float: right;margin-right: 30px;">
        <img src="images/Yaris.jpg" height="40" alt="">
    </div>
</div>

<form class="cmxform" id="licenceForm" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="image">

        </div>
        <div style="text-align:center">
            <h2 style="font-size: 16px;">DRIVING LICENCE</h2>
            <small style="margin-top:20px; margin-left:20px; text-transfor:uppercase">
                <strong><?= $_SESSION['location_name']; ?></strong><br>
                <strong><?= $_SESSION['first_name']; ?></strong>
            </small>
        </div>
        <div class="form-area">
            <!--<div class="form-group">
                <span class="req">*</span><label class="blue-bg">Name:</label>
                <input class="form-field" name="name" id="username" style="width:83%"/>
            </div>-->

            <div class="form-group" style="width: 100%;margin-bottom: 30px;">
                <span class="req">*</span><label class="blue-bg">Select Name / Mobile No.:</label>
                <select name="feedback_id" id="feedback_id" class="feedback_class" required >
                    <option value="">Select Name / Mobile No.</option>
                    <?php
                    $sql = "SELECT * FROM `feedback` WHERE `crew_user_id` = '".$_SESSION['users_id']."'";
                    $que = $db->query( $sql );
                    while($row = $que->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['feedback_id']; ?>" ><?php echo $row['mobile']?> - <?php echo $row['name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <span class="req">*</span><label class="blue-bg">Upload licence:</label>
                <input type="file" name="rrcbook" id="rrcbook" value="" accept="image/*" capture="environment" required>
            </div>

            <div class="action">
                <h3 id="msg_response" style="display: none;">Drivince licence uploaded successfully.</h3>
                <button class="blue-bg" id="submit-btn-ajax" type="submit">Submit</button>
            </div>


        </div>

    </div>

    </div>
</form>

<script>
    $("#licenceForm").on('submit',(function(e) {
        e.preventDefault();
        $("#submit-btn-ajax").hide();
        //$("#formsubmitbutton").attr("disabled", "disabled");
        $.ajax({
            url: "driving_process.php",
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(){$("#body-overlay").show();},
            contentType: false,
            processData:false,
            success: function(data)
            {
                var obj = jQuery.parseJSON(data);
                if (obj['status'] == 1) {
                    $('#msg_response').show();
                    $("#submit-btn-ajax").show();
                    setTimeout( function () {
                        window.location.href = 'http://www.shobiztech.com/toyota/feedback.php';
                        //window.location.reload();
                    }, 1000);

                    //alert("driving uploaded successfully");
                } else if (obj['logged'] == false) {
                    alert('Something went wrong');
                }
            },
            error: function()
            {
            }
        });
    }));

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.feedback_class').select2();
    });
</script>



</body>
</html>
