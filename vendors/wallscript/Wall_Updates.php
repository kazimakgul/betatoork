<?php
//Srinivas Tamada http://9lessons.info
//Wall_Updates

class Wall_Updates {

public $perpage = 10; // Uploads perpage



     public function Login_Check($value,$type) 
     {
     $username_email=mysql_real_escape_string($value);
     if(type)
     {
     $query=mysql_query("SELECT uid FROM users WHERE username='$username_email' ");
     }
     else
     {
     $query=mysql_query("SELECT uid FROM users WHERE email='$username_email' ");
     }

     return mysql_num_rows($query);
     }


     public function User_ID($username) 
     {
     $username=mysql_real_escape_string($username);
     $query=mysql_query("SELECT id FROM users WHERE username='$username'");
     if(mysql_num_rows($query)==1)
     {
     $row=mysql_fetch_array($query);
     return $row['id'];
     }
     else
     {
     return false;
     }
     }

      public function User_Details($uid) 
     {
     $username=mysql_real_escape_string($uid);
     $query=mysql_query("SELECT id,username,email FROM users WHERE id='$uid'");
        $data=mysql_fetch_array($query);
        return $data;    
	
     }
    
    // User Search   	
	  public function User_Search($searchword) 
	{
	  $q=mysql_real_escape_string($_POST['searchword']);
          $query=mysql_query("select username,uid from users where username like '%$q%' order by id LIMIT 5");
          while($row=mysql_fetch_array($query))
	  $data[]=$row;
	  return $data;
	}
	
	// Edit Type of Feed after posted 	
	  public function Edit_Type($msg_id,$type) 
	{
	 $query=mysql_query("UPDATE messages SET type='$type' WHERE msg_id='$msg_id'");
      while($row=mysql_fetch_array($query))
	  $data[]=$row;
	  return $data;
	}

	
     // Updates   	
	public function Updates($uid,$lastid,$type) 
	{
	// More Button
	
       $morequery="";
       if($lastid)
	$morequery=" and M.msg_id<'".$lastid."' ";
        // More Button End
	   if($type==NULL)	
       {
	$query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type,U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M LEFT JOIN games G on M.game_id=G.id, users U   WHERE M.type NOT IN(8,7,6,5) AND M.uid_fk=U.id and M.uid_fk='$uid' $morequery order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   }else{
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type,U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M LEFT JOIN games G on M.game_id=G.id, users U   WHERE M.type='$type' AND M.uid_fk=U.id and M.uid_fk='$uid' $morequery order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   }
	
        while($row=mysql_fetch_array($query))
	$data[]=$row;
	if(isset($data))
	return $data;
	else
	return NULL;
		
      }
	     // Total Updates   	
	  public function Total_Updates($uid) 
	 {	   
	 
	 $morequery="";
	 
	  $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created, U.username,M.uploads FROM messages M, users U  WHERE M.uid_fk=U.id and M.uid_fk='$uid' $morequery order by M.msg_id ") or die(mysql_error());
          $data=mysql_num_rows($query);
           return $data;
	}
	
	
	public function Updates_hashtag($hashtag,$lastid,$type) 
	{
	// More Button
	
       $morequery="";
       if($lastid)
	$morequery=" and M.msg_id<'".$lastid."' ";
        // More Button End
	   if($type==NULL)	
       {
	$query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type,U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M LEFT JOIN games G on M.game_id=G.id, users U   WHERE M.uid_fk=U.id AND M.message LIKE '%$hashtag%' $morequery order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   }else{
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type,U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M LEFT JOIN games G on M.game_id=G.id, users U   WHERE M.type='$type' AND M.uid_fk=U.id and M.uid_fk='$uid' $morequery order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   }
	
        while($row=mysql_fetch_array($query))
	$data[]=$row;
	if(isset($data))
	return $data;
	else
	return NULL;
		
      }
	  
