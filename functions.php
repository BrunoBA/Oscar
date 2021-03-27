<?php

function loadNomineesFromJson()
{
    try {
        $file = file_get_contents(__DIR__.'/oscar2021.json');

        return json_decode($file);
    } catch (Exception) {
        return [];
    }
}
