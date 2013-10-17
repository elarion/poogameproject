<?php

    include_once('./templates/head.php');

    if (file_exists($template) && is_file($template)) {
        include_once($template);
    }

    include_once('./templates/footer.php');