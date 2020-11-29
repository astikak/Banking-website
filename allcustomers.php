<!DOCTYPE html>
<html>
<head>
	<title>All Customers</title>
	<link rel="icon" href="bank-icon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="allcustomers.css">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">

		html{
			overflow-x: hidden;
		}
		.myInput{

		 margin-left: 200px;
		 
		 top: 80px;
  
         background-position: 10px 10px;
         background-repeat: no-repeat;
         width: 50%;
         font-size: 16px;
         padding: 12px 20px 12px 40px;
         border: 1px solid #ddd;
         margin-left: 500px;
         margin-right: ;
         margin-top: 15px;
         border-radius: 25px;
         background-color: rgba(0,0,0,0.25);
         

}

.myInput:focus{
	outline: none;
}
 table{
 	margin-top: 10px;
 }

.nav{
	color: white;
	width: 100%;
	height: 100px;
	background-color: rgba(0,0,0,0.8);
	float: right;
}

.dropdown{
	float: right;
	right: 160px;
	top: 26px;
	position: absolute;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: grey;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdowncontent{
	  display: none;
	  
      position: absolute;
      background-color: rgba(0,0,0,0.4);
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
}

.dropdowncontent a {
	  float: none;
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
}

.dropdowncontent a:hover{
	background-color: black;
    color: red;
}

.dropdown:hover .dropdowncontent {
	display: block;
}

.dropbtn:hover{
	color: white;
}
.contactus a{
	color: grey;
}
.contactus a:hover{
	color: lightgrey;
}
	</style>
</head>
<body>

<div class="nav" style="color: white; background-color: rgba(0,0,0,0.6); height: 70px;">
			<a style="text-decoration: none;" href="homepage.html">
				<h1 style="top: 15px; position: relative; color: white;">BANK WEBSITE</h1>
			</a>

			<div class="dropdown">
				<button class="dropbtn"><h5>View details&nbsp;<i class="fa fa-caret-down"></i></h5></button>

				<div class="dropdowncontent">
					<a href="allcustomers.php"> View Customers</a>
					<a href="#">View Transactions</a>
				</div>
			

			</div>


			<div class="contactus"><a href="contactinfo.html" style=" text-decoration: none;">
				<h5 style="float:right; right: 50px; top: 40px; position: absolute; "> Contact Us </h5></a>
			</div>
</div>


			
<form>
<i style="color: black; margin-right: 4px; margin-top: 150px;"class="fas fa-search" aria-hidden="true"></i>
<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
</form>


<?php 


 $url='127.0.0.1:3306';
 $username='root';
 $password='mysql';
 $conn=mysqli_connect($url,$username,$password,"bankcustomers");
          if(!$conn){
                      die('Could not Connect My Sql:' .mysql_error());
                     }

 $query = "select * from customer_details";
 $result = mysqli_query($conn, $query);

 session_start();
 $_SESSION['role'] = ""; 

 echo "<div class='table-container'> <table id='tablee'> <th>Customer name</th> <th>Phone number</th> <th>Email</th> <th>Account Number</th> <th>Balance</th><th></th>";

  while($row = mysqli_fetch_array($result))
    {
	      
	 echo "<tr> <td><a href='homepage.html'>" . $row['cust_name'] . "</td></a><td>".$row['phone_number']."</td><td>". $row['email']."</td><td>". $row['acc_number'] . "</td><td>" . $row['balance'] . "</td> <td id='view-profile-column'><div class= id='view-profile-btn' value= '" .$row['acc_number']."' > <a class='btn-auth btn-facebook large' href='profile.php' id='vp' >".$row['acc_number']."</a></div></td></tr>" ;
    }
 echo "</table></div>";

 ?>

 <script type="text/javascript">

 	function myFunction() {
     var input, filter, table, tr, td, i, txtValue;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("tablee");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[0];
       if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) 
          {
             tr[i].style.display = "";
            } 
          else {
                tr[i].style.display = "none";
            }
        }       
      }
    }

 </script>


</body>
</html>