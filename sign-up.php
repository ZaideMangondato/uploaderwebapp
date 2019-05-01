<!DOCTYPE html>
<html>
<head>
	<title>Sign Up - Uploader WebApp</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    

    /* Important part */
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 300px;
        overflow-y: auto;
    }
  </style>
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
<?php 
  include('dbconnect.php');
  $msg = "";

  $remfname = "";
  $remlname = "";
  $remusername = "";
  $rememail = "";
  $remphonenumber = "";
  $remcompschool = "";

  if(isset($_POST['btnregister'])){
    $vfname = $_POST['txtfname'];
    $vlname = $_POST['txtlname'];
    $vusername = strtolower($_POST['txtusername']);
    $vemail = $_POST['txtemail'];
    $vphonenumber = $_POST['txtphonenumber'];
    $vcompschool = $_POST['txtcompschool'];
    $vpassword = $_POST['txtpassword'];
    $sql = "INSERT INTO tblusers(firstname,lastname,username,email,phone_num,company,pass) VALUES ('".$vfname."', '".$vlname."', '".$vusername."', '".$vemail."', '".$vphonenumber."', '".$vcompschool."', '".$vpassword."');";
    if($conn->query($sql)){
      $msg = '
              <div class="alert alert-success">
                Congratulations <strong>'.$vfname.'!</strong> you are Successfully Registered.
              </div>
      ';
      
        try{
          if (!mkdir('./dir/'.$vusername, 0777, true)) {
              die('Failed to create folders...');
          }
        }catch(Exception $e){
          echo 'Message: ' .$e->getMessage();
        }

        
        
    

    }else{
      $msg = '
              <div class="alert alert-danger">
                <strong>Oops!</strong> Registration Failed, check your username or email, it might be the username <strong>'.$vusername.'</strong> or the email <strong>'.$vemail.'</strong> already registered.
              </div>
      ';
      $remfname = $_POST['txtfname'];
      $remlname = $_POST['txtlname'];
      $remusername = $_POST['txtusername'];
      $rememail = $_POST['txtemail'];
      $remphonenumber = $_POST['txtphonenumber'];
      $remcompschool = $_POST['txtcompschool'];

    }
  }
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
  <a href="index.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
  <h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
  <?php echo $msg; ?>
<form method="post">
  <div class="form-row">

    <div class="col form-group">
      <label>First name </label>   
        <input type="text" name="txtfname" class="form-control" placeholder="" required="" VALUE="<?php echo $remfname; ?>">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label>Last name</label>
        <input type="text" name="txtlname" class="form-control" placeholder=" " required="" VALUE="<?php echo $remlname; ?>">
    </div> <!-- form-group end.// -->
  </div> <!-- form-row end.// -->
  <div class="form-group">
    <label>Username <i class="small">(Make sure you are using a unique username)</i></label>
    <input type="text" name="txtusername" class="form-control" placeholder="user123" required="" VALUE="<?php echo $remusername; ?>">
    <label>Email address</label>
    <input type="email" name="txtemail" class="form-control" placeholder="youremail@email.com" required="" VALUE="<?php echo $rememail; ?>">
    <label>Phone Number</label>
    <input type="text" name="txtphonenumber" class="form-control" placeholder="+63 912 345 6789" required="" VALUE="<?php echo $remphonenumber; ?>">
    <small class="form-text text-muted">We'll never share your email and phone number with anyone else.</small>
  </div> <!-- form-group end.// -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Company or School</label>
      <input type="text" name="txtcompschool" class="form-control" placeholder="Company Inc." required="" VALUE="<?php echo $remcompschool; ?>">
    </div> <!-- form-group end.// -->
    <div class="form-group col-md-6">
      <label>Create password</label>
      <input class="form-control" name="txtpassword" type="password" required="">
    </div>
  </div> <!-- form-row.// -->
    
    <div class="form-group">
        <button name="btnregister" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Register' button, you confirm that you accept our <br> <a href="" data-toggle="modal" data-target="#termsModal">Terms of use and Privacy Policy.</a></small>                                          
</form>

</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="index.php">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->

