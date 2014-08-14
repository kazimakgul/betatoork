 <?php
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
?>
<style type="text/css">
th, td {
border: 1px solid #ddd !important;
padding: 5px 11px !important;
vertical-align: top;
text-align: left;
}

table {
  width: 100% !important;
margin: 20px 0px;
border-collapse: collapse;
font-size: 12px;
line-height: 18px; border-spacing: 2px;
border-color: gray;
}

</style>
<body id="signup" class="clear">


    <a href="<?php echo $index; ?>" class="logo">
        <img width="70px" height="70px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>



    <div class="content">

<div>
    <h2>Using a custom domain name</h2>
    <h4>How do I set up a custom domain for my channel?</h4>
  <p>Pre-login steps:</p> 
  <p><small> 
1) Choose a registrar, or use tools like Yahoo Domains or Domainr to find and buy a domain name that's available. (This usually costs about $10-$40 per year.) </small></p>
<p><small> 
2) Make a configuration change depending on the number of levels in your desired domain. Your registrar should have instructions on how to do this.
</small></p>

<table>
<tbody>
<tr><th>Domain</th><th>Configuration</th></tr>
<tr><th>Three or More Levels<br>(e.g. www.mysite.com or game.mysite.com)</th>
<td>point CNAME record to "<strong>domains.clone.gs</strong>﻿"</td>
</tr>
<tr><th>Two Levels<br> (e.g. mysite.com)</th>
<td>forward this to your subdomain. <strong>forward your root domain to your subdomain (e.g. www.mysite.com or game.mysite.com)</strong></td>
</tr>

</tbody>
</table>

 <p>Post-login steps:</p> 
  <p><small> 
1) Go to channel settings (the gear icon) at the top of your Dashboard.
 </small></p>
<p><small> 
2) write your subdomain you’d like to add near 'map domain' button and click it.
</small></p>
  <p><small> 
3) if you added the cname "domains.clone.gs" and its done.
 </small></p>
   <p><small> 
4) Otherwise go to your domain registrar (godaddy,hostgator,Domainr etc) and add a CNAME to your subdomain nad try again.
 </small></p>


 <h4>Do I need to change the nameservers for my domain?</h4>
   <p><small> 
Nope, just the CNAME record and a root forwarding depending on levels in your domain.
 </small></p>
 <h4>How do I know if I set up my domain properly?</h4>
   <p><small> 
After re-configuring your domain, you must wait up to 72 hours for the changes to take effect. When you visit the subdomain or domain, you should see a Clone.gs error page — this means that the domain is correctly pointing to Clone.gs, but that your game site hasn’t been configured to use it yet.
 </small></p>
 <h4>What happens when someone visits my Clone.gs URL?</h4>
   <p><small> 
They will automatically be redirected to your new custom domain (i.e. socialesman.clone.gs --> socialesman.com).
 </small></p>
 <h4>What if I’m having trouble setting up a custom domain?</h4>
   <p><small> 
Shoot us an emain to domains@clone.gs.
 </small></p>
    </div>

    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>


              