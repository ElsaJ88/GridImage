<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!$username || !$password) {
        echo "All fields are required";
        return;
    }

    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "User not found";
            return;
        }

        if (!password_verify($password, $user["pw"])) {
            header("Location: ../error.php");
            exit;
        }
        
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["username"];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    header("Location: ../index.php");
    exit;

} else {
    header("Location: ../index.php");
    exit;
}