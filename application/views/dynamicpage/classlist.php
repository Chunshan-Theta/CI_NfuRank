      
            
		<div id="content">
            <div id="indeximage" class="section  section-opaque-dark text-xs-center">
                <div  class="background-image" style="background-image : url('http://vci-40241124.rhcloud.com/img/home.jpg')"></div>
                <div class="container">
                  <div class="m-y-3 row">
                    <div class="col-md-12">
                      <h4 class="display-4 pi-draggable pi-item text-inverse text-xs-left">將生命使用在有意義課堂上</h4>
                      <p class="lead pi-draggable pi-item text-inverse text-xs-left" draggable="true">
                            拒絕無用課堂，挑選造就高品質教學<br>
                            淘汰不適任老師，將位置留給優良的未來<br>
                            問心無愧就接受眾人檢視<br>
                      </p>
                    </div>
                  </div>
                </div>
            </div> 
            
            <div class="section">
                    <div class="container">
                      <div class="m-y-3 row">
                        <div class="col-md-12 text-xs-center">
                          <div class="m-y-3 table-responsive">
                            <table class="table table-striped">

                              <tbody>
                                <?php foreach ($quert as $q): ?>
                                    <tr>
                                        <td><a href="https://vci-40241124.rhcloud.com/home?classname=<?php echo $q['classN'] ?>"><?php echo $q['classN'] ?></a></td>
                                        <td><a href="https://vci-40241124.rhcloud.com/home?teachername=<?php echo $q['teacherN'] ?>"><?php echo $q['teacherN'] ?></a></td>                                        
                                        <td><?php echo $q['turn'] ?></td>
                                        <td><?php echo $q['major'] ?></td>
                                        <td><?php echo $q['credit'] ?></td>
                                        <td><?php echo $q['classtype'] ?></td>
                                        <td><?php echo $q['classEN'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                
                              </tbody>
                              <thead>
                                <tr>
                                    <td><h5 class="text-primary">課程名稱</td>
                                    <td><h5 class="text-primary">教師姓名</td>
                                    <td><h5 class="text-primary">學期</td>
                                    <td><h5 class="text-primary">開設系別</td>
                                    <td><h5 class="text-primary">學分數</td>
                                    <td><h5 class="text-primary">開課類別</td>
                                    <td><h5 class="text-primary">英文課名</td>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
 