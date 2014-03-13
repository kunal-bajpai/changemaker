<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_GET['id']))
        $ngo=Ngo::find_by_id($_GET['id']);
    if(isset($ngo) && isset($_POST['name']))
    {
        $project=new Project();
        unset($_GET['id']);
        $project->get_values();
        if($ngoSession->is_logged_in())
            $project->ngo_id=$ngoSession->logged_in_user()->id;
        $project->save();
        $files=File::get_files();
        if(isset($files))
        {
            $dp=$files[0];
            $dp->name='Project'.$project->id;
            $dp->save_file_in(UPLOAD_DIR.'projects/');
        }
    }
    if(isset($ngo))
    {
        $projects=$ngo->find_projects();
        $causes=$ngo->find_causes();
        $showButton=$volSession->is_logged_in();
        if($volSession->is_logged_in())
            $showSupport=!$volSession->logged_in_user()->supports_ngo($ngo);
    }
    $allCauses=Cause::find_all();
    $i=1;
?>
<!DOCTYPE html>
<html lang="en">
   <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# changemaker_be: http://ogp.me/ns/fb/changemaker_be#">
      <meta property="fb:app_id" content="514334008665907" /> 
      <meta property="og:type"   content="changemaker_be:ngo" /> 
      <meta property="og:url"   content="http://www.changemaker.be/ngo.php?id=<?php echo $ngo->id;?>" /> 
      <meta property="og:title" content="<?php echo $ngo->name;?>" /> 
      <meta property="og:image"  content="http://www.changemaker.be/images/ngos/<?php if(file_exists(UPLOAD_DIR.'ngos/'.$ngo->username)) {echo $ngo->username;} else {echo 'default';}?>" />
      <meta property="og:description"  content="<?php echo $ngo->tagline;?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal">

    <title><?php echo $ngo->name;?> - Changemaker.Be</title>
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

    <div class="container profile">
      
      <div class="row shift">
       	<div class="well sidebar-nav-fixed hidden-xs hidden-xs">
       	 <div class="col-md-12 col-lg-12">
            <div class="text-center">
            <img src="<?php if(file_exists(UPLOAD_DIR.'ngos/'.$ngo->username)) {echo '/images/ngos/'.$ngo->username;} else {echo '/images/ngos/default';}?>" height="200px" width="200px" class="img-responsive profile-pic">
            <hr>
            </div>
            <ul class="nav nav-stacked nav-pills">
              <li><button class="btn btn-success btn-block" id="support" onclick="changeSupport('ngo',<?php echo $ngo->id?>,1)" style="display:<?php if($showButton && $showSupport) {echo 'block';} else {echo 'none';} ?>">Support</button></li>
              <li><button class="btn btn-danger btn-block" id="unsupport" onclick="changeSupport('ngo',<?php echo $ngo->id?>,0)" style="display:<?php if($showButton && !$showSupport) {echo 'block';} else {echo 'none';} ?>">Unsupport</button></li>
              <li class="active" style="display:<?php if($ngoSession->logged_in_user()->id==$ngo->id) {echo 'block';} else {echo 'none';} ?>"><a href="#">My profile</a></li>
            </ul>
        </div>
       </div>
      
        <div class="col-lg-9 col-md-9 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">
          <h1 class="page-header"><?php echo $ngo->name; ?><small><?php echo $ngo->tagline; ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Changemaker</a></li>
            <li class="active"><?php echo $ngo->name;?></li>
          </ol>
          <p><?php echo $ngo->description;?></p>
        </div>
        <div class="col-md-9 col-sm-12 col-md-offset-3">
        <h3>Causes Supported: </h3>
            <ul><?php
                if(is_array($causes))
                    foreach($causes as $cause)
                        echo "<li><a href='cause.php?id={$cause->id}'>{$cause->name}</a></li>";
            /*
                <li><a href="cause.html">Cause 1</a></li>
                <li><a href="cause.html">Cause 2</a></li>
                <li><a href="cause.html">Cause 3</a></li>*/
                ?>
            </ul>
            <hr>
            <h3>My projects: </h3>
        </div>
        <?php
            if(is_array($projects))
            {
                foreach($projects as $project)
                {
                    if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id))
                        $path='/images/projects/Project'.$project->id;
                    else
                        $path='/images/projects/default';
                    if($i%2==0)
                        echo <<<END
                        <div class="col-md-4 portfolio-item">
                          <a href="project.php?id={$project->id}"><img class="img-responsive" height="700px" width="400px" src="{$path}"></a>
                          <h3><a href="project.php?id={$project->id}">{$project->name}</a></h3>
                          <p>{$project->tagline}</p>
                        </div>
END;
                    else
                        echo <<<END
                        <div class="col-md-4 col-md-offset-3 portfolio-item">
                          <a href="project.php?id={$project->id}"><img class="img-responsive" height="700px" width="400px" src="{$path}"></a>
                          <h3><a href="project.php?id={$project->id}">{$project->name}</a></h3>
                          <p>{$project->tagline}</p>
                        </div>
END;
                    $i++;
                }
            }
        
        /*<div class="col-md-4 col-md-offset-3 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/700x400"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-4 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/700x400"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-4 col-md-offset-3 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/700x400"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-4 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/700x400"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-4 col-md-offset-3 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive" src="http://placehold.it/700x400"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>*/
        
?>

        <div class="col-md-4 <?php if($i%2!=0) echo 'col-md-offset-3'; ?>" style="display:<?php if($ngoSession->is_logged_in() && $ngo->id==$ngoSession->logged_in_user()->id) {echo 'block';} else {echo 'none';} ?>">
            <a data-toggle="modal" href="#Add">    
                 <button type="button" class="btn btn-primary btn-lg btn-block">Add <i class="fa fa-plus-circle"></i></button>
             </a>
        </div>


      </div><!-- /.row -->

    </div><!-- /.container -->
    
     <?php require_once(LIB_PATH."/modals.php"); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src="js/project.js" type="text/javascript"></script>
    <script src="js/support.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>