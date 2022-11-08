<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$sales_id = $_POST['sales_id'];
		$ship_date = $_POST['ship_date'];
		$ship_status = $_POST['ship_status'];

		try{
			$stmt = $conn->prepare("UPDATE shipping SET ship_date=:ship_date, ship_status=:ship_status WHERE sales_id=:sales_id");
			$stmt->execute(['ship_date'=>$ship_date, 'ship_status'=>$ship_status, 'sales_id'=>$sales_id]);
			$_SESSION['success'] = 'Shipping info updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: shipping.php');

?>