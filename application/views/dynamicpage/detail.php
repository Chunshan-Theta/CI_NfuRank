
		<div id="content">
                
                
                
                <div class="section">
                    <div class="container">
                      <div class="m-y-3 row">
                        <div class="col-md-12 text-xs-center">
                          <div class="m-y-3 table-responsive">
                            <table class="table table-striped">
                              <tbody>
                                <tr>
                                  <td><h4 class="text-primary">課程名稱</td>
                                  <td><?php echo $quert['classN'];?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><h4 class="text-primary">教師姓名</td>
                                  <td><?php echo $quert['teacherN'];?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><h4 class="text-primary">開設系別</td>
                                  <td><h4 class="text-primary">評價</td>
                                  <td><h4 class="text-primary">難易度</td>
                                </tr>
                                <tr>
                                  <td><?php echo $quert['major'];?></td>
                                  <td><?php echo $quert['value'];?></td>
                                  <td><?php echo $quert['cost'];?></td>
                                </tr>
                                <tr>
                                  <td><h4 class="text-primary">課堂固定點名</td>
                                  <td><h4 class="text-primary">回家作業</td>
                                  <td><h4 class="text-primary">課中小考/課中回饋單</td>
                                </tr>
                                <tr>
                                  <td><?php echo $quert['classcall'];?></td>
                                  <td><?php echo $quert['homework'];?></td>
                                  <td><?php echo $quert['classexam'];?></td>
                                </tr>
                                <tr>
                                  <td><h4 class="text-primary">期中考試</td>
                                  <td><h4 class="text-primary">期末考試</td>
                                  <td><h4 class="text-primary">更新時間</td>
                                </tr>
                                <tr>
                                  <td><?php echo $quert['midexam'];?></td>
                                  <td><?php echo $quert['endexam'];?></td>
                                  <td><?php echo $quert['posttime'];?></td>
                                </tr> 
                              </tbody>
                              
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
            
              <div class="p-y-3 section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h1 class="text-primary">PO主評論</h1>
                      <h3>Dear <?php echo $quert['teacherN'];?> 老師:</h3>
                      <p class="lead"><?php echo $quert['say'];?></p>
                    </div>
                    <div class="col-md-6">
                      <img src="../img/home.jpg" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            
            

            
            </div>
            
              <div class="bg-info section  text-xs-center">
                <div class="container">
                  <div class="m-y-1 row">
                    <div class="col-md-12">
                      <h4 class="display-4 pi-draggable pi-item">訪客回應</h4>
                      <p class="lead pi-draggable pi-item" draggable="true">對這位老師也有印象的話請留個短評價吧，為了台灣教育的未來</p>
                      <a href="insert2recall?id=<?php echo $quert['id'];?>" class="btn btn-darkest btn-lg btn-secondary m-y-lg">新增回應</a>
                    </div>
                  </div>
                </div>
              </div>
            
            <?php foreach ($recall as $q):?>
                <div class="section">
                    <div class="container">
                      <div class="m-y-1 row">
                        <div class="col-md-2">
                          <a><i class="fa fa-3x text-primary fa-angle-double-right"></i></a>
                        </div>
                        <div class="col-lg-7 ">
                          <p class=""><?php echo $q['content'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
            <?php endforeach ?>
            
            

        
