<?php
	include 'includes/session.php';

	if(isset($_GET['pay'])){
		$payid = $_GET['pay'];
		$date = date('Y-m-d');
		//ship date, default is 7 days expected to arrive so +7 days
		$ship_date = date('Y-m-d', strtotime('+7 day'));
		//default status code
		$status = 0;

		$conn = $pdo->open();

		try{
			
			$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)");
			$stmt->execute(['user_id'=>$user['id'], 'pay_id'=>$payid, 'sales_date'=>$date]);
			$salesid = $conn->lastInsertId();
			
			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($stmt as $row){
					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);

					//Start of stock deduction
					$sql = "UPDATE products SET stock = stock - :quantity WHERE id = :product_id";
					// Prepare statement
					$stmt = $conn->prepare($sql);
					// execute the query
					$stmt->execute(['product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);					
				}

				$stmt = $conn->prepare("INSERT INTO shipping (sales_id, ship_date, ship_status) VALUES (:sales_id, :date, :status)");
				$stmt->execute(['sales_id'=>$salesid, 'date'=>$ship_date, 'status'=>$status]);

				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	
	header('location: profile.php');
	
?>
