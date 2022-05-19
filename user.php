<?php
# Access session.
session_start();
# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ';
include('includes/logout.php');
# Access session.
session_start();

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require ( 'login_tools.php' );
    load();
}

# Open database connection.
require ( 'connect_db.php' );

# Display body section.
echo "<h1 style='text-align:center; '>User Details</h1>";

$q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}";
$r = mysqli_query($link, $q);
?>
<div class="container" style="margin-bottom: 200px">
    <!--<div class="row">-->
        <?php
        if (mysqli_num_rows($r) > 0) {

            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '
        <div class="col-sm">
            <div id="background2" class=" alert alert-dark" role="alert">
                <h5>' . $row['first_name'] . ' ' . $row['last_name'] . '</h5> 
                <p> User ID : W2022 ' . $row['user_id'] . ' </p>
                <p> Email : ' . $row['email'] . ' </p>
                <p> Registration Date : ' . $row['reg_date'] . ' </p>
                <!-- Button trigger modal -->
                <button type="button" class="btn" id="button1" data-toggle="modal" data-target="#password">
                    <i class="fa fa-edit"></i>  Change Password
                </button>
            </div>
        </div>
        ';
            }
        } else {
            echo '<h3>No user details.</h3>';
        }

        # Retrieve items from 'users' database table.
        $q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '
        <div class="col-sm">
            <div id="background2" class=" alert alert-dark" role="alert">
                <h5>Card Stored</h5>
               <p> Card Holder :' . $row['first_name'] . '  ' . $row['last_name'] . ' </p>
               <p> Card Number : ' . $row['card_number'] . ' </p>
               <p> Expire Date :' . $row['exp_month'] . '   ' . $row['exp_year'] . '</p>
               <p> CVV Number : ' . $row['cvv'] . ' </p>
                <button type="button" class="btn" id="button1" data-toggle="modal" data-target="#card">
                    <i class="fa fa-credit-card"></i>  Update Card
                </button>
                  <button type="button" class="btn" id="button1" data-toggle="modal" data-target="#subscription">
                    <i class="fa fa-credit-card"></i>  Subscribe £99.99
                </button>
            </div>
        </div>
        ';
            }

            # Close database connection.
            mysqli_close($link);
        } else {
            echo '<div class="alert alert-danger"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h1>Card Stored</h1>
            <h3>No card stored.</h3>
        </div>

        ';
        }
        ?>
    <!--</div>-->
</div>
<?php
# Display footer section.
include ( 'includes/footer.html' );
?>
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="background2" class="modal-content" >
            <form  action="change-password.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="password"  name="pass1" 
                               class="form-control"  
                               placeholder="New Password" 				
                               value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" 
                               required>
                    </div>
                    <div class="form-group">
                        <input type="password" 
                               name="pass2" 
                               class="form-control" 
                               placeholder="Confirm New Password"
                               value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" 
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" 
                               name="btnChangePassword" 
                               class="btn btn-block" id="button1" value="Save Changes"/>
                    </div>
                </div>
            </form>
        </div><!--Close body-->
    </div><!--Close modal-body-->
</div><!-- Close modal-fade-->


<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="card" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="background2" class="modal-content" >
            <form  action="change-card.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text"  name="card_number" 
                               class="form-control"  
                               placeholder="New Card Number" 				
                               value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>" 
                               required>
                    </div>
                    <div class="form-group">
                        <input type="text"  name="exp_month" 
                               class="form-control"  
                               placeholder="New Expire Month" 				
                               value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>" 
                               required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="exp_year" 
                               class="form-control" 
                               placeholder="New Expire Year"
                               value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>" 
                               required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cvv" 
                               class="form-control" 
                               placeholder="New CVV"
                               value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>" 
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" 
                               name="btnChangeCard" 
                               class="btn btn-block" id="button1" value="Save Changes"/>
                    </div>
                </div>
            </form>
        </div><!--Close body-->
    </div><!--Close modal-body-->
</div><!-- Close modal-fade-->
</div><!-- Close modal-fade-->


<div class="modal fade" id="subscription" tabindex="-1" role="dialog" aria-labelledby="subscription" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="background2" class="modal-content" >
            <form  action="subscription.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Yearly subscription payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <input type="Pay" 
                               name="btnPay" 
                               class="btn btn-block" id="button1" value="Press to pay £99.99"/>
                    </div>
                </div>
            </form>
        </div><!--Close body-->
    </div><!--Close modal-body-->
</div><!-- Close modal-fade-->
</div><!-- Close modal-fade-->
