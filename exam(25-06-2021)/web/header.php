<?php session_start();  ?>
<?php include 'config.php';?> 
<!DOCTYPE html>
<?php 
    $courseResultData=$con->query("select * from `tbl_course`");
    $courseResultDataArr=array();
    while($courseRow=mysqli_fetch_array($courseResultData))
    {
        $courseResultDataArr[]=$courseRow;
    }
?>
<?php 
    $userId=$_SESSION['userId'];
    $updateAt=$_SESSION['updateAt'];
    $profileResultData=$con->query("select * from `tbl_user` where userId=$userId");
     
    while($profileRow=mysqli_fetch_array($profileResultData))
    {
         $newupdatewAt=$profileRow['updatedAt'];
        if($newupdatewAt == $updateAt){
            
        }else{
            header("Location: logout.php");
        }
    }
    foreach($bannerResultDataArr as $data){ 
        //echo $data['image']; 
    }
?>
<!--?php
    $newPassword=null;
   
    $user_id = $_SESSION['userId'];
    $user_psssword = $_SESSION['userPassword'];
    $pssswordResultData=$con->query("select * from `tbl_users` where userId=$user_id"); 
    while($passwordRow=mysqli_fetch_array($pssswordResultData))
    {
        $newPassword=$passwordRow['userPassword'];
        if($newPassword != $user_psssword){
            session_start();
            session_unset();
            session_destroy();
            header("location:./index.php");
        }
    }
?-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Excellent coachings</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />
        <!--<link href="assets/img/favicon.png" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/aos.css" />
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
        <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="assets/css/style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&display=swap" rel="stylesheet">
<link href="fonts/stylesheet.css" rel="stylesheet" />
    </head>
    <body>
    <!-- ======= Top Bar ======= -->
    <div class="top-bar" id="topbar">
        <div class="container">
            <div class="row top-row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 top-bar-left">
                    <?php if( isset($_SESSION['userId']) && !empty($_SESSION['userId']) ) { ?>
                        <span class="tel-span"> 
                            <a href="exam-demo1.php?examid=34">Today Quiz</a> 
                        </span>
                    <?php }else{ ?>
                        <i class="fas fa-user"></i>
                        <span class="mail-span"> 
                            <a href="signup.php">Register</a> 
                        </span>
                        <i class="fas fa-unlock-alt"></i>
                        <span class="tel-span"><a href="login.php"> Login</a></span>
                    <?php } ?>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 top-bar-right ">
                    <!-- <a href="#"><i class="fab fa-google-play"></i>Download App</a>
                    <a href="#"><i class="fas fa-search"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a> -->
                    <script src="{{asset('js/translate-google.js')}}"></script>



<script type="text/javascript">
function googleTranslateElementInit2(){
    new google.translate.TranslateElement({
                    pageLanguage:'en',
                    includedLanguages: 'en,es',
                    includedLanguages: 'en,hi',
        
        autoDisplay:true
    },'google_translate_element2');
    var a = document.querySelector("#google_translate_element select");
   

    if(a){
        a.selectedIndex=1;
        a.dispatchEvent(new Event('change'));
    }
}
</script>

<ul class="navbar-nav my-lg-0 m-r-10">
<li>
    <div class="google-translate">
        <div id="google_translate_element2"></div>
    </div>
</li>
</ul>
<script type="text/javascript">
   
