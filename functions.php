<?php

function expires() {
      $offset = 3600 * 24;	
      $expire = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
      Header($expire);
      Header("Cache-Control: max-age=".$offset.", must-revalidate");
      Header("Pragma:");
}

function coalesce() {
    $args = func_get_args();
    foreach ($args as $arg) {
        if (!empty($arg)) {
            return $arg;
        }
    }
    return $args[0];
}

function pages_list_items() {
    $input = wp_list_pages('echo=0&title_li=');
    $output = str_replace(array("\n", "\r", "\t"), "", $input);
    return $output;
}

function get_entries($excerpts=0, $class='entries') {
    include(TEMPLATEPATH . '/entries.php');
}

function get_entry($excerpts=0) {
    include(TEMPLATEPATH . '/entry.php');
}

?>