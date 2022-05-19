<?php

# Access session.
session_start();

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require ( 'login_tools.php' );
    load();
}

$userID = $_SESSION['user_id'];

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require ('connect_db.php');

# Initialize an error array.
    $errors = array();

# Check for an card_number :
    if (empty($_POST['card_number'])) {
        $errors[] = 'Enter your card_number.';
    } else {
        $c = mysqli_real_escape_string($link, trim($_POST['card_number']));
    }

# Check for an exp_month :
    if (empty($_POST['exp_month'])) {
        $errors[] = 'Enter the exp_month.';
    } else {
        $em = mysqli_real_escape_string($link, trim($_POST['exp_month']));
    }

# Check for an exp_year:
    if (empty($_POST['exp_year'])) {
        $errors[] = 'Enter the exp_year.';
    } else {
        $ey = mysqli_real_escape_string($link, trim($_POST['exp_year']));
    }

# Check for an CVV:
    if (empty($_POST['exp_year'])) {
        $errors[] = 'Enter the CVV number.';
    } else {
        $cvv = mysqli_real_escape_string($link, trim($_POST['cvv']));
    }
    
# On success card details into 'users' database table.
    if (empty($errors)) {
        $q = "UPDATE users SET card_number='$c', exp_month='$em', exp_year='$ey', cvv=$cvv WHERE user_id='$userID'";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: user.php");
        } else {
            echo "Error updating record: " . $link->error;
        }


# Close database connection.

        mysqli_close($link);
        exit();
    }

# Or report errors.
    else {
        echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button><h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo 'Please try again.</div></div>';
        # Close database connection.
        mysqli_close($link);
    }
}
?>
