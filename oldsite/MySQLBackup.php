
<?php
mb_internal_encoding('utf-8');
$host="127.8.219.2";

$user="theta";

$password="theta";

$dbname="teachervalue";



mysql_connect($host,$user,$password);
mysql_query("SET NAMES 'UTF8'");
mysql_select_db($dbname);



$mysql= "set charset utf8;\r\n";#for mysql<=5.0

$q1=mysql_query("show tables");

while($t=mysql_fetch_array($q1)){

$table=$t[0];

$q2=mysql_query("show create table `$table`");

$sql=mysql_fetch_array($q2);

$mysql.=$sql['Create Table'].";\r\n\r\n";#DDL



$q3=mysql_query("select * from `$table`");


while($data=mysql_fetch_assoc($q3)){
    


$keys=array_keys($data);

$keys=array_map('utf8_encode',$keys);

$keys=join('`,`',$keys);

$keys="`".$keys."`";


$vals=array_values($data);

$vals=array_map('utf8_encode',$vals);

$vals=join("','",$vals);

$vals="'".utf8_decode ($vals)."'";
#echo($vals);



$mysql.="insert into `$table`($keys) values($vals);\r\n";

}

$mysql.="\r\n";

}
echo ($mysql);

/* 
$filename=date('Ymj').".sql"; //文件名為當天的日期

$fp = fopen('.\\sql\\'.$filename,'w');

fputs($fp,$mysql);

fclose($fp); 


echo "
<center>數據備份成功,生成備份文件".$filename."</center>";
*/
?>
