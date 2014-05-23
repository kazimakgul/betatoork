<style>

.form-signin {
  max-width: 400px; 
  display:block;
  background-color: #f7f7f7;
  -moz-box-shadow: 0 0 3px 3px #888;
    -webkit-box-shadow: 0 0 3px 3px #888;
  box-shadow: 0 0 3px 3px #888;
  border-radius:2px;
}
.main{
  padding: 38px;
}
.social-box{
  margin: 0 auto;
  padding: 20px;
  border-bottom:1px #ccc solid;
}
.social-box a{
  font-weight:bold;
  font-size:18px;
  padding:8px;
}
.social-box a i{
  font-weight:bold;
  font-size:20px;
}
.heading-desc{
  font-size:20px;
  font-weight:bold;
  padding:38px 38px 0px 38px;
  
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: 20px;
  padding: 20px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: 10px;
  border-radius: 5px;
  
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-radius: 5px;
}
.login-footer{
  background:#f0f0f0;
  margin: 0 auto;
  border-top: 1px solid #dadada;
  padding:20px;
}
.login-footer .left-section a{
  font-weight:bold;
  color:#8a8a8a;
  line-height:19px;
}
.mg-btm{
  margin-bottom:20px;
}
.ads_code iframe{
	width:405px;
	max-height:90px;
	
}
.no_margin{
	margin:0 !important;
}
</style>


<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="col-sm-offset-2">
    <form class="form-signin mg-btm">
      <h3 class="heading-desc">
    <button type="button" class="close pull-right" aria-hidden="true" data-dismiss="modal">×</button>
    Login to Clone</h3>
      <div class="social-box">
        <div class="row mg-btm">
        <div class="col-md-12">
          <a href="#" id="facebookreg" class="btn btn-primary btn-block">
            <i class="fa fa-facebook-square"></i> Login with Facebook
          </a>
        </div>
        </div>
      </div>
    <div class="main">  
        
    <input type="text" class="form-control" id="txt_signusername" placeholder="Username or Email" autofocus>
    <input type="password" class="form-control" id="txt_signpass" placeholder="Password">
     
        Are you a business? <a href=""> Get started here</a>
    <span class="clearfix"></span>  
        </div>
    <div class="login-footer">
    <div class="row">
          <div class="col-xs-6 col-md-6">
            <div class="left-section">
              <a data-toggle="modal" data-target="#password" data-dismiss="modal" href="" >Forgot your password?</a>
              <a data-toggle="modal" data-target="#register" data-dismiss="modal" href="">Sign up now</a>
            </div>
          </div>
        <div class="col-xs-6 col-md-6 pull-right">
            <button type="submit" id="t_gatekeeper_login_btn" class="btn btn-large btn-primary pull-right">Login</button>
        </div>
    </div>
    
    </div>
    </form>
  </div>
  </div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="col-sm-offset-2">
    <form class="form-signin mg-btm">
      <h3 class="heading-desc">
    <button type="button" class="close pull-right" aria-hidden="true" data-dismiss="modal">×</button>
    Register with Clone</h3>
      <div class="social-box">
        <div class="row mg-btm">
        <div class="col-md-12">
          <a href="#" class="btn btn-primary btn-block">
            <i class="fa fa-facebook-square"></i> Register with Facebook
          </a>
        </div>
        </div>
      </div>
    <div class="main"> 

    <input type="text" class="form-control" placeholder="Username" autofocus>
    <input type="text" class="form-control" placeholder="Email" autofocus>
    <input type="password" class="form-control" placeholder="Password">
     
        Are you a business? <a href="#"> Get started here</a>
    <span class="clearfix"></span>  
        </div>
    <div class="login-footer">
    <div class="row">
          <div class="col-xs-6 col-md-6">
            <div class="left-section">
              
              <button data-toggle="modal" data-target="#login" data-dismiss="modal" class="btn-large btn btn-default">Login Now</button>
            </div>
          </div>
        <div class="col-xs-6 col-md-6 pull-right">
            <button type="submit" class="btn btn-large btn-primary pull-right">Register</button>
        </div>
    </div>
    
    </div>
    </form>
  </div>
  </div>
