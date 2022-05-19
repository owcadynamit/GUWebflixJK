<?php

# DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start();
# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
require ('login_tools.php' );
load();
}
# Set page title and display header section.
$page_title = 'What’s On';
include ( 'includes/logout.php' );

# Display body section.
echo "<h1 style='text-align:center;'>What’s On - Movies</h1>";

# Open database connection.
	require ( 'connect_db.php' ) ;
	
# Retrieve movies from 'movie' database table.
$q = "SELECT * FROM movie";
$r = mysqli_query( $link, $q );
if ( mysqli_num_rows( $r ) > 0 ){
	
# Display body section.
    ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            # Display body section.
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="col" style=" padding-bottom: 20px">
                <div class="card h-100">
                    <img class="card-img-top"  src = "' . $row['img'] . '" alt = "Movie">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['movie_title'] . '</h5>
                        <a href="movie.php?id=' . $row['id'] . '"> <button id="button1" type="button" class="btn " role="button"> Watch now </button></a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
    <?php
# Close database connection.
    mysqli_close($link);
}
# Or display message.
else {
    echo '<p>There are currently no movies showing.</p>';
}

# Display footer section.
include ( 'includes/footer.html' );
?>