<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<!-- CHAT BAR BLOCK -->
<link rel="stylesheet" href="chatbot/css/chat.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="chat-content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                    onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="chatbot/js/responses.js"></script>
<script src="chatbot/js/chat.js"></script>
	<!-- //end of bot -->
	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
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
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/main.png" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/promo.jpg" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/main.png" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
			    <br/>
		            <div class="box box-solid">
						<div class="box-body">
							<h2>Latest Arrival</h2>
								<?php
									$month = date('m');
									$conn = $pdo->open();

									try{
										$inc = 3;	
										$stmt = $conn->prepare("SELECT * FROM products  ORDER BY id DESC LIMIT 3");
										$stmt->execute();
										foreach ($stmt as $row) {
											$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
											$inc = ($inc == 3) ? 1 : $inc + 1;
											if($inc == 1) echo "<div class='row'>";
											echo "
												<div class='col-sm-4'>
													<div class='box box-solid'>
														<div class='box-body prod-body'>
															<img src='".$image."' width='100%' height='230px' class='thumbnail'>
															<h5 class='prod-text'><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
															<h5 class='prod-text'>".$row['author']."</h5>
														</div>
														<div class='box-footer'>
															<b>&#36; ".number_format($row['price'], 2)."</b>
														</div>
													</div>
												</div>
											";
											if($inc == 3) echo "</div>";
										}
										if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
										if($inc == 2) echo "<div class='col-sm-4'></div></div>";
									}
									catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

									
								 

								echo '<h2>Monthly Top Sellers</h2>';
								
									$month = date('m');
									$conn = $pdo->open();

									try{
										$inc = 3;	
										$stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 3");
										$stmt->execute();
										foreach ($stmt as $row) {
											$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
											$inc = ($inc == 3) ? 1 : $inc + 1;
											if($inc == 1) echo "<div class='row'>";
											echo "
												<div class='col-sm-4'>
													<div class='box box-solid'>
														<div class='box-body prod-body'>
															<img src='".$image."' width='100%' height='230px' class='thumbnail'>
															<h5 class='prod-text'><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
															<h5 class='prod-text'>".$row['author']."</h5>
														</div>
														<div class='box-footer'>
															<b>&#36; ".number_format($row['price'], 2)."</b>
														</div>
													</div>
												</div>
											";
											if($inc == 3) echo "</div>";
										}
										if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
										if($inc == 2) echo "<div class='col-sm-4'></div></div>";
									}
									catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

									$pdo->close();
									?>

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