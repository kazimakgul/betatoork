
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
                        echo $this->Html->image("/img/avatars/".$avatarImage.".jpg", array('class'=>'img-circle',"alt" => "clone user image")); 
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
						                   <th width='150px'>Ads Name</th>
						                   <th>Ads Code</th>
						                   <th>Set</th>
						          
						                   </thead>
										    <tbody>
										    
                                            <?php foreach($adcodes as $code){ ?>

                                            <tr>
										    <td><?php echo $code['Adcode']['name'];?></td>
										    <td>
										    	<textarea cols="60" rows="3"  readonly><?php echo $code['Adcode']['code'];?></textarea>
										    </td>
										    <td><p><button class="btn btn-success" data-title="Edit" data-toggle="modal" data-target="#set" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-ok-sign"></span></button></p></td>
										    </tr>

                                            <?php } ?>
										   
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
                    	<button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Add New Ad Code</button>
                        <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span> Manage</button>
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


