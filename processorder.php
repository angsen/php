<html>
<head>
	<title>Bob's Auto Parts - Order Results</title>
</head>
<body> <h1>Bob's Auto Parts</h1> <h2>Order Results</h2>
<?php
	echo '<p>Order processed.</p>';

	echo "<p>Order processed at ";
	echo date('H:i, js F Y');
	echo "</p>";

	echo "<p>Order processed at ".date('H:i, js F Y')."</p>";

	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];

	echo '<p>Your order is as follows: </p>';
	echo $tireqty.' tires<br />';
	echo $oilqty.' bottles of oil<br />';
	echo $sparkqty.' spark plugs<br />';

	/*
		github
	*/
?>
	
</body>
</html>
