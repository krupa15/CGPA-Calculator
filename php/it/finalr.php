<?php
	$id=$_COOKIE["id"];
	$sem=$_COOKIE["sem"];
	$cgpa=0.0;
	$credit=0;
	$con=new mysqli("localhost","root","","varshesh");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
	for($i=1;$i<=$sem;$i++){
		$sql="select * from itsem".$i." where id='".$id."';";
		$result=$con->query($sql);
		if (!$result) {
    throw new Exception("Database Error [{$con->errno}] {$con->error}");
}
		$row=$result->fetch_assoc();
		$cgpa=((float)$row["sgpa"]*(float)$row["credit"])+$cgpa;
		$credit=$credit+(int)$row["credit"];
	}
	$cgpa=$cgpa/(float)$credit;
	echo $cgpa;
	echo " id: ".$id." sem:".$sem;
?>s