<html>
<head>

<style>
*{margin:0%;}

body{background:#000;}
h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;margin-top:50px;}


table{width:90%;height:auto;margin-left:30px;border-radius:10px;margin-top:5px;background:#fff;}
table,th,tr,td{border-collapse:collapse;border:1px solid #400040;padding:5px;}
table td{text-align:center;font-size:20px;color:#400040;}
table th{font-size:23px;color:#400040;}
img{width:50px;height:50px;}
</style>
</head>
<body>
<?php include("menubaradmin.php")?>

	<h1>View All Pet Details</h1>
	<form method="post">
	<br>
	<br>
	</form>
	<table>
<tr>
<th>Serial No</th>

<th>Delete</th>
	<th>PetName</th>
	<th>petColor</th>
	<th>petRate</th>
	<th>petImages</th>
	

</tr>
<?php
			include("db.php");
			
			if(!isset($_POST['search_btn']))
			{
				$query=$con->prepare("select * from petdetails order by 1 desc");
			
				$query->execute();
			}
			if(isset($_POST['search_btn']))
			{
				$getdata=$_POST['search'];
				$query=$con->prepare("select * from petdetails where pet_name like '%$getdata%'");
			
				$query->execute();
			}
			$i=1;
			while($row=$query->fetch()):
			
			echo"<tr><td>".$i++."</td>
			
				
				<td><a href='delete_petdetils.php?id=".$row['pet_id']."'>Delete</td>
			
				<td>'".$row['pet_name']."'</td>
			<td>'".$row['pet_color']."'</td>
			<td>'".$row['pet_rate']."'</td>
			<td><img src='petphotos/".$row['pet_img1']."'></td>
			
			
			
			
			</tr>";
			
			
			endwhile;



?>
</table>
</body>
</html>