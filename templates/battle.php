<header>
    <h1>
        <img src="./cores/img/logoPOO.png">
    </h1>
</header>
<div id="player_wrapper">
    <div class="center">
                <span class="player">
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
        <div class="player" id="player1">
            <?php if ($var['turn_is'] == $var['user1']->id) { ?>
                <form action="?action=action" method="post">
                    <input type="radio" name="method" value="attack" />Attack<br>
                    <input type="radio" name="method" value="protect" />Protect<br>
                    <input type="radio" name="method" value="heal" />Heal<br>
                    <input type="radio" name="method" value="mainComp" />mainComp<br>
                    <input type="radio" name="method" value="secondaryComp" />secondaryComp<br>
                    <input type="hidden" name="id_user" value="<?php echo $var['user1']->id; ?>" />
                    <input type="submit" value="GO"/>
                </form>
            <?php } ?>
        </div>
        <div class="player player2">
            <?php if ($var['turn_is'] == $var['user2']->id) { ?>
                <form action="?action=action" method="post">
                    <input type="radio" name="method" value="attack"/>Attack<br>
                    <input type="radio" name="method" value="protect"/>Protect<br>
                    <input type="radio" name="method" value="heal"/>Heal<br>
                    <input type="radio" name="method" value="mainComp"/>mainComp<br>
                    <input type="radio" name="method" value="secondaryComp"/>secondaryComp<br>
                    <input type="hidden" name="id_user" value="<?php echo $var['user2']->id; ?>" />
                    <input type="submit" value="GO"/>
                </form>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>