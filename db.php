<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skyline";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getUsers()
{
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

if (isset($_POST['save_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    try {
        $sql = "INSERT INTO users (name, email, mobile)
        VALUES ('".$name."', '".$email."', '".$mobile."')";
        $conn->exec($sql);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <narmadeshshivam108@gmail.com>' . "\r\n";
        $headers .= 'Cc:' .$email. "\r\n";
        $message = '<a href="http://localhost/skyline-task/db.php?verify_email='.$email.'">Verify email</a>';
        mail($email,'Skyline added you',$message,$headers);
        $_POST['success'] = "User created successfully";
    } catch (PDOException $e) {
        $_POST['error'] = $e->getMessage();
    }
}

if(isset($_GET['verify_email']) && !empty($_GET['verify_email']))
{
    try {
        $sql = "UPDATE users SET is_verified = 1 WHERE email='".$_GET['verify_email']."'";
        $conn->exec($sql);
        echo 'Your email is verified';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>