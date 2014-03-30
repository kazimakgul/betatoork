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
          <a href="#" class="btn btn-primary btn-block">
            <i class="fa fa-facebook-square"></i> Login with Facebook
          </a>
        </div>
        </div>
      </div>
    <div class="main">  
        
    <input type="text" class="form-control" placeholder="Username or Email" autofocus>
    <input type="password" class="form-control" placeholder="Password">
     
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
            <button type="submit" class="btn btn-large btn-primary pull-right">Login</button>
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
