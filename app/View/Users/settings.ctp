                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">

                            <h2><i class="icofont-cogs"></i> My Settings</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">

                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icofont-cogs"></i> Settings</a> <span class="divider">&rsaquo;</span></li>
                                <li><a href="interface.html">My Settings</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Data elements</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        <!-- content-body -->
                        <div class="content-body">


                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">
                                                <!--tab action-->
                                                <li class="dropdown pull-right">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icofont-cogs"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#collapse" data-toggle="tab">@collapse</a></li>
                                                        <li><a href="#close" data-toggle="tab">@close</a></li>
                                                        <li><a href="#other" data-toggle="tab">@other action</a></li>
                                                    </ul>
                                                </li><!--/tab action-->
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Channel Details</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-2">Social Connections</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-3">Change Password</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#boxdropdownpill-1" data-toggle="tab">dropdown 1</a></li>
                                                        <li><a href="#boxdropdownpill-2" data-toggle="tab">dropdown 2</a></li>
                                                    </ul>
                                                </li><!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="boxtabpill-1">

                                                <form class="form-horizontal" id="form-validate" novalidate="novalidate">
                                                        <fieldset>
                                                            
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Channel Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on">toork.com/</span>
                                                                    <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="required" id="required">
                                                                </div>
                                                            </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Channel Description</label>
                                                            <div class="controls">
                                                                <textarea id="inputEditorSimple" class="span8" rows="6" placeholder="Describe your channel ..."></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Channel Avatar</label>
                                                            <div class="controls">
                                                                <input type="file" data-form="uniform" id="inputUpload" />
                                                            </div> <p> * Picture size must be 90x120 pixel</p>
                                                        </div> 
                                     
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>

                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-2">
                                                   <form class="form-horizontal" id="form-validate" novalidate="novalidate">
                                                        <fieldset>
                                                         
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPrepand">Facebook Page</label>
                                                            <div class="controls">
                                                                <div class="input-prepend">
                                                                    <span class="add-on">facebook.com/</span>
                                                                    <input id="inputPrepand" class="grd-white" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPrepand">Twitter</label>
                                                            <div class="controls">
                                                                <div class="input-prepend">
                                                                    <span class="add-on">twitter.com/</span>
                                                                    <input id="inputPrepand" class="grd-white" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPrepand">Google+ Page</label>
                                                            <div class="controls">
                                                                <div class="input-prepend">
                                                                    <span class="add-on">plus.google.com/</span>
                                                                    <input id="inputPrepand" class="grd-white" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPrepand">Pinterest</label>
                                                            <div class="controls">
                                                                <div class="input-prepend">
                                                                    <span class="add-on">pinterest.com/</span>
                                                                    <input id="inputPrepand" class="grd-white" type="text">
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-3">
                                                   <form class="form-horizontal" id="form-validate" novalidate="novalidate">
                                                        <fieldset>

                                                            <div class="control-group">
                                                                <label class="control-label" for="password">Password</label>
                                                                <div class="controls">
                                                                    <input type="password" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field password'}}" name="password" id="password">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="cpassword">Confirm Password</label>
                                                                <div class="controls">
                                                                    <input type="password" class="grd-white" data-validate="{required: true, equalTo: '#password', messages:{required:'Please enter field confirm password', equalTo: 'confirmation password does not match the password'}}" name="cpassword" id="cpassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="boxdropdownpill-1">
                                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                                </div>
                                                <div class="tab-pane fade" id="boxdropdownpill-2">
                                                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->