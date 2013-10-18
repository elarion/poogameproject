<header>
    <h1>
        <img src="./cores/img/logoPOO.png">
    </h1>
</header>
<form action="?action=init_party" method="post">
    <div id="form_wrapper">
        <div id="player">
            <table>
                <tr>
                    <td class="form_subtitle">Choose your name</td>
                    <td>
                        <input type="text" name="pseudo[]" required/>
                    </td>
                </tr>
                <tr>
                    <td class="form_subtitle">Choose your champion</td>
                    <td>
                        <select name="classes[]" id="">
                            <?php foreach ($var as $v) { ?>
                                <option value="<?php echo $v ?>"><?php echo $v ?></option>
                           <?php } ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clear"></div>
    </div>
    <input type="submit" value="START" id="form_init_submit"/>
</form>