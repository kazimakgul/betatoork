<script type="text/javascript">
var GameModel = function(username, slug, rating, like, malicious, rate_url, favorite_url, malicious_url) {
  this.rating = ko.observable(rating);
  this.like = ko.observable(like);
  this.malicious = ko.observable(malicious);
  this.username = username;
  this.slug = slug;
  this.rate_url = rate_url;
  this.favorite_url = favorite_url;
  this.malicious_url = malicious_url;

  this.init();
}
GameModel.prototype = {
  init: function() {
  },
  rate: function(rating) {
    if(!this.rating()) {
      this.rating(rating);
      $.ajax({
        type: 'post',
        url: this.rate_url,
        data: this.preparePostData({ rate: this.rating() }),
        success: function(o) {
        },
        dataType: "json"
      });
    }
  },
  favorite: function() {
    this.like(!this.like());
    $.ajax({
      type: 'get',
      url: this.favorite_url,
      success: function(o) {
      },
      dataType: "json"
    });
  },
  toggleMalicious: function() {
    this.malicious(!this.malicious());
    $.ajax({
      type: 'get',
      url: this.malicious_url,
      success: function(o) {
      },
      dataType: "json"
    });
  },
  preparePostData: function(object) {
    return $.param($.extend({
      csrfmiddlewaretoken: $.cookie("csrftoken")
    }, object));
  }
}

var UserModel = function(username, logged_in) {
  this.username = ko.observable();
  this.logged_in = ko.observable(false);

  if(arguments.length) {
    this.assign(username, logged_in);
  }
  this.init();
}
UserModel.prototype = {
  init: function() {
  },
  assign: function(username, logged_in) {
    this.username(username);
    this.logged_in(logged_in);
  }
}
var user = new UserModel();

var Field = function(form, name, default_text, checkbox, dontValidate) {
  this.form = $(form);
  this.elm = $(form).find("[name="+ name +"]");
  this.value = ko.observable();
  this.errorMessage = ko.observable();
  this.name = name;
  this.lastValue = ko.observable();
  this.text = default_text;
  this.default_type = this.elm.attr("type");
  this.errorCopy = $("<div class='error_copy'></div>");
  this.checkbox = checkbox;
  if(dontValidate) {
    this.dontValidate=true;
  }
  else {
    this.dontValidate=false;
  }
  if(checkbox) {
    this.elm.dataBind({
      checked: "viewModel."+$(form).attr('name')+".fields." + this.name + ".value"
    });
    this.mirrorElm = $(".mirror_"+name)[0];
  }
  else {
    this.elm.dataBind({
      value: "viewModel."+$(form).attr('name')+".fields." + this.name + ".value"
    });
  }

  this.init();
}
Field.prototype = {
  init: function() {
    $(this.elm).focus(this, function(e) {
      e.data.focusEvent(e.data);
    });
    $(this.elm).blur(this, function(e, o) {
      if(!e.data.value()) {
        e.data.value(e.data.text);
      }
    });
    this.value(this.text);
  },
  focusEvent: function(self) {
    if(self.errorMessage()) {
      self.errorMessage(null);
      $(self.elm).removeClass("error");
      $(self.errorCopy).remove();
      self.value(self.lastValue());
      $(self.elm).focus();
    }
    else {
      if(self.value() == self.text) {
        self.value("");
      }
    }
  },
  valid: function() {
    if(this.dontValidate) {
      return true;
    }
    if(this.value() == "" || this.value() == this.text) {
      this.error("Bu alan zorunludur.");
      return false;
    }
    return true;
  },
  error: function(msg) {
    this.lastValue(this.value());
    this.errorMessage(msg);
    this.value("");
    $(this.errorCopy).html(msg);
    if(!this.checkbox) {
      $(this.elm).after($(this.errorCopy));
      $(this.errorCopy).position({
        of: $(this.elm),
        my: "left center",
        at: "left center"
      });
      $(this.errorCopy).click(this, function(e) {
        e.data.focusEvent(e.data);
      });
    }
    else {
      $(this.mirrorElm).addClass("error");
    }
    $(this.elm).addClass("error");
  }
}

