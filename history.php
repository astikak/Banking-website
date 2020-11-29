<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="transaction_history.css">
	

	<title>Transfer Money</title>
	<link rel="icon" href="bank-icon.png" type="image/x-icon">

</head>
<body>
	<header>
		<div class="nav" style="color: white; background-color: rgba(0,0,0,0.6); height: 70px;">
			<a href="homepage.html" style="text-decoration: none;color: white;"><h1 style="top: 15px; position: relative;">BANK WEBSITE</h1></a>

			<div class="dropdown">
				<button class="dropbtn"><h5>Menu &nbsp;<i class="fa fa-caret-down"></i></h5></button>

				<div class="dropdowncontent">
					<a href="allcustomers.php"> View Customers</a>
					<a href="--">View Transactions</a>
					<a href="#">Transfer Money</a>
				</div>
			</div>


			<div class="contactus"><a href="contactinfo.html" style=" text-decoration: none;">
				<h5 style="float:right; right: 50px; top: 40px; position: absolute; "> Contact Us </h5></a>
			</div>


			
		</div>
	</header>
	<main>
		<div class="container">
			<?php
			 $url='127.0.0.1:3306';
             $username='root';
             $password='mysql';
             $conn=mysqli_connect($url,$username,$password,"bankcustomers");
             if(!$conn){
                      die('Could not Connect My Sql:' .mysql_error());
                }

			 $result = $conn->query("SELECT `transfer_from`, `transfer_to`, `date`, `transfer_amount` FROM transaction_hist") or die(mysql_error($conn));
			?>
			<div>
				</br>
				</br>
				</br>
				</br>
				</br>
				
			</div>
			<div class="row justify-content-center" id="hist_table">
			 	<table class="table">
			 		<thead>
			 			<tr>
			 				<th>From</th>
			 				<th>To</th>
			 				<th>Date</th>
			 				<th>Amount</th>
			 			</tr>
			 		</thead>
			<?php 
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['transfer_from']; ?></td>
							<td><?php echo $row['transfer_to']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo $row['transfer_amount']; ?></td>
						</tr>
						<?php endwhile; ?>
			 	</table>
			 </div>
			
		</div>
	</main>
	<footer>
		<div class="footer">
			<a href="https://www.linkedin.com/in/astika-kudali/" class="btn btn-social-icon btn-linkedin" style="position: absolute; top: 600px; left: 30px;">
    <span class="fa fa-linkedin" ></span>
  </a>
	</footer>
</body>
<script type="text/javascript">
$(document).ready(function () {
  $('#hist_table').DataTable({"pagingType": "simple_numbers"});
  $('.dataTables_length').addClass('bs-select');
});
</script>
</html> 