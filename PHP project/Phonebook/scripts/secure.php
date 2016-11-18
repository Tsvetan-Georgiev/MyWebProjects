<?php
// function to escape data and strip tags
    function safestrip($string){
       $string = strip_tags($string);
       return $string;
    }
?>