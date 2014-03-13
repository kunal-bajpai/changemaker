<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_POST['who']))
        if($_POST['who']=='corp')
        {
            $corp=Corporate::find_by_username($_POST['username']);
            if(!isset($corp))
            {
                $corp=new Corporate();
                $corp->get_values();
                $corp->password=md5($corp->password);
                $corp->save();
                $corpSession->login($corp);
                $files=File::get_files();
                if(isset($files))
                {
                    $dp=$files[0];
                    $dp->name=$corp->username;
                    $dp->save_file_in(UPLOAD_DIR.'corporates/');
                }
            }
        }
        elseif($_POST['who']=='ngo')
        {
            $ngo=Ngo::find_by_username($_POST['username']);
            if(!isset($ngo))
            {
                $ngo=new Ngo();
                $ngo->get_values();
                $ngo->password=md5($ngo->password);
                $ngo->save();
                $ngoSession->login($ngo);
                $files=File::get_files();
                if(isset($files))
                {
                    $dp=$files[0];
                    $dp->name=$ngo->username;
                    $dp->save_file_in(UPLOAD_DIR.'ngos/');
                }
            }
        }
    $causes=Cause::find_random(6);
    $projects=Project::find_random(5);
    $partners=Partner::find_all();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal, Kunal Bajpai">

    <title>Changemaker | Be The Change</title>

    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href='http://fonts.googleapis.com/css?family=Della+Respira' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/changemaker.css" rel="stylesheet">
    
  </head>

  <body>
    <?php require_once(LIB_PATH."/navbar.php"); ?>
    
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('../images/back1.jpg');"></div>
            <div class="carousel-caption">
              <h1>You can change the world!</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('../images/back2.jpg');"></div>
            <div class="carousel-caption">
              <h1>Social Issues will never rest. Give a thought! </h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('../images/back3.jpg');"></div>
            <div class="carousel-caption">
              <h1>Before it's too late...</h1>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    </div>

    <div class="section" id="tellus" style="display:<?php if(!$corpSession->is_logged_in() && !$ngoSession->is_logged_in() && !$volSession->is_logged_in()) {echo 'block';} else {echo 'none';}?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>Tell us who you are?</h3>
          </div>
        </div><!-- /.row -->

        <div class="row">
        <a data-toggle="modal" href="#NGOModal" class="button-link">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-xs-offset-2">
            <button type="button" class="btn btn-primary btn-block shadow" ><h3>NGO</h3>
          </div>
        </a>
        <a data-toggle="modal" href="#CorporateModal" class="button-link">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-primary btn-block shadow"><h3>Corporate</h3>
          </div>
        </a>
        <a data-toggle="modal" href="#VolunteerModal" class="button-link">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-primary btn-block shadow"><h3>Volunteer</h3>
          </div>
        </a>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section -->
   
    <div class="section-colored">

      <div class="container">
      <div class="row text-center">
        <?php
            for($i=0;$i<2;$i++)
                if(isset($projects[$i]))
                {
                    if(file_exists(UPLOAD_DIR.'projects/Project'.$projects[$i]->id))
                        $path='/images/projects/Project'.$projects[$i]->id;
                    else
                        $path='/images/projects/default';
                    echo '<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm"><a href="project.php?id='.$projects[$i]->id.'"><img class="img-responsive img-home-portfolio" height="500px" width="300px" src="'.$path.'"></a></div>';
                }
        /*
          <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm">
            <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/500x300"></a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm">
            <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/500x300"></a>
          </div>*/
          ?>
          <div class="col-lg-4 col-md-4 col-sm-12 text-center" id="causes">
            <h3>View Projects By Cause</h3>
            <?php
                $body='';
                if(is_array($causes))
                    foreach($causes as $cause)
                        $body.="<a href='cause.php?id={$cause->id}'> {$cause->name}</a><br/>";
                echo "<h4>".$body."</h4>";
            
            /*<h4> <a href="cause1.html">Quality Education</a> | <a href="cause1.html">Environmental Impact</a></h4>
            <h4> <a href="cause1.html">National Health Concern</a> | <a href="cause1.html">Illiteracy</a></h4>
            <h4> <a href="cause1.html">Poverty</a> | <a href="cause1.html">Domestic Violence</a></h4>
            <h4> <a href="cause1.html">Human Trafficking</a> | <a href="cause1.html">Gender Discrimination</a></h4>
            <h4> <a href="cause1.html">Drug Abuse</a> | <a href="cause1.html">Population Explosion</a></h4>*/
            ?>
          </div>
        </div><!-- /.row -->
        <div class="row">
        <?php
        if(isset($projects[4]))
            for($i=2;$i<5;$i++)
                    if(isset($projects[$i]))
                    {
                        if(file_exists(UPLOAD_DIR.'projects/Project'.$projects[$i]->id))
                            $path='/images/projects/Project'.$projects[$i]->id;
                        else
                            $path='/images/projects/default';
                        echo '<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm"><a href="project.php?id='.$projects[$i]->id.'"><img class="img-responsive img-home-portfolio" height="500px" width="300px" src="'.$path.'"></a></div>';
                    }
        /*<div class="col-lg-4 col col-md-4 col-sm-4 hidden-xs hidden-sm pull-left">
            <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/500x300"></a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm">
            <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/500x300"></a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm">
            <a href="portfolio-item.html"><img class="img-responsive img-home-portfolio" src="http://placehold.it/500x300"></a>
          </div>*/
          ?>
        </div><!-- /.row -->
      </div><!-- /.container -->

    </div><!-- /.section-colored -->

      <div class="container">
         <br><br><br>
         <div class="fluid-wrapper hidden-xs hidden-sm">
          <iframe width="1280" height="640"  src="http://www.youtube.com/embed/DZ4MwTyM78o?rel=0" frameborder="0" allowfullscreen></iframe>
         </div>
        
      </div><!-- /.container -->
         <span class="hidden-xs hidden-sm">
         <br><br><br>
         </span>
    <div class="container">

      <div class="row">
        <div class="col-lg-12 col-md-12" align="center" >
          <hr>
          <h2>Make the change you believe in!</h2>
          <hr>
        </div>
        
      </div><!-- /.row -->

         <!-- Our Supporters -->

      <div class="row">

        <div class="col-lg-12">
          <h2 class="page-header">Our Partners</h2>
        </div>
        <?php
            if(is_array($partners))
                foreach($partners as $partner)
                {
                    if(file_exists(UPLOAD_DIR.'partners/Partner'.$partner->id))
                        $path='/images/partners/Partner'.$partner->id;
                    else
                        $path='/images/partners/default';
                    echo <<<END
              <div class="col-md-2 col-sm-4 col-xs-6">
          <a href="{$partner->url}" target="_blank"><h6>$partner->name</h6><img class="img-responsive img-customer" height="500px" width="300px" src="{$path}"></a>
        </div>      
END;
                }
        
        /*<div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>*/
        ?>

      </div>

    </div><!-- /.container -->
      <!-- footer -->
    <div class="container"> <!-- /.container -->
    <hr>
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; 2013 Changemaker. All Rights Reserved</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

	<?php require_once(LIB_PATH."/modals.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
  </body>
  <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
</html>
