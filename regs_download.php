<?php  
include 'config/dbconnect.php';
$output = '';
 $query = "SELECT * FROM learnerspace_2022_reg";
 $result = mysqli_query($conn, $query);

$records = array();
while( $rows = mysqli_fetch_assoc($result) ) {
$records[] = $rows;
}
$filename = "test" . ".xlsx";
$fp = fopen('php://output', 'w');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Learners_Space_2022_Registrations.csv"');
//header("Content-Type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=\"$filename\"");
$show_coloumn = false;

if(!empty($records)) 
{
	foreach($records as $record) 
	{
		if(!$show_coloumn) 
		{
			// display field/column names in first row
			//print_r($record);			
			fputcsv($fp,array_keys($record));			
			//echo implode("\t", array_keys($record)) . "\n";
			$show_coloumn = true;
		}
		fputcsv($fp,array_values($record));		
		//echo implode("\t", array_values($record)) . "\n";
	}
}
exit;


/*
$num_fields = mysqli_num_fields($result);
$headers = array();
/*for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysql_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;*/
?>



