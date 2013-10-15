        <!-- section header -->
<div class="navbar navbar-fixed-top shadow-black">
  <div class="navbar-inner navbar-custom">
    <div class="container"><!-- Collapsable nav bar -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Your site name for the upper left corner of the site -->
      <a href="<?php echo $index; ?>" class="brand"></a>
 <form class="navbar-search">
<div class="input-icon-append">
  <button type="button" rel="tooltip-bottom" title="" class="color-blue icon" data-original-title="search"><i class="icofont-search"></i></button>
 <input class="input-large search-query grd-white" maxlength="23" placeholder="Search for a game..." type="text">
</div>
</form>
      <!-- Start of the nav bar content -->
      <div class="nav-collapse"><!-- Other nav bar content -->
        <!-- The drop down menu -->
        <ul class="nav span3 pull-right">

          <a class="btn btn-success" href="<?php echo $register; ?>"><i class="elusive-edit"></i> Register</a>
          <span class="dropdown">
            <a class="btn btn-custom-darken" href="<?php echo $login; ?>"><i class="icofont-signin"></i> Sign In </a>
          </span>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php  echo $this->element('NewPanel/passwordModal'); ?>