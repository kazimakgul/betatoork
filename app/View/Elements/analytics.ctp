
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45726606-1', 'clone.gs');
  ga('send', 'pageview');

</script>

<?php if ($this->Session->check('Auth.User')){ ?>

<script type="text/javascript">

var _gaq = _gaq || [];  
_gaq.push(['_setAccount','UA-45726606-1']);  
_gaq.push(['_setCustomVar',1,'UserType','Member',2]);
gaq.push(['_trackPageview']);

</script>

<?php }else{ ?>

<script type="text/javascript">

var _gaq = _gaq || [];  
_gaq.push(['_setAccount','UA-45726606-1']);  
_gaq.push(['_setCustomVar',1,'UserType','Visitor',2]);
gaq.push(['_trackPageview']);

</script>

<?php } ?>
