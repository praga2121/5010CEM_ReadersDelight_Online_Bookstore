<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
              
              <br>
	        	  <div class="col-sm-9">
					      <div class="box box-solid">
                  <div class="box-body">
                    <!--contact section start-->                                                                                                                                                                                                                                                                                                                   
                      <div class="contact-form">
                        <h2 class="page-header">Contact Us</h2>
			<h4>Ask us anything! Be it requesting books not yet available, bulk purchase, account issues...</h4>
                        <form target="_blank" action="https://formsubmit.co/rorihupo@mailgolem.com" method="POST"> 
                          <div class="form-group has-feedback">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                          </div>
                          <div class="form-group has-feedback">
                            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                          </div>
                          <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Send">
                        </form>
                      </div>
                    <!--contact section end-->
                    </div>
                </div>
              </div>

    
            <div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
