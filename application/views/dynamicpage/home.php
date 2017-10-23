

            
		<div id="content">
        
        
        
             <div id="indeximage" class="section  section-opaque-dark text-xs-center">
                <div  class="background-image" style="background-image : url('../img/home.jpg')"></div>
                <div class="container">
                  <div class="m-y-3 row">
                    <div class="col-md-12">
                      <h4 class="display-4 pi-draggable pi-item text-inverse">虎科大選課專區</h4>
                    </div>
                  </div>
                </div>
              </div>

              
                  
            
            
            
            <div class="p-y-3 section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h1 class="text-primary">搜尋課程評價</h1>
                      <h3>用關鍵字搜尋看看所想要的課程吧</h3>
                      <p class="lead">由於這三個欄位皆是開放性填答，建議使用較寬廣的關鍵字搜尋。<br>例如：我想找 '資訊管理系'裡'O老師'開的課程<br>關鍵字就可以在<br>老師姓名欄下O<br>或是<br>開設系別下'資訊'</p>
                    </div>
                    <div class="col-md-6">
                       <form>
                        <?php echo validation_errors(); ?>
                            <fieldset class="form-group">
                                <label for="classN">課程名稱</label>
                                <input  name='classN'  type="text" placeholder="程式設計 or 程式 or 設計 "  class="form-control"></input>
                                
                            </fieldset>
                            <button type='submit' class="btn btn-primary"/>搜索</button>
                        </form>
                        <form>
                        <?php echo validation_errors(); ?>
                            <fieldset class="form-group">
                                <label for="major">開設科系</label>
                                <input  name='major'  type="text" placeholder="資訊管理 or 管理 or..."  class="form-control"></input>
                            </fieldset>
                            
                            <button type='submit' class="btn btn-primary"/>搜索</button>
                        </form>
                        <form>
                        <?php echo validation_errors(); ?>
                            <fieldset class="form-group">
                                <label for="teachername">老師姓名</label>
                                <input  name='teachername'  type="text" placeholder="林"  class="form-control"></input>
                            </fieldset>
                            
                            <button type='submit' class="btn btn-primary"/>搜索</button>
                        </form>
                                    
                               
                           
                    </div>
                  </div>
                </div>
            </div>
            
            
            <div class="section">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12 text-xs-center">
                          <div class="m-y-3 table-responsive">
                            <table class="table table-striped">

                              <tbody>
                                <?php foreach ($quert as $q): ?>
                                    <tr>
                                        <td><?php echo $q['classN'] ?></td>
                                        <td><?php echo $q['teacherN'] ?></td>
                                        <td><?php echo $q['major'] ?></td>
                                        <td><?php echo $q['cost'] ?></td>
                                        <td><?php echo $q['value'] ?></td>
                                        <td><?php echo $q['posttime'] ?></td>
                                        <td><a href="./detail?id=<?php echo $q['id'] ?>">go</a></td>
                                    </tr>
                                <?php endforeach ?>
                                
                              </tbody>
                              <thead>
                                <tr>
                                  <th>課程名稱</th>
                                  <th>教師姓名</th>
                                  <th>開設系別</th>
                                  <th>難易度</th>
                                  <th>評價</th>
                                  <th>上傳時間</th>
                                  <th>詳細內容</th>
                                </tr>
                              </thead>
                            </table>
                            <p class="lead pi-draggable pi-item" draggable="true">評價不是謾罵，是為了去蕪存菁，為了提高學習成效</p>
                            <button onclick="location.href='./more?page=0'" class="btn btn-primary">觀看全部評價 Let's Go</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  
            
            
        </div>
        
        
		<!-- script -->
 
