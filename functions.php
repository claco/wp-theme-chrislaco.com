<?php

function pages_list_items() {
    $input = wp_list_pages('echo=0&title_li=');
    $output = str_replace(array("\n", "\r", "\t"), "", $input);
    return $output;
}

?>