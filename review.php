<?php
# Access session.
session_start();
# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Reviews ';
include('includes/logout.php');


# Connect to the database.
require ('connect_db.php');

# Display body section.
echo "<h1 style='text-align:center; '>All Reviews</h1>";

# Display body section, retrieving from 'mov_rev' database table.
$q = "SELECT * FROM mov_rev ORDER BY post_date DESC";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<div id="background1" class="container alert alert-dark" role="alert" >
        <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
        <q>Rating:  ' . $row['rate'] . ' &#9734</q>
        <q>' . $row['message'] . '</q>

        <hr>
       <p> <reviewFooter id="text1" class="blockquote-footer">
            <span>' . $row['first_name'] . ' ' . $row['last_name'] . '</span> 
            <cite title="Source Title"> ' . $row['post_date'] . '</cite>
        </reviewFooter></p>
    </div>';
    }
    echo '<div class="container" style="margin-bottom: 200px"><br><a href="post.php><button type="button" class="btn" role="button" id="button1" data-toggle="modal" data-target="#rev">Add Movie Review</button></a><br></div>';
} else {
    ?>
    <h1 style='text-align:center; padding-top: 250px; margin-bottom:30px' >There are currently no movie reviews!</h1>

    <?php
    echo '

<div class=" container " style="margin-bottom: 200px" role="alert">
    <br><button type="button" class="btn" role="button" data-toggle="modal" id="button1" data-target="#rev">Add Movie Review</button><br>
</div>';
}
?>

<!-- Modal review-->
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="background2" class="modal-header">
                <h5 class="modal-title" id="rev">Movie Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="background2" class="modal-body">
            <?php
                # DISPLAY POST MESSAGE FORM.
                # Display form.
                echo '
                <form action="post_action.php" method="post" accept-charset="utf-8">
                    <div class="form-check">
                        <label for="mov_title">Movie Title: </label>
                        <input type="text" class="form-control" name="movie_title" required>
                        <label for="rate">Rate Movie: </label>
                        <div class="form-check">

                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rate" value="5">&#9734; &#9734; &#9734; &#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rate" value="4">&#9734; &#9734; &#9734; &#9734; 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rate" value="3">&#9734; &#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rate" value="2" >&#9734; &#9734; 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rate" value="1">&#9734;  
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                            <div class="modal-footer">
                                <button type="button" class="btn" id="button1" data-dismiss="modal">Close</button>
                                <input class="btn" id="button1" type="submit" value="Post Review">
                            </div>
                        </div>
                    </div>
                </form>
            ';

            # Close database connection.
            mysqli_close($link);
            ?>
        </div>
    </div>
</div>
</div>
<?php
include ( 'includes/footer.html' );
