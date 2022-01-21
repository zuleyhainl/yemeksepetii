
<?php
//require_once "config.php";
include "config.php";

$selected_city=$_POST["city"];
$city = mysqli_query($conn,"SELECT city_id FROM cities WHERE city='".$selected_city."'");

$districts=[];
	
	if($city->num_rows==1)
	{
		while($row_city=$city->fetch_assoc())
		{
			$sql_districts="SELECT * FROM districts WHERE city_id = '".$row_city['city_id']."'";
			//echo $sql_districts;
			$districts = mysqli_query($conn,$sql_districts);
			while ($row = $districts->fetch_assoc()) {
				echo $row['district']."<br>";
			}
		}
	}
	$output = '';
	$output .= '<option value="">İlçe</option>';
	foreach($districts as $district)
	{
		$output .= '<option value="'.$district["district"].'">'.$district["district"].'</option>';
	}
	echo $output;

?>
