<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$date = $_POST['date'];
		$status = $_POST['status'];
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE shipping SET ship_date=:date, ship_status=:status WHERE sales_id=:id");
			$stmt->execute(['date'=>$date, 'status'=>$status, 'id'=>$id]);
			$_SESSION['success'] = 'Shipping info updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: shipping.php');

?>