<?php

$mysql_config = require("config.php");
$site_config = array(
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => '../../Admin/Default/Layout/layout',
    'TMPL_TEMPLATE_SUFFIX' => '.php',
);
return array_merge($site_config, $mysql_config);
