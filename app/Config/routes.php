<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

/*
 * Routers for side bar function inside dashboard
 * Business clone link system
 */
//
//Router::connect('/', array('controller' => 'games', 'action' => 'index'));
Router::connect('/dashboard', array('controller' => 'businesses', 'action' => 'dashboard'));
Router::connect('/dashboard/search/:filter', array('controller' => 'businesses', 'action' => 'main_search'), array('pass' => array('filter'),'filter' => '/games|channels/'));
Router::connect('/dashboard/search/*', array('controller' => 'businesses', 'action' => 'main_search'));
Router::connect('/mygames/search/:filter', array('controller' => 'businesses', 'action' => 'mygames_search'), array('pass' => array('filter'), 'filter' => 'mobiles'));
Router::connect('/mygames/search/:filter', array('controller' => 'businesses', 'action' => 'mygames_search'), array('pass' => array('filter'), 'filter' => 'featured'));
Router::connect('/mygames/search/*', array('controller' => 'businesses', 'action' => 'mygames_search'));
Router::connect('/mygames/:filter', array('controller' => 'businesses', 'action' => 'mygames'), array('pass' => array('filter'), 'filter' => 'mobiles'));
Router::connect('/mygames/:filter', array('controller' => 'businesses', 'action' => 'mygames'), array('pass' => array('filter'), 'filter' => 'featured'));
Router::connect('/mygames', array('controller' => 'businesses', 'action' => 'mygames'));
Router::connect('/mygames/sort/a-z/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Game.name', 'direction' => 'asc'));
Router::connect('/mygames/sort/z-a/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Game.name', 'direction' => 'desc'));
Router::connect('/mygames/sort/most-cloned/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.channelclone', 'direction' => 'desc'));
Router::connect('/mygames/sort/least-cloned/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.channelclone', 'direction' => 'asc'));
Router::connect('/mygames/sort/most-favorited/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.favcount', 'direction' => 'desc'));
Router::connect('/mygames/sort/least-favorited/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.favcount', 'direction' => 'asc'));
Router::connect('/mygames/sort/most-played/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
Router::connect('/mygames/sort/least-played/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Gamestat.playcount', 'direction' => 'asc'));
Router::connect('/mygames/sort/highest-rating/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Game.starsize', 'direction' => 'desc'));
Router::connect('/mygames/sort/least-rating/*', array('controller' => 'businesses', 'action' => 'mygames', 'sort' => 'Game.starsize', 'direction' => 'asc'));
Router::connect('/mygames/*', array('controller' => 'businesses', 'action' => 'mygames'));

Router::connect('/favorites/search/*', array('controller' => 'businesses', 'action' => 'favorites_search'));
Router::connect('/favorites', array('controller' => 'businesses', 'action' => 'favorites'));
Router::connect('/favorites/sort/a-z/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Game.name', 'direction' => 'asc'));
Router::connect('/favorites/sort/z-a/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Game.name', 'direction' => 'desc'));
Router::connect('/favorites/sort/most-cloned/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.channelclone', 'direction' => 'desc'));
Router::connect('/favorites/sort/least-cloned/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.channelclone', 'direction' => 'asc'));
Router::connect('/favorites/sort/most-favorited/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.favcount', 'direction' => 'desc'));
Router::connect('/favorites/sort/least-favorited/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.favcount', 'direction' => 'asc'));
Router::connect('/favorites/sort/most-played/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
Router::connect('/favorites/sort/least-played/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Gamestat.playcount', 'direction' => 'asc'));
Router::connect('/favorites/sort/highest-rating/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Game.starsize', 'direction' => 'desc'));
Router::connect('/favorites/sort/least-rating/*', array('controller' => 'businesses', 'action' => 'favorites', 'sort' => 'Game.starsize', 'direction' => 'asc'));
Router::connect('/favorites/add/*', array('controller' => 'favorites', 'action' => 'add'));
Router::connect('/favorites/*', array('controller' => 'businesses', 'action' => 'favorites'));

