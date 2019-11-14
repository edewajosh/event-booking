<?php 

include_once('dbconnection.php');

function duplicateUsers($email, $dbc){
	$search = "SELECT * FROM authentication WHERE email= '$email'";
	$result = $dbc->query($search);
	$rows = $result->num_rows;
	if($rows>0){
		return true;
	}else{
		return false;
	}
}

function register($username, $email, $password, $dbc){
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$insert = "INSERT INTO authentication (username, email,password) VALUES('$username', '$email', '$hashed_password')";
	if(duplicateUsers($email, $dbc) === true){
		echo '<script> alert(\'A user with that email already exist.\')</script>';
		echo '<script> window.open(\'../admin/registration.php\',\'_self\')</script>';
	}
	else{
		if($dbc->query($insert) === true){
			echo '<script> alert(\'Account created successfully, proceed to login.\')</script>';
			echo '<script> window.open(\'../admin/login.php\',\'_self\')</script>';
		}else{
			$serror = 'Error during signup.. try again later';
                    
            $_SESSION['signup_error']= $serror;
            echo "Error: " . $insert . "<br>" . $dbc->error;
		}
	}
}

function loginAdmin($email, $password, $dbc){
    $get_user = "SELECT email, password, username FROM authentication WHERE email = '$email'";
    $result = $dbc->query($get_user);
    $rows=$result->num_rows;
    if ($rows <= 0) {
        echo '<script> alert(\'username or password incorrect.\')</script>';
        echo '<script> window.open(\'../admin/login.php\',\'_self\')</script>';
    }else{

        while($row = $result->fetch_assoc()){                   

        $verifyPass = password_verify($password, $row['password']);

        if($verifyPass){
            session_start();
            $_SESSION['email']= $row['email'];
            $_SESSION['username'] = $row['username'];   
            
            header('location: ../admin/index.php?login successful');
            }else{
            echo '<script> alert(\'password is incorrect.\')</script>';
            echo '<script> window.open(\'../admin/login.php\',\'_self\')</script>';

            }
        }
    }
}
// logout admin
function logout(){
    session_start();
    if(session_destroy()){
        header('location: ../');
    }
    
}

// call on action
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    register($username,$email,$password, $dbc);
}

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    loginAdmin($email, $password, $dbc);
  

}

if(isset($_GET['logout'])){
    logout();
}