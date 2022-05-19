<?php

# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'My Reviews ';
include('includes/logout.php');
session_start();
# Redirect if not logged in.
if (!isset( $_SESSION['user_id'] ) ) { require ( 'login_tools.php' );
load();
}
# Connect to the database.
require ('connect_db.php');

# Display body section.
echo "<h1 style='text-align:center;'>My Movie Reviews</h1>";

# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM mov_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{

echo '<div class="container">';
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '<div class="alert alert-dark" role="alert" style="background-color:white">
        <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
        <q>Rating:  ' . $row['rate'] . ' &#9734</q>
        <q>' . $row['message'] . '</q>
        <hr>
        <footer class="blockquote-footer" >
            <span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
            <cite title="Source Title"> '. $row['post_date'].'</cite>
            <br>
            <div class="alert alert-secondary" role="alert" style="background-color:#FF7900">
                <a  class="alert-link" href="delete_post.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
                </footer>
            </div>

            ';  
            }

            }
            else {   
			?><h1 style='text-align:center; padding-top: 250px; margin-bottom:30px' >You have currently not made any movie reviews.</h1><?php
}
include('includes/footer.html');
