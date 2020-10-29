<?php
  define('DB_HOST', 'mysql');
  define('DB_USER', 'default');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'mysql');
  try {
    $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }
  catch(PDOException $e){
    print('接続エラーが発生しました。:'.$e->getMessage());
    exit;
  }
?>