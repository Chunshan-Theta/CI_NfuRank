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

require_once APPPATH."lib/recaptchalib.php";

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

       
            
		<div id="content" >
            <div id="indeximage" class="section  section-opaque-dark text-xs-center">
                <div  class="background-image" style="background-image : url('http://vci-40241124.rhcloud.com/img/home.jpg')"></div>
                <div class="container">
                  <div class="m-y-3 row">
                    <div class="col-md-12">
                      <h4 class="display-4 pi-draggable pi-item text-inverse text-xs-left">將我們的體驗傳達出去</h4>
                      <p class="lead pi-draggable pi-item text-inverse text-xs-left" draggable="true">
                        讓世人知道每堂課程的結果，用我們的聲音揚善罰惡<br>
                        我們誓言公正評論每一堂課程<br>
                        今日就是教授們的期末評量，讓知道他們的課堂是否及格？<br>
                        該被二一的人是學生還是教授？<br>
                        問心無愧就接受眾人檢視
                      </p>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="bg-faded m-y-1 p-y-3 section">
                <div class="container">
                  <div class="row">

                    <div class="col-md-6">
                      <h1 class="pi-draggable pi-item" draggable="true">新增課堂評論</h1>                    
                          
                      
                      
                    <form method='POST' action='sqlinsertnfu' onsubmit="return checkform(this);">
                      
                        <fieldset class="form-group">
                          <label for="classN" class="text-primary">1.課程名稱</label>
                          <input type="text" name='classN' class="form-control" id="classN" placeholder="網頁程式設計">
                        </fieldset>
                        
                        <fieldset class="form-group">
                          <label for="teacherN" class="text-primary">2.教師姓名</label>
                          <input type="text" name='teacherN' class="form-control" id="teacherN" placeholder="好棒棒教授">
                        </fieldset>

                        <fieldset class="form-group">
                          <label for="major" class="text-primary">3.開設系別</label>
                          <input type="text" name='major' class="form-control" id="major" placeholder="資訊管理系">
                        </fieldset>

                        <fieldset class="form-group">
                          <label for="classcall" class="text-primary">4.固定點名</label><br>
                          <input type="radio" name="classcall" value="1" checked="true">有</input><br>
                          <input type="radio" name="classcall" value="0">無</input><br>
                        </fieldset>

                        <fieldset class="form-group">
                          <label for="classexam" class="text-primary">5.課堂小考/課中回饋單</label><br>
                          <input type="radio" name="classexam" value="1" checked="true">有</input><br>
                          <input type="radio" name="classexam" value="0">無</input><br>
                        </fieldset>

                        <fieldset class="form-group">
                          <label for="homework" class="text-primary">6.作業</label><br>
                          <input type="radio" name="homework" value="1" checked="true">有</input><br>
                          <input type="radio" name="homework" value="0">無</input>     <br>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="midexam" class="text-primary">7.期中考試</label><br>
                            <input type="radio" name="midexam" value="筆試(選擇題居多)" checked="true">筆試(選擇題居多)</input><br>
                            <input type="radio" name="midexam" value="筆試(非選題居多)">筆試(非選題居多)</input> <br>
                            <input type="radio" name="midexam" value="實作">實作</input><br>
                            <input type="radio" name="midexam" value="上臺報告(個人)">上臺報告(個人)</input> <br>  
                            <input type="radio" name="midexam" value="上臺報告(團體)">上臺報告(團體)</input><br>
                            <input type="radio" name="midexam" value="繳交報告(個人)">繳交報告(個人)</input><br>
                            <input type="radio" name="midexam" value="繳交報告(團體)">繳交報告(團體)</input><br>
                            <input type="radio" name="midexam" value="無">無</input><br>
                            <input type="radio" name="midexam" value="其他">其他</input>                    
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="endexam" class="text-primary">8.期末考試</label><br>
                            <input type="radio" name="endexam" value="筆試(選擇題居多)" checked="true">筆試(選擇題居多)</input><br>
                            <input type="radio" name="endexam" value="筆試(非選題居多)">筆試(非選題居多)</input> <br>
                            <input type="radio" name="endexam" value="實作">實作</input><br>
                            <input type="radio" name="endexam" value="上臺報告(個人)">上臺報告(個人)</input> <br>  
                            <input type="radio" name="endexam" value="上臺報告(團體)">上臺報告(團體)</input><br>
                            <input type="radio" name="endexam" value="繳交報告(個人)">繳交報告(個人)</input><br>
                            <input type="radio" name="endexam" value="繳交報告(團體)">繳交報告(團體)</input><br>
                            <input type="radio" name="endexam" value="無">無</input><br>
                            <input type="radio" name="endexam" value="其他">其他</input>          
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="cost" class="text-primary">9.難易度</label><br>
                            <input type="radio" name="cost" value="非常簡單">非常簡單</input><br>
                            <input type="radio" name="cost" value="簡單">簡單</input> <br>
                            <input type="radio" name="cost" value="一般" checked="true">一般</input><br>
                            <input type="radio" name="cost" value="困難">困難</input>   <br>
                            <input type="radio" name="cost" value="非常困難">非常困難</input><br>
                        </fieldset>
                        
                        <fieldset class="form-group">
                          <label for="value" class="text-primary">10.評價</label><br>
                          <input type="radio" name="value" value="課程內容充實推薦">課程內容充實推薦</input><br>
                          <input type="radio" name="value" value="超好過推薦">超好過推薦</input> <br>
                          <input type="radio" name="value" value="一般" checked="true">一般</input><br>
                          <input type="radio" name="value" value="浪費生命">浪費生命</input>   <br>
                          <input type="radio" name="value" value="大刀愛亂砍(不明原因被當)">大刀愛亂砍(不明原因被當)</input>
                        </fieldset>
                        
                        <fieldset class="form-group">
                          <label for="say" class="text-primary">11.感想(250字內)</label>
                          <input type="text" name='say' class="form-control" id="say" placeholder="老師平日使用PPT上課，上課規定...">
                        </fieldset>
                        
                        
                        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
                        <script type="text/javascript"src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                        </script>
                        <br/>
                        <h1 class="text-primary">發文守則</h1>
                        1.嚴禁發表任何霸凌內容、或有相關意圖之內容，違反將被刪除<br>
                        2.嚴禁發表任何汙辱、不實指控之相關內容，或有相關意圖之內容，違反將被刪除<br>
                        3.嚴禁發表任何情色、暴力之相關內容，或有相關意圖之內容，違反將被刪除<br>
                        4.與本版主題無關、或發文內容明顯為測試意圖、或無關之推薦文、廣告文、職缺文<br>
                        5.請善用「███」取代敏感字詞<br><br><br>
                        <input type='submit'  class="btn btn-primary" value='同意發文守則並送出' name='insert'/>
                    </form>
                      
                      
                      
                      
                    </div>
                  </div>
                </div>
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
	