	    // Total Hashtag COunt   	
	  public function Total_hashtag($hashtag) 
	 {	   
	 
	 $morequery="";
	 
	  $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created, U.username,M.uploads FROM messages M, users U  WHERE M.uid_fk=U.id AND M.message LIKE '%$hashtag%' $morequery order by M.msg_id ") or die(mysql_error());
          $data=mysql_num_rows($query);
           return $data;
	}
	
	
	// Friends_Updates   	
	  public function Game_Comments($uid,$lastid,$type,$game_id) 
	{
	  // More Button
        $morequery="";
		if($lastid)
		$morequery=" and M.msg_id<'".$lastid."' ";
	   // More Button End
	   
	   if($type==NULL)
	   {
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id  WHERE (M.uid_fk IN(SELECT `subscriber_to_id` FROM `subscriptions` WHERE `subscriber_id`='$uid') $morequery) OR (M.uid_fk='$uid' $morequery) order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   }else{
	   //if type parameter is not null,get specific type of datas.
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id  WHERE (M.uid_fk='$uid' $morequery) AND (M.type='$type' $morequery) AND (M.game_id='$game_id' $morequery)  order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   
	   }

		
         while($row=mysql_fetch_array($query))
		$data[]=$row;
		
		//Bu alanda modification yaptim.$data bos deger döndürdügünde hata veriyordu.
		if(isset($data))
	    return $data;
		else
		return NULL;
		
    }
	     //Total Friends Updates   	
	  public function Total_Game_Comments($uid,$type,$game_id) 
	{

if(!isset($morequery))
$morequery="";	 	   
	  
$query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created, U.username,M.uploads FROM messages M INNER JOIN users U on M.uid_fk=U.id WHERE (M.type='$type' AND M.game_id='$game_id' $morequery) order by M.msg_id") or die(mysql_error());

		$data=mysql_num_rows($query);
        return $data;
		
    }


    // Friends_Updates   	
	  public function Friends_Updates($uid,$lastid,$type) 
	{
	  // More Button
        $morequery="";
		if($lastid)
		$morequery=" and M.msg_id<'".$lastid."' ";
	   // More Button End
	   
	   if($type==NULL)
	   {
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id  INNER JOIN (SELECT subscriber_to_id FROM subscriptions WHERE subscriber_id='$uid') AS subscriber ON uid_fk=subscriber_to_id WHERE M.type NOT IN(8,7,6,5) $morequery order by M.msg_id DESC limit " .$this->perpage) or die(mysql_error());
	   }else{
	   //if type parameter is not null,get specific type of datas.
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id  WHERE (M.uid_fk IN(SELECT `subscriber_to_id` FROM `subscriptions` WHERE `subscriber_id`='$uid') AND M.type='$type' $morequery) OR (M.uid_fk='$uid' $morequery) AND (M.type='$type' $morequery)  order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   
	   }

		
         while($row=mysql_fetch_array($query))
		$data[]=$row;
		
		//Bu alanda modification yaptim.$data bos deger döndürdügünde hata veriyordu.
		if(isset($data))
	    return $data;
		else
		return NULL;
		
    }
	     //Total Friends Updates   	
	  public function Total_Friends_Updates($uid) 
	{

if(!isset($morequery))
$morequery="";	 	   
	  
$query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created, U.username,M.uploads FROM messages M INNER JOIN users U on M.uid_fk=U.id WHERE (M.uid_fk IN(SELECT `subscriber_to_id` FROM `subscriptions` WHERE `subscriber_id`='$uid') $morequery) OR (M.uid_fk='$uid' $morequery) order by M.msg_id") or die(mysql_error());

		$data=mysql_num_rows($query);
        return $data;
		
    }
	
	//Comments
	   public function Comments($msg_id,$second_count) 
	{
	$query='';
	  if($second_count)
	  $query="limit $second_count,2";
	    $query = mysql_query("SELECT C.com_id, C.uid_fk, C.comment, C.created, U.username,U.seo_username FROM comments C, users U WHERE C.uid_fk=U.id and C.msg_id_fk='$msg_id' order by C.com_id asc $query") or die(mysql_error());
	   while($row=mysql_fetch_array($query))
	    $data[]=$row;
        if(!empty($data))
		{
       return $data;
         }
	}
	
	
	// Friends_Updates   	
	  public function Explore_Updates($uid,$lastid,$type) 
	{
	  // More Button
        $morequery="";
		if($lastid)
		$morequery=" and M.msg_id<'".$lastid."' ";
	   // More Button End
	   
	   if($type==NULL)
	   {
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id WHERE M.type NOT IN(8,7,6,5) $morequery order by M.msg_id DESC limit " .$this->perpage) or die(mysql_error());
	   }else{
	   //if type parameter is not null,get specific type of datas.
	   $query = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created,M.type, U.username,U.seo_username,M.uploads,G.name,G.description,G.seo_url,M.game_id FROM messages M INNER JOIN users U on M.uid_fk=U.id LEFT JOIN games G on M.game_id=G.id  WHERE (M.uid_fk IN(SELECT `subscriber_to_id` FROM `subscriptions` WHERE `subscriber_id`='$uid') AND M.type='$type' $morequery) OR (M.uid_fk='$uid' $morequery) AND (M.type='$type' $morequery)  order by M.msg_id desc limit " .$this->perpage) or die(mysql_error());
	   
	   }

		
         while($row=mysql_fetch_array($query))
		$data[]=$row;
		
		//Bu alanda modification yaptim.$data bos deger döndürdügünde hata veriyordu.
		if(isset($data))
	    return $data;
		else
		return NULL;
		
    }
	
