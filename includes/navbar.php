<div id="fb-root"></div>
    <script src='/js/fbinit.js' type='text/javascript'></script>
    <nav class="navbar navbar-inverse navbar-fixed-top shadow" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="index.php">Changemaker.be</a>
        </div>

        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li class="dropdown dark-color">
              <a href="#" id="dropDownLabel" class="dropdown-toggle" data-toggle="dropdown"><?php
                if(!$ngoSession->is_logged_in() && !$corpSession->is_logged_in() && !$volSession->is_logged_in())
                    echo "Sign in";
                else
                    if($ngoSession->is_logged_in())
                        {
                            echo "Hi, ".$ngoSession->logged_in_user()->username;
                            $path='/ngo.php?id='.$ngoSession->logged_in_user()->id;
                        }
                    elseif($corpSession->is_logged_in())
                        {
                            echo "Hi, ".$corpSession->logged_in_user()->username;
                            $path='/corporate.php?id='.$corpSession->logged_in_user()->id;
                        }
                    elseif($volSession->is_logged_in())
                        {
                            echo "Hi, ".$volSession->logged_in_user()->first_name;
                        }
              ?><b class="caret"></b></a>
              <ul class="dropdown-menu" id="dropDown">
                <?php
                if(!$ngoSession->is_logged_in() && !$corpSession->is_logged_in() && !$volSession->is_logged_in())
                    echo <<<END
                    <li><a data-toggle="modal" href="#NGOModal">NGO</a></li>
                    <li><a data-toggle="modal" href="#CorporateModal">Corporate</a></li>
                    <li><a data-toggle="modal" href="#VolunteerModal">Volunteer</a></li>
END;
                else
                    echo <<<END
                    <li><a href="{$path}">My Profile</a></li><li><a href="logout.php">Logout</a></li>
END;
                ?>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>