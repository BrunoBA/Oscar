<?php

function loadNominees()
{
    try {
        $file = file_get_contents('./oscar2021.json');
        return json_decode($file);
    } catch (Exception) {
        return [];
    }
}
