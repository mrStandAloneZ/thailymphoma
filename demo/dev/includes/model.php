<?php

function getTheme($db) {
    $res[theme] = $db->select_query("SELECT * FROM " . TB_THEME . "");
    while ($arr[theme] = $db->fetch($res[theme])) {
        $theme = $arr[theme][name_theme];
    }
    $db->closedb();
    return $theme;
}
