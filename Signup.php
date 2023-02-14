<?php
   
    $servername = "localhost"; 
    $username = "jha"; 
    $password = "jha@7867";
    $database = "jha";
   
     // Create a connection 
     $conn = mysqli_connect($servername, $username, $password, $database);
   
    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not. If our 
    // Database is properly connected we
    // can remove this part from the code 
    // or we can simply make it a comment 
    // for future reference.
   
    if($conn) {
         
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>

<?php
    
$showAlert = false; 
$showError = false; 
$exists= false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
  
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $email = $_POST["email"]; 
    $cpassword = $_POST["cpassword"];
            
    
    $sql = "Select * from admin where username='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
    
            $hash = password_hash($password, PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO admin (`username`, `passcode`, `email`) VALUES ('$username','$password','$email')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
            }

        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Username not available"; 
   } 
    include("Login.php");
}//end if   
    
?>
    
<!doctype html>
    
<html lang="en">
  
<head>
    
    <!-- Required meta tags --> 
    <meta charset="utf-8"> 
    <meta name="viewport" content=
        "width=device-width, initial-scale=1, 
        shrink-to-fit=no">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
         *{
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
         }
         body{
            height: 100vh;
            background-color: #e8eaf6;
         }
         /*.filter{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(0,0,0,.7);
         }*/
         .container{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            padding: 20px 25px;
            width: 300px;
            background-color: #fafafa;
            box-shadow: 0 6px 8px rgba(0,0,0,.1);
            border-radius: 8px;
         }
         .container h1{
            text-align: left;
            color: #212121;
            margin-bottom: 25px;
            text-transform: uppercase;
         
            

         }

         .container form input{
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid #e0e0e0;
            color: #212121;
            font-size: 20px;
            transition: .4s;
         }
         .container form input:focus{
            border-bottom: 2px solid #2979ff;
         }

         .container label{
            text-align: left;
            color: #2979ff;
         }

         .container form input::placeholder{
            color: #e2e2e2;
         }
         .container form button{
            width: 100%;
            padding: 8px 0;
            border: none;
            background-color:#2979ff;
            font-size: 18px;
            color: #fafafa;
            text-transform: uppercase;
            border-radius: 50px
         }
    </style>  
</head>
    
<body>
 
<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
    
<div class="container my-4 ">
    
    <h1 class="text-center">Signup Here</h1> 
    <form action="" method="post">
    
        <div class="form-group"> 
            <label for="username">Username</label> 
        <input type="text" class="form-control" id="username"name="username" aria-describedby="emailHelp">    
        </div>
        <div class="form-group"> 
            <label for="email">Emali</label> 
            <input type="email" class="form-control" id="email" name="email"> 
        </div>
        <div class="form-group"> 
            <label for="password">Password</label> 
            <input type="password" class="form-control"id="password" name="password"> 
        </div>
    
        <div class="form-group"> 
            <label for="cpassword">Confirm Password</label> 
            <input type="password" class="form-control" id="cpassword" name="cpassword">
    
            <small id="emailHelp" class="form-text text-muted">
            Make sure to type the same password
            </small> 
        </div>      
        <br>
        <button type="submit" class="btn btn-primary" onclicl="myalert()">
        SignUp
        </button> 
        <br>
        <p>Alread have an accout? <a href="Login.php">Login</a></p>
    </form> 
</div>

</body> 
</html>