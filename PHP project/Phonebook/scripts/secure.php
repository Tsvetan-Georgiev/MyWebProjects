<?php
// function to escape data and strip tags
    function safestrip($string){
       $string = strip_tags($string);
       $string = mysql_real_escape_string($string);
       return $string;
    }
?>