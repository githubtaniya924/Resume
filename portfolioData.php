<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpFormData</title>
    <style>
        .info{
            text-align:center;
            margin-top:250px;
        }
    </style>
</head>
<body>
    
<?php
$servername="localhost:3307";
$username="root";
$password="";
$dbname="PortfolioFormData";

$conn=new mysqli($servername,$username,$password,$dbname);

// if($conn->connect_error){
//     die("connection failed: ".$conn->connect_error);
// }
// else{
//     echo "connection success";
// }

$name= $_POST['name'];
$email= $_POST['email'];
$phoneno= $_POST['phoneno'];
$feedback= $_POST['feedback'];

$stmt= $conn->prepare("INSERT INTO userdata(Name,Email,Contact,Feedback) VALUES(?,?,?,?)");

$stmt->bind_param("ssss",$name,$email,$phoneno,$feedback);

if($stmt->execute()){
    echo "<div class='info'>
    <h1>Thank You $name for Your Feedback!<h1>
    <h2>Your Feedback is valueable</h2>
    </div>";
}
else{
    echo "error:".stmt->error;
}

$stmt->close();
$conn->close();

?>

</body>
</html>