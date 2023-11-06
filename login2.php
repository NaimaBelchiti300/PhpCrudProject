<?php
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Connexion à la base de données en utilisant PDO
    $host = 'localhost';
    $dbname = 'database1';
    $username_db = 'naima';
    $password_db = 'admin';
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $username_db, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($username == 'naima' && $password == 'admin') {
            header("location:index.php");
        } else if ($username =! 'naima' && $password =! 'admin') {
            header("location:login.php");
            echo '<script>
                alert("login failed !!! unvalid username or password !!")
                </script>';
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
