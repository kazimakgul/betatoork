
<?php
if($performer['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($performer['User']['seo_username']),"action" =>'')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$performer['User']['id']));
}
?>

<div align="center" style="background-color:#e0dad5;margin-bottom:15px;padding:10px 10px 10px 10px">

<tr>
  <td align="center">
    <img width="150" src="https://s3.amazonaws.com/betatoorkpics/socials/clone.png">
  </td></br>
</tr>
  
  <div style="max-width:520px">
  <div style="background-color:white;border:1px solid #dadada;border-bottom-width:2px;border-top:none">
  <div style="padding:0px 12px;border-bottom:1px solid #f1f1f1">
    <table style="width:100%;min-height:50px" cellpadding="0" cellspacing="0"><tbody><tr><td style="font-size:18px"><p style="font-family:'helvetica neue'; font-weight:bold;font-size:16px;"><?php echo $game['Game']['name']; ?> added to favorites by <?php echo $performer['User']['username']; ?></p></td></tr></tbody>
    </table>
  </div>

  <div style="padding:14px"><table style="width:100%" cellpadding="0" cellspacing="0"><tbody><tr><td style="width:46px"><a href="<?php echo $profileurl; ?>" target="_blank">
  
  <?php 
  if($performer['User']['picture']!=NULL)
  {
  echo '<img width="90" src="'.$performer['User']['avatarurl'].'">';
  }else{
  echo '<img width="90" src="https://s3.amazonaws.com/betatoorkpics/socials/clone-user-icon2.png">';
  }
   ?>

  </a></td><td style="padding-left:14px"><div style="font:14px arial;font-weight:bold;color:#262626"><a href="<?php echo $profileurl; ?>" style="color:#262626;font:16px arial,normal;text-decoration:none" target="_blank"><?php echo $performer['User']['username']; ?></a></div><div style="font:11px arial,normal;color:#999999;margin-top:3px">Added your game <?php echo $game['Game']['name']; ?> to its Favorite list</div></td></tr></tbody></table>
  </div>

  <div style="padding:14px"><table style="width:100%" cellpadding="0" cellspacing="0"><tbody><tr><td><div style="padding-right:20px;display:inline-block;font-size:16px"><a href="#" style="color:inherit;text-decoration:none" target="_blank"><?php echo $perstat['Userstat']['subscribeto'];?> Followers </a></div><div style="padding-right:20px;display:inline-block;font-size:16px"><a href="#" style="color:inherit;text-decoration:none" target="_blank"><?php echo $perstat['Userstat']['uploadcount'];?> Games</a></div> <td style="text-align:right"><a href="http://clone.gs<?php echo $profileurl; ?>" style="background-color:#f5f5f5;border:solid 1px #dfdfdf;border-radius:3px;color:#444;display:inline-block;font-family:Arial;font-size:13px;font-weight:bold;min-height:34px;line-height:34px;min-width:54px;padding:0 20px;text-align:center;text-decoration:none;white-space:nowrap" target="_blank">View Channel</a></td></td></tr></tbody></table></div></div></div>

  <div style="max-width:520px">
  <div style="background-color:white;border:1px solid #dadada;border-bottom-width:2px;border-top:none">
  <div style="padding:0px 12px;border-bottom:1px solid #f1f1f1">
    <table style="width:100%;min-height:50px" cellpadding="0" cellspacing="0"><tbody><tr><td><p><a href="http://clone.gs" style="color:#2f96b4; font-family:'helvetica neue',helvetica,arial,sans-serif;font-weight:bold;font-size:18px;line-height:18px; text-decoration:none">clone.gs</a> - create your own game channel</p></td></tr></tbody>
    </table>
  </div>
  </div>
  </div>

  <tbody><table>

 <tr>
 <td align="center" style="padding:30px 0 15px">
 
 

 <p style="font-family:'helvetica neue',helvetica,arial,sans-serif;font-size:10px;color:#999999;line-height:1.35em;margin:0;padding:0">This email was sent to <?php echo $perMail; ?>.<br><a href="http://clone.gs" style="color:#999;text-decoration:underline" target="_blank">Change your email preferences.</a></p>

 
 
 </td>
 </tr>
 
 
 <tr>
 <td align="center">
 <p style="font-family:'helvetica neue',helvetica,arial,sans-serif;font-size:10px;color:#999999;line-height:1.35em;margin:0;padding:0">2013 Clone, Inc. <font style="color:#aaa;padding:0 2px">|</font> All Rights Reserved<br><a href="http://clone.gs/pages/privacy" target="_blank" style="color:#999;text-decoration:underline">Privacy Policy</a> <font style="color:#aaa;padding:0 2px"> |</font> <a href="http://clone.gs/pages/terms" style="color:#999;text-decoration:underline" target="_blank">Terms and Conditions</a></p><img src="#" width="0" height="0">
 </td>
 </tr>

  </tbody><table>


</div>