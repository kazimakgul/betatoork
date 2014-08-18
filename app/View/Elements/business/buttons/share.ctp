<!--
@name   => Social share title,
@url    => Socila share link,
@author => Volkan Celiloğlu
-->
<!-- Share Button -->
		<div class="ShareBtn">
			<div class="widget-button">
                <div id="socialHolder">
                    <div id="socialShare" class="btn-group dropup share-group">
                        <a data-toggle="dropdown" class="btn btn-info">
                            <i class="fa fa-share-alt"></i>
                        </a>
                        <button href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle share">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu clear-dropdown-menu" role="menu">
                            <li>
                                <a data-original-title="Twitter" rel="tooltip"  href="javascript:void(0);" data-url="http://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $name; ?>" class="btn btn-twitter shl-share" data-placement="center">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a data-original-title="Google+" rel="tooltip"  href="javascript:void(0);" data-url="https://plus.google.com/share?url=<?php echo $url; ?>" class="btn btn-google shl-share" data-placement="center">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a data-original-title="Facebook" rel="tooltip"  href="javascript:void(0);" data-url="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo $name; ?>" class="btn btn-facebook shl-share" data-placement="center">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
		</div><!-- Share Button  End-->
