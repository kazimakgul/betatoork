<?php if ($this->Session->check('Auth.User')) : ?>
<script>
_gaq.push(['_setCustomVar',
      1,             // This custom var is set to slot #1.  Required parameter.
      'UserType',   // The name of the custom variable.  Required parameter.
      'Member',      // Sets the value of "User Type" to "Member" or "Visitor" depending on status.  Required parameter.
       2             // Sets the scope to session-level.  Optional parameter.
   ]);
</script>
<?php endif; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30352641-3', '54.225.196.20');
  ga('send', 'pageview');

</script>