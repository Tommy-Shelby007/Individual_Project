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
    $count = 0;
    // connecto database
    require("mysqli_connect.php");
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $address = $_POST['c_address'];
    $city = $_POST['C_city'];
    $postal_code = $_POST['c_postal_code'];
    $country = $_POST['c_country'];
    $query = "INSERT INTO customer_table VALUES 
			('null', '" . $fname . "', '" . $lname . "' , '" . $address . "', '" . $city . "', '" . $postal_code . "', '" . $country . "')";

		$result = mysqli_query($dbc, $query);
		if(!$result){
			echo "insert false !" . mysqli_error($dbc);
			exit;
		}
        $customerid = mysqli_insert_id($dbc);
        $total_price = $_SESSION['total_price'];
        $date = date("Y-m-d H:i:s");
        $query1 = "INSERT INTO order_table VALUES 
		('null', '" . $customerid . "', '" . $total_price . "', '" . $date . "', '" . $fname . "', '" . $address . "', '" . $city . "', '" . $postal_code . "', '" . $country . "')";
		$result1 = mysqli_query($dbc, $query1);
		if(!$result1){
			echo "Insert orders failed " . mysqli_error($dbc);
			exit;
		}

        $isn = $_SESSION['isn'];
        $bookprice = $_SESSION['book_price'] ;
        $qty = $_SESSION['qty'];
        $query2 = "INSERT INTO ordered_item VALUES 
		('null', '$isn', '$bookprice', '$qty')";
		$result2 = mysqli_query($dbc, $query2);
		if(!$result2){
			echo "Insert value false!" . mysqli_error($dbc);
			exit;
		}

        $query3 = "select book_qty from books_table where book_isn = '".$isn."' ";
        $result3 = mysqli_query($dbc, $query3);
        $row = mysqli_fetch_array($result3);
        
        $quantity = $row['book_qty'] - $qty;
        $query4 = "update books_table set book_qty = '".$quantity."' where book_isn = '".$isn."'";
        $result4 = mysqli_query($dbc, $query4);
        
        echo "<h3 style='text-align: center;'>Thank you for your order!!!</h3>";
    ?>