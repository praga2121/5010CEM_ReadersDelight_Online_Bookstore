<!--script file for successfully logged in alerts and page redirecting-->
<script type="text/javascript">
    function loginAlerts() {
		alert("Login successful! Redirecting to home page....");
        window.location = "index.php"; // Redirecting to other page.
    }
</script>

<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    echo '<script type="text/javascript">loginAlerts()</script>';
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg">ACCOUNT SIGN IN</p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="signup.php" class="text-center"><i class="fa fa-pencil"></i>Register a new account</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Back to Home Page</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
