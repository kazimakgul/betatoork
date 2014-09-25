<?php
    
    $index = $this->Html->url(array("controller" => "games", "action" => "index"));

?>

<body id="docs" data-spy="scroll" data-target="#guide">
	<div id="guide">
		<h1 class="logo">
			<a href="<?php echo $index; ?>">Clone</a>
		</h1>
		<ul class="menu nav">
            <li>
			  	<a href="#intro">Introduction</a>
			</li>
			<li>
			  	<a href="#auth">Authentication</a>
			</li>
			<li>
				<a href="#games">Games</a>
				<ul class="nav">
				    <li><a href="#js-individual-compiled">Retrieve a Game</a></li>
				    <li><a href="#js-data-attrs">Create a Game</a></li>
				    <li><a href="#js-programmatic-api">Delete a Game</a></li>
			  	</ul>
			</li>
			<li>
			  	<a href="#users">Channels</a>
			  	<ul class="nav">
			    	<li><a href="#users">Retrieve a Channel</a></li>
			    	<li><a href="#users">Create a Channel</a></li>
			    	<li><a href="#users">Delete a Channel</a></li>
			  	</ul>
			</li>
			<li>
			  	<a href="#orders">Follow</a>
			</li>
			<li>
			  	<a href="#errors">Errors</a>
			</li>
		</ul>
	</div>

	<div id="api-docs">
		<div id="methods">
			<div class="languages">
				<a class="language selected" data-lang="ruby" href="#">Ruby</a>
				<a class="language" data-lang="python" href="#">Python</a>
				<a class="language" data-lang="php" href="#">PHP</a>
			</div>
			<div class="method" id="intro">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Introduction</h3>
						<p>
							Clone API is a solution for the developers who, thinks to create a customized app, plugin or theme for their needs. You can use it for your own purposes if you want to showcase your App to your customers.
							
						</p> 
						<p>
							You can use the API and use the code with anything you like and use only the languages that you want, the code syntax highlighting is made using and supports a good 
							variety of languages. Use your imagination to build a custom CLONE clone app :)
						</p>
					</div>
					<div class="method-example">
<pre>
<code class="ruby"># Become a verified developer to be able to use API.

Clone.api_key = "In here goes your api key!"</code><code class="python"># Become a verified developer to be able to use API.

Clone.api_key = "In here goes your api key!"</code><code class="php"># Become a verified developer to be able to use API.

Clone::setApiKey("In here goes your api key!");</code>
</pre>
					</div>
				</div>
			</div>
			<div class="method" id="auth">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Authentication</h3>
						<p>
							First of all you will need to be registered as an official clone developer to be able to get your API key and authenticate your apps to the clone cloud servers.
						</p>
					</div>
					<div class="method-example">
<pre>
<code class="ruby">class A < B 
	def self.create(object = User) 
		return object 
	end

	def full_name
		return "#{self.first_name} #{self.last_name}"
	end
end
</code><code class="python">class Mapping:
	def __init__(self, iterable):
		self.items_list = []
		self.__update(iterable)

	def update(self, iterable):
		for item in iterable:
			self.items_list.append(item)
</code><code class="php">class myClass {
	var $input;
	var $output;

	function myClass($input) {
		$output = 'You entered: ' . $input;
		return $output;
	}
}
</code>
</pre>
					</div>
				</div>
			</div>
			<div class="method" id="games">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Games</h3>
						<p>
							All the games in the clone platform are flexible objects where you can clone, favorite, pull or push depends on your needs. You can define new games or socialize a game as a unique object.
						</p> 
						<p>
							Create a game object via the api request and clone it or push it to other channels you own. pull al the games a channel have and create a new channel with its feeds.
						</p>
						<div class="info">
							<h4>The Game Object</h4>
							<div class="field clearfix">
								<div class="key">name:</div>
								<div class="desc">
									<strong>string</strong>
									The name of the game
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">channel:</div>
								<div class="desc">
									<strong>string</strong>
									The name of the channel creator
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">some_key:</div>
								<div class="desc">
									<strong>string</strong>
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">rating:</div>
								<div class="desc">
									<strong>integer</strong>
									The rating of the game from 0 to 100.
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">description:</div>
								<div class="desc">
									<strong>hash</strong>
									key/value pairs with fields that describe the game.
								</div>
							</div>
						</div>
					</div>
					<div class="method-example">
