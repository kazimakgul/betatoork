<div class="step">
    <div class="row">
        <div id="progressbar_clone" class="col-sm-12">
            <span>
                Start cloning minimum 5 games.
            </span>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($games as $game) {
            $name = $game['Game']['name'];
            $id = $game['Game']['id'];
            $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
            $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
            $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
            $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
                $userlink = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain);
            } else {
                $playurl = $this->Html->url(array(
                    "controller" => 'businesses',
                    "action" => 'play',
                    h($game['Game']['id'])
                ));
                $userlink = $this->Html->url(array(
                    "controller" => 'businesses',
                    "action" => 'mysite',
                    h($game['User']['id'])
                ));
            }
            echo $this->element('business/dashboard/gamebox', array(
                "gameboxtype" => "clone",
                "id" => $id,
                "playurl" => $playurl,
                "game" => $game,
                "name" => $name,
                "rates" => $rates,
                "clones" => $clones,
                "favorites" => $favorites,
                "plays" => $plays,
                "userlink" => $userlink,
                "function" => "welcome"
            ));
        }
        ?>
    </div>
    <div class="form-group form-actions" style="float: left;width: 100%;">
        <a id="back" class="button" href="#" data-step="1" style="margin-top:35px;">
            <span><i class="fa fa-angle-double-left"></i> Back</span>
        </a>
        <button id="next" type="submit" class="button" data-step="3" style="margin-top:35px;">
            <span>Next Step <i class="fa fa-angle-double-right"></i></span>
        </button>
    </div>
</div>