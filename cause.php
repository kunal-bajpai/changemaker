<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_GET['id']))
        $cause=Cause::find_by_id($_GET['id']);
    if(isset($cause))
    {
        $articles=$cause->find_articles();
        $projects=$cause->find_projects();
        $ngos=$cause->find_ngos();
        $corps=$cause->find_corporates();
        $showButton=($ngoSession->is_logged_in() || $corpSession->is_logged_in() || $volSession->is_logged_in());
        if($ngoSession->is_logged_in())
            $showSupport=!$ngoSession->logged_in_user()->supports_cause($cause);
        elseif($corpSession->is_logged_in())
            $showSupport=!$corpSession->logged_in_user()->supports_cause($cause);
        elseif($volSession->is_logged_in())
            $showSupport=!$volSession->logged_in_user()->supports_cause($cause);
    }
    
?><!DOCTYPE html>
<html lang="en">
   <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# changemaker_be: http://ogp.me/ns/fb/changemaker_be#">
    <meta property="fb:app_id" content="514334008665907" /> 
    <meta property="og:type"   content="changemaker_be:cause" /> 
    <meta property="og:url"    content="http://www.changemaker.be/cause.php?id=<?php echo $cause->id;?>" /> 
    <meta property="og:title" content="<?php echo $cause->name;?>" /> 
    <meta property="og:image"  content="http://www.changemaker.be/images/cause.png" /> 
    <meta property="og:description"  content="<?php echo $cause->tagline;?>" /> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal, Kunal Bajpai">

    <title>Cause - Changemaker.Be</title>
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
        <div class="well sidebar-nav-fixed hidden-xs hidden-xs" style="height:100%">
         <div class="col-md-12 col-lg-12">
            <ul class="nav nav-stacked nav-pills">
              <li class="active"><h3>Articles<h3></a></li>
              <hr>
              <?php
                if(is_array($articles))
                    echo '<li><a href="article.php?id={$article->id}">{$article->head}</a></li>';
                else
                    echo "New articles coming soon!";
              /*<li><a href="article.html">Article Heading</a></li>
              <li><a href="article.html">Article Heading</a></li>
              <li><a href="article.html">Article Heading</a></li>
              <li><a href="article.html">Article Heading</a></li>
              <li><a href="article.html">Article Heading</a></li>
              <li><a href="article.html">Article Heading</a></li>*/
              ?>
            </ul>
        </div>
       </div>
      
        <div class="col-lg-9 col-md-9 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12 pull-right" id="shift">
          <h1 class="page-header"><?php echo $cause->name; ?><small><?php echo $cause->tagline; ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Changemaker</a></li>
            <li class="active">Cause</li>
          </ol>
          <p><?php echo $cause->description; ?></p>
          <button class="btn btn-success" id="support" onclick="changeSupport('cause',<?php echo $cause->id?>,1)" style="display:<?php if($showButton && $showSupport){echo 'block';} else {echo 'none';}?>">Support</button>
          <button class="btn btn-danger" id="unsupport" onclick="changeSupport('cause',<?php echo $cause->id?>,0)" style="display:<?php if($showButton && !$showSupport){echo 'block';} else {echo 'none';}?>">Unsupport</button>
        </div>

      <div class="col-lg-9 col-lg-offset-1 col-md-9  col-md-offset-1 col-sm-12 col-xs-12">
        <h3 class="col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">Projects:</h3>
        <?php
            $i=0;
            if(is_array($projects))
                foreach($projects as $project)
                {
                    if(file_exists(UPLOAD_DIR.'projects/Project'.$project->id))
                        $path='/images/projects/Project'.$project->id;
                    else
                        $path='/images/projects/default';
                    if($i==0)
                        echo '<div class="col-md-3 col-md-offset-3 portfolio-item">';
                    else
                        echo '<div class="col-md-3 portfolio-item">';
                    echo <<<END
          <a href="project.php?id={$project->id}"><img class="img-responsive hidden-xs" height="700px" width="500px" src="{$path}"></a>
          <h3><a href="project.php?id={$project->id}">{$project->name}</a></h3>
          <p>{$project->tagline}</p>
        </div>      
END;
$i++;
if($i>3)
{
    echo "<br/>";
    $i=0;
}
}
        
        /*<div class="col-md-3 col-md-offset-3 portfolio-item"> 
          <a href="portfolio-item.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="portfolio-item.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="portfolio-item.html">Project Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>*/
        ?>
      </div>

      <div class="col-lg-9 col-lg-offset-1 col-md-9  col-md-offset-1 col-sm-12 col-xs-12">
        <h3 class="col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">NGOs:</h3>
        <?php
            $i=0;
            if(is_array($ngos))
                foreach($ngos as $ngo)
                {
                    if(file_exists(UPLOAD_DIR.'ngos/'.$ngo->username))
                        $path='/images/ngos/'.$ngo->username;
                    else
                        $path='/images/ngos/default';
                   if($i==0)
                        echo '<div class="col-md-3 col-md-offset-3 portfolio-item">';
                    else
                        echo '<div class="col-md-3 portfolio-item">';
                    echo <<<END
          <a href="ngo.php?id={$ngo->id}"><img class="img-responsive hidden-xs" height="700px" width="500px" src="{$path}"></a>
          <h3><a href="ngo.php?id={$ngo->id}">{$ngo->name}</a></h3>
          <p>{$ngo->tagline}</p>
        </div>      
END;
$i++;
if($i>3)
{
    echo "<br/>";
    $i=0;
}
}
        /*<div class="col-md-3 col-md-offset-3 portfolio-item">
          <a href="ngoprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="ngoprofile.html">NGO Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="ngoprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="ngoprofile.html">NGO Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="ngoprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="ngoprofile.html">NGO Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>*/
        ?>
      </div>

      <div class="col-lg-9 col-lg-offset-1 col-md-9  col-md-offset-1 col-sm-12 col-xs-12">
        <h3 class="col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">Corporates:</h3>
                <?php
            $i=0;
            if(is_array($corps))
                foreach($corps as $corp)
                {
                    if(file_exists(UPLOAD_DIR.'corporates/'.$corp->username))
                        $path='/images/corporates/'.$corp->username;
                    else
                        $path='/images/corporates/default';
                   if($i==0)
                        echo '<div class="col-md-3 col-md-offset-3 portfolio-item">';
                    else
                        echo '<div class="col-md-3 portfolio-item">';
                    echo <<<END
          <a href="corporate.php?id={$corp->id}"><img class="img-responsive hidden-xs" height="700px" width="500px" src="{$path}"></a>
          <h3><a href="corporate.php?id={$corp->id}">{$corp->name}</a></h3>
          <p>{$corp->tagline}</p>
        </div>      
END;
$i++;
if($i>3)
{
    echo "<br/>";
    $i=0;
}
}
          /*<a href="corporateprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="corporateprofile.html">Corporate Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="corporateprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="corporateprofile.html">Corporate Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-3 portfolio-item">
          <a href="corporateprofile.html"><img class="img-responsive hidden-xs" src="http://placehold.it/700x500"></a>
          <h3><a href="corporateprofile.html">Corporate Name</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>*/
        ?>
      </div>
      </div><!-- /.row -->

    </div><!-- /.container -->

      <?php require_once(LIB_PATH."/modals.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src="js/support.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>