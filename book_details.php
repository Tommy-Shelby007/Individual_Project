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
<?php
session_start();
  $book_isn = $_GET['bookisn'];
  // connecto database
  require("mysqli_connect.php");

  $query = "SELECT * FROM books_table WHERE book_isn = '$book_isn'";
  $result = mysqli_query($dbc, $query);
  if(!$result){
    echo "Can't retrieve data " ;
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['book_Nmae'];
  $qnty = $row['book_qty'];
  
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="books.php">Books</a> > <?php echo $row['book_Nmae']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_pics']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['book_desc']; ?></p>
          <h4>Book Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "book_desc" || $key == "book_pics" || $key == "publisherid" || $key == "book_Nmae"){
                continue;
              }
              switch($key){
                case "book_isn":
                  $key = "ISBN";
                  break;
                case "book_Nmae":
                  $key = "Title";
                  break;
                case "book_writer":
                  $key = "Author";
                  break;
                case "book_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <?php if($qnty==0){ ?>
			<p class="text-danger">Out of Stock...!!!</p>
			<?php } ?>
          <form method="post" action="checkout.php">
            <input type="hidden" name="bookisn" value="<?php echo $book_isn;?>">
            <label for="name" class="control-label col-md-4">Enter Quantity of Book</label>
            <input type="text" name="qty" class="col-md-4" class="form-control">
            <div>
            &nbsp;&nbsp;&nbsp;<input type="submit" value="Purchase" name="cart" class="btn btn-primary">
            </div>
          </form>
       	</div>
      </div>
