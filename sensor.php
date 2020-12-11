<?php

 header("Content-Type:JSON");
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods:POST');
 header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,
 Access-Control-Allow-Methods,Authorization,X-Requested-With');

 $data=json_decode(file_get_contents("php://input"),true);
 $temp=$data['temp'];
 $humidity=$data['humidity'];
 $sm=$data['sm'];
 $dist=$data['dist'];
 $ph=$data['ph'];

 include "db.php";
 $sql="insert into sensor(temp,humidity,sm,dist,ph) values('$temp','$humidity','$sm','$dist','$ph')";

 if(mysqli_query($con,$sql)){
     echo json_encode(array("message"=>"Record Inserted","status"=>true));
 }else{
	 echo json_encode(array("message"=>"Not In","status"=>false));
 }

?>