Router::connect('/explore/games/search/:filter', array('controller' => 'businesses', 'action' => 'exploregames_search'), array('pass' => array('filter'), 'filter' => 'mobiles|fullscreen|embed'));
Router::connect('/explore/games/search/*', array('controller' => 'businesses', 'action' => 'exploregames_search'));
Router::connect('/explore/games/:filter', array('controller' => 'businesses', 'action' => 'exploregames'), array('pass' => array('filter'), 'filter' => 'mobiles|fullscreen|embed'));
Router::connect('/explore/games', array('controller' => 'businesses', 'action' => 'exploregames'));
Router::connect('/explore/games/sort/a-z/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.name', 'direction' => 'asc'));
Router::connect('/explore/games/sort/z-a/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.name', 'direction' => 'desc'));
Router::connect('/explore/games/sort/most-cloned/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.channelclone', 'direction' => 'desc'));
Router::connect('/explore/games/sort/least-cloned/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.channelclone', 'direction' => 'asc'));
Router::connect('/explore/games/sort/most-favorited/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.favcount', 'direction' => 'desc'));
Router::connect('/explore/games/sort/least-favorited/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.favcount', 'direction' => 'asc'));
Router::connect('/explore/games/sort/most-played/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
Router::connect('/explore/games/sort/least-played/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.playcount', 'direction' => 'asc'));
Router::connect('/explore/games/sort/highest-rating/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.starsize', 'direction' => 'desc'));
Router::connect('/explore/games/sort/least-rating/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.starsize', 'direction' => 'asc'));
Router::connect('/explore/games/sort/newest/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.id', 'direction' => 'desc'));
Router::connect('/explore/games/sort/oldest/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Game.id', 'direction' => 'asc'));
Router::connect('/explore/games/sort/recommend/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.potential', 'direction' => 'desc'));
Router::connect('/explore/games/sort/low-score/*', array('controller' => 'businesses', 'action' => 'exploregames', 'sort' => 'Gamestat.potential', 'direction' => 'asc'));
Router::connect('/explore/games/*', array('controller' => 'businesses', 'action' => 'exploregames'));

Router::connect('/dashboard/welcome', array('controller' => 'businesses', 'action' => 'startup'));

Router::connect('/following/search/*', array('controller' => 'businesses', 'action' => 'following_search'));
Router::connect('/following', array('controller' => 'businesses', 'action' => 'following'));
Router::connect('/following/sort/a-z/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'User.username', 'direction' => 'asc'));
Router::connect('/following/sort/z-a/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'User.username', 'direction' => 'desc'));
Router::connect('/following/sort/most-followed/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.subscribeto', 'direction' => 'desc'));
Router::connect('/following/sort/least-followed/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.subscribeto', 'direction' => 'asc'));
Router::connect('/following/sort/most-following/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.subscribe', 'direction' => 'desc'));
Router::connect('/following/sort/least-following/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.subscribe', 'direction' => 'asc'));
Router::connect('/following/sort/most-game-added/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.uploadcount', 'direction' => 'desc'));
Router::connect('/following/sort/least-game-added/*', array('controller' => 'businesses', 'action' => 'following', 'sort' => 'Userstat.uploadcount', 'direction' => 'asc'));
Router::connect('/following/*', array('controller' => 'businesses', 'action' => 'following'));

Router::connect('/followers/search/*', array('controller' => 'businesses', 'action' => 'followers_search'));
Router::connect('/followers', array('controller' => 'businesses', 'action' => 'followers'));
Router::connect('/followers/sort/a-z/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'User.username', 'direction' => 'asc'));
Router::connect('/followers/sort/z-a/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'User.username', 'direction' => 'desc'));
Router::connect('/followers/sort/most-followed/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.subscribeto', 'direction' => 'desc'));
Router::connect('/followers/sort/least-followed/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.subscribeto', 'direction' => 'asc'));
Router::connect('/followers/sort/most-following/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.subscribe', 'direction' => 'desc'));
Router::connect('/followers/sort/least-following/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.subscribe', 'direction' => 'asc'));
Router::connect('/followers/sort/most-game-added/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.uploadcount', 'direction' => 'desc'));
Router::connect('/followers/sort/least-game-added/*', array('controller' => 'businesses', 'action' => 'followers', 'sort' => 'Userstat.uploadcount', 'direction' => 'asc'));
Router::connect('/followers/*', array('controller' => 'businesses', 'action' => 'followers'));

