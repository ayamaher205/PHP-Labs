<?php 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['Username'];
$Address = $_POST['address'];
$department=$_POST['department'];
$gender = $_POST['inlineRadioOptions'];
$skills = $_POST['skills'];
$country = $_POST['country'];
if($gender=='Male'){
    echo "<h1>Thanks Mr: $first_name&nbsp$last_name</h1>";
}
else{
    echo "<h1>Thanks Ms: $first_name&nbsp$last_name</h1>";
}
echo"<h2>Please Review your information:</h2>";
echo"<h4>User_Name: $username</h4>";
echo"<h4>Address: $Address</h4>";
echo"<h4>Department: $department</h4>";
echo"<h4>Country: $country</h4>";
echo "<h4>Skills: </h4>";
foreach ($skills as $skill) {
        echo $skill . "&nbsp&nbsp";
    } 
?>
