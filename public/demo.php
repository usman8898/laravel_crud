<?php 
//filtering Records

if (isset($_POST["from"],$_POST["to"])) {
	$connect = mysqli_connect("localhost","root","","ems");

	$output = '';
	$query = "
		SELECT users.name,users.email,attendence.in_time,attendence.out_time,attendence.status,attendence.date 
		FROM users 
		INNER JOIN attendence 
		ON users.id = attendence.employee_id

		 where date BETWEEN '".$_POST["from"]."' AND '".$_POST["to"]."'";
		$result = mysqli_query($connect,$query);
		$output .= "

		<table class=table>
		<tr>
		<th>Employee Name</th>
		<th>Employee Email</th>
		<th>Employee Attendence</th>
		<th>Check IN</th>
		<th>check OUT</th>
		<th>Attendence Date</th>
		</tr>
		";
		if (mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_array($result)) {
							$output .= '
				<tr>
					<td>'.$row["name"].'</td>
					<td>'.$row["email"].'</td>
					<td>'.$row["status"].'</td>
					<td>'.$row["in_time"].'</td>
					<td>'.$row["out_time"].'</td>
					<td>'.$row["date"].'</td>
				</tr>

			';
		}
	}
	else{
	$output .= '
		<tr>
			<td colspan = "5">No Order Found</td>
		</tr>
	';
}
$output .= '</table>';
echo $output;
}
?>