Router::connect('/add/ads', array('controller' => 'businesses', 'action' => 'add_ads'));
Router::connect('/explore/channels/search', array('controller' => 'businesses', 'action' => 'explorechannels_search'));

Router::connect('/explore/channels', array('controller' => 'businesses', 'action' => 'explorechannels'));
Router::connect('/explore/channels/sort/a-z/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'User.username', 'direction' => 'asc'));
Router::connect('/explore/channels/sort/z-a/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'User.username', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/most-followed/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.subscribeto', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/least-followed/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.subscribeto', 'direction' => 'asc'));
Router::connect('/explore/channels/sort/most-following/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.subscribe', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/least-following/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.subscribe', 'direction' => 'asc'));
Router::connect('/explore/channels/sort/most-game-added/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.uploadcount', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/least-game-added/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.uploadcount', 'direction' => 'asc'));
Router::connect('/explore/channels/sort/newest/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'User.id', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/oldest/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'User.id', 'direction' => 'asc'));
Router::connect('/explore/channels/sort/recommend/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.potential', 'direction' => 'desc'));
Router::connect('/explore/channels/sort/low-score/*', array('controller' => 'businesses', 'action' => 'explorechannels', 'sort' => 'Userstat.potential', 'direction' => 'asc'));
Router::connect('/explore/channels/*', array('controller' => 'businesses', 'action' => 'explorechannels'));

Router::connect('/activity', array('controller' => 'businesses', 'action' => 'activities'));
Router::connect('/activity/*', array('controller' => 'businesses', 'action' => 'activities'));
Router::connect('/settings/channel', array('controller' => 'businesses', 'action' => 'channel_settings'));
Router::connect('/settings/profile', array('controller' => 'businesses', 'action' => 'settings'));
Router::connect('/settings/notifications', array('controller' => 'businesses', 'action' => 'notifications'));
Router::connect('/settings/ads', array('controller' => 'businesses', 'action' => 'ads_management'));
Router::connect('/settings/socials', array('controller' => 'businesses', 'action' => 'social_management'));
Router::connect('/settings/password', array('controller' => 'businesses', 'action' => 'password_change'));
Router::connect('/game/add', array('controller' => 'businesses', 'action' => 'game_add'));
Router::connect('/game/edit/:game_id', array('controller' => 'businesses', 'action' => 'game_edit'), array('game_id' => '[-a-z0-9]+', 'pass' => array('game_id')));
Router::connect('/game/edit/*', array('controller' => 'businesses', 'action' => 'game_edit'));
Router::connect('/register', array('controller' => 'users', 'action' => 'register2'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login3'));
Router::connect('/logout', array('controller' => 'businesses', 'action' => 'logout'));


//sil
//Router::connect('/games/high-rate', array('controller' => 'businesses', 'action' => 'toprated',2, 'sort' => 'starsize', 'direction' => 'desc'));
//Router::connect('/games/a-z', array('controller' => 'businesses', 'action' => 'toprated',2, 'sort' => 'name', 'direction' => 'desc'));


/*
 * Routers for general functions
 * Business clone link system
 */
//Router::connect('/search',array('controller'=>'businesses','action'=>'search2'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/games', array('controller' => 'games', 'action' => 'index'));
Router::connect('/wallentries/*', array('controller' => 'businesses', 'action' => 'dashboard'));

/**
 * ...Generatin seo url
 */
Router::connect('/:channel/:seo_url/play', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'seo_url' => '[-a-z0-9]+', 'pass' => array('channel', 'seo_url')));
Router::connect('/:channel/:seo_url/play2', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'seo_url' => '[-a-z0-9]+', 'pass' => array('channel', 'seo_url')));


//<----New Routing Actions
Router::connect('/:channel/:seo_url/playframe', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'seo_url' => '[-a-z0-9]+', 'pass' => array('channel', 'seo_url')));
Router::connect('/:channel/:seo_url/playgame', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'seo_url' => '[-a-z0-9]+', 'pass' => array('channel', 'seo_url')));
Router::connect('/:channel/go', array('controller' => 'games', 'action' => 'profile'), array('channel' => '[-a-z0-9]+', 'pass' => array('channel')));

//<---/New Routing Actions

Router::connect('/:channel/:seo_url/playgame', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'seo_url' => '[-a-z0-9]+', 'pass' => array('channel', 'seo_url')));
Router::connect('/:channel/news', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'pass' => array('channel')));
Router::connect('/:channel/news/:type', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'type' => '[-a-z0-9]+', 'pass' => array('channel', 'type')));
Router::connect('/:channel', array('controller' => 'businesses', 'action' => 'dashboard'), array('channel' => '[-a-z0-9]+', 'pass' => array('channel')));
Router::connect('/games/search/:userid/:searchterm', array('controller' => 'businesses', 'action' => 'search2'), array('pass' => array('userid', 'searchterm'), 'userid' => '[0-9]+'));

