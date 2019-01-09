<?php
    //set data
	$id=$_COOKIE['id'];
    $tillsem=$_COOKIE["tillsem"];
    $con=new mysqli("localhost","root","","varshesh");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
	$credit=0;
	$sql = "SELECT * from ssem".($tillsem+1).";";
    $result = $con->query($sql);
	$i=0;
	$sgpa=0;
	//sgpa coun
	while($row=$result->fetch_assoc()){
		$sgpa=$sgpa+($row["credit"]*$_GET[$row["no"]]);
		$credit=$credit+$row["credit"];
		$i++;
	}
	$sgpa=$sgpa/$credit;	
	//insert into table
	$numsub=$i;
	$i=1;
	$sql="insert into itsem".($tillsem+1)."(id";
	while($i<=$numsub){
		$sql=$sql.",sub".($i)."";
		$i++;
	}
	$sql=$sql.",sgpa,credit) values('".$id."',";
	$i=1;
	while($i<=$numsub){
		$sql=$sql."'".$_GET[(string)$i]."',";
		$i++;
	}
	$sql=$sql."'".$sgpa."','".$credit."');";
	echo $sql;
	$result = $con->query($sql);
	$sql="update tillsem set sem='".($tillsem+1)."' where id='".$id."';";
	$result = $con->query($sql);
	header('Location: it.php?id='.$id.'&sem='.$_COOKIE["sem"]);
?>