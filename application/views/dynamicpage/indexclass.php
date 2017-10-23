<?PHP
require('config.php');

$recall = str_replace ("<","",$recall);

$cn = isset($_POST["classN"])?$_POST["classN"]:"error";

$cn = str_replace ("<","",$cn);
$cn = str_replace (">","",$cn);


$sqlr = 'SELECT * FROM '.$list.' WHERE classN Like "%'.$cn.'%"'; 

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
            問心無愧就接受眾人檢視
            
            </p>
        </div>
        
            
		<div id="content" style="margin:auto;padding:80px;border-radius:100px;background-color:#77AAFF;width:750px;">            
            <table id="maintable" style="border:50px #77AAFF solid; width:initial;background-color:#77AAFF;" rules="all" cellpadding='10px'>
                <tr>
                    <td>課程名稱</td>
                    <td>教師姓名</td>
                    <td>開設系別</td>
                    <td>難易度</td>
                    <td>評價</td>
                    <td>上傳時間</td>
                    <td>詳細資料</td>
                </tr>
            </table>
        </div>
        
        
		<!-- script -->
        <script>
        
       <?php foreach($result as $v):?>
        var selement=["<?php echo($v->classN);?>","<?php echo($v->teacherN);?>","<?php echo($v->major);?>","<?php echo($v->cost);?>","<?php echo($v->value);?>","<?php echo(substr( $v->posttime , 0 , 10 ));?>","a"];        
        Vid="<?php echo($v->id);?>"
        analysisarray(selement);
        <?php endforeach;?>
        
        
        
        
        function analysisarray(array){         
            
            var element=document.getElementById("maintable");            
            var para=document.createElement("tr");
            element.appendChild(para);
            selement.forEach(creattable);
            

            
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