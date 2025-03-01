<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="css/registration.css">
    <title>RegistrationPage</title>
</head>   
<body>
    <div class="container">

<?php

if(isset($_POST["submit"])){
$Username = $_POST["username"];
$Fullname = $_POST["name"];
//$Email = $_POST["email"];
$Password = $_POST["password"];
//$RepeatPassword = $_POST["repeatPassword"];

//$passwordHash = password_hash($Password, PASSWORD_DEFAULT);

$errors = array();

if(empty($Username) OR empty($Fullname) OR empty($Password)){
array_push($errors, "All fields are required");
}
// if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
// array_push($errors, "Email is not valid");
// }
// if(strlen($Password)<6){
// array_push($errors, "Password must be atleast 6 characters long");
// }
// if($Password !== $RepeatPassword){
// array_push($errors, "Password Does not Match");
// }

require_once "database2.php";

$sql = "select * from faculty_details where user_name = '$Username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);

if($rowCount>0){
array_push($errors,"Username already exists!");
}
if(count($errors)>0){
foreach($errors as $error){
echo"<div class='alert alert-danger'>$error</div>";
}
}
else{

// $sql = "insert into registration_details
// (username,name,email,password)
// values (?, ?, ?, ?)";

$sql = "insert into faculty_details
(user_name,name,password)
values(?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
$preparedStmt = mysqli_stmt_prepare($stmt,$sql);
if($preparedStmt){
mysqli_stmt_bind_param($stmt,"sss",$Username,$Fullname,$Password);
mysqli_stmt_execute($stmt);
echo"<div class='alert alert-success'>You are registered successfully</div>";
}else{
die("Something went wrong");
}
}
}

?>
<form action="Registration.php" method="POST">
             <div class="form-group">
                    <input  type="text" class="form-control" name="username" placeholder="Username">
             </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Fullname">
                    
             </div>

              <!-- <div class="form-group">
                    <input  type="text" class="form-control" name="email" placeholder="Email">
                    
             </div> -->

             <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                   
             </div>

         <!-- <div class="form-group">
                    <input  type="password" class="form-control" name="repeatPassword" placeholder="Confirm Password">
                    
             </div> -->

             <div class="form-group btn-group">
            <input type="submit" class="btn btn-success Btn" value="Register" name="submit">
             </div>  
            </form>
<div>
<p>Already Registered <a href="login.php" class="btn btn-warning btnR">login</a></p>
</div>
    </div>
</body>
</html>


