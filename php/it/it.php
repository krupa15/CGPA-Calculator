<?php
    
    //data set
    $id=$_GET['id'];
    $lastsem=$_GET['sem'];

    //cookie set
    setcookie("id",$id,time()+(60*30),"/");
    setcookie("sem",$lastsem,time()+(60*30),"/");
   
    //connect database
    $con=new mysqli("localhost","root","","varshesh");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
     
    //check last entered sem
    $sql = "SELECT sem FROM tillsem where id='".$id."';";
    $result = $con->query($sql);
    if (!$result) {
    throw new Exception("Database Error [{$con->errno}] {$con->error}");
	}
    //check user is first time 
    if(($result->num_rows)==0){
        $sql ="insert into tillsem(id,sem) values('".$id."','0')";
        $temp1 =$con->query($sql);
    }
    
    //now compare value of lastsem and tillsem
    $sql = "SELECT * FROM tillsem where id='".$id."';";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $tillsem=(Int)$row["sem"];
	setcookie("tillsem",$tillsem,time()+(60*30),"/");
    if($tillsem<$lastsem){
        header('Location: itinsert1html.php');
    }else
    {
        header('Location: finalr.php');
    }
?>