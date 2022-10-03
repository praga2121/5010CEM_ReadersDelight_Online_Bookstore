<script type="text/javascript">
    function loginAlerts(login_status) {
        switch(login_status){
            case 1: //credentials correct
                alert("Login successful! Redirecting to home page....");
                window.location = "Home.html"; // Redirecting to other page.
                break;
            
            case 2://one of the credentials wrong
                alert("Wrong username or email or password, please try again!");
                break;

            case 3://one of field left empty
                alert("Please enter both username and password!");
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

    if(isset($_POST['login'])){
        $emailUsername = trim($_POST['emailUsername']);
        $password = trim($_POST['password']);

        //checking if user already exists
        $checking_user_existence = "SELECT * FROM user WHERE username='$emailUsername' OR email='$emailUsername' LIMIT 1";
        $result_login = mysqli_query($conn, $checking_user_existence) or die(mysqli_error($conn));
        if(mysqli_num_rows($result_login)>0){//verify username or email
            $row = mysqli_fetch_assoc($result_login);
            
            if(strcmp($row['username'],$emailUsername)==0 || strcmp($row['email'],$emailUsername)==0){ 
                //if username or email correct, fetch the password for verifying instead
                $hashed_password = $row['password'];
                if(password_verify($password,$hashed_password)){
                    $userID = $row['userID'];
                    //telling the system that the user is entitled to be logged in
                    $_SESSION['userID'] = $userID; //store user id in session
                    $_SESSION['loggedin'] = true;
                    //console message prompt telling user successfully logged in and redirect to home page
                    echo '<script type="text/javascript">loginAlerts(1)</script>';
                }
                else{
                    //display error message if username and password do not match data in the database
                    echo '<script type="text/javascript">loginAlerts(2)</script>';
                } 
            }
            //display error message if neither username or email is correct
            else{
                echo '<script type="text/javascript">loginAlerts(2)</script>';
            }
        }
        else{
            echo '<script type="text/javascript">loginAlerts(2)</script>';
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
        <title>Login - Reader's Delight</title>
        <link href="css/loginRegis_styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Account Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" name="form">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="emailUsername" name="emailUsername" type="text" placeholder="name@example.com" required/>
                                                <label for="emailUsername">Email or Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block"><input name="login" type="hidden" value="true"/>Login!</button>
                                            </div>
                                            <!--<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="medium" href="password.html">Forgot Password?</a>
                                            </div>-->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="medium"><a href="register.php">Need an account? Sign up!</a></div>
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
