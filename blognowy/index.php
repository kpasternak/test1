<?php 

class blog
{
  private $dbConn;
  //Konstruktor
  function __construct($serverName,$userName,$password, $dbName)
  {
    // create connection
    $this -> dbConn = mysqli_connect($serverName,$userName,$password, $dbName);

    //check connection
    if (!$this -> dbConn)
    {
      die ("Connection failed:" . mysqli_connect_error());
    }
    echo "Connected successfully";
  }

  function dodaj($date, $author, $title, $intro, $readmore){

  $sql = "INSERT INTO Posts ( postDate, postAuthor, postTitle, postIntro)
  VALUES ('$date', '$author', '$title', '$intro', '$readmore')";
  mysqli_query($this ->dbConn , $sql);
  mysqli_close($this->dbConn);
  // $dbQuery=mysqli_query($this -> dbConnect , $this -> $sqlDodaj);
  // $dodaj = $db->query($sql);
  // if ($dodaj) echo 'dod';
  }

  function usun($id){
    $sql = "DELETE FROM Posts WHERE idPosts=$id";
    // $dbQuery=mysqli_query($dbConnect, $sql);
    mysqli_query($this ->dbConn , $sql);
    mysqli_close($this->dbConn);
  }

  function edytuj($idedyt, $introedyt){
    $sql = "UPDATE Posts SET PostIntro=$introedyt WHERE idPosts=$idedyt";
    mysqli_query($this ->dbConn , $sql);
    mysqli_close($this->dbConn);
  }


}

$blogTomka = new blog('localhost', 'root','root','Blog');

$action = $_GET['action'];
$id = $_GET['idPosts'];

switch ($action) {
  case 'usun':
    $blogTomka -> usun(2);
    break;
}

// $blogTomka = new blog('localhost', 'root','root','Blogg');
// // $blogTomka = new blog($serverName,$userName,$password, $dbName)
// $blogTomka -> dodaj('2001-12-10','autor','tytul','intro','readmore')
// // $blogTomka -> edytuj()
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <a href="index.php?action=usun&id=2">usun</a>
</body>
</html>