<?PHP
error_reporting(E_ALL);  
ini_set('display_errors', 1); 

require('config.php');

$sqlr = 'SELECT * FROM '.$list.'class';
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
            <button onclick="location.href='./index.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">首頁</button>
        </div>
        <div id="topspan" style="height:50px;margin:160px;border-bottom:5px #FFF solid">
            <h1 id="indextitle">自己的教育自己改革</h1>
            <p style="padding:20px;">        
            用選課淘汰掉不良教師<br>
            用我們的方式改變台灣教育、改變台灣社會<br>
            問心無愧就接受眾人檢視<br>
            
            <h3>資料量大請稍後讀取。</h3>
            
            </p>
        </div>
        
            
		<div id="content" style="margin:auto;padding:80px;border-radius:100px;background-color:#77AAFF;width:750px;">
            
           
            <form method='POST' action='indexmajor.php'>
            </form>
            <form method='POST' action='indexteacher.php'>
            </form>
            <table id="maintable" style="border:10px #77AAFF solid;;background-color:#77AAFF;" rules="all" cellpadding='12px'>
                <tr>
                    <td>課程名稱</td>
                    <td>教師姓名</td>
                    <td>學期</td>
                    <td>開設系別</td>
                    <td>學分數</td>
                    <td>開課類別</td>
                    <td>英文課名</td>
                </tr>
            </table>
            
        </div>
    <script>
    <?php foreach($result as $v):?> 
        /* alert("<?php echo($v->classN);?>"); */
        
        var selement=["<?php echo($v->classN);?>","<?php echo($v->teacherN);?>","<?php echo($v->turn);?>","<?php echo($v->major);?>","<?php echo($v->credit);?>","<?php echo($v->classtype);?>","<?php echo($v->classEN);?>"]; 
        
        analysisarray(selement);     
   <?php endforeach;?>
    
    function analysisarray(array){
                 var element=document.getElementById("maintable");             
                 var para=document.createElement("tr"); 
                 element.appendChild(para); 
                 array.forEach(creattable); 
                
            
         }
        function creattable(str){
            var para=document.createElement("td");
            var node=document.createTextNode(str);        
            var element=document.getElementById("maintable");             
           
            para.appendChild(node);
            element.appendChild(para);
            
            
            
         }
    </script>    
        
		
	</body>
</html>