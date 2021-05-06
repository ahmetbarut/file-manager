<?php

function sift($path)
{
    $patern = "[\/\w[a-zA-Z0-9].+]";
    preg_match_all($patern, $path, $path);
    return  implode('/' ,$path[0]);
}
