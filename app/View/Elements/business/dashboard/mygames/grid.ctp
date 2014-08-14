<div class="row users-grid">
    <?php
    if (!empty($games)) {
        $game_edit = $this->Html->url(array("controller" => "businesses", "action" => "game_edit"));
        foreach ($games as $game) {
            $name = $game['Game']['name'];
            $id = $game['Game']['id'];
            $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
            $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
            $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
            $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
            } else {
                $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
            }
            ?>
            <?php echo $this->element('business/dashboard/gamebox',
                array(
                    "gameboxtype" => "mygames",
                    "id"        =>$id,
                    "playurl"   =>$playurl,
                    "game"      =>$game,
                    "name"      =>$name,
                    "rates"     =>$rates,
                    "clones"    =>$clones,
                    "favorites" =>$favorites,
                    "plays"     =>$plays,
                    "userlink"  =>$userlink,
                     "game_edit"=>$game_edit
                )) ?>
            <?php
        }
    } else {
        echo $this->element('business/dashboard/nullconditions', array('link' => 'exploregames', 'text' => 'Explore Games'));
    }
    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>