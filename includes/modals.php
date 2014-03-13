    <div id="allmodals">
        <!-- Modal -->
          <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header modal-div" align="center">
		          <button type="button" class="close" id="ngoClose" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h3 class="modal-title">Add A Project</h3>
		        </div>
		        <div class="modal-body" align="center">
		          <form class="form-horizontal" role="form" id="addProjectForm" method='POST' enctype='multipart/form-data'>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="projectName" name="name" placeholder="Project name">
		                </div>
		              </div>
                      <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="projectTagline" name="tagline" placeholder="Tagline">
		                </div>
		              </div>
                      <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                     <textarea class="form-control" rows="6" placeholder="Description" id="projectDesc" name="description"></textarea>
                        </div>
	                  </div>
                      <div class="form-group">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <select class="form-control" name="cause_id">
                        <option value='0'>Select Cause</option>
                        <?php
                            if(is_array($allCauses))
                                foreach($allCauses as $cause)
                                    echo "<option value='{$cause->id}'>{$cause->name}</option>";
                        ?>
                      </select>
                      </div>
                      </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Funds acquired <input type="text" class="form-control" id="projectFundsAcqd" name="funds_acqd" placeholder="Funds acquired">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                 Funds required <input type="text" class="form-control" id="projectFundsReqd" name="funds_acqd" placeholder="Funds required">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Volunteers acquired <input type="text" class="form-control" id="projectVolsAcqd" name="vols_acqd" placeholder="Volunteers acquired">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Volunteers required <input type="text" class="form-control" id="projectVolsReqd" name="vols_reqd" placeholder="Volunteers required">
		                </div>
		              </div>
                      <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="file" id="projectDp" name="dp">
		                </div>
		              </div>
                      <div><h6 id='projectError' style='color:red'></h6></div>
		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" id='addProject' class="btn btn-primary btn-block">Add</button>
		                </div>
		              </div>
		            </form>

		          
		        </div>
		        <div class="modal-footer modal-div hidden-lg">
		          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
          
          <!-- Modal -->
           <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header modal-div" align="center">
		          <button type="button" class="close" id="ngoClose" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h3 class="modal-title">Edit Project</h3>
		        </div>
		        <div class="modal-body" align="center">
		          <form class="form-horizontal" role="form" id="editProjectForm" method='POST' enctype='multipart/form-data'>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="editProjectName" value="<?php echo $project->name; ?>" name="name" placeholder="Project name">
		                </div>
		              </div>
                      <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="editProjectTagline" value="<?php echo $project->tagline; ?>" name="tagline" placeholder="Tagline">
		                </div>
		              </div>
                      <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                     <textarea name="" class="form-control" rows="6" placeholder="Description" id="editProjectDesc" name="description"><?php echo $project->description; ?></textarea>
                        </div>
	                  </div>
                      <div class="form-group">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <select class="form-control" name="cause_id">
                        <option value='0'>Select Cause</option>
                        <?php
                            if(is_array($allCauses))
                                foreach($allCauses as $cause)
                                {
                                    if($project->cause_id==$cause->id)
                                        echo "<option value='{$cause->id}' selected>{$cause->name}</option>";
                                    else
                                        echo "<option value='{$cause->id}'>{$cause->name}</option>";
                                }
                        ?>
                      </select>
                      </div>
                      </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Funds acquired <input type="text" class="form-control" value="<?php echo $project->funds_acqd; ?>" id="editProjectFundsAcqd" name="funds_acqd" placeholder="Funds acquired">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                 Funds required <input type="text" class="form-control" value="<?php echo $project->funds_reqd; ?>" id="editProjectFundsReqd" name="funds_reqd" placeholder="Funds required">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Volunteers acquired <input type="text" class="form-control" value="<?php echo $project->vols_acqd; ?>" id="editProjectVolsAcqd" name="vols_acqd" placeholder="Volunteers acquired">
		                </div>
		              </div>
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  Volunteers required <input type="text" class="form-control" value="<?php echo $project->vols_reqd; ?>" id="editProjectVolsReqd" name="vols_reqd" placeholder="Volunteers required">
		                </div>
		              </div>
                      <div class="form-group">
                        <div>
		                  <input type="checkbox" class="form-control" value="1" id="delete_dp" name="delete_dp"/><label for="delete_dp">Delete display picture</label>
		                </div>
		              </div>
                      <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="file" id="projectDp" name="dp">
		                </div>
		              </div>
                      <div><h6 id='editProjectError' style='color:red'></h6></div>
		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" id='editProject' class="btn btn-primary btn-block">Save</button>
		                </div>
		              </div>
		            </form>

		          
		        </div>
		        <div class="modal-footer modal-div hidden-lg">
		          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
          
		  <!-- Modal -->
		  <div class="modal fade" id="NGOModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header modal-div" align="center">
		          <button type="button" class="close" id="ngoClose" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h3 class="modal-title">NGO Sign In</h3>
		        </div>
		        <div class="modal-body" align="center">
		          <form class="form-horizontal" role="form" method='POST'>
                    <div id='status' ><h6 id='ngoLoginStatus'></h6></div>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="ngoUsername" placeholder="Username">
		                </div>
		              </div>
                        <input type='hidden' name='who' value='ngo' />
		              <div class="form-group">
		                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" id="ngoPassword" placeholder="Password">
		                </div>
		              </div>

		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" id='ngoLogin' class="btn btn-success btn-block">Sign In</button>
		                </div>
		              </div>
		            </form>
		            <span class="text-center">
		            <h4 class="lead">----Or Sign Up----</h4>
		           	</span>

		           	<form class="form-horizontal" role="form" id='ngoSignupForm' action='/index.php' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='who' value='ngo'/>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="name" id="ngoNameSU" placeholder="Name">
		                </div>
		              </div>
                    <div ><h6 id='ngoSignupStatus'></h6></div>
    	              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="username" id="ngoUsernameSU" placeholder="Username">
		                </div>
		              </div>
                      
    	              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="tagline" id="ngoTaglineSU" placeholder="Tagline">
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <textarea name="" class="form-control" id="ngoDescSU" name="description" rows="4" placeholder="Description"></textarea>
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" name="password" id="ngoPassSU" placeholder="Password">
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" id="ngoRepPass" placeholder="Repeat Password">
		                </div>
		              </div>
                      <div><h6 id='ngoPassMatch'></h6></div>
                      <div class="form-group">
                        <div class="col-lg-12 ">
		                  <input type="file" class="form-control" name="dp" id="">
		                </div>
		              </div>
  
		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
		                </div>
		              </div>
		            </form>

		          
		        </div>
		        <div class="modal-footer modal-div hidden-lg">
		          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->

		           <!-- Modal -->
		  <div class="modal fade" id="CorporateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header modal-div" align="center">
		          <button type="button" class="close" id="corpClose" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h3 class="modal-title">Corporate Sign In</h3>
		        </div>
		        <div class="modal-body" align="center">
		          <form class="form-horizontal" role="form" method='POST'>
                    <div id='status' ><h6 id='corpLoginStatus'></h6></div>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" id="corpUsername" name='username' placeholder="Username">
		                </div>
		              </div>

		              <div class="form-group">
		                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" id="corpPassword" name='password' placeholder="Password">
		                </div>
		              </div>
                        <input type='hidden' name='who' value='corp' />
		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" id='corpLogin' class="btn btn-success btn-block">Sign In</button>
		                </div>
		              </div>
		            </form>
		            <span class="text-center">
		            <h4 class="lead">----Or Sign Up----</h4>
		           	</span>

    	           	<form class="form-horizontal" role="form" id='corpSignupForm' action='/index.php' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='who' value='corp'/>
		              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="name" id="corpNameSU" placeholder="Name">
		                </div>
		              </div>
                    <div ><h6 id='corpSignupStatus'></h6></div>
    	              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="username" id="corpUsernameSU" placeholder="Username">
		                </div>
		              </div>
                      
    	              <div class="form-group">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <input type="text" class="form-control" name="tagline" id="corpTaglineSU" placeholder="Tagline">
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <textarea name="" class="form-control" id="corpDescSU" name="description" rows="4" placeholder="Description"></textarea>
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" name="password" id="corpPassSU" placeholder="Password">
		                </div>
		              </div>
                      
                      <div class="form-group">
    	                <div class="col-lg-12 ">
		                  <input type="password" class="form-control" id="corpRepPass" placeholder="Repeat Password">
		                </div>
		              </div>
                      <div><h6 id='corpPassMatch'></h6></div>
                      <div class="form-group">
                        <div class="col-lg-12 ">
		                  <input type="file" class="form-control" name="dp" id="">
		                </div>
		              </div>

		              <div class="form-group">
		                <div class="col-lg-12">
		                  <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
		                </div>
		              </div>
		            </form>
		            

		        </div>
		        <div class="modal-footer modal-div hidden-lg">
		          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
		

             <!-- Modal -->
		  <div class="modal fade" id="VolunteerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header modal-div" align="center">
		          <button type="button" id="volunteerClose" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h3 class="modal-title">Volunteer Sign In</h3>
		        </div>
		        <div class="modal-body" align="center">
                <br><br>
                    <div class="fb-login-button" data-size="large" autologoutlink='true' scope="email,user_birthday,publish_actions"></div>

		        </div>
		        <div class="modal-footer modal-div hidden-lg">
		          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
		        </div>
		      </div>--><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
	</div><!--  ALLNODALS FINISH HERE -->