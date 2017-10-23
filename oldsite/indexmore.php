<?PHP
error_reporting(E_ALL);  
ini_set('display_errors', 1); 

require('config.php');

$sqlr = 'SELECT * FROM '.$list.' ORDER BY id DESC LIMIT 1 ';
$view = $_link->prepare($sqlr);
$view->execute();
$cow = $view->fetchColumn();
$cow = floor($cow/10);
/* Select Count(*) FROM `%s` */
$page=isset($_GET["page"])?$_GET['page']:"1";
$page=textcheck($page);

if($page<0){
   
header('Location:indexmore.php?page=0'); 
}
else if($page>$cow){

 header('Location:indexmore.php?page='.$cow);    
}

$page10 =(string)($page*10);
$sqlr = 'SELECT * FROM '.$list.' WHERE `id` > '.$page10;
$view = $_link->prepare($sqlr);
$view->execute();
$result = $view->fetchAll(PDO::FETCH_OBJ);

function textcheck($s){
    /* 非法字元 */
    $s = str_replace ("<","",$s);
    $s = str_replace ("'","  ",$s);
    $s = str_replace ("&","",$s);
    $s = str_replace ("%","",$s);
    $s = str_replace ("!","",$s);
    $s = str_replace ("#","",$s);
    $s = str_replace ("@","",$s);
    $s = str_replace ("^","",$s);
    $s = str_replace ("*","",$s);
    $s = str_replace ("_","",$s);
    $s = str_replace ("--","",$s);
    $s = str_replace (">","",$s);
    $s = str_replace ("?php","",$s);
    $s = str_replace ("href","",$s);
    $s = str_replace ("script","",$s);

    $s = str_replace ("and","",$s);
    $s = str_replace ("exec","",$s);
    $s = str_replace ("insert","",$s);
    $s = str_replace ("delete","",$s);
    $s = str_replace ("select","",$s);
    $s = str_replace ("update","",$s);
    $s = str_replace ("count","",$s);
    $s = str_replace ("chr","",$s);
    $s = str_replace ("mid","",$s);
    $s = str_replace ("master","",$s);
    $s = str_replace ("truncate","",$s);
    $s = str_replace ("char","",$s);
    $s = str_replace ("declare","",$s);
    $s = str_replace ("union","",$s);
    
    
    
    /* 不堪字詞 */
    $s = str_replace ("垃圾"," OO ",$s);
    $s = str_replace ("幹你娘"," OOO",$s);
    $s = str_replace ("幹你老師"," OOOO ",$s);
    $s = str_replace ("廢物"," OO ",$s);
    $s = str_replace ("機歪"," OO ",$s);
    $s = str_replace ("尿"," O ",$s);
    $s = str_replace ("屎"," O ",$s);
    
    return $s;
}



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
        <p>目前頁數/總頁數：<?php echo($page)?>/<?php echo($cow)?></p>
        <button onclick="location.href='./indexmore.php?page=<?php echo((string)((int)$page+1))?>'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">下一頁</button>
        <button onclick="location.href='./indexmore.php?page=<?php echo((string)((int)$page-1))?>'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">上一頁</button>   
        <br><br><br>
            <table id="maintable" style="border:50px #77AAFF solid; width:initial;background-color:#77AAFF;" rules="all" cellpadding='12px'>
                <tr>
                    <td>課程名稱</td>
                    <td>教師姓名</td>
                    <td>開設系別</td>
                    <td>難易度</td>
                    <td>評價</td>
                    <td>上傳時間</td>
                    <td>詳細內容</td>
                </tr>
            </table>
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
        
        function analysisarray(array){         
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
