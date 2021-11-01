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
  $book_isn = $_POST['bookisn'];
  $_SESSION['isn'] = $book_isn;
  // connecto database
  require("mysqli_connect.php");
  $title = "Checking out";
?>
  <table class="table">
		<tr>
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    $query = "SELECT book_Nmae, book_writer, book_price FROM books_table WHERE book_isn = '$book_isn'";
                $result = mysqli_query($dbc, $query);
                if(!$result){
                    echo "Can't retrieve data " ;
                    exit;
                }
                $book =  mysqli_fetch_assoc($result);
			?>
		<tr>
			<td><?php echo $book['book_Nmae'] . " by " . $book['book_writer']; ?></td>
			<td><?php echo "$" . $book['book_price']; $_SESSION['book_price'] = $book['book_price'];?></td>
		<td><?php echo $qty=$_POST["qty"]; $_SESSION['qty']= $_POST["qty"];?></td>
			<td><?php  echo "$" . $qty * $book['book_price']; ?></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>20.00</td>
		</tr>
		<tr>
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "$" . ($qty * $book['book_price']) + 20;  $_SESSION['total_price'] = ($qty * $book['book_price']) + 20;?></th>
		</tr>
	</table>
  <form method="post" action="order.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
			<div class="form-group">
			<label for="customer" class="control-label col-md-4">CUSTOMER DETAILS :</label>
		</div>
		<div class="form-group">
			<label for="f_name" class="control-label col-md-4">First Name</label>
			<div class="col-md-4">
				<input type="text" name="f_name" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="l_name" class="control-label col-md-4">Last Name</label>
			<div class="col-md-4">
				<input type="text" name="l_name" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="c_address" class="control-label col-md-4">Address</label>
			<div class="col-md-4">
				<input type="text" name="c_address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="C_city" class="control-label col-md-4">City</label>
			<div class="col-md-4">
				<input type="text" name="C_city" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="c_postal_code" class="control-label col-md-4">Postal Code</label>
			<div class="col-md-4">
				<input type="text" name="c_postal_code" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="c_country" class="control-label col-md-4">Country</label>
			<div class="col-md-4">
				<input type="text" name="c_country" class="col-md-4" class="form-control">
			</div>
		</div>
		<div></div>
		<div class="form-group">
			<label for="payment" class="control-label col-md-4">PAYMENT DETAILS :</label>
		</div>
		<div class="form-group">
            <label for="card_type" class="col-lg-2 control-label">Type</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">MasterCard</option>
                  	<option value="American Express">American Express</option>
              	</select>
            </div>
        </div>
        <div class="form-group">
            <label for="card_number" class="col-lg-2 control-label">Number</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">CVV</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
		<div >
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="submit" value="Place Order" class="btn btn-primary">
		</div>
	</form>

  
 
  