<!-- The Modal -->
  <div class="modal" id="termsModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Terms of Use and Privacy Policy of UPLOADER WEB APP</h2>
          <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3>PLEASE READ THE FOLLOWING TERMS AND CONDITIONS OF USE CAREFULLY BEFORE USING THIS WEBSITE.</h3>
          <p class="text-justify">All users of this site agree that access to and use of this site is subject to the following terms and conditions and other applicable law. If you do not agree to these terms and conditions, please do not use this site.</p>
          <h3>Disclaimer</h3>
          <p class="text-justify">You understand that it is your responsibility to ensure that the privacy policy you create is complete, accurate, and meets your companies specific privacy needs. FreePrivacyPolicy.com is not liable or responsible for any privacy policies created using our services, and we give no representations or warranties, express or implied, that the privacy policies created using our service are complete, accurate or free from errors or omissions.</p>

          <p class="text-justify">FreePrivacyPolicy.com is a family friendly site and we DO NOT intentionally accept or allow the following types of sites into our program: Gambling, Adult content (porn, soft porn, sites with adult ad's), Pharmacy (Cheap drugs, Viagra, male/female enhancement, etc.), Hate, Link Farms or Spam Sites. If you sell any of these products and we find out, we will cancel your membership without hesitation. We do not need to explain our decision or reasons if we reject or cancel any membership.</p>
          <h3>Refunds & Guarantees</h3>
          <p class="text-justify">FreePrivacyPolicy.com offers the following guarantee. If you purchase a FreePrivacyPolicy.com course, product or service, and for some reason you decide that you would like a refund, you have 7 days to request a refund. If you request a refund within 7 days from the date of purchase, FreePrivacyPolicy.com will give you a full refund of your purchase price for the course, product or service. If you do not request a refund within the 7 day refund period, you forfeit this option and will not be eligible for a refund. We do not offer refunds on any additional services that you may purchase in the members area once you are a member.</p>
          <h3>Email Opt-in Policy</h3>
          <p class="text-justify">When using our FreePrivacyPolicy.com Generator service you will be opted-in to receive weekly email updates, tips and suggestions we believe will help build, grow and enhance your site. You may unsubscribe at any time by clicking on the "Unsubscribe or Modify my subscription" link at the bottom of any email sent.</p>

          <h3>Copyright</h3>

          <p class="text-justify">The entire content included in this site, including but not limited to text, graphics or code is copyrighted as a collective work under the United States and other international copyright laws, and is the property of FreePrivacyPolicy.com. The collective work includes works that are licensed to FreePrivacyPolicy.com. Copyright 2009, FreePrivacyPolicy.com ALL RIGHTS RESERVED. Permission is granted to electronically copy and print hard copy portions of this site for the sole purpose of placing an order with FreePrivacyPolicy.com or purchasing our products. Any other use, including but not limited to the reproduction, distribution, display or transmission of the content of this site is strictly prohibited, unless authorized by FreePrivacyPolicy.com. You further agree not to change or delete any proprietary notices from materials downloaded from the site.</p>

          <h3>Trademarks</h3>

          <p class="text-justify">All trademarks, service marks and trade names of FreePrivacyPolicy.com used in the site are trademarks or registered trademarks of FreePrivacyPolicy.com.</p>

          <h3>Warranty Disclaimer</h3>

          <p class="text-justify">This site and the materials and products on this site are provided "as is" and without warranties of any kind, whether express or implied. To the fullest extent permissible pursuant to applicable law, FreePrivacyPolicy.com disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose and non-infringement. FreePrivacyPolicy.com does not represent or warrant that the functions contained in the site will be uninterrupted or error-free, that the defects will be corrected, or that this site or the server that makes the site available are free of viruses or other harmful components. FreePrivacyPolicy.com does not make any warrantees or representations regarding the use of the materials in this site in terms of their correctness, accuracy, adequacy, usefulness, timeliness, reliability or otherwise. Some states do not permit limitations or exclusions on warranties, so the above limitations may not apply to you.</p>

          <h3>Limitation of Liability</h3>

          <p class="text-justify">FreePrivacyPolicy.com shall not be liable for any special or consequential damages that result from the use of, or the inability to use, the services and products offered on this site, or the performance of the services and products.</p>

          <h3>Typographical Errors</h3>

          <p class="text-justify">In the event that a FreePrivacyPolicy.com product is mistakenly listed at an incorrect price, FreePrivacyPolicy.com reserves the right to refuse or cancel any orders placed for product listed at the incorrect price. FreePrivacyPolicy.com reserves the right to refuse or cancel any such orders whether or not the order has been confirmed and your credit card charged. If your credit card has already been charged for the purchase and your order is cancelled, FreePrivacyPolicy.com will issue a credit to your credit card account in the amount of the incorrect price.</p>

          <h3>Term; Termination</h3>

          <p class="text-justify">These terms and conditions are applicable to you upon your accessing the site and/or completing the registration or shopping process. These terms and conditions, or any part of them, may be terminated by FreePrivacyPolicy.com without notice at any time, for any reason. The provisions relating to Copyrights, Trademark, Disclaimer, Limitation of Liability, Indemnification and Miscellaneous, shall survive any termination.</p>

          <h3>Use of Site</h3>

          <p class="text-justify">Harassment in any manner or form on the site, including via e-mail, chat, or by use of obscene or abusive language, is strictly forbidden. Impersonation of others, including a FreePrivacyPolicy.com or other licensed employee, host, or representative, as well as other members or visitors on the site is prohibited. You may not upload to, distribute, or otherwise publish through the site any content which is libelous, defamatory, obscene, threatening, invasive of privacy or publicity rights, abusive, illegal, or otherwise objectionable which may constitute or encourage a criminal offense, violate the rights of any party or which may otherwise give rise to liability or violate any law. You may not upload commercial content on the site or use the site to solicit others to join or become members of any other commercial online service or other organization.</p>

          <h3>Participation Disclaimer</h3>

          <p class="text-justify">FreePrivacyPolicy.com does not and cannot review all communications and materials posted to or created by users accessing the site, and are not in any manner responsible for the content of these communications and materials. You acknowledge that by providing you with the ability to view and distribute user-generated content on the site, FreePrivacyPolicy.com is merely acting as a passive conduit for such distribution and is not undertaking any obligation or liability relating to any contents or activities on the site. However, FreePrivacyPolicy.com reserves the right to block or remove communications or materials that it determines to be (a) abusive, defamatory, or obscene, (b) fraudulent, deceptive, or misleading, (c) in violation of a copyright, trademark or; other intellectual property right of another or (d) offensive or otherwise unacceptable to FreePrivacyPolicy.com in its sole discretion.</p>

          <h3>Indemnification</h3>

          <p class="text-justify">You agree to indemnify, defend, and hold harmless FreePrivacyPolicy.com, its officers, directors, employees, agents, licensors and suppliers (collectively the "Service Providers") from and against all losses, expenses, damages and costs, including reasonable attorneys' fees, resulting from any violation of these terms and conditions or any activity related to your account (including negligent or wrongful conduct) by you or any other person accessing the site using your Internet account.</p>

          <h3>hird-Party Links</h3>

          <p class="text-justify">In an attempt to provide increased value to our visitors, FreePrivacyPolicy.com may link to sites operated by third parties. However, even if the third party is affiliated with FreePrivacyPolicy.com, FreePrivacyPolicy.com has no control over these linked sites, all of which have separate privacy and data collection practices, independent of FreePrivacyPolicy.com. These linked sites are only for your convenience and therefore you access them at your own risk. Nonetheless, FreePrivacyPolicy.com seeks to protect the integrity of its website and the links placed upon it and therefore requests any feedback on not only its own site, but for sites it links to as well (including if a specific link does not work).</p>

          <h3>Contacting Us</h3>

          <p class="text-justify">If there are any questions regarding this privacy policy you may contact us.</p>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-block btn-success" data-dismiss="modal">I Agree</button>
        </div>
        
      </div>
    </div>
  </div>

</div> 

<!--container end.//-->



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