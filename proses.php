<?php 
	$sequance = array(array(1,0,0),array(1,0,1),array(1,1,0),array(1,1,1));
	$target = array(0,0,0,1);

	$n = $_POST['n'];
	$t = 0.0;
	$appoch = 0;
	$miu = rand(-1,1);;
	
	
	for($i=0; $i<3; $i++)
	{
		$w[$i] = rand(-1,1);
	}
	
	//get W
	do{
		for($i=0; $i<count($sequance); $i++)
		{
			//summation
			$multi = 0;
			$sum = 0;
			for($j=0; $j<count($w); $j++)
			{
				$multi = ($sequance[$i][$j] * $w[$j]);
				$sum += $multi;
			}
			
			//check output
			if($sum <= $t)
				$output[$i] = 0;
			else
				$output[$i] = 1;
			
			//update w
			$err = $target[$i] - $output[$i];
			if($err!=0)
			{
				for($j=0; $j<count($w); $j++)
				{
					$w[$j] = $w[$j] + ($miu * $sequance[$i][$j] * $err);
				}
			}
		}
		$appoch++;
	}while($appoch<=$n);
	
	//test data
	for($i=0; $i<count($sequance); $i++)
	{
		//summation
		$multi = 0;
		$sum = 0;
		for($j=0; $j<count($w); $j++)
		{
			$multi = ($sequance[$i][$j] * $w[$j]);
			$sum += $multi;
		}
		
		//check output
		if($sum <= $t)
			$output[$i] = 0;
		else
			$output[$i] = 1;
	}
?>

<html>
<body>
	<h2 align="center">Hasil Akhir Output Test</h2>
	<hr>
	<p></p>
	<table border='1' align="center" width="50%">
		<tr>
			<td align="center"><strong>I1</strong></td>
			<td align="center"><strong>I2</strong></td>
			<td align='center'><strong>I3</strong></td>
			<td align='center'><strong>Output</strong></td>
		</tr>
		<?php 
			for($i=0; $i<count($sequance); $i++){
		?>
		<tr>
			<td align="center"><?php echo $sequance[$i][0];?></td>
			<td align="center"><?php echo $sequance[$i][1];?></td>
			<td align="center"><?php echo $sequance[$i][2];?></td>
			<td align="center"><?php echo $output[$i];?></td>
		</tr>
		<?php }?>
	</table>
	<a href="index.php">Kembali Ke Beranda</a>
</body>
</html>
	