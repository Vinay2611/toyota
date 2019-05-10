<?php
/*$usermobile = '919967326081';
echo "https://meo.co.in/MessagingAPI/sendMessage.php?LoginId=9833696603&password=amit@6804&mobile_number=".$usermobile."&message=http://www.shobiztech.com/toyota/img/whatapp_sl.jpg";*/

        $baseurl = "https://meo.co.in/MessagingAPI/sendMessage.php";
        $username = "9833696603";
        $pw = "amit@6804";
        $usermobile = '919967326081';
       
        $params = array("command"=>"createcustomer", "LoginId"=>$username, "password"=>$pw, 
        "mobile_number"=>$usermobile,"message"=>'http://www.shobiztech.com/toyota/img/whatapp_sl.jpg');
        $link = $baseurl . '?' . http_build_query($params);



             $ch = curl_init();              
             // Set query data here with the URL
             curl_setopt($ch, CURLOPT_URL, $link);

             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_TIMEOUT, '3');
             $content = trim(curl_exec($ch));
             curl_close($ch);
             print $content;
?>