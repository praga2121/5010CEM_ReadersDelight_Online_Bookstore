<?php
	include 'includes/session.php';

    $id = $_POST['id'];

	$conn = $pdo->open();

    //condition for printing status
	function statusDisplay($status){
		switch($status){
			case 0:
				echo "<span style='color:#808080;'>Preparing for Shipment</span>"; //grey
				break;
			case 1:
				echo "<span style='color:#000000;'>Shipment On the Way</span>"; //black
				break;
			case 2:
				echo "<span style='color:#00FF00;'>Delivered</span>"; //green
				break;
			case 3:
				echo "<span style='color:#FF0000;'>Delayed</span>"; //red
				break;
		}
	}

    $ship_stmt = $conn->prepare("SELECT * FROM shipping WHERE sales_id=:sales_id");
    $ship_stmt->execute(['sales_id'=>$id]);
    $output['ship_date'] = date('M d, Y', strtotime($row['date']));
    $output['status'] = statusDisplay($row['status']); 


	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['pay_id'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>RM ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>RM ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>RM '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>