(function () {
var gtConstEvalStartTime = new Date();

function d(b) {
    var a = document.getElementsByTagName("head")[0];
    a || (a = document.body.parentNode.appendChild(document.createElement("head")));
    a.appendChild(b)
}

function _loadJs(b) {
   
    var a = document.createElement("script");
    a.type = "text/javascript";
    a.charset = "UTF-8";
    a.src = b;
    d(a)
}

function _loadCss(b) {
    var a = document.createElement("link");
    a.type = "text/css";
    a.rel = "stylesheet";
    a.charset = "UTF-8";
    a.href = b;
    d(a)
}

function _isNS(b) {
    b = b.split(".");
    for (var a = window, c = 0; c < b.length; ++c)
        if (!(a = a[b[c]])) return !1;
    return !0
}

function _setupNS(b) {
    b = b.split(".");
    for (var a = window, c = 0; c < b.length; ++c) a.hasOwnProperty ? a.hasOwnProperty(b[c]) ? a = a[b[c]] : a = a[b[c]] = {} : a = a[b[c]] || (a[b[c]] = {});
    return a
}
window.addEventListener && "undefined" == typeof document.readyState && window.addEventListener("DOMContentLoaded", function () {
    document.readyState = "complete"
}, !1);
if (_isNS('google.translate.Element')) {
    return
}(function () {
    var c = _setupNS('google.translate._const');
    c._cest = gtConstEvalStartTime;
    gtConstEvalStartTime = undefined;
    c._cl = 'en';
    c._cuc = 'googleTranslateElementInit2';
    c._cac = '';
    c._cam = '';
    c._ctkk = eval('((function(){var a\x3d3002255536;var b\x3d-2533142796;return 425386+\x27.\x27+(a+b)})())');
    var h = 'translate.googleapis.com';
    var s = (true ? 'https' : window.location.protocol == 'https:' ? 'https' : 'http') + '://';
    var b = s + h;
    c._pah = h;
    c._pas = s;
    c._pbi = b + '/translate_static/img/te_bk.gif';
    c._pci = b + '/translate_static/img/te_ctrl3.gif';
    c._pli = b + '/translate_static/img/loading.gif';
    c._plla = h + '/translate_a/l';
    c._pmi = b + '/translate_static/img/mini_google.png';
    c._ps = b + '/translate_static/css/translateelement.css';
    c._puh = 'translate.google.com';
    _loadCss(c._ps);
    _loadJs(b + '/translate_static/js/element/main.js');
})();
})();
</script>    
                </div>
            </div>
        </div>     
    </div>
    <!-- ======= Header ======= -->
    
    <header id="header" class="">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto">
                <a href="./" class="scrollto">
                    <!--<img src="./assets/img/brand-logo.png" alt="" srcset=""/>-->
                    <h3>Excellent coachings</h3>
                </a>
            </h1>       
            <nav class="nav-menu d-none d-lg-block">
                <ul> 
                    <li ><a href="index.php">Home</a> </li>
                    <li class="drop-down ex-nava"><a href="#">Exams </a>
                        <ul>  
                            <?php foreach($courseResultDataArr as $data){ ?>
                                <li><a href="course-single.php?name=<?php echo $data['courseName'];?>&&id=<?php echo $data['courseid'];?>"><?php echo $data['courseName'];?></a>
                                 </li>
                            <?php } ?>
                        </ul>
                    </li> 
                    <li ><a href="aboutus.php">About Us</a> </li>
                    <li ><a href="blog.php">Blogs</a> </li>
                    <li><a href="contactus.php ">Contact Us</a></li>
                    <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName']) )
                    {
                    ?>
                        <li class="drop-down profile-nav"><a href="#">Profile </a>
                        <ul> 
                           <li><a href="profile.php ">User Profile</a></li>
                           <!--<li><a href="setting.php ">Edit Profile</a></li>-->
                           <li><a href="change-password.php ">Change Password</a></li>
                           <li><a href="purchase.php">Purchase Courses</a></li>
                           <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>
                </ul>
            </nav>
            <!-- .nav-menu -->
        </div>
    </header>
<style>
    @font-face {
  font-family: 'AAText';
  font-style: normal;
  font-weight: 400;
  src: url(font/ttf/AA0117B.ttf) format('truetype');
   
}
@font-face {
  font-family: 'AAText';
  font-style: normal;
  font-weight: 400;
  src: url(font/ttf/AA0117N.ttf) format('truetype');
  
}
@font-face {
  font-family: 'AAText';
  font-style: normal;
  font-weight: 400;
  src: url(font/ttf/AA0117X.ttf) format('truetype');
  
}
@font-face {
  font-family: 'AAText';
  font-style: normal;
  font-weight: 400;
  src: url(font/ttf/AA01171.ttf) format('truetype');
 
}
@font-face {
  font-family: 'AAText';
  font-style: normal;
  font-weight: 400;
  src: url(font/ttf/AA01171.ttf) format('truetype');
  
}
</style>
<!--===================== End Header ===================-->