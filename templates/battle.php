<header>
    <h1>
        <img src="./cores/img/logoPOO.png">
    </h1>
</header>
<div id="player_wrapper">
    <div class="center">
        <span class="player current_player">
            <?php echo($var['user1']->pseudo); ?> (<?php echo($var['champion_user1'][0]->name); ?>)
            <span class="hp"><?php echo($var['champion_user1'][0]->health); ?></span>
        </span>
        <span class="player player2">
            <?php echo($var['user2']->pseudo); ?> (<?php echo($var['champion_user2'][0]->name); ?>)
            <span class="hp"><?php echo($var['champion_user2'][0]->health); ?></span>
        </span>
    </div>
    <div class="clear"></div>
</div>
<div id="form_wrapper">
    <div class="center">
        <div class="j1" id="player1">
            <form action="?action=action" method="post">
                <span>
                    <input type="radio" name="method" value="attack" id="form_attack"/><label for="form_attack">Attack</label>
                </span>
                <span>
                    <input type="radio" name="method" value="protection" id="form_protection"/><label for="form_protection">Protect</label>
                </span>
                <span>
                    <input type="radio" name="method" value="heal" id="form_heal"/><label for="form_heal">Heal</label>
                </span>
                <span>
                    <input type="radio" name="method" value="mainComp" id="form_mainComp"/><label for="form_mainComp">mainComp</label>
                </span>
                <span>
                    <input type="radio" name="method" value="secondaryComp" id="form_secondaryComp"/><label for="form_secondaryComp">secondaryComp</label>
                </span>
                <input type="hidden" name="id_user" value="<?php echo $var['user1']->id; ?>" />
                <input type="submit" value="GO"/>
            </form>
        </div>
        <div class="j2 player2">

        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div>
    <div class="center">
        <span class="j1_result">
            Vous avez gagné !
            Vous avez perdu !
        </span>
        <span class="j2_result">
            Bien joué...
            T'es mauvais !!
        </span>
    </div>
</div>