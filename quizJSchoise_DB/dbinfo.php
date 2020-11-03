<?php
  /*
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
  } */

  function dbConnect(){
    $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
    $db['dbname'] = ltrim($db['path'], '/');
    $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
    $user = $db['user'];
    $password = $db['pass'];
    $options = array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
    );
    $dbh = new PDO($dsn,$user,$password,$options);
    return $dbh;
  }

?>