	//Avatar Image
	//From database
     public function Profile_Pic($uid) 
	{
	    $query = mysql_query("SELECT profile_pic FROM `users` WHERE id='$uid'") or die(mysql_error());
	   $row=mysql_fetch_array($query);
	   if(!empty($row['profile_pic']))
	   {
	    $profile_pic_path=$base_url.'profile_pic/';
	    $data=    $profile_pic_path.$row['profile_pic'];
        return $data;
         }
		 else
		 {
		 $data="icons/default.jpg";
		return $data;
		 }
	}
	//  Gravatar Image
	public function Gravatar($uid) 
	{
	    $query = mysql_query("SELECT email FROM `users` WHERE id='$uid'") or die(mysql_error());
	   $row=mysql_fetch_array($query);
	   if(!empty($row))
	   {
	    $email=$row['email'];
        $lowercase = strtolower($email);
        $imagecode = md5( $lowercase );
		$data="http://www.gravatar.com/avatar.php?gravatar_id=$imagecode";
		return $data;
         }
		 else
		 {
		 $data="default.jpg";
		return $data;
		 }
	}
	
	//Insert Update
	public function Insert_Update($uid, $update,$uploads,$game_id,$type) 
	{
	$update=mysql_real_escape_string($update);
      $time=time();
	   $ip=$_SERVER['REMOTE_ADDR'];
        $query = mysql_query("SELECT msg_id,message FROM `messages` WHERE uid_fk='$uid' order by msg_id desc limit 1") or die(mysql_error());
        $result = mysql_fetch_array($query);
		
        if ($update!=$result['message']) {
		  $uploads_array=explode(',',$uploads);
		  $uploads=implode(',',array_unique($uploads_array));
		  
		  if($uploads!=0)
		  $type=3;
		  
            $query = mysql_query("INSERT INTO `messages` (message, uid_fk, ip,created,uploads,game_id,type) VALUES (N'$update', '$uid', '$ip','$time','$uploads','$game_id','$type')") or die(mysql_error());
            $newquery = mysql_query("SELECT M.msg_id, M.uid_fk, M.message, M.created, U.username,U.seo_username FROM messages M, users U where M.uid_fk=U.id and M.uid_fk='$uid' order by M.msg_id desc limit 1 ");
            $result = mysql_fetch_array($newquery);
		
			 return $result;
        } 
		else
		{
				 return false;
		}
		
       
    }
	
	//Delete update
		public function Delete_Update($uid, $msg_id) 
	{
	    $query = mysql_query("DELETE FROM `comments` WHERE msg_id_fk = '$msg_id' and uid_fk='$uid' ") or die(mysql_error());
        $query = mysql_query("DELETE FROM `messages` WHERE msg_id = '$msg_id' and uid_fk='$uid'") or die(mysql_error());
        return true;
      	       
    }
	
     //Image Upload
     public function Image_Upload($uid, $image) 
     {
     //Base64 encoding
     $path="wall/";
     $img_src = $path.$image;
     $imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
     $img_base = base64_encode($imgbinary);
     $ids = 0;
     $query = mysql_query("insert into user_uploads (image_path,uid_fk)values('$image' ,'$uid')") or die(mysql_error());
     $ids = mysql_insert_id();
     return $ids;
    }
	
      //get Image Upload
	public function Get_Upload_Image($uid,$image) 
	{	
	 if($image)
	 {
	 $query = mysql_query("select id,image_path from user_uploads where image_path='$image'") or die(mysql_error());
	 }
	 else
	 {
	 $query = mysql_query("select id,image_path from user_uploads where uid_fk='$uid' order by id desc ") or die(mysql_error());
	 }
      
         $result = mysql_fetch_array($query);
		
	return $result;
    }
	
	//Id Image Upload
	public function Get_Upload_Image_Id($id) 
	{
        $query = mysql_query("select image_path from user_uploads where id='$id'") or die(mysql_error());
        $result = mysql_fetch_array($query);
		
	return $result;
        }
	
