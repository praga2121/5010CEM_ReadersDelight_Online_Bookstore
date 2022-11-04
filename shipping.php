<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('ship_list'=>'');

	$stmt = $conn->prepare("SELECT * FROM shipping WHERE sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['ship_date'] = date('M d, Y', strtotime($row['date']));

        //for status printing
        switch($row['status']){
            case 0:
                $output['ship_status'] = "Preparing for Shipment";
                break;
            case 1:
                $output['ship_status'] = "On the Way";
                break;
            case 2:
                $output['ship_status'] = "Received";
                break;
            case 3:
                $output['ship_status'] = "Delayed";
                break;
        }
	}

	$pdo->close();
	echo json_encode($output);

?>