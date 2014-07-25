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
<tr><th>Two Levels<br> (e.g. mywebsite.com)</th>
<td>point A-record (IP address) to <strong>66.6.44.4</strong></td>
</tr>
<tr><th>Three or More Levels<br>(e.g. www.mywebsite.com or game.mywebsite.com)</th>
<td>point CNAME record to "<strong>domains.clone.gs</strong>﻿"</td>
</tr>
</tbody>
</table>

 <p>Post-login steps:</p> 
  <p><small> 
1) Click Settings (the gear icon) at the top of your Dashboard.
 </small></p>
<p><small> 
2) Click the blog you’d like to update on the right side of the page.
</small></p>
  <p><small> 
3) Click the pencil to the right of the ﻿username﻿ section and enable "Use a custom domain."
 </small></p>
   <p><small> 
4) Enter your domain (e.g. mywebsite.com) or subdomain (e.g. game.mywebsite.com).
 </small></p>
   <p><small> 
5) Click “Test your domain.”
 </small></p>
   <p><small> 
6) Correct problems if the test finds any, and click “Test your domain” until the test is successful.
 </small></p>
 <p><small> 
7) Hit “Save.”
 </small></p>
 <h4>Do I need to change the nameservers for my domain?</h4>
   <p><small> 
Nope, just the A-record or CNAME record depending on levels in your domain.
 </small></p>
 <h4>How do I know if I set up my domain properly?</h4>
   <p><small> 
After re-configuring your domain, you must wait up to 72 hours for the changes to take effect. When you visit the subdomain or domain, you should see a Clone.gs error page — this means that the domain is correctly pointing to Clone.gs, but that your blog hasn’t been configured to use it yet.
 </small></p>
 <h4>What happens when someone visits my Clone.gs URL?</h4>
   <p><small> 
They will automatically be redirected to your new custom domain (i.e. david.clone.gs --> davidslog.com).
 </small></p>
 <h4>What if I’m having trouble setting up a custom domain?</h4>
   <p><small> 
We’re unable to support many of the issues that crop up, so it’s best if you ask a friend who has done this before.
 </small></p>
    </div>

    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>


              