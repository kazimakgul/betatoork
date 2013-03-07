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
                                                            <legend>Form Validate</legend>
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
                                                            </div>
                                                        </div>

                                                            <div class="control-group">
                                                                <label class="control-label" for="minlength">Min Length</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="minlength" id="minlength">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="maxlength">Max Length</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, maxlength: 6, messages:{required:'Please enter field max length', maxlength:'Please enter a maximum of 6 characters.'}}" name="maxlength" id="maxlength">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="email">Email</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, email:true, messages:{required:'Please enter field email', email:'Please enter a valid email address'}}" name="email" id="email">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="url">URL</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, url:true, messages:{required:'Please enter field url', url:'Please enter a valid url'}}" name="url" id="url">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="date">Date</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, date:true, messages:{required:'Please enter field date', date:'Please enter a valid date'}}" name="date" id="date">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="mins">Min</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, number:true, min: 5, messages:{required:'Please enter field min', number:'Please enter a valid number', min:'Please enter a number greater than or equal to 5'}}" name="mins" id="mins">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="maxs">Max</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, number:true, max: 5, messages:{required:'Please enter field max', number:'Please enter a valid number', min:'Please enter a number less than or equal to 5'}}" name="maxs" id="maxs">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="number">Number</label>
                                                                <div class="controls">
                                                                    <input type="text" class="grd-white" data-validate="{required: true, number:true, messages:{required:'Please enter field number', number:'Please enter a valid number'}}" name="number" id="number">
                                                                </div>
                                                            </div>
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

                                                    <!--element-->
                                                    <form class="form-horizontal">
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Auto Complete</label>
                                                            <div class="controls">
                                                                <input type="text" id="inputAuto" class="grd-white" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Tags</label>
                                                            <div class="controls">
                                                                <input type="hidden" id="inputTags" style="width:200px;" value="brown, red, green"/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputDate">Date</label>
                                                            <div class="controls">
                                                                <div class="input-append date" data-form="datepicker" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                                    <input id="inputDate" class="grd-white" data-form="datepicker" size="16" type="text" value="12-02-2012">
                                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputColorHex">Color (hex)</label>
                                                            <div class="controls">
                                                                <div class="input-append color" data-form="colorpicker" data-color="#00ffcc" data-color-format="hex">
                                                                    <input type="text" class="grd-white" id="inputColorHex" value="#00ffcc" >
                                                                    <span class="add-on"><i style="background-color: #00ffcc"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputColorRgba">Color (rgba)</label>
                                                            <div class="controls">
                                                                <div class="input-append color" data-form="colorpicker" data-color="rgba(255, 146, 180, 0.8)" data-color-format="rgba">
                                                                    <input type="text" class="grd-white" id="inputColorRgba" value="rgba(255, 146, 180, 0.8)" >
                                                                    <span class="add-on"><i style="background-color: rgba(255, 146, 180, 0.8)"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Radio</label>
                                                            <div class="controls">
                                                                <label class="radio">
                                                                    <input type="radio" data-form="uniform" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                                    Option one is this and that—be sure to include why it's great
                                                                </label>
                                                                <label class="radio">
                                                                    <input type="radio" data-form="uniform" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Option two can be something else and selecting it will deselect option one
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Checkbox</label>
                                                            <div class="controls">
                                                                <label class="checkbox">
                                                                    <input type="checkbox" data-form="uniform" name="inputCheckbox" id="inlineCheckbox1" value="option1"> 1
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" data-form="uniform" name="inputCheckbox" id="inlineCheckbox2" value="option2"> 2
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" data-form="uniform" name="inputCheckbox" id="inlineCheckbox3" value="option3"> 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Upload</label>
                                                            <div class="controls">
                                                                <input type="file" data-form="uniform" id="inputUpload" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputSelect">Select</label>
                                                            <div class="controls">
                                                                <select id="inputSelect" data-form="select2" style="width:200px" data-placeholder="Your Favorite Type of Bear">
                                                                    <option>American Black Bear</option>
                                                                    <option>Asiatic Black Bear</option>
                                                                    <option>Brown Bear</option>
                                                                    <option>Giant Panda</option>
                                                                    <option selected>Sloth Bear</option>
                                                                    <option disabled>Sun Bear</option>
                                                                    <option>Polar Bear</option>
                                                                    <option disabled>Spectacled Bear</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputSelectMulti">Multiple Select</label>
                                                            <div class="controls">
                                                                <select id="inputSelectMulti" data-form="select2" style="width:200px" data-placeholder="Your Favorite Type of Bear" multiple>
                                                                    <option>American Black Bear</option>
                                                                    <option>Asiatic Black Bear</option>
                                                                    <option>Brown Bear</option>
                                                                    <option>Giant Panda</option>
                                                                    <option selected>Sloth Bear</option>
                                                                    <option disabled>Sun Bear</option>
                                                                    <option>Polar Bear</option>
                                                                    <option disabled>Spectacled Bear</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputSelectGroup">Select Group</label>
                                                            <div class="controls">
                                                                <select id="inputSelectGroup" data-form="select2" style="width:200px" data-placeholder="Your Favorite Football Team">
                                                                    <option value=""></option>
                                                                    <optgroup label="NFC EAST">
                                                                        <option>Dallas Cowboys</option>
                                                                        <option>New York Giants</option>
                                                                        <option>Philadelphia Eagles</option>
                                                                        <option>Washington Redskins</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC NORTH">
                                                                        <option>Chicago Bears</option>
                                                                        <option>Detroit Lions</option>
                                                                        <option>Green Bay Packers</option>
                                                                        <option>Minnesota Vikings</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC SOUTH">
                                                                        <option>Atlanta Falcons</option>
                                                                        <option>Carolina Panthers</option>
                                                                        <option>New Orleans Saints</option>
                                                                        <option>Tampa Bay Buccaneers</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC WEST">
                                                                        <option>Arizona Cardinals</option>
                                                                        <option>St. Louis Rams</option>
                                                                        <option>San Francisco 49ers</option>
                                                                        <option>Seattle Seahawks</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC EAST">
                                                                        <option>Buffalo Bills</option>
                                                                        <option>Miami Dolphins</option>
                                                                        <option>New England Patriots</option>
                                                                        <option>New York Jets</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC NORTH">
                                                                        <option>Baltimore Ravens</option>
                                                                        <option>Cincinnati Bengals</option>
                                                                        <option>Cleveland Browns</option>
                                                                        <option>Pittsburgh Steelers</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC SOUTH">
                                                                        <option>Houston Texans</option>
                                                                        <option>Indianapolis Colts</option>
                                                                        <option>Jacksonville Jaguars</option>
                                                                        <option>Tennessee Titans</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC WEST">
                                                                        <option>Denver Broncos</option>
                                                                        <option>Kansas City Chiefs</option>
                                                                        <option>Oakland Raiders</option>
                                                                        <option>San Diego Chargers</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputSelectMultiGroup">Multiple Select Group</label>
                                                            <div class="controls">
                                                                <select id="inputSelectMultiGroup" data-form="select2" style="width:200px" data-placeholder="Your Favorite Football Team" multiple>
                                                                    <option value=""></option>
                                                                    <optgroup label="NFC EAST">
                                                                        <option>Dallas Cowboys</option>
                                                                        <option>New York Giants</option>
                                                                        <option>Philadelphia Eagles</option>
                                                                        <option>Washington Redskins</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC NORTH">
                                                                        <option>Chicago Bears</option>
                                                                        <option>Detroit Lions</option>
                                                                        <option>Green Bay Packers</option>
                                                                        <option>Minnesota Vikings</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC SOUTH">
                                                                        <option>Atlanta Falcons</option>
                                                                        <option>Carolina Panthers</option>
                                                                        <option>New Orleans Saints</option>
                                                                        <option>Tampa Bay Buccaneers</option>
                                                                    </optgroup>
                                                                    <optgroup label="NFC WEST">
                                                                        <option>Arizona Cardinals</option>
                                                                        <option>St. Louis Rams</option>
                                                                        <option>San Francisco 49ers</option>
                                                                        <option>Seattle Seahawks</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC EAST">
                                                                        <option>Buffalo Bills</option>
                                                                        <option>Miami Dolphins</option>
                                                                        <option>New England Patriots</option>
                                                                        <option>New York Jets</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC NORTH">
                                                                        <option>Baltimore Ravens</option>
                                                                        <option>Cincinnati Bengals</option>
                                                                        <option>Cleveland Browns</option>
                                                                        <option>Pittsburgh Steelers</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC SOUTH">
                                                                        <option>Houston Texans</option>
                                                                        <option>Indianapolis Colts</option>
                                                                        <option>Jacksonville Jaguars</option>
                                                                        <option>Tennessee Titans</option>
                                                                    </optgroup>
                                                                    <optgroup label="AFC WEST">
                                                                        <option>Denver Broncos</option>
                                                                        <option>Kansas City Chiefs</option>
                                                                        <option>Oakland Raiders</option>
                                                                        <option>San Diego Chargers</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                            <button type="button" class="btn">Cancel</button>
                                                        </div>
                                                    </form>
                                                    <!--/element-->

                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-2">
                                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
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