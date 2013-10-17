<?php

    include_once('./templates/head.php');

    if (!empty($template)) {
        include_once('./templates/'.$template);
    }

    include_once('./templates/footer.php');