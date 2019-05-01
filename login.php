<?php
      session_start();
      include('dbconnect.php');
      $msg = '';
      $remainusername = '';
      if(isset($_POST['btnlogin'])){
        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];
        $result = $conn->query("select count(*) from tblusers where username = '$username' and pass = '$password' ");
        $count = $result->fetch_row();
        if($username == "" || $password == ""){
          echo'
          <div class="alert alert-secondary">
            Please Fill up All Requirements
          </div>
          ';
        }else{
          if($count[0] == "1"){
            $_SESSION['txtusername'] = $username;
             header('location: deleteFile.php');
            header('location: index.php');

          }else{
            $msg = '
              <div class="alert alert-danger">
                <strong>Oops!</strong> Authentication Incorrect. Check your username or password.
              </div>
            ';
            $remainusername = $_POST['txtusername'];;

          }
        }
      }

    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In - Uploader WebApp</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      
    </ul>
  </div>  
  </nav>
<br>
<br>
<br>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-6">
  <div class="card">
    
    
    <article class="card-body">
    
      <a href="sign-up.php" class="float-right btn btn-outline-primary">Sign up</a>
      <h4 class="card-title mb-4 mt-1">Sign in</h4>
      <?php echo $msg; ?>
       <form method="post">
        <div class="form-group">
          <label>Your username</label>
            <input name="txtusername" class="form-control" placeholder="username123" type="text" required="" value="<?php echo $remainusername; ?>">
        </div> <!-- form-group// -->
        <div class="form-group">
<!--           <a class="float-right" href="#">Forgot?</a> -->
          <label>Your password</label>
            <input name="txtpassword" class="form-control" placeholder="******" type="password" required="" value="">
        </div> <!-- form-group// -->  
        <div class="form-group">
            <button name="btnlogin" class="btn btn-primary btn-block"> Login  </button>
        </div> <!-- form-group// -->                                                           
    </form>
    </article>
  </div> <!-- card.// -->

  </div> <!-- col.// -->
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


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