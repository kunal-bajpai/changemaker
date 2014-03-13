<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_GET['id']))
        $project=Project::find_by_id($_GET['id']);
    if(sizeof($_POST)>0 && isset($project))
    {
        if($_POST['delete_dp']==1)
            if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id))
                unlink(UPLOAD_DIR.'projects/Project'.$project->id);
        $project->get_values();
        $project->funds_acqd=str_replace(',','',$project->funds_acqd);
        $project->funds_reqd=str_replace(',','',$project->funds_reqd);
        $project->vols_acqd=str_replace(',','',$project->vols_acqd);
        $project->vols_reqd=str_replace(',','',$project->vols_reqd);
        $project->save();
        $files=File::get_files();
        if(is_array($files) && $files[0]->is_image())
        {
            if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id))
                unlink(UPLOAD_DIR.'projects/Project'.$project->id);
            $dp=$files[0];
            $dp->name='Project'.$project->id;
            $dp->save_file_in(UPLOAD_DIR.'projects/');
        }
    }
    if(isset($project))
    {
        $corps=$project->find_corporates();
        $related=$project->find_related_projects(4);
        $showButton=($corpSession->is_logged_in() || $volSession->is_logged_in());
        if($corpSession->is_logged_in())
            $showSupport=!$corpSession->logged_in_user()->supports_project($project);
        elseif($volSession->is_logged_in())
            $showSupport=!$volSession->logged_in_user()->supports_project($project);
    }
    $allCauses=Cause::find_all();
?>
<!DOCTYPE html>
<html lang="en">
   <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# changemaker_be: http://ogp.me/ns/fb/changemaker_be#">
      <meta property="fb:app_id" content="514334008665907" /> 
      <meta property="og:type"   content="changemaker_be:project" /> 
      <meta property="og:url"    content="http://www.changemaker.be/project.php?id=<?php echo $project->id;?>" /> 
      <meta property="og:title"  content="<?php echo $project->name; ?>" /> 
      <meta property="og:image"  content="http://www.changemaker.be/images/projects/<?php if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id)) {echo 'Project'.$project->id;} else {echo 'default';}?>" /> 
      <meta property="og:description"  content="<?php echo $project->tagline;?>" /> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal, Kunal Bajpai">

    <title>Project Name - Changemaker.Be</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS here -->
    <link href="css/changemaker.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
    <?php require_once(LIB_PATH."/navbar.php"); ?>

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header"><?php echo $project->name; ?> <small><?php echo $project->tagline; ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo $project->name; ?></li>
          </ol>
        </div>

      </div>

      <div class="row">

        <div class="col-md-8">
          <img class="img-responsive" height="750px" width="500px" src="<?php if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id)) {echo '/images/projects/Project'.$project->id;} else {echo '/images/projects/default';}?>">
        </div>

        <div class="col-md-4">
          <h3>Project Description</h3>
          <p><?php echo $project->description; ?></p>
          <h3>Project Details</h3>
          <ul>
            <?php if($ngoSession->logged_in_user()->id==$project->ngo_id) {echo '<li><a data-toggle="modal" href="#Edit">Edit</a>';} ?>
            <li>Funding Required: <br> <br>
              <div class="progress progress-striped">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php if($project->funds_reqd!=0) {$percent=($project->funds_acqd/$project->funds_reqd)*100;} else {$percent=100;};echo $percent;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(isset($percent)) {echo $percent;} else echo 0;?>%;">
                  <span class="sr-only"><?php echo $percent; ?>% Complete</span>
                </div>
              </div>
              <strong> <i class="fa fa-inr"></i> <?php echo number_format($project->funds_acqd).'/'.number_format($project->funds_reqd); ?> </strong>
            </li>
            <li>Volunteer Required: <br> <br>
              <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php if($project->vols_reqd!=0) {$percent=($project->vols_acqd/$project->vols_reqd)*100;} else {$percent=100;};echo $percent;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(isset($percent)) {echo $percent;} else echo 0;?>%">
                    <span class="sr-only"><?php echo $percent; ?>% Complete (success)</span>
                  </div>
                </div>
                <strong> <i class="fa fa-group"></i> <?php echo number_format($project->vols_acqd).'/'.number_format($project->vols_reqd); ?> </strong>
            </li>
            <li>Funding Corporates:
            <ul>
            <?php
                if(is_array($corps))
                    foreach($corps as $corp)
                        echo "<li><a href='corporate.php?id={$corp->id}'>{$corp->name}</a></li>";
            ?></ul></li>
            <li>Number of supporters: <strong><?php echo $project->supporters(); ?></strong></li>
            <hr>
            <button class="btn btn-success" id="support" onclick="changeSupport('project',<?php echo $project->id?>,1)" style="display:<?php if($showButton && $showSupport) {echo 'block';} else {echo 'none';} ?>">Support</button>
            <button class="btn btn-danger" id="unsupport" onclick="changeSupport('project',<?php echo $project->id?>,0)" style="display:<?php if($showButton && !$showSupport) {echo 'block';} else {echo 'none';} ?>">Unsupport</button>
          </ul>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">
          <h3 class="page-header">Related Projects</h3>
        </div>
        <?php
            if(isset($related))
                foreach($related as $proj)
                {
                    if(file_exists(UPLOAD_DIR.'projects/Project'.$proj->id))
                        $path='/images/projects/Project'.$proj->id;
                    else 
                        $path='/images/projects/default';
                    echo <<<END
                        <div class="col-sm-3 col-xs-6">
            <a href="project.php?id={$proj->id}"><img class="img-responsive img-customer" height="500px" width="300px" src="{$path}"></a>
        </div>
END;
                }
        /*
        <div class="col-sm-3 col-xs-6">
        	<a href="#"><img class="img-responsive img-customer" src="http://placehold.it/500x300"></a>
        </div>

        <div class="col-sm-3 col-xs-6">
        	<a href="#"><img class="img-responsive img-customer" src="http://placehold.it/500x300"></a>
        </div>

        <div class="col-sm-3 col-xs-6">
        	<a href="#"><img class="img-responsive img-customer" src="http://placehold.it/500x300"></a>
        </div>

        <div class="col-sm-3 col-xs-6">
        	<a href="#"><img class="img-responsive img-customer" src="http://placehold.it/500x300"></a>
        </div>*/
        ?>

      </div>

    </div><!-- /.container -->
    
         <?php require_once(LIB_PATH."/modals.php"); ?>

    <div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; 2013 Changemaker. All Rights Reserved</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src="js/editProject.js"></script>
    <script src="js/support.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>