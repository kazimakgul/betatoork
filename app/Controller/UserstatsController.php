<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class UserstatsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
	echo 'hoooo';
		$a=$this->Userstat->find('all');
		print_r($a);
		
	}


}
