<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
<?php
echo "<h1 style='color: green'>Users Registered in System </h1>";
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$Address = $_POST['address'];
$department = $_POST['department'];
$gender = $_POST['inlineRadioOptions'];
$password = $_POST['Password'];
$errors = [];
$user_data = [];

if (empty($first_name)) {
    $errors["first_name"] = "first_name is required";
} else {
    if (!preg_match('/^[a-zA-Z]+$/', $first_name)) {
        $errors["first_name"] = "please enter valid name";
    }
    $user_data["first_name"] = $first_name;
}

if (empty($last_name)) {
    $errors["last_name"] = "last_name is required";
} else {
    if (!preg_match('/^[a-zA-Z]+$/', $last_name)) {
        $errors["last_name"] = "please enter valid name";
    }
    $user_data["last_name"] = $last_name;
}
if(empty($email)){
        $errors["email"] = "email is required";
    }else{
    if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)){
        $errors["email"] = "please enter valid email";
    }
    $user_data["email"]=$email;
}
if(empty($password)){
        $errors["password"] = "password is required";
    }else{
    if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)){
        $errors["password"] = "Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one digit, and one special character";
    }
    $user_data["password"]=$password;
}
if(empty($department)){
        $errors["department"] = "department is required";
}else{
    $user_data["department"]=$department;
}
if(empty($Address)){
        $errors["Address"] = "Address is required";
}else{
    $user_data["Address"]=$Address;
}
if(empty(!$gender)){
    $user_data["gender"]=$gender;
}
if (count($errors)){
    $errors = json_encode($errors);
    $user_data = json_encode($user_data);
    if (! empty($user_data)){
    $url= "errors={$errors}&user_data={$user_data}";
    }else{
        $url= "errors={$errors}";
    }
    header("Location: Login.php?" . $url);
} else {
    echo "<h1> Thank you </h1>";
    $data = json_encode($_POST);
    $res = save_data($data . PHP_EOL, "users.txt");
    display_data_in_table("users.txt");
}

function save_data($user_data, $filename) {
    $fileobj = fopen($filename, "a");
    $res = fwrite($fileobj, $user_data);
    fclose($fileobj);
    return $res;
}
function display_data_in_table($filename) {
    echo "<table class='table'> <tr> <th>Fitst Name</th> <th> Last Name</th> <th>Address</th> <th>Gender</th><th>Email</th> <th>Password</th><th>Department</th> <th>Action</th></tr>";
    $file_data = file($filename);
    foreach ($file_data as $line) {
        $info = json_decode($line);
        echo "<tr>";
        foreach ($info as $item) {
            echo "<td> {$item} </td>";
        }
        echo "
        <td><button class='btn btn-danger' onclick='delete_line($line)'>Delete</button></td>;";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<script>
function delete_line(indx){
    $contents = file_get_contents($filename);
    $contents = str_replace($line, '', $contents);
    file_put_contents($filename, $contents);
}
</script>
