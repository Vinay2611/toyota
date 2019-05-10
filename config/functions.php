<?php
/**
 * Created by Vinay Jaiswal.
 * Date: 26-02-2019
 * Time: 11:53
 */

/*
 * Random String
 */
function rand_str($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789') {
    $result = '';
    $count = strlen($charset);
    for ($i = 0; $i < $length; $i++) {
        $result .= $charset[mt_rand(0, $count - 1)];
    }
    return $result;
}

/*
 * Truncate
 */
function truncate($string,$length)
{
    $string = strip_tags($string);
    if (strlen($string) > $length)
    {
        // truncate string
        $stringCut = substr($string, 0, $length);
        // make sure it ends in a word
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
    }
    return $string;
}

/*
 * Function to generate password and pin
 */
function random_password($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

/*
 * Encrypt Password
 */
function encrypt_password($password)
{
    $hash_cost_factor = 10;
    $e_pwd = password_hash($password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor) );
    return $e_pwd;
}

/*
 * Verify Password
 */
function verify_password($current,$system)
{
    return password_verify($current, $system);
}

/*
 * Function to generate pin
 */
function random_pin($length)
{
    $chars = "0123456789";
    $pin = substr( str_shuffle( $chars ), 0, $length );
    return $pin;
}

/*
 * get Ip Address
 */
function get_userip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP'];}
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
    else { $ip = $_SERVER['REMOTE_ADDR']; }
    return $ip;
}

/*
 *  Mail Sending Code
 */
function send_mail( $to , $from , $subject, $body )
{
    if(empty($from))
    {
        $from = "";
    }
    $header = "From: ".$from."\r\n";
    $header .= 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //send mail
    if(mail( $to, $subject, $body, $header))
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

/*
 * Send Mail
 */
function send_phpmail( $toname, $to ,$fromname, $from , $subject, $body )
{
    if(empty($from))
    {
        $fromname = '';
        $from = "";
    }
    if(empty($to))
    {
        $toname = '';
        $to = "";
    }
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "";
    $mail->Password = "";
    $mail->setFrom($from, $fromname);
    $mail->addReplyTo($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->AddCC('', '');
    $mail->Subject = $subject;
    $mail->IsHTML(true);
    $mail->Body    = $body;
    if (!$mail->send()) {
        return $mail->ErrorInfo;
    } else {
        return 1;
    }
}

