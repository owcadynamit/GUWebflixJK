<?php
# Access session.
session_start();

# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'Player';
include('includes/logout.php');

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require ( 'login_tools.php' );
    require ( 'connect_db.php' );
    load();
}

# Display the cart if not empty.
if (!empty($_SESSION['cart'])) {

# Open database connection.
    require ( 'connect_db.php' );

# Retrieve booking in the cart from the 'movie' database table.
    $q = "SELECT * FROM movie WHERE id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {
        $q .= $id . ',';
    }
    $q = substr($q, 0, -1) . ') ORDER BY id ASC';
    $r = mysqli_query($link, $q);
# Display body section with a form and a table.
    echo '<form action="show1.php" method="post">

</form>
</div></div></div></div></div>  ';
} else {
# Or display a message.
    echo '<div class="container">
	<div class="alert alert-secondary" role="alert">
	<a href="home.php" class="alert-link">View What\'s On Now </a>
		</div> ';
}


# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$id] ) )
 { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
	 ?>
     <div class="container" style='margin-bottom:250px'></div>
     <?php
		
    echo '<div class="container">
            <h1 class="display-4">'.$row['movie_title'].'</h1>
        <div class="row">
            <div class="col-lg-12 col-lg-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src='. $row['preview'].' 
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
               </div>
            </div>
        </div> ';
 ?>
        <div class="container" style='margin-bottom:270px'></div>
        <?php
  }
else
  {
 # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['mov_price'] ) ;
   ?>
        <div class="container" style='margin-bottom:250px'></div>
        <?php
 echo '<div class="container">
            <h1 class="display-4">'.$row['movie_title'].'</h1>
        <div class="row">
            <div class="col-lg-12 col-g-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src='. $row['preview'].' 
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
               </div>
            </div>
        </div>';
		  ?>
        <div class="container" style='margin-bottom:270px'></div>
        <?php
  }
}

# Close database connection.
mysqli_close($link);

# Display footer section.
include ( 'includes/footer.html' ) ;
?>