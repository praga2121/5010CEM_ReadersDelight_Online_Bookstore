<!--script file for register alerts and page redirecting-->
<script type="text/javascript">
    function registerAlerts(register_status) {
        switch(register_status){
            case 1: //successfully registered
                alert("Successfully registered! Redirecting to login page...");
                window.location = "login.php"; //redirect to login page to login
                break;
            
            case 2://username used
                alert("Username used, please try another one!");
                return false;
                break;

            case 3://email used
                alert("Email used, please try another one!");
                return false;
                break;
            
            case 4://password is not same with confirm password
                alert("Confirm Password and Password are not the same!");
                break;
        }
    }

    function loginAlert(){
        window.location = "Home.html"; // Redirecting to other page.
    }
</script>

<?php
    error_reporting(E_ALL);  //give warning if session cannot start
    session_start();

    if(isset($_SESSION['userID'])){ //check if there is user logged in
        echo '<script type="text/javascript">loginAlert()</script>';
    }

    //database connection
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "readers_delight";
    $conn = mysqli_connect($dbServername ,$dbUsername,$dbPassword,$dbName);

    if(isset($_POST['register'])){
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(strcmp($password,$confirmPassword)==0){
            //checking if user already exists
            $checking_user_existence = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
            $result_register = mysqli_query($conn, $checking_user_existence) or die(mysqli_error($conn));
            if(mysqli_num_rows($result_register)>0){
                $row = mysqli_fetch_assoc($result_register);
                if(strcmp($row['username'],$username)==0){ //repititive username
                    echo '<script type="text/javascript">registerAlerts(2)</script>';
                }
                if(strcmp($row['email'],$email)==0){ //repititive email
                    echo '<script type="text/javascript">registerAlerts(3)</script>';
                }
            }
            else{
                //if user does not exist in database insert the data into the db
                $query = "INSERT INTO user (fullname, username, email, password)
                        VALUES " . "('" .$fullname. "', '" .$username. "','" .$email. "','".$hashed_password."')";
        
                $conn->query($query);

                //call js function telling the user successfully registered and redirect to login
                echo '<script type="text/javascript">registerAlerts(1)</script>'; 
            }
        }
        else{
            //telling password and confirm password are different
            echo '<script type="text/javascript">registerAlerts(4)</script>';
        }

        $conn->close();
    
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register an Account - Reader's Delight</title>
        <link href="css/loginRegis_styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" name="form">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Your Full Name" required/>
                                                <label for="fullname">Full Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Your Username" required/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required/>
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" required/>
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required/>
                                                        <label for="confirmPassword">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"><input name="register" type="hidden" value="true"/>Register Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="medium"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
