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
    <div class="row">
        <div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<form class="form-horizontal">
			  	<fieldset>
				    <legend>Contact</legend>
				    <p class="lead">Complete the form to send email to us.</p>
				    <div class="form-group">
				      	<label for="inputName" class="col-lg-2 control-label">Name</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputName" placeholder="Name">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-2 control-label">Email</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputEmail" placeholder="Email">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="textArea" class="col-lg-2 control-label">Message</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea"></textarea>
				        	</div>
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="btn btn-default">Cancel</button>
				        	<button type="submit" class="btn btn-primary">Submit</button>
				      	</div>
				    </div>
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
    </div>