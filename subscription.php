<?php

session_start();
# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'My subscriptions';
include('includes/logout.php');


# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
require ( 'login_tools.php' );
load();
}
# Display body section.
echo "<h1 style='text-align:center; '>Subscription History</h1>";

# Open database connection.
require ( 'connect_db.php' );
# Check for passed total and cart.
if (isset($_GET['total']) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) )) {
echo '
<h5>Thank You for subscribing.  Please enjoy your time here!</h5>
';
# Remove items.  
$_SESSION['cart'] = NULL;
}
# Or display a message.
else {
echo '<p></p>';
}
# Retrieve items from 'subscription' database table.
$q = "SELECT * FROM subscription_status WHERE user_id={$_SESSION[user_id]}
ORDER BY subscription_date DESC";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
echo '<div class="container">
    <div class="alert alert-dark" role="alert">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group row">
                    <label for="sub ref" class="col-sm-12 col-form-label" style="color: black">
                        Purchase Reference:  #EC1000' . $row['sub_id'] . '</label> 
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group row">
                    <label for="booking ref" class="col-sm-12 col-form-label" style="color: black">
                        Total Paid:   &pound ' . $row['total'] . ' 
                    </label>
                </div>
            </li>
        </ul>
        <hr>
        <div class="card-footer">
            <small>' . $row['sub_date'] . '</small>
        </div>
    </div>
</div>
';
}
# Close database connection.
mysqli_close($link);
}

include('includes/footer.html');
?>
