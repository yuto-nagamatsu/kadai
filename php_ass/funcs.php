<?php

// XSS対策関数　＊？＞を使用しないこと
function h($str){
    return htmlentities($str,ENT_QUOTES);
}