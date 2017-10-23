<?PHP
require('config.php');

$id=isset($_GET["id"])?$_GET['id']:null;
$sqlr = 'SELECT * FROM `'.$list.'` WHERE `id` = '.$id;
$view = $_link->prepare($sqlr);
$view->execute();
$result = $view->fetchAll(PDO::FETCH_OBJ);
$result = $result[0];
?>
<?php
/**
 * Sample PHP code to use reCAPTCHA V2.
 *
 * @copyright Copyright (c) 2014, Google Inc.
 * @link      http://www.google.com/recaptcha
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

require_once "recaptchalib.php";

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "6LcpjSETAAAAAHoNFC74VTS1SsH0sw7a_Xh5TJoW";
$secret = "6LcpjSETAAAAAH0b48LrhMY1w-FelOHEq5RFUnxR";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "cn";

// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

$reCaptcha = new ReCaptcha($secret);


?>
<html>
	<head>
	<meta charset='utf-8'/>
    <title>虎尾科技大學選課專用區</title>
	<link type="text/css" rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="topbar" style="width:100%;height:50px;background-color:#0066FF;padding-right:12px;right:0;left:0;top:0;position: fixed;" >        
            <button id="host" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;"onclick="location.href='./detail.php?id=0'">聯絡版主</button>
            <button onclick="location.href='./index.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">首頁</button>
        </div>
        <div id="topspan" style="height:50px;margin:160px;border-bottom:5px #FFF solid">
            <h1 id="indextitle">將我們的體驗傳達出去</h1>
            <p style="padding:20px;">        
            讓世人知道每堂課程的結果，用我們的聲音揚善罰惡<br>
            我們誓言公正評論每一堂課程<br>
            今日就是教授們的期末評量，讓知道他們的課堂是否及格？該被二一的人是學生還是教授？<br>
            問心無愧就接受眾人檢視
            
            </p>
        </div>
       
            
		<div id="content" style="margin:auto;padding-left:100px;padding-bottom:20px;border-radius:100px;background-color:#77AAFF;width:750px;">
            
            
            <form method='POST' action='recallinsert.php?id=<?php echo($id)?>'>    
                <p id="classN" style="padding:5px;padding-right:100px;">課程名稱  <br>    
                    <h5 style="margin:40px;"><?php echo($result->classN)?></h5>           
                </p>
                <p id="teacherN"  style="padding:5px;padding-right:100px;">教師姓名 <br>     
                    <h5 style="margin:40px;"><?php echo($result->teacherN)?></h5>          
                </p>            
                <p id="major"  style="padding:5px;padding-right:100px;">開設系別<br>      
                    <h5 style="margin:40px;"><?php echo($result->major)?></h5>            
               
                <p id="recall"  style="padding:20px;padding-right:100px;">回應(250字內)<br>      
                    <input  type="textarea" for="say" name="recall" style="float:right;width:70%;height:180px;margin-bottom:100px;"  value=""></input>            
                </p>  
                
                <div class="g-recaptcha"  data-sitekey="<?php echo $siteKey;?>"></div>
                <script type="text/javascript"src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                <br/><br><br><br><br><br><br><br><br><br><br><br><br><br>
                發文守則<br>
                1.嚴禁發表任何霸凌內容、或有相關意圖之內容，違反將被刪除<br>
                2.嚴禁發表任何汙辱、不實指控之相關內容，或有相關意圖之內容，違反將被刪除<br>
                3.嚴禁發表任何情色、暴力之相關內容，或有相關意圖之內容，違反將被刪除<br>
                4.與本版主題無關、或發文內容明顯為測試意圖、或無關之推薦文、廣告文、職缺文<br>
                5.請善用「███」取代敏感字詞<br><br><br>
                <input type='submit' value='同意發文守則並送出' name='insert'/>
            </form>
            
        </div>
        
        
		<!-- script -->
        <script>

        
        
        
        

        </script>	
	</body>
</html>