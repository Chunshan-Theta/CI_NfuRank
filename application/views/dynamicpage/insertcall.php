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
                      <h1 class="pi-draggable pi-item" draggable="true">新增回應</h1>
                      
                      
                      
                      
                    <form method='POST' action='sqlinsertrecall?id=<?php echo $quert['id']?>'>
                      
                        <fieldset class="form-group">
                          <label for="classN" class="text-primary">課程名稱</label>
                          <label id="classN"><?php echo $quert['classN']?></label>
                        </fieldset>
                        
                        <fieldset class="form-group">
                          <label for="teacherN" class="text-primary">教師姓名</label>
                          <label id="teacherN"><?php echo $quert['teacherN']?></label>
                        </fieldset>
                        <fieldset class="form-group">
                          <label for="major" class="text-primary">開設系別</label>
                          <label id="major"><?php echo $quert['major']?></label>
                        </fieldset>                     
                        <fieldset class="form-group">
                          <label for="recall" class="text-primary">回應(250字內)</label>
                          <input type="text" name='recall' class="form-control" id="say" placeholder="老師平日很認真備課...">
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
            

            
        </div>
        
        
		