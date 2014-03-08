<?php

App::uses('Component', 'Controller');

class CommonComponent extends Component {



  //ne ise yariyor ögren?
  function startup(&$controller) {
    $this->controller = $controller; // Stores reference Controller in the component
  }


   function secureSuperGlobalPOST($value)
    {
	    $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_replace("script", "blocked", $string);
        $string = mysql_escape_string($string);
		$string = htmlentities($string);
		$string = str_replace("_", "", $string);
        return $string;
    }
   

}