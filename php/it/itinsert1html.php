<?php 
    $id=$_COOKIE["id"];
	$tillsem=$_COOKIE["tillsem"];
	//connect database
    $con=new mysqli("localhost","root","","varshesh");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
	//query for list of subject
	$sql = "SELECT * from ssem".($tillsem+1).";";
    $result = $con->query($sql);
	$numsub=$result->num_rows;
	echo "<html>
    <head>
        <title>sem1 insert data</title>
        <script>
            document.getElementById('sub').disabled=false;
        </script>
    </head>
    <body>
        <form action=\"itinsert1.php\" method=\"get\">";
	$num=1;
		while($row=$result->fetch_assoc()){
			echo $row["name"];
			echo ":<select id='".$num."' name='".$num."' onblur='check()'>
                <option value=\"null\" selected=\"selected\" disabled>--select--</option>
                <option value='10'>AA</option>
                <option value='9'>AB</option>
                <option value='8'>BB</option>
                <option value='7'>BC</option>
                <option value='6'>CC</option>
                <option value='5'>CD</option>
                <option value='4'>DD</option>
                <option value='0'>FF</option>
            </select><br>";
			$num++;
		}
		echo "<input type=\"submit\" value='insert' id='sub' onclick='check()' onmouseover=\"check()\">
        </form>
    </body>
        
</html>";
?>