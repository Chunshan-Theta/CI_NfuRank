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
            
            
            <form method='POST' action='sqlinsert.php' onsubmit="return checkform(this);">    
                <p id="classN" style="padding:20px;padding-right:100px;">1.課程名稱  <br>    
                    <input id="_classN" name='classN' style="float:right;width:70%;"  type="text" value=""></input>            
                </p>
                <p id="teacherN"  style="padding:20px;padding-right:100px;">2.教師姓名 <br>     
                    <input id="_teacherN" name="teacherN" style="float:right;width:70%;"  type="text" value=""></input>            
                </p>            
                <p id="major"  style="padding:20px;padding-right:100px;">3.開設系別<br>      
                    <input id="_major" name="major" style="float:right;width:70%;"  type="text" value=""></input>            
                </p>            
                <p id="classcall" style="padding:20px;padding-right:100px;">4.固定點名<br> 
                    <input type="radio" name="classcall" value="1" checked="true">有</input>
                    <input type="radio" name="classcall" value="0">無</input>                    
                </p>            
                <p id="classexam" style="padding:20px;padding-right:100px;">5.課堂小考/課中回饋單<br>      
                    <input type="radio" name="classexam" value="1" checked="true">有</input>
                    <input type="radio" name="classexam" value="0">無</input>           
                </p>
                <p id="homework"  style="padding:20px;padding-right:100px;">6.作業<br>      
                    <input type="radio" name="homework" value="1" checked="true">有</input>
                    <input type="radio" name="homework" value="0">無</input>             
                </p>
                <p id="midexam"  style="padding:20px;padding-right:100px;">7.期中考試<br>    
                    <input type="radio" name="midexam" value="筆試(選擇題居多)" checked="true">筆試(選擇題居多)</input>
                    <input type="radio" name="midexam" value="筆試(非選題居多)">筆試(非選題居多)</input> 
                    <input type="radio" name="midexam" value="實作">實作</input>
                    <input type="radio" name="midexam" value="上臺報告(個人)">上臺報告(個人)</input>   
                    <input type="radio" name="midexam" value="上臺報告(團體)">上臺報告(團體)</input>
                    <input type="radio" name="midexam" value="繳交報告(個人)">繳交報告(個人)</input>
                    <input type="radio" name="midexam" value="繳交報告(團體)">繳交報告(團體)</input>
                    <input type="radio" name="midexam" value="無">無</input>
                    <input type="radio" name="midexam" value="其他">其他</input>                    
                </p>            
                <p id="endexam"  style="padding:20px;padding-right:100px;">8.期末考試<br>      
                    <input type="radio" name="endexam" value="筆試(選擇題居多)" checked="true">筆試(選擇題居多)</input>
                    <input type="radio" name="endexam" value="筆試(非選題居多)">筆試(非選題居多)</input> 
                    <input type="radio" name="endexam" value="實作">實作</input>
                    <input type="radio" name="endexam" value="上臺報告(個人)">上臺報告(個人)</input>   
                    <input type="radio" name="endexam" value="上臺報告(團體)">上臺報告(團體)</input>
                    <input type="radio" name="endexam" value="繳交報告(個人)">繳交報告(個人)</input>
                    <input type="radio" name="endexam" value="繳交報告(團體)">繳交報告(團體)</input>
                    <input type="radio" name="endexam" value="無">無</input>
                    <input type="radio" name="endexam" value="其他">其他</input>              
                </p>            
                <p id="cost"  style="padding:20px;padding-right:100px;">9.難易度<br>      
                    <input type="radio" name="cost" value="非常簡單">非常簡單</input>
                    <input type="radio" name="cost" value="簡單">簡單</input> 
                    <input type="radio" name="cost" value="一般" checked="true">一般</input>
                    <input type="radio" name="cost" value="困難">困難</input>   
                    <input type="radio" name="cost" value="非常困難">非常困難</input>         
                </p>            
                <p id="value" style="padding:20px;padding-right:100px;">10.評價<br>     
                    <input type="radio" name="value" value="課程內容充實推薦">課程內容充實推薦</input>
                    <input type="radio" name="value" value="超好過推薦">超好過推薦</input> 
                    <input type="radio" name="value" value="一般" checked="true">一般</input>
                    <input type="radio" name="value" value="浪費生命">浪費生命</input>   
                    <input type="radio" name="value" value="大刀愛亂砍(不明原因被當)">大刀愛亂砍(不明原因被當)</input>         
                </p>            
                <p id="say"  style="padding:20px;padding-right:100px;margin-bottom:200px;">11.感想(250字內)<br>      
                    <input  type="textarea" id="_say" name="say" style="float:right;width:70%;height:180px;"  value=""></input>            
                </p>
                
                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
                <script type="text/javascript"src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                </script>
                <br/>
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

        function checkform(){
            var pass = false;
            var error = "";
            if(document.getElementById("_classN").value==""){
                error+='_____課程名稱尚未填寫';
            }
            
            if(document.getElementById("_teacherN").value==""){
                error+='_____老師姓名尚未填寫';
            }
            if(document.getElementById("_major").value==""){
                error+='_____開設系別尚未填寫';
            }       
            if(document.getElementById("_say").value==""){
                error+='_____評論尚未填寫';
            }
            if(error!=""){
             alert(error);   
            }
            else{
              pass = True;
            }
　          
            
            
            return pass;
        }
        
        
        

        </script>	
	</body>
</html>