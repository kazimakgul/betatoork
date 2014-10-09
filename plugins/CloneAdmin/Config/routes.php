<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Toork Technology, Inc. (http://toork.com)
 *
 * @copyright     Copyright (c) Toork Technology, Inc. (http://toork.com)
 * @link          http://clone.gs Clone Project
 * @package       CloneAdmin
 * @author        Ogi
 */

Router::connect('/admins/channels', array('plugin' => 'clone_admin', 'controller' => 'admins', 'action'=>'channels'));
Router::connect('/admins/games', array('plugin' => 'clone_admin', 'controller' => 'admins', 'action'=>'games'));




?>
