         <div id="content">
            <div id="indeximage" class="section  section-opaque-dark text-xs-center">
                <div  class="background-image" style="background-image : url('http://vci-40241124.rhcloud.com/img/home.jpg')"></div>
                <div class="container">
                  <div class="m-y-3 row">
                    <div class="col-md-12">
                      <h4 class="display-4 pi-draggable pi-item text-inverse text-xs-left">自己的教育自己改革</h4>
                      <p class="lead pi-draggable pi-item text-inverse text-xs-left" draggable="true">
                            用選課淘汰掉不良教師<br>
                            用我們的方式改變台灣教育、改變台灣社會<br>
                            問心無愧就接受眾人檢視<br>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
        </div>           
            
		<div id="content" >
            
           

           
             <div class="section">
                    <div class="container">
                      <div class="row m-y-3">
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
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            
        </div>
 