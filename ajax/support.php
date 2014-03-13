<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_POST['action']) && isset($_POST['what']) && isset($_POST['id']))
        switch($_POST['what'])
        {
            case 'cause':
                if($_POST['action']==0)
                {
                    $cause=Cause::find_by_id($_POST['id']);
                    if($ngoSession->is_logged_in() && isset($cause))
                        if($ngoSession->logged_in_user()->supports_cause($cause))
                            $ngoSession->logged_in_user()->unsupport_cause($cause);
                    if($corpSession->is_logged_in() && isset($cause))
                        if($corpSession->logged_in_user()->supports_cause($cause))
                            $corpSession->logged_in_user()->unsupport_cause($cause);
                    if($volSession->is_logged_in() && isset($cause))
                        if($volSession->logged_in_user()->supports_cause($cause))
                            $volSession->logged_in_user()->unsupport_cause($cause);
                    echo 0;
                }
                elseif($_POST['action']==1)
                {
                    $cause=Cause::find_by_id($_POST['id']);
                    if($ngoSession->is_logged_in() && isset($cause))
                        if(!$ngoSession->logged_in_user()->supports_cause($cause))
                            $ngoSession->logged_in_user()->support_cause($cause);
                    if($corpSession->is_logged_in() && isset($cause))
                        if(!$corpSession->logged_in_user()->supports_cause($cause))
                            $corpSession->logged_in_user()->support_cause($cause);
                    if($volSession->is_logged_in() && isset($cause))
                        if(!$volSession->logged_in_user()->supports_cause($cause))
                            $volSession->logged_in_user()->support_cause($cause);
                    echo 1;
                }
                break;
            case 'ngo':
                if($_POST['action']==0)
                {
                    $ngo=Ngo::find_by_id($_POST['id']);
                    if($volSession->is_logged_in() && isset($ngo))
                        if($volSession->logged_in_user()->supports_ngo($ngo))
                            $volSession->logged_in_user()->unsupport_ngo($ngo);
                    echo 0;
                }
                elseif($_POST['action']==1)
                {
                    $ngo=Ngo::find_by_id($_POST['id']);
                    if($volSession->is_logged_in() && isset($ngo))
                        if(!$volSession->logged_in_user()->supports_ngo($ngo))
                            $volSession->logged_in_user()->support_ngo($ngo);
                    echo 1;
                }
                break;
            case 'project':
                if($_POST['action']==0)
                {
                    $project=Project::find_by_id($_POST['id']);
                    if($corpSession->is_logged_in() && isset($project))
                        if($corpSession->logged_in_user()->supports_project($project))
                            $corpSession->logged_in_user()->unsupport_project($project);
                    if($volSession->is_logged_in() && isset($project))
                        if($volSession->logged_in_user()->supports_project($project))
                            $volSession->logged_in_user()->unsupport_project($project);
                    echo 0;
                }
                elseif($_POST['action']==1)
                {
                    $project=Project::find_by_id($_POST['id']);
                    if($corpSession->is_logged_in() && isset($project))
                        if(!$corpSession->logged_in_user()->supports_project($project))
                            $corpSession->logged_in_user()->support_project($project);
                    if($volSession->is_logged_in() && isset($project))
                        if(!$volSession->logged_in_user()->supports_project($project))
                            $volSession->logged_in_user()->support_project($project);
                    echo 1;
                }
                break;
        }
?>