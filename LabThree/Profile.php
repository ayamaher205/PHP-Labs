<?php 
include('./base.php');
$user=[];
if(isset($_POST['email'])&& isset($_POST['password']))
   { $fileContents = file_get_contents('users.txt');
    $lines = explode("\n", $fileContents);
    foreach ($lines as $line) {
        $user = json_decode($line, true);
        if ($user && $user['email'] === $_POST['email']&& $user['password'] === $_POST['password']) {
                session_start(); 
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['login'] = true;
                echo "<p class='text-success'>Welcome {$user['name']}</p>";
                return;
        }
    }}
    if(!$user){
        $errors =[];
        $errors['login'] = "wrong email or password";
        $data = [];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $errors = json_encode($errors);
        $data = json_encode($data);
        $url = "errors={$errors}&data={$data}"; 
        header("Location:./LoginForm.php?".$url);
    }
?>
