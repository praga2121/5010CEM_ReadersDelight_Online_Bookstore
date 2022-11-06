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
        Sales History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="sales_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                  <button type="submit" class="btn btn-default btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Shipping ID</th>
                  <th>Transaction ID</th>
                  <th>Buyer Name</th>
                  <th>Status</th>
                  <th>Full Details</th>
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

                        $stmt2 = $conn->prepare("SELECT * FROM shipping WHERE sales_id=:sales_id ORDER BY date DESC");
                        $stmt2->execute(['sales_id'=>$row['salesid']]);
                        foreach($stmt2 as $row2){
                            echo "
                                <tr>
                                <td class='hidden'></td>
                                <td>".date('M d, Y', strtotime($row2['date']))."</td>
                                <td>".$row2['id']."</td>
                                <td>".$pay_id."</td>
                                <td>".$firstname.' '.$lastname."</td>
                                ";statusDisplay($row2['status']); echo"
                                <td><button type='button' class='btn btn-default btn-sm btn-flat transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
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
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
$(function(){
    $(document).on('click', '.shipping', function(e){
		e.preventDefault();
		$('#shipping').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'ship_details.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#ship_date').html(response.ship_date);
				$('$status').html(response.status);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#shipping").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>
