<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<!-- Paypal Express -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
					<div class="box box-solid">
						<div class="box-body">
							<h1 class="page-header">YOUR CART</h1>
							<div class="box box-solid">
								<div class="box-body">
								<p style="color:red;">***Please make sure your address and contact number are updated before confirming purchase!!!</p>
								<p>If you would want to update your details, please click <span style="text-decoration:underline;"><a href="profile.php">here</a></span>.</p>
								<table class="table table-bordered">
									<thead>
										<th></th>
										<th>Photo</th>
										<th>Name</th>
										<th>Price</th>
										<th width="10%">Quantity</th>
										<th>Subtotal</th>
									</thead>
									<tbody id="tbody">
									</tbody>
								</table>
								</div>
							</div>
								<?php
									if(isset($_SESSION['user'])){
										echo "
											<p style='float:left;'>Confirm your purchase now and pay with: <div style='float:right;' id='paypal-button'></div></p>
										";
										
									}
									else{
										echo "
											<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
										";
									}
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
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});



	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
<!-- Paypal Express -->
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'AQBGhUPPEhijJw6KZiMbmiLhGRK-cT9kPSqD3NnpUtDANWl8cYA2rQymY9md9FXvy1Up6uxUu6mr3o7L',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: total, 
                        	currency: 'MYR' 
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>
</body>
</html>