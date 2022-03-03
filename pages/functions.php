<?php

function registration($name, $userPass, $email):bool {
    $name = trim(htmlspecialchars($name));
    $userPass = trim(htmlspecialchars($userPass));
    $email = trim(htmlspecialchars($email));
    if ($name == "" || $userPass == "" || $email == "") {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if (strlen($name) < 3 || strlen($name) > 30 || strlen($userPass) < 3 || strlen($userPass) > 30) {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }
    $ins = 'insert into users (login,pass,email,roleid) values("'.$name.'","'.md5($userPass).'","'.$email.'",2)';

    include'config/config.php';

    if (!($link instanceof mysqli)){
        echo "<h3/><span style='color:red;'>Error connecting to Date Base!</span><h3/>";
        return false;
    }
    mysqli_query($link, $ins);
    $err = mysqli_errno($link);
    if ($err){
        if($err == 1062)
            echo "<h3/><span style='color:red;'>This Login Is Already Taken!</span><h3/>";
        else
            echo "<h3/><span style='color:red;'>Error code:".$err."!</span><h3/>";
        return false;
    }
    return true;
}

function login($name,$userPass)
{
    if ($name=="" || $userPass=="")
    {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if (strlen($name)<3 || strlen($name)>30 || strlen($userPass)<3 || strlen($userPass)>30) {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }

    include'config/config.php';
    var_dump($name);
    var_dump($userPass);
    $sel='select * from users where login="'.$name.'"
	and pass="'.md5($userPass).'"';
    $res=mysqli_query($link, $sel);
    if($row=mysqli_fetch_array($res,MYSQLI_NUM)){
        $_SESSION['ruser']=$name;
        if($row[5]==1)
        {
            $_SESSION['radmin']=$name;
        }
        return true;
    }
    else{
        echo "<h3/><span style='color:red;'>No Such User!</span><h3/>";
        return false;
    }

}