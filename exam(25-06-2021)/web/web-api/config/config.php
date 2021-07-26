<?php

    $offset='+5:30';
    $con=mysqli_connect("localhost","varnixhr_exam","exam@2021#","varnixhr_exam");
    $con->query("SET time_zone='".$offset."';");

    $baseimage="https://varnikabiz.com/exam/web/assets/img";

    //define( 'API_ACCESS_KEY', 'AAAAzvZT-DY:APA91bH86uEX0nmW3DKrcVVfSpJ2FQ94iKyEddaDvrziiK8EaFy0D-pqGx4U9vdXulYVmdGnXbk1stfkeUQe_U2BqwJHo6zntx_OwyDNDENJsylZEtPM7lFLD9jTbgbH90NIb3EJGd2N' );
    // if ($con->connect_error) {
    //     die("Connection failed: " . $con->connect_error);
    // } 
    // echo "Connected successfully";            

?>