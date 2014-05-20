//***************************************************
//------------------Rating Functions Begins---------- 
// Rating yıldızlarının çalışmasını sağlayan Function
//***************************************************
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});


$( document ).ready(function() {
	$('#notification').popover();
	$('#gameshare').popover();
	$('#gamecomment').popover();
	//Ads Button table class
	$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
	
	
	//Favourite Button class change
	$('.favourite .row button').click(function(){
		if($('.btn-danger').val()==0)
		{
			$('.btn-danger').removeClass().addClass('btn btn-default');
		} 
		else{
			$('.btn-default').removeClass().addClass('btn btn-danger');
		}
 	});

         
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
// mysite Hatalı  	$('.rating .widget-button').attr('data-original-title', 'Your rate is '+value);
    $('#count-existing').html(value);
  });
});
//***************************************************
//------------------Rating Functions Ends-------------------------
//***************************************************


//***************************************************
//------------------Subscription Functions-------------------------
//***************************************************

function subscribe (channel_name,user_auth,id) {
		      			
				  
		    if(user_auth==1)
		    {
		currentflw=$('#flwnumber').html();
		currentflw=parseInt(currentflw);
		$('#flwnumber').html(currentflw+1);
		
		switch_subscribe(id);
		/*
		$.pnotify({
            title: 'Thanks for Following',
            text: 'You are following <strong>'+channel_name+'</strong> now.<br>You will be notified about the updates of this channel.',
            type: 'success'
          });
		*/
		//pushActivity(null,id,1,1,2);
		
			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to follow channels.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	
	function subscribeout (channel_name,user_auth,id) {
		        
		    if(user_auth==1)
		    {
		currentflw=$('#flwnumber').html();
		currentflw=parseInt(currentflw);
		$('#flwnumber').html(currentflw-1);
		
		switch_subscribe(id);
		/*
		$.pnotify({
            title: 'Unfollow is done',
            text: 'You stopped following <strong>'+channel_name+'</strong> now.<br>You will not be notified about the updates of this channel.',
            type: 'error'
          });
		*/
		
			}else{
				
			$.pnotify({
            title: 'Authentication Error',
            text: 'You have to login first to follow channels.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	
    function switch_subscribe(channel_id)
    {
		
    	$.get(subswitcher+'/'+channel_id,function(data) {/*success callback*/});	
		
    }
	
	
	$('#follow_button').click(function () {
		   if(user_auth==1)
		    {
		$('#follow_button').hide();
		$('#unFollow_button').show();
			}
	});
	
	$('#unFollow_button').click(function () {
		   if(user_auth==1)
		    {
		$('#unFollow_button').hide();
		$('#follow_button').show();
			}
	});
	
	
//Her sayfa yuklenisinde ve sadece profile sayfasinda calismak uzere hazirlandi.	
if($('#follow_button').attr('id')=='follow_button')
	{
	checkstatus();
	}
	
	
		function checkstatus(){
		$.get(checkFollowStat+'/'+profile_id,function(data) {			  
											if(data==1) {
											    $('#follow_button').hide();
		                                        $('#unFollow_button').show();
										     } else {
											    $('#unFollow_button').hide();
		                                        $('#follow_button').show();				  
											 }						  
			                    });
		         }
				 
			
			
	function switchfollow(id)
	{
	var x = id;
    $("a[id=follow" + x + "]").hide();
	$("a[id=unfollow" + x + "]").show();
	}
	function switchunfollow(id)
	{
	var x = id;
    $("a[id=unfollow" + x + "]").hide();
	$("a[id=follow" + x + "]").show();
	}
//***************************************************
//------------------Favorite Functions-------------------------
//***************************************************	


	function favorite (game_name,user_auth,id) {
		    if(user_auth==1)
		    {
			switch_favorite(id);
			}else{
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
          });	
					
			}
	}
	
	function unFavorite (game_name,user_auth,id) {
		    if(user_auth==1)
		    {
			switch_favorite(id);
			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
          });	
					
			}
	}
	
$('#fav_button').click(function () {
			if(user_auth==1)
		    {
		    

			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
          	});	
					
			}
	});
	

	function switch_favorite(game_id)
    {
    	$.get(favswitcher+'/'+game_id,
    	function(data) {
			if(data == 1)
			{
	  		currentflw=$('#fav_count').html();
			currentflw=parseInt(currentflw);
			$('#fav_count').html(currentflw+1);
			$('.fa-heart').addClass('red');
			}else{
	  		currentflw=$('#fav_count').html();
			currentflw=parseInt(currentflw);
			$('#fav_count').html(currentflw-1);
			$('.fa-heart').removeClass('red');
			}
		
		});	
		
    }

//***************************************************
//------------Game Chain/Clone Functions-------------
//***************************************************

$('#chaingame').click(function () {
    if(user_auth==1)
    {   
	    game_name=$('#game_name').val();
		$.get(chaingame + '/'+game_id, function(data) {
			if(data==1)
			{
				currentflw=$('#clone_count').html();
				currentflw=parseInt(currentflw);
				$('#clone_count').html(currentflw+1);
				$('.fa-cog').addClass('green');
				 $.pnotify({
			 		title: 'You have cloned succesfully.',
              		text: 'You have cloned. <strong>'+game_name+'</strong> game. You will be able to edit this game as you wish on your games section.',
             		type: 'success'
              });
			}
		});
	}else{
		 $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to clone games.',
            type: 'error'
          });	
		}
});


function chaingame2(game_name,user_auth,game_id)
{
if(user_auth==1)
    {   
		$.get(chaingame + '/'+game_id, function (data) {
			
			if(data==1)
			{
			  $.pnotify({
			  title: 'You have cloned succesfully.',
              text: 'You have cloned. <strong>'+game_name+'</strong> game. You will be able to edit this game as you wish on your games section.',
              type: 'success'
              });  
			}else{
				
				$.pnotify({
			  title: 'System Error',
              text: 'There are some problems on server,please try again later.',
              type: 'error'
              });  
				
			}
			
		});
		
	}else{
		
		 $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to clone games.',
            type: 'error'
          });	
		
		
		}	
	
	
}

