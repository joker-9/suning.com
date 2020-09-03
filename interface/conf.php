<?php
  header('content-type:text/html;charset=utf-8');
//为了结构看起来清晰 给用户名 密码 端口号 数据库名字 放一个数组里 之后修改比较容易 不用一个一个去找
$mysql_conf = array(
    'host'=>'localhost:3306',//默认端口号
    'db_username'=>'root',//数据库密码
    'db_password'=>'root',//数据库账号
    'db_name'=>'h5-2006'//数据库名字
);
//链接数据库 @是屏蔽警告
$mysqli = @new mysqli($mysql_conf['host'],$mysql_conf['db_username'],$mysql_conf['db_password']);
//判断是否链接成功

if($mysqli->connect_errno){//返回上次链接错误 也就是说 如果有错误 if里面就是真
    die('链接失败'.$mysqli->connect_errno);

}
//选择数据库名字 在这之前需要设置查询字符集
// ???怎么设置 有什么用处 （为了防止格式不统一而造成的乱码）
$mysqli->query('set names utf8');//执行sql语句
$select_db = $mysqli->select_db($mysql_conf['db_name']);
//判断这个数据库是否存在 
if(!$select_db){
    die('数据库选择错误'.$mysqli->error);
}
//******************************************************** */
// //开始遍历
// //sql语句
// $sql = 'select * from user';
// //定义一个接收变量 接收返回值 （结果集）
// $result = $mysqli->query($sql);
// //从结果集获得一条一条的数据 放到数组中 并转为json字符串格式
// $arr = array();
// while($row = $result->fetch_assoc()){
// array_push($arr,$row);
// }
// $json = json_encode($arr);
// echo $json;
?>