var LoginForm = function(form) {
  this.form = $(form);
  this.url = "/account/login/";
  this.fields =  {
    email: new Field(this.form, "email", "Type your email"),
    password: new Field(this.form, "password", "Type your channel name"),
    rememberme: new Field(this.form, "rememberme", "", true, true)
  }
  this.success = ko.observable();
  this.message = ko.observable();
  this.init();
}
LoginForm.prototype = {
  init: function() {
  },
  submit: function() {
    var hasError = _.filter(this.fields, function(field, name) {
      return !field.valid();
    });
    if(!hasError.length) {
      (function(self){
        $.ajax({
          type: 'post',
          url: self.url,
          data: $(self.form).serialize(),
          success: function(o) {
            if(o.errors) {
              var general_error = o.errors["__all__"];
              delete(o.errors["__all__"]);
              _.each(o.errors, function(error, fieldName) {
                self.fields[fieldName].error(error[0]);
              });
              if(general_error) {
                self.show_general_errors(general_error);
              }
            }
            else {
              self.success(true);
              window.location = window.location.href;
            }
            if(o.message) {
              self.message(o.message);
            }
          },
          dataType: "json"
        });
      })(this);
    }
  },
  show_general_errors: function(errors) {
    alert(errors.join("\n"));
  }
}

var RegisterForm = function(form) {
  this.form = $(form);
  this.url = "/account/register/start/";
  this.fields = {
    channel_name: new Field(this.form, "channel_name", "Type your channel name"),
    email: new Field(this.form, "email", "Type your email"),
    password: new Field(this.form, "password", "Type your password"),
    password1: new Field(this.form, "password1", "Type your password"),
    subscription_emails: new Field(this.form, "subscription_emails", "", true),
    tos: new Field(this.form, "tos", "", true)
  }
  this.success = ko.observable(false);
  this.message = ko.observable();
  this.init();
}
RegisterForm.prototype = {
  init: function() {
  },
  submit: function() {
    var hasError = _.filter(this.fields, function(field, name) {
      return !field.valid();
    });
    if(!hasError.length) {
      (function(self){
        $.ajax({
          type: 'post',
          url: self.url,
          data: $(self.form).serialize(),
          success: function(o) {
            if(o.errors) {
              var general_error = o.errors["__all__"];
              delete(o.errors["__all__"]);
              _.each(o.errors, function(error, fieldName) {
                self.fields[fieldName].error(error[0]);
              });
              if(general_error) {
                self.show_general_errors(general_error);
              }
            }
            else {
              self.success(true);
            }
            if(o.message) {
              self.message(o.message);
            }
          },
          dataType: "json"
        });
      })(this);
    }
  },
  show_general_errors: function(errors) {
    alert(errors.join("\n"));
  }
}

var viewModel = {}
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('#txt_search').focus(function () {
    if ($(this).val() == 'Keywords...') {
      $('#txt_search').val('');
    }
  });
  $('#txt_search').blur(function () {
    if ($(this).val() == '') {
      $('#txt_search').val('Keywords...');
    }
  });

  $('.menu a').mouseenter(function () {
    var positions = $(this).position();
    $('.pointer').animate({ left: positions.left }, 200);
    $('.menu_up').animate({ left: -positions.left }, 200);
  });
});
var show_hide = function (left_status, right_status) {
  if (left_status === 1 && right_status === 0) {
  	$('#left_tab_content').removeClass('lightbox_display_none');
  	$('#right_tab_content').addClass('lightbox_display_none');
  	$('.lightbox_lineright').removeClass('lightbox_lineright').addClass('lightbox_lineleft');
  }
  else if (left_status === 0 &&  right_status === 1) {
  	$('#left_tab_content').addClass('lightbox_display_none');
  	$('#right_tab_content').removeClass('lightbox_display_none');
  	$('.lightbox_lineleft').removeClass('lightbox_lineleft').addClass('lightbox_lineright');
  }
}

function logout_FB(){
FB.logout();
var cookies = document.cookie.split(";");for (var i = 0; i < cookies.length; i++) {var cookie = cookies[i];var eqPos = cookie.indexOf("=");var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";}
}

</script>