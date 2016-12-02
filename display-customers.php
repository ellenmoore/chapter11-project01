<?php
require_once('config.php');
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

//handling connection errors
if (mysqli_connect_errno()) {
	die(mysqli_connect_error());
}

//sql statements to display content from tables
 $catSql = "SELECT CategoryName FROM categories ORDER BY CategoryName asc";
 $catResult = mysqli_query($connection, $catSql);
 $imprintSql = "SELECT Imprint FROM imprints ORDER BY Imprint asc";
 $imprintResult = mysqli_query($connection, $imprintSql);
 $custSql = "SELECT * FROM customers ORDER BY lastname asc";
 $custResult = mysqli_query($connection, $custSql);
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>
				<?php 
						if ($custResult = mysqli_query($connection, $custSql)) {
							while($row = mysqli_fetch_assoc($custResult)){
							echo '<tr><td>';
							echo $row['FirstName'];
							echo ' ';
							echo $row['LastName'];
							echo '</td><td>';
							echo $row['email'];
							echo '</td><td>';
							echo $row['university'];
							echo '</td><td>';
							echo $row['city'];
							echo '</td></tr>';
							
							}
						}

					?>
           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">
					<?php 
						if ($catResult = mysqli_query($connection, $catSql)) {
							while($row = mysqli_fetch_assoc($catResult)){
							echo "<li>";					
							echo "<a href='#'>";
							echo $row['CategoryName'];
							echo "</a></li>";
							}
						}

					?>
               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
				<?php 
						if ($imprintResult = mysqli_query($connection, $imprintSql)) {
							while($row = mysqli_fetch_assoc($imprintResult)){
							echo "<li>";	
							echo "<a href='#'>";
							echo $row['Imprint'];
							echo "</a></li>";
							}
						}

					?>
            </ul>
         </div>         
      </div>  <!-- end left navigation rail --> 


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>
