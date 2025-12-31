<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmation = $_POST["password-confirmation"];
    $email = $_POST["email"];

    if (!$username || !$email || !$password || !$confirmation) {
        echo "All fields are required";
        return;
    }

    if ($password !== $confirmation) {
        echo "Passwords do not match";
        return;
    }

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pw, email ) VALUES (?,?,?)";

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $hash, $email]);

        $userId = $pdo->lastInsertId();

        session_start();
        $_SESSION["user_id"] = $userId;
        $_SESSION["user_name"] = $username;

        $pdo = null;
        $smtm = null;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    header("Location: ../index.php");
    exit;
    
} else {
    header("Location: ../index.php");
    exit;
}