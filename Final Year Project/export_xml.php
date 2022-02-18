<?php

	header ("Content-Type:text/xml"); 
	header('Content-Disposition: attachment; filename=booking.xml');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');
	
	// fetch the data
	$mysqli = new mysqli("localhost", "root", "", "project");
	mysqli_query($mysqli,'set names utf8');

	$result = $mysqli->query("select * from book");

		
	// loop over the rows, outputting them
	$xml = ''; 
	$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<Booking>\n"; 
	
	while($row = $result->fetch_object()){
		
		$xml .= "	<record id=\"$row->bid\">\n";
		
		$xml .= '		<user_id>'.$row->uid.'</user_id>'."\n";
		$xml .= '		<room_id>'.$row->rid.'</room_id>'."\n";
		
		$eid = $row->eid;
		$eid2 = $row->eid2;
		$eid3 = $row->eid3;
		
		if($eid == '1'){
			$xml .= '		<extra_service>yes</extra_service>'."\n";
		}else{
			$xml .= '		<extra_service>no</extra_service>'."\n";
		}
		
		if($eid2 == '2'){
			$xml .= '		<extra_service2>yes</extra_service>'."\n";
		}else{
			$xml .= '		<extra_service2>no</extra_service>'."\n";
		}
		
		if($eid3 == '3'){
			$xml .= '		<extra_service3>yes</extra_service>'."\n";
		}else{
			$xml .= '		<extra_service3>no</extra_service>'."\n";
		}
		
		$xml .= '		<check_in_date>'.$row->check_in_date.'</check_in_date>'."\n";
		$xml .= '		<booking_date>'.$row->book_date.'</booking_date>'."\n";
		
		$xml .= '		<number_of_people>'.$row->people.'</number_of_people>'."\n";
		
		$xml .= '		<total_price>'.$row->total_price.'</total_price>'."\n";
		
		$pay = $row->payment;
		
		if($pay == 'y'){
			$xml .= '		<paid>yes</paid>'."\n";
		}else{
			$xml .= '		<paid>no</paid>'."\n";
		}
		
		$xml .= "	</record>\n";
	
	}
	
	$xml .= '</Booking>'; 
	
	
	$mysqli->close();
	
	fwrite($output, $xml);
	
?>