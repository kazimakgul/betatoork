
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30352641-4']);
  _gaq.push(['_setDomainName', 'toork.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php if ($this->Session->check('Auth.User')){ 
  $username = $this->Session->read('Auth.User.username');
  $variable = 'Member - '.$username; ?>

<script type="text/javascript">

  _gaq.push(['_setCustomVar',
      1,             // This custom var is set to slot #1.  Required parameter.
      'UserType',   // The name of the custom variable.  Required parameter.
      '<?php echo $variable; ?>',      // Sets the value of "User Type" to "Member" or "Visitor" depending on status.  Required parameter.
       2             // Sets the scope to session-level.  Optional parameter.
   ]);

</script>

<?php }else{
  $variable = 'Visitor'?>

<script type="text/javascript">

  _gaq.push(['_setCustomVar',
      1,             // This custom var is set to slot #1.  Required parameter.
      'UserType',   // The name of the custom variable.  Required parameter.
      '<?php echo $variable; ?>',      // Sets the value of "User Type" to "Member" or "Visitor" depending on status.  Required parameter.
       2             // Sets the scope to session-level.  Optional parameter.
   ]);

</script>

<?php } ?>
