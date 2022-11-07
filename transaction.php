<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');


	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN shipping ON shipping.sales_id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['pay_id'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$output['ship_date'] = date('M d, Y', strtotime($row['ship_date']));
		switch($row['ship_status']){
			case 0:
				$output['ship_status'] = "Preparing for Shipment"; //grey
				break;
			case 1:
				$output['ship_status'] = "Shipment On the Way"; //black
				break;
			case 2:
				$output['ship_status'] = "Delivered"; //green
				break;
			case 3:
				$output['ship_status'] = "Delayed"; //red
				break;
		}
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