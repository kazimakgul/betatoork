          <div class="span4 twitter_twit">
            <a href="https://twitter.com/share" class="twitter-share-button" data-count="none"></a>
            <script>
              !function(d,s,id){
                var js,fjs=d.getElementsByTagName(s)[0];
                if(!d.getElementById(id)){
                  js=d.createElement(s);
                  js.id=id;
                  js.src="//platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js,fjs);
                }
              }(document,"script","twitter-wjs");
            </script>         
          </div>

          <div class="span4 google_plus">
            <div class="g-plus" data-action="share" data-annotation="none"></div>
            <script type="text/javascript">
              (function() {
              var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
              po.src = "https://apis.google.com/js/plusone.js";
              var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>         
          </div>

          <div class="span4 pin_pinit">
            <a data-pin-config="none" data-pin-do="buttonPin" href="#">
              <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
            </a>
          </div>

          <div style="float:left; padding-top:10px; padding-left:15px;">
            <div class="fb-like" data-href="<?php echo Router::url( $this->here, true ); ?>" data-layout="box_count" data-width="450" data-show-faces="true"></div>
          </div>
