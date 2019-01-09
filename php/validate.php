<?php 
    $a=$_GET["id"];
    $b=$_GET["sem"];
    $year=substr($a,0,2);
    $field=substr($a,2,2);
    $_SESSION["id"]=$a;
    if($field=="it"){
        header('Location: it/it.php?id='.$a.'&sem='.$b);
    }elseif($field=="ce"){
        echo "invalid ";//header('Location: ce/ce.php?id='.$a.'&sem='.$b);
    }elseif($field=="ec"){
        echo "invalid ";//header('Location: ec/ec.php?id='.$a.'&sem='.$b);
    }elseif($field=="me"){
        echo "invalid ";//header('Location: me/me.php?id='.$a.'&sem='.$b);
    }elseif($field=="cl"){
        echo "invalid ";//header('Location: cl/cl.php?id='.$a.'&sem='.$b);
    }elseif($field=="ee"){
        echo "invalid ";//header('Location: ee/ee.php?id='.$a.'&sem='.$b);
    }else{
        echo "invalid ";
    }

?>
