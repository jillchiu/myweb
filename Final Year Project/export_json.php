<?php

	header("Content-Type: text/json;charset=UTF-8");	
	header('Content-Disposition: attachment; filename=booking.json');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// fetch the data
	$mysqli = new mysqli("localhost", "root", "", "project");
	mysqli_query($mysqli,'set names utf8');

	$result = $mysqli->query("select * from book");

	$mysqli->close();
		
	// loop over the rows, outputting them
	while($row = $result->fetch_object()){
		
		$eid = $row->eid;
		$eid2 = $row->eid2;
		$eid3 = $row->eid3;
		
		if($eid == '1'){
			$eid = "yes";
		}else{
			$eid = "no";
		}
		
		if($eid2 == '2'){
			$eid2 = "yes";
		}else{
			$eid2 = "no";
		}
		
		if($eid3 == '3'){
			$eid3 = "yes";
		}else{
			$eid3 = "no";
		}
					
		$pay = $row->payment;
		
		if($pay == 'y'){
			$pay = "yes";
		}else{
			$pay = "no";
		}
		
		$arrayToFormat['Booking']['record'][] = array("-id" => $row->bid,
																  "user_id" => $row->uid,
																  "room_id" => $row->rid,
																  "extra_service" => $eid,
																  "extra_service2" => $eid2,
																  "extra_service3" => $eid3,
																  "check_in_date" => $row->check_in_date,
																  "booking_date" => $row->book_date,
																  "number_of_people" => $row->people,
																  "total_price" => $row->total_price,
																  "paid" => $pay,
						);
		
	}
	
	$json_response= urldecode(json_encode($arrayToFormat,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE ));
	
	fwrite($output, $json_response);
	
?>