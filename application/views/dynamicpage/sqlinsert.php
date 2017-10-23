<?php
// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "6LcpjSETAAAAAHoNFC74VTS1SsH0sw7a_Xh5TJoW";
$secret = "6LcpjSETAAAAAH0b48LrhMY1w-FelOHEq5RFUnxR";
require_once "recaptchalib.php";
// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

$reCaptcha = new ReCaptcha($secret);
// Was there a reCAPTCHA response?
if (isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}


if ($resp != null && $resp->success) {
    require("config.php");
    $classN = isset($_POST["classN"])?$_POST["classN"]:"null";
    $teacherN = isset($_POST["teacherN"])?$_POST["teacherN"]:"null";
    $major = isset($_POST["major"])?$_POST["major"]:"null";
    $classcall = isset($_POST["classcall"])?$_POST["classcall"]:"null";
    $classexam = isset($_POST["classexam"])?$_POST["classexam"]:"null";
    $homework = isset($_POST["homework"])?$_POST["homework"]:"null";
    $midexam = isset($_POST["midexam"])?$_POST["midexam"]:"null";
    $endexam = isset($_POST["endexam"])?$_POST["endexam"]:"null";
    $cost = isset($_POST["cost"])?$_POST["cost"]:"null";
    $value = isset($_POST["value"])?$_POST["value"]:"null";
    $say = isset($_POST["say"])?$_POST["say"]:"null";
   
   
    $classN = str_replace ("<","",$classN);
    $classN = str_replace (">","",$classN);
    $teacherN = str_replace ("<","",$teacherN);
    $teacherN = str_replace (">","",$teacherN);
    $major = str_replace ("<","",$major);
    $major = str_replace (">","",$major);
    $say = str_replace ("<","",$say);
    $say = str_replace (">","",$say);

    

    $sqlr = "INSERT INTO ".$list." (classN,teacherN,major,midexam,endexam,say,value,cost,classcall,homework,classexam,posttime,error)VALUE ('".$classN."','".$teacherN."','".$major."','".$midexam."','".$endexam."','".$say."','".$value."','".$cost."','".$classcall."','".$homework."','".$classexam."',CURRENT_TIMESTAMP,NULL)";
    /* echo($sqlr); */
    $query = $_link->prepare($sqlr);
    $query->execute();
    header('Location:index.php');
}

function test($S){
    
    
    
}
    

?>
<meta charset='utf-8'/>
<script>alert('未通過圖形驗證碼');</script>
未通過圖形驗證碼，請回到上一頁。