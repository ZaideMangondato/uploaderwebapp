<?php

  session_start();

  if(isset($_SESSION['txtusername'])){

  }else{
    session_destroy();
    header('location: login.php');

  }if(isset($_POST['btnlogout'])){
    session_start();
    session_destroy();
    header('location: login.php');
  }

?>


<?php
  include('dbconnect.php');
  $msg = '';
  if(isset($_POST['btnchangepass'])){
    

    $vcurrpass = $_POST['txtcurrpass'];
    $vnewpass = $_POST['txtnewpass'];
    if($vcurrpass == $vnewpass){
      $msg = 'password match';
    }else{
      $msg = 'not match';
    }

  }


?>
<!DOCTYPE html>



<html>
<head>
	<title>Uploader WebApp</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
    
  </script>
  </head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#"><span class="fa fa-cloud"></span> Uploader Web App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Ball Bearings</a>
      <a class="nav-item nav-link" href="#">TNT Boxes</a>
    </div>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <hr>
      </li>
      <li class="nav-item">
        <div class="btn-group">
          <button type="button" data-toggle="modal" data-target="#userProfile" class="btn btn-secondary">@<?php  echo strtolower($_SESSION['txtusername']); ?></button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" data-toggle="modal" data-target="#editProfile">Edit Profile</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#changePass" data-backdrop="static">Change Password</a>
            <a class="dropdown-item">
              <form method="post" class="form-inline my-2 my-lg-0">
                <button class="btn btn-danger btn-block my-2 my-sm-0" name="btnlogout">Logout <span class="fa fa-sign-out"></span></button>
              </form>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
  </div>  
  </nav>
<?php
  include('dbconnect.php');
  $firstname = '';
  $lastname = '';
  $fullname = '';
  $username = '';
  $email = '';
  $phonenumer = '';
  $company = '';
  $password = '';

  $sql = "select firstname,lastname,username,email,phone_num,company,pass from tblusers where username = '".strtolower($_SESSION['txtusername'])."';";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $firstname = $row["firstname"];
      $lastname = $row["lastname"];
      $fullname = $row["firstname"]." ".$row["lastname"]."";
      $username = $row["username"]."";
      $email = $row["email"]."";
      $phonenumber = $row["phone_num"]."";
      $company = $row["company"]."";
      $password = $row["pass"];
    }
  }else{
    $fullname = "0 result";
  }
?>

<!-- THIS USER ACCOUNT PROFILE -->
  <div class="modal fade" id="userProfile">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title"><span class="fa fa-user"></span> User Profile</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table class="table table-dark">
            <tbody>
              <tr>
                <td>Fullname</td>
                <td><code><strong><?php echo strtoupper($fullname); ?></strong></code></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><code>@<?php echo $username; ?></code></td>
              </tr>
              <tr>
                <td>Email Used</td>
                <td><code><?php echo $email; ?></code></td> 
              </tr>
              <tr>
                <td>Phone Number</td>
                <td><code><?php echo $phonenumber; ?></code></td>
              </tr>
              <tr>
                <td>Company</td>
                <td><code><?php echo strtoupper($company); ?></code></td>
              </tr>

            </tbody>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- EDIT USER PROFILE -->
  <div class="modal fade" id="editProfile">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form method="post">
        <!-- Modal Header -->
        <div class="modal-header bg-secondary text-white">
          <h5 class="modal-title"><span class="fa fa-user"></span> Edit User Profile</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table class="table">
            <tbody>
              <tr>
                <td>Firstname & Lastname</td>
                <td>
                  <input class="form-control" name="edfirstname" type="text" value="<?php echo $firstname; ?>"></input><br>
                  <input class="form-control" name="edlastname" type="text" value="<?php echo $lastname; ?>"></input>
                </td>
              </tr>
              <tr>
                <td>Username</td>
                <td><input class="form-control" name="edusername" type="text" value="<?php echo $username; ?>"></td>
              </tr>
              <tr>
                <td>Email Used</td>
                <td><input class="form-control" name="edemail" type="text" value="<?php echo $email; ?>"></td> 
              </tr>
              <tr>
                <td>Phone Number</td>
                <td><input class="form-control" name="edphonenum" type="text" value="<?php echo $phonenumber; ?>"></td>
              </tr>
              <tr>
                <td>Company</td>
                <td><input class="form-control" name="edcompany" type="text" value="<?php echo strtoupper($company); ?>"></td>
              </tr>

            </tbody>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" name="btnupdateprofile" class="btn btn-block btn-primary">Update Profile</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php

  include('dbconnect.php');
  

