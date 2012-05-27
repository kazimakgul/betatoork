<?php

App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Amazonsdk.Controller');
App::uses('AmazonComponent', 'Amazonsdk.Controller/Component');

// A fake controller to test against
class TestAmazonController extends Controller {
}

class AmazonComponentTest extends CakeTestCase {

  public $Amazon = null;
  public $Controller = null;

  public function setUp() {
    parent::setUp();
    // Setup our component and fake test controller
    $Collection = new ComponentCollection();
    $this->Amazon = new AmazonComponent($Collection);
    $this->Controller = new TestAmazonController();
    $this->Amazon->initialize($this->Controller);
  }
  
  public function tearDown() {
    parent::tearDown();
    // Clean up after we're done
    unset($this->Amazon);
    unset($this->Controller);
  }
  
  /**
   * test get_canonical_user_id()
   */
  public function testGetCanonicalUserId() {
    $result = $this->Amazon->S3->get_canonical_user_id();
    $this->assertTrue(isset($result['display_name']));
  }
}