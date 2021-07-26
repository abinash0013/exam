<?php

	$offset='+5:30';
    $con=mysqli_connect("localhost","varnixhr_exam","exam@2021#","varnixhr_exam");
    $con->query("SET time_zone='".$offset."';");
 
    $con->query("SET collation_connection utf8_unicode_ci");
    // // Will NOT affect $mysqli->real_escape_string();
     $con->query("SET NAMES utf8");

    // // Will NOT affect $mysqli->real_escape_string();
     $con->query("SET CHARACTER SET utf8");

    // // But, this will affect $mysqli->real_escape_string();
    $con->set_charset('utf8');

    // // But, this will NOT affect it (utf-8 vs utf8) -- don't use dashes here
     $con->set_charset('utf-8');
    $baseimage="https://varnikabiz.com/exam/admin/";

    //define( 'API_ACCESS_KEY', 'AAAAzvZT-DY:APA91bH86uEX0nmW3DKrcVVfSpJ2FQ94iKyEddaDvrziiK8EaFy0D-pqGx4U9vdXulYVmdGnXbk1stfkeUQe_U2BqwJHo6zntx_OwyDNDENJsylZEtPM7lFLD9jTbgbH90NIb3EJGd2N' );
    // if ($con->connect_error) {
    //     die("Connection failed: " . $con->connect_error);
    // } 
    // echo "Connected successfully";            

?>