//Using Subdomain included Url Routes
//http://stackoverflow.com/questions/10553055/add-a-subdomain-to-all-urls-in-cakephp
//additonal for subdomain access:http://stackoverflow.com/questions/15065015/make-session-valid-with-all-subdomains
//additional:http://theworldinpixels.com/wildcard-subdomains-in-cakephp/
//http://stackoverflow.com/questions/5808441/routing-a-subdomain-in-cakephp-with-html-helper
$subdomain = substr(env("HTTP_HOST"), 0, strpos(env("HTTP_HOST"), "."));

if (
        (strlen($subdomain) > 0 &&
        $subdomain != "m" &&
        $subdomain != "test" &&
        $subdomain != "127" &&
        $subdomain != "www" &&
        /*$subdomain != "domains" &&*/
        $subdomain != "clone") || checkdnsrr(env("HTTP_HOST"), "CNAME")
) {
    //  Mobile detection begins
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $preg_mobile = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4));
    if ($preg_mobile) {
        Router::connect('/', array('controller' => 'mobiles', 'action' => 'index', 'sort' => 'Gamestat.potential', 'direction' => 'desc'));
        Router::connect('/play/:seo_url', array('controller' => 'mobiles', 'action' => 'play'), array('seo_url' => '[-a-z0-9]+', 'pass' => array('seo_url')));
        Router::connect('/detail/:seo_url', array('controller' => 'mobiles', 'action' => 'play'), array('seo_url' => '[-a-z0-9]+', 'pass' => array('seo_url')));
        Router::connect('/games/top-rated/*', array('controller' => 'mobiles', 'action' => 'index', 'sort' => 'starsize', 'direction' => 'desc'));
        Router::connect('/games/most-played/*', array('controller' => 'mobiles', 'action' => 'index', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
        Router::connect('/games/newest/*', array('controller' => 'mobiles', 'action' => 'index', 'sort' => 'id', 'direction' => 'desc'));
        Router::connect('/games/trending/*', array('controller' => 'mobiles', 'action' => 'index', 'sort' => 'Gamestat.potential', 'direction' => 'desc'));
        Router::connect('/games/appstore/*', array('controller' => 'mobiles', 'action' => 'store_games'));
        Router::connect('/games/search/*', array('controller' => 'mobiles', 'action' => 'search2'));
    } else {
        //  Mobile detection ends
        Router::connect('/', array('controller' => 'businesses', 'action' => 'mysite'));
        Router::connect('/play/:seo_url', array('controller' => 'businesses', 'action' => 'play'), array('seo_url' => '[-a-z0-9]+', 'pass' => array('seo_url')));
        
        Router::connect('/category/:cat_url', array('controller' => 'businesses', 'action' => 'category'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/newest', array('controller' => 'businesses', 'action' => 'category','sort' => 'id', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/newest/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'id', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/oldest', array('controller' => 'businesses', 'action' => 'category','sort' => 'id', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/oldest/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'id', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/a-z', array('controller' => 'businesses', 'action' => 'category','sort' => 'name', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/a-z/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'name', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/z-a', array('controller' => 'businesses', 'action' => 'category','sort' => 'name', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/z-a/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'name', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/high-rate', array('controller' => 'businesses', 'action' => 'category','sort' => 'starsize', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/high-rate/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'starsize', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/low-rate', array('controller' => 'businesses', 'action' => 'category','sort' => 'starsize', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/low-rate/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'starsize', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/most-played', array('controller' => 'businesses', 'action' => 'category','sort' => 'Gamestat.playcount', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/most-played/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'Gamestat.playcount', 'direction' => 'desc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/least-played', array('controller' => 'businesses', 'action' => 'category','sort' => 'Gamestat.playcount', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/:cat_url/least-played/*', array('controller' => 'businesses', 'action' => 'category','sort' => 'Gamestat.playcount', 'direction' => 'asc'), array('cat_url' => '[-a-z0-9]+', 'pass' => array('cat_url')));
        Router::connect('/category/*', array('controller' => 'businesses', 'action' => 'category'));
        
        Router::connect('/games/hot', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.potential', 'direction' => 'desc'));
        Router::connect('/games/hot/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.potential', 'direction' => 'desc'));
        Router::connect('/games/newest', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'id', 'direction' => 'desc'));
        Router::connect('/games/newest/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'id', 'direction' => 'desc'));
        Router::connect('/games/a-z', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'name', 'direction' => 'asc'));
        Router::connect('/games/a-z/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'name', 'direction' => 'asc'));
        Router::connect('/games/z-a', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'name', 'direction' => 'desc'));
        Router::connect('/games/z-a/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'name', 'direction' => 'desc'));
        Router::connect('/games/oldest', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'id', 'direction' => 'asc'));
        Router::connect('/games/oldest/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'id', 'direction' => 'asc'));
        Router::connect('/games/most-played', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
        Router::connect('/games/most-played/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.playcount', 'direction' => 'desc'));
        Router::connect('/games/least-played', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.playcount', 'direction' => 'asc'));
        Router::connect('/games/least-played/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'Gamestat.playcount', 'direction' => 'asc'));
        Router::connect('/games/high-rate', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'starsize', 'direction' => 'desc'));
        Router::connect('/games/high-rate/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'starsize', 'direction' => 'desc'));
        Router::connect('/games/low-rate', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'starsize', 'direction' => 'asc'));
        Router::connect('/games/low-rate/*', array('controller' => 'businesses', 'action' => 'toprated', 'sort' => 'starsize', 'direction' => 'asc'));
        Router::connect('/games/featured', array('controller' => 'businesses', 'action' => 'featured', 'sort' => 'potential', 'direction' => 'desc'));
        Router::connect('/games/featured/*', array('controller' => 'businesses', 'action' => 'featured', 'sort' => 'potential', 'direction' => 'desc'));
        Router::connect('/following/:seo_url', array('controller' => 'businesses', 'action' => 'play'), array('seo_url' => '[-a-z0-9]+', 'pass' => array('seo_url')));
    }
    Configure::write('Domain.type', 'subdomain');
    Configure::write('Domain.subdomain', $subdomain);
} else {
    Router::connect('/', array('controller' => 'games', 'action' => 'index'));
    Configure::write('Domain.type', 'normal');
}

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();
Router::parseExtensions('json');

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
