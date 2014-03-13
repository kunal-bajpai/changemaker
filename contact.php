<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal">

    <title>Contact - Changemaker</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS here -->
    <link href="css/changemaker.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
    <?php require_once(LIB_PATH."/navbar.php"); ?>

    <!-- Page Content -->

    <div class="container">
      
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Contact <small>We'd Love to Hear From You!</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Contact</li>
          </ol>
        </div>
      </div><!-- /.row -->

      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs hidden-sm fluid-wrapper">
      <iframe src="https://mapsengine.google.com/map/embed?mid=z-PnosnqD46Y.kcniMThq-Xls" width="640" height="480"></iframe>
      </div>
      
      <div class="row">

        <div class="col-sm-8">
          <h3>Let's Get In Touch!</h3>
          <p>Please feel free to contact anyone in the team, for any query regarding the working of our system, the aim, or an interested collaboration. Help us to make that change we believe in. Let us help you to make the change you believe in!</p>
			
      <!--<?php  

                // check for a successful form post  
                if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
                // check for a form error  
                elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  

			?>-->
            <form role="form" method="POST" action="contact-form-submission.php">
	            <div class="row">
	              <div class="form-group col-lg-4">
	                <label for="input1">Name</label>
	                <input type="text" name="contact_name" class="form-control" id="input1">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input2">Email Address</label>
	                <input type="email" name="contact_email" class="form-control" id="input2">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input3">Phone Number</label>
	                <input type="phone" name="contact_phone" class="form-control" id="input3">
	              </div>
	              <div class="clearfix"></div>
	              <div class="form-group col-lg-12">
	                <label for="input4">Message</label>
	                <textarea name="contact_message" class="form-control" rows="6" id="input4"></textarea>
	              </div>
	              <div class="form-group col-lg-12">
	                <input type="hidden" name="save" value="contact">
	                <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
              </div>
            </form>
        </div>

        <div class="col-sm-4">
          <h3>Changemaker.be</h3>
          <h4>BE THE CHANGE</h4>
          <p>
            BITS Pilani K.K. Birla Goa Campus<br>
            Goa, India 403 726<br>
          </p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone">Abhijith</abbr>: (91) 9689-808499</p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone">Chaitali</abbr>: (91) 8806-859744</p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone">Rishabh</abbr>: (91) 9561-749476</p>
          <p><i class="fa fa-envelope-o"></i> <abbr title="Email">Email</abbr>: <a href="mailto:feedback@changemaker.be">feedback@changemaker.be</a></p>
        
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="http://www.facebook.com/changemaker.be" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->

      <?php require_once(LIB_PATH."/modals.php"); ?>

    <div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; 2013 Changemaker. All rights reserved.</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
    
  </body>
</html>
