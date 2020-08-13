<?php

  require '../../vendor/autoload.php';

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');


  $dotenv->load();

  echo getenv('DB_DATABASE');

?>