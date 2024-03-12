<?php

function testMessage($condation , $message){
    if($condation) {
        echo"<div class='alert alert-info mx-auto w-50'>
        <h3> This $message is True</h3>
        </div>";
    }else{
        echo"<div class='alert alert-danger mx-auto w-50'> 
        <h3> This $message is false</h3>
        </div>";
    }

}