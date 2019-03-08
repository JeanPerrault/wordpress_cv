<?php

function my_copyright_shortcode($attrs, $content){
   


     return "Je suis le Copyright";

}

add_shortcode("copyright", "my_copyright_shortcode");

