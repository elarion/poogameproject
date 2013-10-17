<header>
    <h1>
        <img src="./cores/img/logoPOO.png">
    </h1>
</header>
<div id="player_wrapper">
    <div class="center">
        <span class="player">
            JOUEUR 1
        </span>
        <span class="player player2">
            JOUEUR 2
        </span>
    </div>
    <div class="clear"></div>
</div>
<div id="form_wrapper">
    <div class="center">
        <form action="?action=auth" method="post">
            <div class="player" id="player1">
                <table>
                    <tr>
                        <td class="form_subtitle">Choisis ton pseudo</td>
                        <td>
                            <input type="text" name="pseudo[]"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="form_subtitle">Choisis ton personnage</td>
                        <td>
                            <select name="classes[]" id="">
                                <option value="Warrior">Warrior</option>
                                <option value="Wizard">Wizard</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="player player2">
                <table>
                    <tr>
                        <td class="form_subtitle">Choisis ton pseudo</td>
                        <td>
                            <input type="text" name="pseudo[]"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="form_subtitle">Choisis ton personnage</td>
                        <td>
                            <select name="classes[]" id="">
                                <option value="Warrior">Warrior</option>
                                <option value="Wizard">Wizard</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <input type="submit" value="START" />
            </div>
        </form>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>