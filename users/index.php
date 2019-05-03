<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Accounts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Accounts</h2>
  <p>list of all User Accounts</p>
  <div class="table-responsive">           
  <table id='userAccounts' class='table table-striped table-hover'>
				    <thead>
				      <tr>
				        <th>Firstname</th>
				        <th>Lastname</th>
				        <th>Username</th>
				        <th>Email</th>
				        <th>Phone Number</th>
				        <th>Company</th>
				        <th>Password</th>
				      </tr>
				    </thead>
				    <tbody>
      	<?php
      	include('../dbconnect.php');
      	$sql = "select * from tblusers;";
      	$result = $conn->query($sql);
      	if($result->num_rows > 0){
      		while($row = mysqli_fetch_array($result)){
        		echo "<tr>";
  				  echo "	<td>".$row['firstname']."</td> ";
  			    echo "    <td>".$row['lastname']."</td>";
  			    echo "    <td>".$row['username']."</td>";
  			    echo "    <td>".$row['email']."</td>";
  			    echo "    <td>".$row['phone_num']."</td>";
  			    echo "    <td>".$row['company']."</td>";
  			    echo "    <td>".$row['pass']."</td>";
  			    echo "</tr>";
        		
      		}
      		
      	}
      	else{
      		echo "0 results";
      	}
      	$conn->close();

      	?>
        <!--  -->
      </tbody>
			  </table>
	</div>
</div>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#userAccounts').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</html>
