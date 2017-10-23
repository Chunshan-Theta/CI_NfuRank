<?PHP
require('config.php');

$id=isset($_GET["id"])?$_GET['id']:null;
$sqlr = 'SELECT * FROM `'.$list.'` WHERE `id` = '.$id;
$view = $_link->prepare($sqlr);
$view->execute();
$result = $view->fetchAll(PDO::FETCH_OBJ);
$result = $result[0];

$sqlr = 'SELECT * FROM `'.$list.'_recall` WHERE `Postid` = '.$id;
$view = $_link->prepare($sqlr);
$view->execute();
$result_recall = $view->fetchAll(PDO::FETCH_OBJ);
?>
<html>
	<head>
    <title>虎尾科技大學選課專用區</title>
	<meta charset='utf-8'/>
	<link type="text/css" rel="stylesheet" href="detailstyle.css">
	</head>
	<body id="pagebody">
		<div id="topbar" style="width:100%;height:50px;background-color:#0066FF;padding-right:12px;right:0;left:0;top:0;position: fixed;" >        
            <button id="host" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;"onclick="location.href='https://www.facebook.com/chunshan.wang'">聯絡版主</button>
            <button onclick="location.href='./insertpage.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">新增課堂評價</button>            
            <button onclick="location.href='./index.php'" style="float:right;height:50px;background-color:#0066FF; border:5px #0066FF solid;">首頁</button>
        </div>
        <div id="topspan" style="height:50px;margin:160px;border-bottom:5px #FFF solid">
            <h1 id="indextitle">將生命使用在有意義課堂上 </h1>
            <p style="padding:20px;">        
            拒絕無用課堂，挑選造就高品質教學<br>
            淘汰不適任老師，將位置留給優良的未來<br>
            問心無愧就接受眾人檢視
            
            </p>
        </div>

            
		<div id="content" style="margin:auto;padding-left:100px;padding-right:100px;padding-bottom:50px;border-radius:100px;background-color:#77AAFF;width:750px;">
             <div>
                <table id="maintable" style="border:50px #77AAFF solid; width:initial;background-color:#77AAFF;" rules="all" cellpadding='10px'>
                    <tr style="border-top:2px #55A solid;">
                        <td><h4>課程名稱</td>
                        <td id="classN"><h5><?php echo($result->classN)?></td>
                    </tr>
                    <tr style="border-top:2px #55A solid;">
                        <td><h4>教師姓名</td>
                        <td id="teacherN"><h5><?php echo($result->teacherN)?></td>
                    </tr>
                    <tr style="border-top:2px #55A solid;">
                        <td><h4>開設系別</td>
                        <td id="major"><h5><?php echo($result->major)?></td>
                    </tr>
                    <tr style="border-top:2px #55A solid;">
                        <td><h4>評價</td>
                        <td id="cost"><h4>難易度</td>
                        
                    </tr>
                    <tr>                
                        <td id="value"><h5><?php echo($result->value)?></td>
                        <td id="cost_"><h5><?php echo($result->cost)?></td>
                    </tr>
                    <tr style="border-top:2px #55A solid;">
                        <td id="classcall"><h4>課堂固定點名</td>
                        <td id="homework"><h4>回家作業</td>
                        <td id="classexam"><h4>課中小考/課中回饋單</td>
                    </tr>
                    <tr>                    
                        <td id="classcall"><h5><?php if($result->classcall==1){echo("有");}else{echo("無");}?></td>
                        <td id="homework_"><h5><?php if($result->homework==1){echo("有");}else{echo("無");}?></td>
                        <td id="classexam_"><h5><?php if($result->classexam==1){echo("有");}else{echo("無");}?></td>
                    </tr>
                    <tr style="border-top:2px #55A solid;">
                        <td id="midexam"><h4>期中考試</td>
                        <td id="endexam"><h4>期末考試</td>
                        <td id="posttime"><h4>更新時間</td>
                    </tr>
                    <tr>
                        <td id="midexam_"><h5><?php echo($result->midexam)?></td>
                        <td id="endexam_"><h5><?php echo($result->endexam)?></td>
                        <td id="posttime_"><h4><?php echo($result->posttime)?></td>
                    </tr>
                </table>
            </div>
            <div id="say" >
                    <h4>評論
                    <h5 style="background-color:#AACCFF;"><?php echo($result->say)?>
            </div>
            
            </div>
            <div style="margin:auto;width:200px">
                <h4 style="float:left;">訪客回應</h4>
                <button onclick="location.href='./insertcall.php?id=<?php echo($result->id)?>'" style="float:left;background-color:#AACCFF;width:75px;border:1px #FFF solid;">新增回應</button>
            </div>
        
        
		<!-- script -->
        <script>
        var number = 1;
        <?php foreach($result_recall as $v):?>
            recall("<?php echo($v->content)?>",number);
            number=number+1;
        <?php endforeach;?>
        
        
        function recall(recalltext,recallid){
            if(recallid%2==0){
                var newp=document.createElement("p");
                var newdiv=document.createElement("div");
                var str=document.createTextNode(recalltext);        
                var element=document.getElementById("pagebody");           
                
                newdiv.setAttribute("style", "margin:20px;margin-left:15%;padding:30px; margin-right:40%;border-radius:100px;background-color:#77AAFF;width:30%;float:left;"); 
                newdiv.appendChild(str);
                element.appendChild(newdiv);
            }
            else{
                var newp=document.createElement("p");
                var newdiv=document.createElement("div");
                var str=document.createTextNode(recalltext);        
                var element=document.getElementById("pagebody");           
                
                newdiv.setAttribute("style", "margin:20px;margin-left:40%;padding:20px; margin-right:15%;border-radius:100px;background-color:#77AAFF;width:30%;float:right;"); 
                newdiv.appendChild(str);
                element.appendChild(newdiv);
                
            }
        }
        </script>
	</body>
</html>