<pre>
<code class="ruby">Clone::Game.create(
  :name => "Super Mario Bros",
  :company => "Nintendo",
  :some_key => "yey_JA390094AWPIWWN435",
  :rating => 100
)
</code><code class="python">Clone.Game.create(
  name="Super Mario Bros",
  company="Nintendo",
  some_key="yey_JA390094AWPIWWN435"
  rating=100
)
</code><code class="php">Clone_Charge::create(array(
  "name" => "Super Mario Bros",
  "company" => "Nintendo",
  "some_key" => "yey_JA390094AWPIWWN435"
  "rating" => 100
));
</code>
<code class="ruby always-visible"># Object Response
{
  "object": "Game",
  "name": "Super Mario Bros",
  "company": "Nintendo",
  "some_key": "yey_JA390094AWPIWWN435",
  "rating": 100
  "description": {
    "some_desc1": null,
    "some_desc2": null,
    "some_desc3": null,
    "some_desc4": null,
  }
  "valid": true,
  "other_field": null
}	
</code>
</pre>
					</div>
				</div>
			</div>
			<div class="method" id="users">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Channels</h3>
						<p>
							Get in touch with the most popular channels in clone and share their works, games, followers with your own users.
						</p>
						<div class="info">
							<h4>The Channel Object</h4>
							<div class="field clearfix">
								<div class="key">name:</div>
								<div class="desc">
									<strong>string</strong>
									The name of the user/channel
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">email:</div>
								<div class="desc">
									<strong>string</strong>
									The email of the user
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">country:</div>
								<div class="desc">
									<strong>string</strong>
									2 letter code for the country
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">age:</div>
								<div class="desc">
									<strong>integer</strong>
									Age of the user
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">description:</div>
								<div class="desc">
									<strong>hash</strong>
									key/value pairs with fields that describe the user.
								</div>
							</div>
						</div>
					</div>
					<div class="method-example">
<pre>
<code class="ruby">Clone::User.create(
  :name => "John McClane",
  :email => "john_mcclane@awesome.com",
  :country => "US",
  :some_key => "yey_JA390094AWPIWWN435",
  :age => 53
)
</code><code class="python">Clone.User.create(
  name="John McClane",
  email="john_mcclane@awesome.com",
  country="US",
  some_key="yey_JA390094AWPIWWN435",
  age=53
)
</code><code class="php">Clone_User::create(array(
  "name" => "John McClane",
  "email" => "john_mcclane@awesome.com",
  "country" => "US",
  "some_key" => "yey_JA390094AWPIWWN435",
  "age" => 53
));
</code>
<code class="ruby always-visible"># Object Response
{
  "object": "User",
  "name": "John McClane",
  "email": "john_mcclane@awesome.com",
  "country": "US",
  "some_key": "yey_JA390094AWPIWWN435",
  "age": 53
  "address": {
    "address_line1": null,
    "address_line2": null,
    "address_city": null,
    "address_state": null,
    "address_zip": null,
    "address_country": null
  }
  "valid": true,
  "description": null
}
</code>
</pre>
					</div>
				</div>
			</div>
			<div class="method" id="orders">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Follow</h3>
						<p>
							Follow action can be used via clone api so any user that follows you can have more information from you. Just send them newly published games or reach their favorite games and stuff
						</p>
					</div>
					<div class="method-example">
<pre>
<code class="ruby">Clone::Follow.create(
  :item => "Socialesman",
  :price => 1500,
  :name => "John McClane",
  :email => "john_mcclane@awesome.com",
  :country => "US",
  :some_key => "yey_JA390094AWPIWWN435",
  :age => 53
)
</code><code class="python">Clone.Follow.create(
  item="Socialesman",
  price=1500,
  name="John McClane",
  email="john_mcclane@awesome.com",
  country="US",
  some_key="yey_JA390094AWPIWWN435",
  age=53
)
</code><code class="php">Clone_Follow::create(array(
  "item" => "Socialesman",
  "price" => 1500,
  "name" => "John McClane",
  "email" => "john_mcclane@awesome.com",
  "country" => "US",
  "some_key" => "yey_JA390094AWPIWWN435",
  "age" => 53
));
</code>
<code class="ruby always-visible"># Object Response
{
  "object": "Follow",
  "item": "Socialesman",
  "price": 1500,
  "name": "John McClane",
  "email": "john_mcclane@awesome.com",
  "country": "US",
  "some_key": "yey_JA390094AWPIWWN435",
  "age": 53
  "address": {
    "address_line1": null,
    "address_line2": null,
    "address_city": null,
    "address_state": null,
    "address_zip": null,
    "address_country": null
  }
  "valid": true,
  "description": null
}
</code>
</pre>
					</div>
				</div>
			</div>
			<div class="method" id="errors">
				<div class="method-section clearfix">
					<div class="method-description">
						<h3>Errors</h3>
						<p>
							After you API calls you will be easily track the return of your calls to take new actions.
						</p>
						<div class="info">
							<h4>Attributes</h4>
							<div class="field clearfix">
								<div class="key">code:</div>
								<div class="desc">
									<strong>string</strong>
									Code of the error
								</div>
							</div>
							<div class="field clearfix">
								<div class="key">message:</div>
								<div class="desc">
									<strong>string</strong>
									A complete message with details about the error to show users.
								</div>
							</div>
						</div>
					</div>
					<div class="method-example">
<pre>
<code class="http always-visible">200 OK - Everything worked.

400 Bad Request - The request was badly built

401 Unauthorized - Some other message

402 Request Failed - The request failed

404 Not Found - Doesn't exist

500, 502, 503, 504 Server errors
</code>
</pre>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