?>

  <!-- The Modal -->
  <div class="modal" id="changePass">
    <div class="modal-dialog">
      <div class="modal-content">
      <form method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="form-group">
              <label>Enter Current Password</label>
                <input name="txtcurrpass" class="form-control" placeholder="******" type="password" required="" value="">

            </div>
            <div class="form-group">
              <label>Enter New Password</label>
                <input name="txtnewpass" class="form-control" placeholder="******" type="password" required="" value="">
                
            </div>
          <?php echo $msg; ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button name="btnchangepass" class="btn btn-primary btn-block">Change</button>
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>


  <br>
  <br>
  <br>
  <br>
  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <div class="card bg-secondary text-white">
        <div class="card-body">

          <h4>Upload your File in just One Click!</h4>
          <p>You can upload any type of files<br>specially document files.</p>
          <form enctype="multipart/form-data" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000000" />
            <p>Choose a file to upload:</p> <input name="uploadedfile" type="file"/>
            <p></p>
            <button class="btn btn-dark btn-block" name="btnupload">Upload this File</button>
            

            <?php
            $msg = "";
            if(isset($_POST['btnupload'])){

              $target_path = "./dir/".strtolower($_SESSION['txtusername'])."/";

              $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

              if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                  $msg = '
                  <div class="alert alert-success">
                  <strong>Success!</strong> The file
                  '.  basename( $_FILES['uploadedfile']['name']). 
                  '
                   has been Uploaded
                  </div>
                  ';
              } else{
                  $msg = '
                  <div class="alert alert-danger">
                    <strong>Error!</strong> There was a Problem uploading the file.
                  </div>
                  ';
              }
              
            }



            ?>
            <p></p>
            <p><?php echo $msg; ?></p>
          </form>
        </div>
      </div>
      
    </div>

    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">List of All Uploaded Files</div>
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="myTable">
              <thead>
                <th><i class="fa fa-file"></i> File Name</th>
                <th><i class="fa fa-link"></i> Download Link</th>
                <th><i class="fa fa-cogs"></i> Action</th>
              </thead>
              <tbody id="myTable">
                
            <?php
                if ($handle = opendir('./dir/'.strtolower($_SESSION['txtusername']).'/')){ //username will be the directory name.
                  
                  while (false !== ($entry = readdir($handle))){
                    if ($entry != "." && $entry != ".."){

                      $fileDir = './dir/'.strtolower($_SESSION['txtusername']).'/'.$entry.'';
            ?>
              <tr>
                <td><?php echo $entry; ?></td>
                <td><a target="_blank" href="http://127.0.0.1/uploader/dir/<?php echo strtolower($_SESSION["txtusername"]); ?>/<?php echo $entry; ?>"><i class="fa fa-cloud-download"></i> Download</a></td>
                <td>
                  <button type="button"  name="deleteFile" class="btn btn-sm btn-danger" onclick="deleteFunction('<?php echo $fileDir; ?>', '<?php echo $entry; ?>')"><i class="fa fa-trash"></i> Delete</button>
                </td>
              </tr>
            <?php
                    }
                  }
                  closedir($handle);
                }
             ?>
            
                
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
  
  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
  
</script>

<script type="text/javascript">
  
    $(document).ready(function(){
        $('#myTable').DataTable();  
         //$('body div').children().last().remove()
        
        
      });
	
  
  


  function deleteFunction(deleteFile, filename){

    Swal.fire({
        title: 'Are you sure you want to Delete '+filename+'?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
              type: "POST",
              url: 'deleteFile.php',
              data: {fileName: deleteFile},
              success: function(data){
                  if(data == "1"){
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      
                    
                      window.location = window.location;
                    // location.reload(true);
                  }
                  window.location = window.location;

              }
          });

        }
       
      })
    }


  
</script>
  
  
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cba9150d6e05b735b4372b5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  
  </body>
</html>