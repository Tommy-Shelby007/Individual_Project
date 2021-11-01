<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
                   <a class="navbar-brand" href="index.php">Bookworld</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="books.php">&nbsp; Books</a></li>
              <li><a href="contact.php">&nbsp; Contact</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <p><h1>Welcome to Online Book World ...!!!</h1></p>
<?php
$title = "Index";
require("mysqli_connect.php");
session_start();
$row = array();
		$query = "SELECT book_isn, book_pics FROM books_table ORDER BY book_isn DESC";
		$result = mysqli_query($dbc, $query);
		if(!$result){
		    echo "Can't retrieve data " ;
		}
		for($i = 0; $i < 4; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
?>

<p class="lead text-center text-muted">Latest books</p>
      <div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-md-3">
      		<a href="book_details.php?bookisn=<?php echo $book['book_isn']; ?>">
           <img class="img-thumbnail" src="./bootstrap/img/<?php echo $book['book_pics']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>