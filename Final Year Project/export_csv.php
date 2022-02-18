<?php

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=booking.csv');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('bid', 'uid', 'rid', 'eid', 'eid2', 'eid3', 'check_in_date', 'book_date', 'people', 'total_price', 'payment'));

	// fetch the data
	$mysqli = new mysqli("localhost", "root", "", "project");
	mysqli_query($mysqli,'set names utf8');

	$result = $mysqli->query("select * from book");

	$mysqli->close();
		
	// loop over the rows, outputting them
	while ($row = $result->fetch_assoc()) fputcsv($output, $row);
	
	
?>