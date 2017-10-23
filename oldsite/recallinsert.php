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
    $recall = isset($_POST["recall"])?$_POST["recall"]:"null";
    $id=isset($_GET["id"])?$_GET['id']:null;
    
    $recall = textcheck($recall);
    $id = textcheck($id);
    
    
    
    
    
    $id=strpos($id, "<")==1?"非法字元2":$id;
    echo($recall);
    $sqlr = "INSERT INTO ".$list."_recall (content,Postid)VALUE ('".$recall."','".$id."');";
    echo($sqlr);
    $query = $_link->prepare($sqlr);
    $query->execute(); 
    header('Location:detail.php?id='.$id); 
}
function textcheck($s){
    /* 非法字元 */
    $s = str_replace ("<","",$s);
    $s = str_replace ('"',"'",$s);
    $s = str_replace ("&","",$s);
    $s = str_replace ("%","",$s);
    $s = str_replace ("!","",$s);
    $s = str_replace ("#","",$s);
    $s = str_replace ("@","",$s);
    $s = str_replace ("^","",$s);
    $s = str_replace ("*","",$s);
    $s = str_replace ("_","",$s);
    $s = str_replace ("--","",$s);
    $s = str_replace (";","",$s);
    $s = str_replace (">","",$s);
    $s = str_replace ("?php","",$s);
    $s = str_replace ("href","",$s);
    $s = str_replace ("script","",$s);

    $s = str_replace ("and","",$s);
    $s = str_replace ("exec","",$s);
    $s = str_replace ("insert","",$s);
    $s = str_replace ("delete","",$s);
    $s = str_replace ("select","",$s);
    $s = str_replace ("update","",$s);
    $s = str_replace ("count","",$s);
    $s = str_replace ("chr","",$s);
    $s = str_replace ("mid","",$s);
    $s = str_replace ("master","",$s);
    $s = str_replace ("truncate","",$s);
    $s = str_replace ("char","",$s);
    $s = str_replace ("declare","",$s);
    $s = str_replace ("union","",$s);
    $s = str_replace ("alert","",$s);
    $s = str_replace ("src","",$s);
    
    /* SQL 欄位名 */
    $s = str_replace ("classN","",$s);
    $s = str_replace ("teacherN","",$s);
    $s = str_replace ("major","",$s);
    $s = str_replace ("midexam","",$s);
    $s = str_replace ("endexam","",$s);
    $s = str_replace ("say","",$s);
    $s = str_replace ("value","",$s);
    $s = str_replace ("cost","",$s);
    $s = str_replace ("classcall","",$s);
    $s = str_replace ("homework","",$s);
    $s = str_replace ("classexam","",$s);
    $s = str_replace ("posttime","",$s);
    
    
    /* 不堪字詞 */
    $s = str_replace ("垃圾"," OO ",$s);
    $s = str_replace ("幹你娘"," OOO",$s);
    $s = str_replace ("幹你老師"," OOOO ",$s);
    $s = str_replace ("廢物"," OO ",$s);
    $s = str_replace ("機歪"," OO ",$s);
    $s = str_replace ("尿"," O ",$s);
    $s = str_replace ("屎"," O ",$s);    
    $s = str_replace ("三小"," OO ",$s);
    $s = str_replace ("賤"," O ",$s);
    $s = str_replace ("神經病"," OOO ",$s);
    $s = str_replace ("屄"," O ",$s);
    $s = str_replace ("媽的"," OO ",$s);
    $s = str_replace ("幹"," O ",$s);
    $s = str_replace ("ㄍㄢˋ"," O ",$s);
    $s = str_replace ("不要臉"," OOO ",$s);
    $s = str_replace ("孬"," O ",$s);
    $s = str_replace ("畜牲"," OO ",$s);
    $s = str_replace ("雞歪"," OO ",$s);
    $s = str_replace ("雜交"," OO ",$s);
    $s = str_replace ("懶叫"," OO ",$s);
    
    return $s;
}
?>
<meta charset='utf-8'/>
未通過圖形驗證碼