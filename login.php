<?php

// include("connextion.php");


$servername="localhost";
$username="root";
$password="root";
$db_name="database1";
$conn=new mysqli($servername,$username,$password,$db_name,3306);
if ($conn->connect_error) {
    die("connection failed".$conn->connect_error);
}
echo '<script>
     alert("la connection avec base donnee est bien ressuite")
     </script>';








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styledelogin.css">
</head>
<body>
    
<div id="form">
    <h1>Login Form</h1>
    <form name="form" method="POST" onsubmit="return isvalid()" action="login.php">
        <label>username:</label>
        <input type="text" id="user" name="user"> <br></br>
        <label>password:</label>
        <input type="password" id="pass" name="pass"> <br></br>
        <input type="submit" id="btn" value="Login" name="submit">
    </form>
</div>



<script>


function isvalid() {
    var user=document.form.user.value;
    var pass=document.form.pass.value;
    if (user.length=="" && pass.length=="") {
        alert("usernam and password faild is empty !!!")
        return false
        
    }else{
        if (user.length=="" ) {
            alert("username faild is empty !!!")
        return false
        }
        if (pass.length=="" ) {
            alert("password faild is empty !!!")
        return false
    }
}
}










</script>
<?php

if (isset($_POST['submit'])){
    if ($_POST['pass']=='admin'|| $_POST['user']="naima") {
     header('location:index.php');
    }elseif($_POST['pass']==""||$_POST['pass']!="admin"||$_POST["user"]=""||$_POST['user']!="naima") {
     echo '<script>
     alert("mots de pass incorect et user incorect")
     </script>';
    }
    }
?>

<?php
    $cookieName = "computerName"; // Nom du cookie
    $expireTime = time() + 3600; // Durée de vie du cookie (1 heure)
    $computerName = gethostname();
    // Si le$cookieName cookie existe, on affiche le nom de l'ordinateur
    if(isset($_COOKIE[$cookieName])) {
        echo "Nom de l'ordinateur : " .$computerName;
    } else {
        // Sinon, on crée le cookie avec le nom de l'ordinateur
        $computerName = gethostname(); // Obtient le nom de l'ordinateur de l'utilisateur
        setcookie($cookieName, $cookieName, $expireTime, "/"); // Stocke le nom de l'ordinateur dans un cookie
        echo "Cookie créé avec succès.";
        echo "sa valeur est :"." ".$computerName;
    }



    if (isset($_POST['submit'])){
        $password=$_POST['pass'];
        if ($_POST['pass']=='admin') {
         session_start();
         $_SESSION['pass']=$password;
         $SESSION['start_time']=date('Y-m-d H:i:s');
         $SESSION['loged']=true;
         header('location:index.php');
        }elseif($_POST['pass']==""||$_POST['pass']!="admin") {
         echo "<h4>"."mot de pass incorect"."</h4>";
        }
     }
     
     
?>


</body>
</html>