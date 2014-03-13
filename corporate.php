<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_GET['id']))
        $corp=Corporate::find_by_id($_GET['id']);
    if(isset($corp))
        $projects=$corp->find_projects();
    $i=1;
?>
<!DOCTYPE html>
<html lang="en">
   <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# changemaker_be: http://ogp.me/ns/fb/changemaker_be#">
      <meta property="fb:app_id"        content="514334008665907" /> 
      <meta property="og:type"          content="changemaker_be:corporate" /> 
      <meta property="og:url"           content="http://www.changemaker.be/corporate.php?id=<?php echo $corp->id;?>" /> 
      <meta property="og:title"         content="<?php echo $corp->name;?>" /> 
      <meta property="og:image"         content="https://fbstatic-a.akamaihd.net/images/devsite/attachment_blank.png" />      
      <meta property="og:description"         content="<?php echo $corp->description;?>" />      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal, Kunal Bajpai">

    <title><?php echo $corp->name; ?> - Changemaker.Be</title>
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
            <img src="<?php if(file_exists(UPLOAD_DIR.'corporates/'.$corp->username)) {echo '/images/corporates/'.$corp->username;} else {echo '/images/corporates/default';} ?>" height="200px" width="200px" class="img-responsive profile-pic">
            <hr>
            </div>
            <ul class="nav nav-stacked nav-pills">
              <li class="active"><a href="#">My profile</a></li>
            </ul>
        </div>
       </div>
      
        <div class="col-lg-9 col-md-9 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">
          <h1 class="page-header"><?php echo $corp->name; ?><small><?php echo $corp->tagline; ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Changemaker</a></li>
            <li class="active"><?php echo $corp->name; ?></li>
          </ol>
          <p><?php echo $corp->description;?></p>
        </div>

        <div class="col-md-9 col-sm-12 col-md-offset-3">
            <hr>
            <h3>Projects supported: </h3>
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
                    if($i%2!=0)
                        echo <<<END
                        <div class="col-md-4 col-md-offset-3 portfolio-item">
                          <a href="project.php?id={$project->id}"><img class="img-responsive" height="700px" width="400px" src="{$path}"></a>
                          <h3><a href="project.php?id={$project->id}">{$project->name}</a></h3>
                          <p>{$project->tagline}</p>
                        </div>
END;
                    else
                        echo <<<END
                        <div class="col-md-4 portfolio-item">
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
        if($corpSession->logged_in_user()->id==$corp->id)
            $display='block';
        else
            $display='none';
         if($i%2!=0)
            echo <<<END
                <div class="col-md-4 col-md-offset-3">
                 <button type="button" style="display:{$display}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-inr fa-4x"></i><br>Support More Projects </button>
                </div>
END;
        else
            echo <<<END
                <div class="col-md-4">
                 <button type="button" style="display:{$display}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-inr fa-4x"></i><br>Support More Projects </button>
                </div>
END;

        ?>

      </div><!-- /.row -->

    </div><!-- /.container -->
    <?php require_once(LIB_PATH."/modals.php"); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>