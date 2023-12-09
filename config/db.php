<?php

function connect_db() 
{
    return new PDO('mysql:host=localhost:3307;dbname=shop','root','root');
}