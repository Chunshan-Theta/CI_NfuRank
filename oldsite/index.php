<?PHP
error_reporting(E_ALL);  
ini_set('display_errors', 1); 

require('config.php');

$sqlr = 'SELECT * FROM '.$list;
$view = $_link->prepare($sqlr);
$view->execute();
$result = $view->fetchAll(PDO::FETCH_OBJ);


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
            <button onclick="location.href='./insertpage.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">新增課堂評價</button>
            <button onclick="location.href='./classlist.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">課堂資料</button>
            <button onclick="location.href='https://vci-40241124.rhcloud.com/home'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">新版網站</button>
        </div>
        <div id="topspan" style="height:50px;margin:160px;border-bottom:5px #FFF solid">
            <h1 id="indextitle">自己的教育自己改革</h1>
            <p style="padding:20px;">        
            用選課淘汰掉不良教師<br>
            用我們的方式改變台灣教育、改變台灣社會<br>
            問心無愧就接受眾人檢視
            
            </p>
        </div>
        
            
		<div id="content" style="margin:auto;padding:80px;border-radius:100px;background-color:#77AAFF;width:750px;">
            <form method='POST' action='indexteacher.php'>
                <p>教師姓名<input for="teacherN" name='teacherN'  type="text" style="margin-left:10px;margin-right:5px;"></input><input type='submit' value='搜索' name='insert'/></input><p>
            </form>
            <form method='POST' action='indexclass.php'>
                <p>課程名稱<input for="classN" name='classN'  type="text" style="margin-left:10px;margin-right:5px;"></input><input type='submit' value='搜索' name='insert'/></input><p>
            </form>
            <form method='POST' action='indexmajor.php'>
                <p>開設系別<input for="major" name='major'  type="text" style="margin-left:10px;margin-right:5px;"></input><input type='submit' value='搜索' name='insert'/></input><p>
            </form>
            <form method='POST' action='indexmajor.php'>
            </form>
            <form method='POST' action='indexteacher.php'>
            </form>
            <table id="maintable" style="border:10px #77AAFF solid;;background-color:#77AAFF;" rules="all" cellpadding='12px'>
                <tr>
                    <td>課程名稱</td>
                    <td>教師姓名</td>
                    <td>開設系別</td>
                    <td>難易度</td>
                    <td>評價</td>
                    <td>上傳時間&quot</td>
                    <td>詳細內容</td>
                </tr>
            </table>
            <button onclick="location.href='./indexmore.php?page=1'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">更多</button>
        </div>
        
        
		<!-- script -->
        <script>
        var num =1;
        <?php foreach($result as $v):?>
            
            var selement=["<?php echo($v->classN);?>","<?php echo($v->teacherN);?>","<?php echo($v->major);?>","<?php echo($v->cost);?>","<?php echo($v->value);?>","<?php echo(substr( $v->posttime , 0 , 10 ));?>","a"];        
            Vid="<?php echo($v->id);?>"
            analysisarray(selement,num);
            num=num+1;
        <?php endforeach;?>
        
        
        
        
        function analysisarray(array,num){         
            if(num<11){
                var element=document.getElementById("maintable");            
                var para=document.createElement("tr");
                element.appendChild(para);
                array.forEach(creattable);
            }       
            
         }
        function creattable(str){
            var para=document.createElement("td");
            var node=document.createTextNode(str);        
            var element=document.getElementById("maintable");
             
            if (str=="a"){
                a=document.createElement("a")
                 a.setAttribute("href", "./detail.php?id="+Vid);
                 para.setAttribute("style", "padding-left:50px;");

                 var at=document.createTextNode("go");
                 a.appendChild(at)
                 para.appendChild(a);
                 element.appendChild(para);
                
            }
            else{
                para.appendChild(node);
                element.appendChild(para);
            }
            
            
         }
        </script>	
	</body>
</html>