# Auto Login v3.4 #

A CakePHP Component that will automatically login the Auth session for a duration if the user requested to (saves data to cookies).

This version is only compatible with CakePHP 2.x.

## Compatibility ##

* v2.x - CakePHP 1.3
* v3.x - CakePHP 2.x

## Requirements ##

* PHP 5.2, 5.3

## Features ##

* Requires no installation except for adding the checkbox into your user login forms
* Using `requirePrompt` as `false` does not even require that (but use with caution!) 
* Automatically saves the cookie and info when a user logs in
* Automatically kills the cookie and session when a user logs out
* Inserts a hash within the cookie so that it cannot be hijacked
* Encrypts the cookie so the information cannot be harvested
* Configuration options for cookie name and length
* Functionality for additional user updating or error logging
* Minor support for localhost cookies
* Can be enabled/disabled dynamically using Configure

## Documentation ##

Thorough documentation can be found here: http://milesj.me/code/cakephp/auto-login


AutoLogin

Version: 3.4 (logs)
Package: Component: Persistent User Login
Category: CakePHP
Views: 12,301
Permalink - Tinylink

AutoLogin is a CakePHP Component that will automatically login an Auth session if the user agrees to. The user has the ability to "remember" their login info when logging in and AutoLogin will store their information in a cookie to automatically log them in on their next visit.

Class Features:
Requires no installation except for adding the checkbox into your user login forms
Automatically saves the cookie and info when a user logs in
Automatically kills the cookie and session when a user logs out
Inserts a hash within the cookie so that it cannot be hijacked
Encrypts the cookie so the information cannot be harvested
Configuration options for cookie name and length
Functionality for additional user updating or error logging
Minor support for localhost cookies
Can be enabled/disabled dynamically using Configure
Related Entries:
AutoLogin v3.4 // Feb 7th, 23:22
AutoLogin v3.3 // Feb 1st, 22:28
AutoLogin v3.2 // Dec 20th 2011, 22:02
Upgrading AutoLogin v2.2 to v3 // Dec 1st 2011, 23:57

Advertise Here
Top
1 - Installation

Once the Component has been added to your application, add it to your Controllers $components property. This component should be included before the AuthComponent in order to avoid race conditions and "not logged in" messages triggered.

public $components = array('AutoLogin', 'Auth');


The AutoLogin component will automatically save the user info to a cookie when they login at the location given for the Auth property $loginAction. It also works when logging out by removing the cookie.

Next create a checkbox in your login form named auto_login. The model used in the form should also match the User model you are using in your Auth.

echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Log me in automatically?'));


I highly suggest that you define all the redirects, validation and login logic within your login action.

public function login() {
	if ($this->User->validates()) {
		if ($this->Auth->user()) {
			$this->redirect($this->Auth->redirect());
		}
	}
}
Top
2 - Configuration

If you would like to change the name of the cookie, or the duration until the cookie expires (defaults to 2 weeks), or overwrite the username and password fields, you can change it in your AppController's beforeFilter().

Additionally, AutoLogin will try to determine what controller and action your login takes place at, by using the Auth::$loginAction property. If it cannot determine the urls, you can set fallbacks by editing the $settings property (you must supply all settings if you are overwriting).

public function beforeFilter() {
	$this->AutoLogin->settings = array(
		// Model settings
		'model' => 'Member',
		'username' => 'name',
		'password' => 'pass',
 
		// Controller settings
		'plugin' => '',
		'controller' => 'members',
		'loginAction' => 'signin',
		'logoutAction' => 'signout',
 
		// Cookie settings
		'cookieName' => 'rememberMe',
		'expires' => '+1 month',
 
		// Process logic
		'active' => true,
		'redirect' => true,
		'requirePrompt' => true
	);
}


Most of the settings above are pretty self-explanatory, however I will briefly explain the process logic settings.

active (default true) - If false, will exit out of the auto login process early
redirect (default true) - This will force an HTTP redirect after successful login
requirePrompt (default true) - If false, a checkbox will not be required in the form
Top
3 - Login Callbacks

If you need to do additional logging and updating that is not initially in Auths user login (for example updating a users last login time), you can place this extra code in a method called _autoLogin() within your AppController. If Auth login fails, you can do some error logging and reporting by creating a method called _autoLoginError(). Both of these will be called automatically and only if the method exists.

class AppController extends Controller {
 
	/**
	 * Run whenever auto login is successful.
	 *
	 * @param array $user - The Auth user session
	 */
	public function _autoLogin($user) {
	}
 
	/**
	 * Run whenever auto login fails.
	 *
	 * @param array $cookie - The login cookie data
	 */
	public function _autoLoginError($cookie) {
	}
 
}
Top
4 - Live Debugging

It can be quite difficult to debug this component if something is not working, simply because this component is automatically ran on each page load and during the login process. You can enable an internal debug system that will email you cookie and user information at specific events so that you may figure out which step the script is dying on. The debug settings take an email (where the debug will be sent) and an array of IPs (emails will only be sent if you are browsing with these IPs). To use the debug, simply set it in bootstrap.php.

Configure::write('AutoLogin', array(
	'email' => 'email@domain.com',
	'ips' => array('127.0.0.1')
));


Additionally, you can restrict the scope in which the debug emails are delivered. The following scopes are available: login, loginFail, loginCallback, logout, logoutCallback, cookieSet, cookieFail, hashFail, custom (for you to trigger manually).

Configure::write('AutoLogin.scope', array('login', 'logout'));


If no email has been defined, debug information will be stored in your systems debug log file.
Top
5 - Suhosin Troubleshooting

If you have Suhosin installed alongside PHP, you may run into problems with cookie encryption. The problem arises from Suhosin's random seeding which causes unexpected results.

The AutoLogin component comes packaged with a test case that you can run to determine if you have the Suhosin srand bug. If you do have the bug, apply the following setting in your /etc/php5/apache2/php.ini.

suhosin.srand.ignore = Off


And don't forget to restart Apache or at least run:

/etc/init.d/apache2 force-reload


More information on the problem can be found here: http://milesj.me/blog/read/security-cipher-suhosin
