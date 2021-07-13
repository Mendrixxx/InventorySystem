
<?php
	$k=$_POST['id'];
	$k=trim($k);

	include("backend/conn.php");
	$sql = " SELECT YEAR(date_aq) as yearName, sum(total_val) as total from item where classification='{$k}' group by YEAR(date_aq) order by date_aq desc ";
	
	$res = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_array($res)) {
		$total=$rows["total"];
		$total=number_format($total);
	?>	
	<tr>
		<td> <?php echo $rows['yearName'] ?> </td>
		<td>Php <?php echo $total ?> </td>		
	</tr>
	<?php
		}?>
