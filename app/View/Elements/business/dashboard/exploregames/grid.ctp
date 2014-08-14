<div class="row users-grid">
    <?php
    if (!empty($games)) {
    foreach ($games as $game) {
        $name = $game['Game']['name'];
        $id = $game['Game']['id'];
        $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
        $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
        $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
        $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
        $clonestatus = $game['clonestatus'];
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
            $userlink = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain);
        } else {
            $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
            $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['User']['id'])));
        }
        ?>
        <?php echo $this->element('business/dashboard/gamebox',
            array(
                "gameboxtype" => "clone",
                "id"        =>$id,
                "playurl"   =>$playurl,
                "game"      =>$game,
                "name"      =>$name,
                "rates"     =>$rates,
                "clones"    =>$clones,
                "favorites" =>$favorites,
                "plays"     =>$plays,
                "userlink"  =>$userlink
            )) ?>
    <?php
    }

    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>