	//Insert Comments
	public function Insert_Comment($uid,$msg_id,$comment) 
	{
	$comment=mysql_real_escape_string($comment);
	
	   	    $time=time();
	   $ip=$_SERVER['REMOTE_ADDR'];
        $query = mysql_query("SELECT com_id,comment FROM `comments` WHERE uid_fk='$uid' and msg_id_fk='$msg_id' order by com_id desc limit 1 ") or die(mysql_error());
        $result = mysql_fetch_array($query);
    
		if ($comment!=$result['comment']) {
            $query = mysql_query("INSERT INTO `comments` (comment, uid_fk,msg_id_fk,ip,created) VALUES (N'$comment', '$uid','$msg_id', '$ip','$time')") or die(mysql_error());
            $newquery = mysql_query("SELECT C.com_id, C.uid_fk, C.comment, C.msg_id_fk, C.created, U.username,U.seo_username FROM comments C, users U where C.uid_fk=U.id and C.uid_fk='$uid' and C.msg_id_fk='$msg_id' order by C.com_id desc limit 1 ");
            $result = mysql_fetch_array($newquery);
         
		   return $result;
        } 
		else
		{
		return false;
		}
       
    }
	
	//Delete Comments
         public function Delete_Comment($uid, $com_id) 
	{
	 $uid=mysql_real_escape_string($uid);
	 $com_id=mysql_real_escape_string($com_id);
	

        $q=mysql_query("SELECT M.uid_fk FROM comments C, messages M WHERE C.msg_id_fk = M.msg_id AND C.com_id='$com_id'");
	$d=mysql_fetch_array($q);
	$oid=$d['uid_fk'];

	if($uid==$oid)
	{
	
	$query = mysql_query("DELETE FROM `comments` WHERE com_id='$com_id'") or die(mysql_error());
        return true;
      	}
	else
	{
	
        $query = mysql_query("DELETE FROM `comments` WHERE uid_fk='$uid' and com_id='$com_id'") or die(mysql_error());
        return true;
	}
       }

       //Friends List
         public function Friends_List($uid, $page, $offset, $rowsPerPage) 
	{
	     $uid=mysql_real_escape_string($uid);
	     $page=mysql_real_escape_string($page);
	     $offset=mysql_real_escape_string($offset);
	     $rowsPerPage=mysql_real_escape_string($rowsPerPage);

	    if($page)
	    $con=$offset.",".$rowsPerPage;
	    else
	    $con=$rowsPerPage;
	    
	  

	    $query=mysql_query("SELECT U.username, U.id FROM users U, friends F WHERE U.id=F.friend_two AND F.friend_one='$uid' AND F.role='fri' ORDER BY F.friend_id DESC LIMIT $con")or die(mysql_error());
	   while($row=mysql_fetch_array($query))
	   $data[]=$row;
	   return $data;
      	       
       }

      

        public function Friends_Check($uid,$fid)
	{
	$query=mysql_query("SELECT role FROM friends WHERE friend_one='$uid' AND friend_two='$fid'") or die(mysql_error());	
	$num=mysql_fetch_array($query);
	return $num['role'];
	}
	
	public function Friends_Check_Count($uid,$fid)
	{
	$query=mysql_query("SELECT friend_id FROM friends WHERE friend_one='$uid' AND friend_two='$fid'") or die(mysql_error());	
	$num=mysql_num_rows($query);
	return $num;
	}
	
	// Add Friend
	public function Add_Friend($uid,$fid)
	{
	$fid=mysql_real_escape_string($fid);
	$q=mysql_query("SELECT friend_id FROM friends WHERE friend_one='$uid' AND friend_two='$fid' AND role='fri'");
	if(mysql_num_rows($q)==0)
	{
	$query=mysql_query("INSERT INTO friends(friend_one,friend_two,role) VALUES ('$uid','$fid','fri')") or die(mysql_error());	
	$query=mysql_query("UPDATE users SET friend_count=friend_count+1 WHERE id='$uid'") or die(mysql_error());	
	return true;
	}
	}
	
	// Remove Friend
	public function Remove_Friend($uid,$fid)
	{
	$fid=mysql_real_escape_string($fid);
	$q=mysql_query("SELECT friend_id FROM friends WHERE friend_one='$uid' AND friend_two='$fid' AND role='fri'");
	if(mysql_num_rows($q)==1)
	{
	$query=mysql_query("DELETE FROM friends WHERE friend_one='$uid' AND friend_two='$fid'") or die(mysql_error());
	$query=mysql_query("UPDATE users SET friend_count=friend_count-1 WHERE id='$uid'") or die(mysql_error());	
	return true;
	}
	
	}
	

    

}

?>
