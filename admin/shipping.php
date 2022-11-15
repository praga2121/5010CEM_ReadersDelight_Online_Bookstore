<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
    //condition for printing status
	function statusDisplay($status){
		switch($status){
			case 0:
				echo "<td style='color:#808080;'>Preparing for Shipment</td>"; //grey
				break;
			case 1:
				echo "<td style='color:#000000;'>Shipment On the Way</td>"; //black
				break;
			case 2:
				echo "<td style='color:#00FF00;'>Delivered</td>"; //green
				break;
			case 3:
				echo "<td style='color:#FF0000;'>Delayed</td>"; //red
				break;
		}
	}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Shipment Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Shipping</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Expected Date</th>
                  <th>Shipping ID</th>
                  <th>Transaction ID</th>
                  <th>Buyer Name</th>
                  <th>Status</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $pay_id = $row['pay_id'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];

                        $stmt2 = $conn->prepare("SELECT * FROM shipping WHERE sales_id=:sales_id ORDER BY ship_date DESC");
                        $stmt2->execute(['sales_id'=>$row['salesid']]);
                        foreach($stmt2 as $row2){
                            echo "
                                <tr>
                                <td class='hidden'></td>
                                <td>".date('M d, Y', strtotime($row2['ship_date']))."</td>
                                <td>".$row2['id']."</td>
                                <td>".$pay_id."</td>
                                <td>".$firstname.' '.$lastname."</td>
                                ";statusDisplay($row2['ship_status']); echo"
                                <td><button type='button' class='btn btn-default btn-sm btn-flat transact' data-id='".$row2['sales_id']."'><i class='fa fa-search'></i> View</button>
                                </tr>
                            ";
                        }
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/shipping_modal.php'; ?>
  </div>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
    $(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'ship_details.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
        $('.sales_id').val(response.sales_id);
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#ship_date').html(response.ship_date);
				$('#ship_status').html(response.ship_status);
        $('#status_code').html(response.ship_status);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

  $("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});

</script>
</body>
</html>
