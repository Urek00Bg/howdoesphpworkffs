<?php

function is_input_empty(string $word, string $meaning){
        if (empty($word) || empty($meaning)){
            return true;
        }
        else{
            return false;
        }
    }

    function is_username_taken(object $pdo ,string $username){
        if(get_username($pdo,$username)){
            return true;
        }else{
            return false;
        }
    }

    function create_word (object $pdo,string $word, string $meaning,string $meaning2,string $meaning3, string $meaning4){
        insert_words($pdo,$word,$meaning,$meaning2,$meaning3, $meaning4);
    }