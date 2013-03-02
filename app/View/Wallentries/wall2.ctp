                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">
                            <ul class="content-header-action pull-right">
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-green color-white"><i class="icofont-plus-sign"></i></div>
                                        <div class="action-text color-green">8765 <span class="helper-font-small color-silver-dark">Visits</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-teal color-white"><i class="icofont-user-md"></i></div>
                                        <div class="action-text color-teal">1437 <span class="helper-font-small color-silver-dark">Users</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-orange color-white">$</div>
                                        <div class="action-text color-orange">4367 <span class="helper-font-small color-silver-dark">Orders</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-umbrella"></i> My Shared Games</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-nav-->
                            <ul class="breadcrumb-nav pull-right">
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Date</a></li>
                                        <li><a href="#">Rating</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Played</a></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link">
                                        <i class="icofont-money"></i> Orders <span class="color-red">(+12)</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link">
                                        <i class="icofont-user"></i> Users <span class="color-red">(+34)</span>
                                    </a>
                                </li>
                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icofont-home"></i> Dashboard</a> <span class="divider">&rsaquo;</span></li>
                                <li><a href="interface.html">My Games</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Data elements</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">



<div class="wall_leftside">
			<div id="wall_container">
				<div class="profilecover">
					<div class="upcover"></div>
					<div class="midcover">
						<img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_wallcover.jpg" />
						<div class="channeldescviewport">
							<div class="channelfeeddescback">
								<a href="javascript:void(0);" class="showdesc"></a>
								<div class="channelfeeddesc">
									
									<div class="channeldescinfo"><?php echo $channeldata['User']['description']; ?> <a style='color:#FFFFFF;' href="<?php echo $editlink; ?>">(Edit)</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="botcover"></div>
				</div>
				<div class="profilemenu">
					<ul class="wall_menu">
						<li class=""><a class="boardfeed wall_menu_item" href="<?php echo $feedlink; ?>"></a></li>
						<li class=""><a class="boardgames wall_menu_item" href="<?php echo $gamelink; ?>"></a></li>
						<li class=""><a class="boardphoto wall_menu_item" href="<?php echo $photolink; ?>"></a></li>
						<li class=""><a class="boardvideo wall_menu_item" href="<?php echo $videolink; ?>"></a></li>
					</ul>
					<div class="boardmenupointer"></div>
				</div>
				<div class="profilestatus">
					<div class="upstatus"></div>
					<div class="midstatus clearfix" id="wallstatus">
						<textarea placeholder="Share your idea about games or your channel... to add a video just copy paste a YouTube or Vimeo link" name="update" id="update" cols="70" rows="3"></textarea>
						<div id="webcam_container" class='border'>
							<div id="webcam" ></div>
							<div id="webcam_preview"></div>
							<div id='webcam_status'></div>
							<div id='webcam_takesnap'>
								<input type="button" value=" Take Snap " onclick="return takeSnap();" class="camclick button"/>
								<input type="hidden" id="webcam_count" />
							</div>
						</div>
						<div id="imageupload" class="border">
							<?php $image_ajax_url= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax'));?>
							<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url; ?>'> 
								<div id='preview'></div>
								<span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
								<input type='hidden' id='uploadvalues' />
							</form>
						</div>
						<div id="addgame_container" class='border'>
							<form id="gameaddform" name="gameaddform">
								<table>
									<tr>
										<td>Game Name</td><td>:</td><td><input class="inputborder" type="gamename" id="gamename" name="gamename" /></td>
									</tr>
									<tr>
										<td>Game Link</td><td>:</td><td><input class="inputborder" type="gamelink" id="gamelink" name="gamelink" /></td>
									</tr>
									<tr>
										<td>Game Embed Code</td><td>:</td><td><input class="inputborder" type="text" id="gameembedcode" name="gameembedcode" /></td>
									</tr>
									<tr>
										<td>Game Description</td><td>:</td><td><textarea class="walladdgamedesc" id="gamedesc" name="gamedesc"></textarea></td>
									</tr>	
									<tr>
										<td>Game Category</td><td>:</td>
										<td>
											<select class="selectinputborder" id="GameCategoryId" name="gamecategory">
												<option value="1">Action</option>
												<option value="2">Adventure</option>
												<option value="3">Race</option>
												<option value="4">Shooting</option>
												<option value="5">Board</option>
												<option value="6">Multiplayer</option>
												<option value="7">Puzzle</option>
												<option value="8">Card</option>
												<option value="9">Social</option>
												<option value="10">3D</option>
												<option value="11">Kids</option>
												<option value="12">Girls</option>
												<option value="13">Word</option>
												<option value="14">Role-Playing</option>
												<option value="15">Fighting</option>
												<option value="16">MMORPG</option>
												<option value="17">Sports</option>
											</select>
										</td>
									</tr>	
									<tr>
										<td>Game Image</td><td>:</td><td><input class="inputborder" type="file" name="gameimg" id="gameimg" /></td>
									</tr>								
								</table>
							</form>
						</div>						
						<div style="width:100%;clear:both">
							<div id='flashmessage'>
								<div id="flash" align="left"></div>
							</div>							
							<span style="float:right">
								<div type="submit" class="update_button" id="update_button" value="">Share</div>
								<a href="javascript:void(0);" id="camera" title="Upload Image"><!--<img src="<?php echo $this->webroot;?>app/webroot/img/wall/icons/camera.png" border="0" />--></a> 
								<!--<a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"><img src="<?php echo $this->webroot;?>app/webroot/img/wall/icons/web-cam.png"  border="0" style='margin-top:5px'/></a>-->
								<!--<a href="javascript:void(0);" id="addgame_button" title="Add Game"></a>-->
								<a href="<?php echo $add_game; ?>" id="addgame_btn" title="Add Game"></a>
								<a href="<?php echo $mychannel; ?>" id="my_channel" title="My Channel">My Channel</a>
								
							</span>
						</div>	
					</div>
					<div class="botstatus"></div>                    
				</div>			
				<div id="content" class="profilefeed">
					<?php echo $this->element('wall/load_messages');?>
				</div>
			</div>				
		</div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->