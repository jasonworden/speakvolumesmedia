<?php
/**
 * The main template file. should never have to be used
 */

get_header(); 


function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://www.speakvolumesmedia.com/', false);


get_footer();

?>