</div>



<!-- Password Modal -->
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="col-sm-offset-2">
    <form class="form-signin mg-btm">
      <h3 class="heading-desc">
    <button type="button" class="close pull-right" aria-hidden="true" data-dismiss="modal">×</button>
    Request Password</h3>

    <div class="main"> 

    <input type="text" class="form-control" placeholder="Username or Email" autofocus>

    <span class="clearfix"></span>  
        </div>
    <div class="login-footer">
    <div class="row">
          <div class="col-xs-6 col-md-6">
            <div class="left-section">
              <a data-toggle="modal" data-target="#login" data-dismiss="modal" class="btn btn-default">Login Now</a>
            </div>
          </div>
        <div class="col-xs-6 col-md-6 pull-right">
            <button type="submit" class="btn btn-large btn-primary pull-right">Submit</button>
        </div>
    </div>
    
    </div>
    </form>
  </div>
  </div>
</div>


<!-- Contact Modal -->
        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any questions? Feel free to contact us.</h4>
                    </div>
                    <form action="../contactmail/<?=$user_id?>" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 25px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="firstname" placeholder="Firstname" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="lastname" placeholder="Lastname" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <input type="submit" class="btn btn-success" value="Send"/>
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <input type="reset" class="btn btn-danger" value="Clear" />
                                <!--<span class="glyphicon glyphicon-remove"></span>-->
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

    <!-- About Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About <?=$user["User"]["username"];?></h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-circle',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('id'=>'user_avatar','class'=>'img-circle','onerror'=>'imgError(this,"avatar");'));  }
                    ?>
					<h3 class="media-heading"><?=$user["User"]["username"];?> <small><?=$user["Country"]["name"];?></small></h3>
                    <span><strong>Details: </strong></span>
                        <span class="label label-warning"><?=$user["Userstat"]["subscribeto"];?> Followers</span>
                        <span class="label label-info"><?=$user["Userstat"]["subscribe"];?> Following</span>
                        <span class="label label-danger"><?=$user["Userstat"]["favoritecount"];?>  Favorites</span>
                        <span class="label label-success"><?=$user["Userstat"]["uploadcount"];?>  Games</span>
                    </center>
                    <hr>
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                       <?=$user["User"]["description"];?> </p>
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Socialesman</button>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Avatar Change Modal begins -->
    <div class="modal fade" id="pictureChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                
                <?php 
				$avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','avatar_image',$user_id));
				$url=$avatar_image_url;
				?>
                <iframe id='avatarframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
                
            </div>
        </div>
    </div>
    <!-- Avatar Change Modal ends -->
	
	<!-- Cover Change Modal begins -->
    <div class="modal fade" id="coverChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
				$avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','cover_image',$user_id));
				$url=$avatar_image_url;
				?>
                <iframe id='coverframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
	<!-- Cover Change Modal ends -->
	
		
	<!-- Ads Change Modal begins -->
    <div class="modal fade" id="adsChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
			<div class="modal-content">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Ads <?=$user["User"]["username"];?></h4>
                    </div>
                <div class="modal-body">
                    <center>
							<div class="row">
						        <div class="col-md-12">
						        <div class="table-responsive">
						              <table id="mytable" class="table table-bordred table-striped">
						                   <thead>
						                   <th><input type="checkbox" id="checkall" /></th>
						                   <th width='150px'>Ads Name</th>
						                   <th>Ads Code</th>
						                   <th>Edit</th>
						                   <th>Delete</th>
						                   </thead>
										    <tbody>
										    <tr>
										    <td><input type="checkbox" class="checkthis" /></td>
										    <td>728X90 Adsense google</td>
										    <td>
										    	<textarea cols="60" rows="3"  readonly><iframe id="google_ads_frame1" name="google_ads_frame1" width="728" height="90" frameborder="0" src="http://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-8631770984631666&amp;output=html&amp;h=90&amp;slotname=9075184493&amp;adk=4113598055&amp;w=728&amp;lmt=1400049208&amp;flash=13.0.0&amp;url=http%3A%2F%2Flocalhost%2Fbetatoork%2Fbusinesses%2Fplay%2F3&amp;dt=1400060007848&amp;bpp=12&amp;bdt=101&amp;shv=r20140508&amp;cbv=r20140417&amp;saldr=sa&amp;correlator=1400060008304&amp;frm=20&amp;ga_vid=1113137943.1400060008&amp;ga_sid=1400060008&amp;ga_hid=1620247184&amp;ga_fc=0&amp;u_tz=180&amp;u_his=2&amp;u_java=1&amp;u_h=800&amp;u_w=1280&amp;u_ah=727&amp;u_aw=1280&amp;u_cd=24&amp;u_nplug=11&amp;u_nmime=68&amp;dff=helvetica%20neue&amp;dfs=14&amp;adx=263&amp;ady=80&amp;biw=1265&amp;bih=632&amp;eid=317150304&amp;oid=3&amp;rx=0&amp;eae=0&amp;vis=1&amp;fu=0&amp;ifi=1&amp;xpc=1lLTvMW2CP&amp;p=http%3A//localhost&amp;dtd=472" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no"></iframe></textarea>
										    </td>
										    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
										    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
										    </tr>
										    
										        <tr>
										    <td><input type="checkbox" class="checkthis" /></td>
										    <td>728X90 Adsense google</td>
										    <td>
										    	<textarea cols="60" rows="3"  readonly>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</textarea></td>
										    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
										    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
										    </tr>
										    
										    
										        <tr>
										    <td><input type="checkbox" class="checkthis" /></td>
										    <td>728X90 Adsense google</td>
										    <td>
										    	<textarea cols="60" rows="3"  readonly>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</textarea></td>
										    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
										    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
										    </tr>
										    </tbody>
										</table>
					            </div>
					        </div>
						</div>
					
						<!-- Edit-->
						<div class="modal fade modal" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
						      <div class="modal-dialog">
						    <div class="modal-content">
						          <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
						      </div>
						          <div class="modal-body">
						          <div class="form-group">
						        <input class="form-control " type="text" placeholder="Mohsin">
						        </div>
						        <div class="form-group">
						        
						        <input class="form-control " type="text" placeholder="Irshad">
						        </div>
						        <div class="form-group">
						        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
						        </div>
						      </div>
						          <div class="modal-footer ">
						        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
						      </div>
						        </div>
						    <!-- /.modal-content --> 
						  </div>
						      <!-- /.modal-dialog --> 
						    </div>
						    
						    
					
						<!-- Delete-->
						    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
						      <div class="modal-dialog">
						    <div class="modal-content">
						          <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
						      </div>
						          <div class="modal-body">
						       
						       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
						       
						      </div>
						        <div class="modal-footer ">
						        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
						        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span> No</button>
						      </div>
						        </div>
						    <!-- /.modal-content --> 
						  </div>
						      <!-- /.modal-dialog --> 
						    </div>
                    	<?
                    	//print_r($user);
						?>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    	<ul class="pagination no_margin">
						  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
						  <li class="active"><a href="#">1</a></li>
						  <li><a href="#">2</a></li>
						  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
						</ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
	<!-- Ads Change Modal ends -->

 
<!-- Add Game Modal begins -->
<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:5px;">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">My Games</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Clone Games</a></li>
              <li class=""><a href="#why" data-toggle="tab">Game Add</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
        <p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>JoeSixPack@Sixpacksrus.com</a> for any other inquiries.</p>
        </div>
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal">
            <fieldset>
           <?php  
		        $tt = 1;
				echo $this->element('business/games/tutorialgame',array('tutorialgame'=>$tt));
				echo $this->element('business/components/pagination'); 
		    ?>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal">
            <fieldset>
            <?php
            	$tt = 2;
				echo $this->element('business/games/tutorialgame',array('tutorialgame'=>$tt));
				echo $this->element('business/components/pagination'); 
			?>  
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>





<!--Add Game Modal begins -->



