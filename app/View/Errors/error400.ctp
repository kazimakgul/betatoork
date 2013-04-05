<?php
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$index=$this->Html->url(array("controller" => "games","action" =>"bestchannels2")); 
?>
        <!-- section content -->
        <section class="section">
            <div class="container">
                <div class="error-page">
                    <h1 class="error-code color-blue">Error 400</h1>
                    <p class="error-description muted">The request was a legal request, but the server is refusing to respond to it</p>
                    <form>
                        <div class="control-group">
                            <div class="input-append input-icon-prepend">
                                <div class="add-on">
                                    <a title="search" style="" class="icon"><i class="icofont-search"></i></a>
                                    <input class="input-xxlarge animated grd-white" type="text" placeholder="what you looking for?" />
                                </div>
                                <input type="submit" class="btn" value="Search" />
                            </div>
                        </div>
                    </form>
      
					<div class="alert alert-block alert-info fadein">
			            <button type="button" class="close" data-dismiss="alert">×</button>
			            <h4 class="alert-heading">Oh snap! You got an error!</h4>
			            <p>The Page you are looking for is not valid. Please make sure you are looking for the right thing and try not to come back to this page.</p>
			            <p>
		                    <a href="<?php echo $dashboard; ?>" class="btn btn-danger"><i class="icofont-arrow-left"></i> Back to Dashboard</a>
		                    <a href="<?php echo $index; ?>" class="btn btn-success">Explore Game Channels <i class="icofont-arrow-right"></i></a>
			            </p>
		          	</div>

                </div>
            </div>
        </section>