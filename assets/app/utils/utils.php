<?php


function connect()
{
  $host = getenv('DB_HOST');
  $dbname = getenv('DB_NAME');
  $user = getenv('DB_USER');
  $password = getenv('DB_PASSWORD');

  return new PDO("mysql:host=$host;dbname=$dbname", "$user", "$password", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function sanitize($data)
{
  return htmlentities(strip_tags(trim(stripslashes($data))));
}
