<?php
# Include HTML static file login.html
include ( 'includes/login.html' ) ;

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
  
  # Check for a card number.
  if (empty( $_POST[ 'card_number' ] ) )
  { $errors[] = 'Enter your card_number.' ; }
  else
  { $card_number = mysqli_real_escape_string( $link, trim( $_POST[ 'card_number' ] ) ) ; }
  
  # Check for expiry month.
  if (empty( $_POST[ 'exp_month' ] ) )
  { $errors[] = 'Enter card expiry month.' ; }
  else
  { $exp_m = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_month' ] ) ) ; }
  
  
  # Check for a expiry year.
  if (empty( $_POST[ 'exp_year' ] ) )
  { $errors[] = 'Enter your expiry year.' ; }
  else
  { $exp_y = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_year' ] ) ) ; }

# Check for a security.
  if (empty( $_POST[ 'cvv' ] ) )
  { $errors[] = 'Enter your security on back of card.' ; }
  else
  { $cvv = mysqli_real_escape_string( $link, trim( $_POST[ 'cvv' ] ) ) ; }
////////here Justyna!!!
   
    # Check for a date of birth.
  if ( empty( $_POST[ 'dob' ] ) )
  { $errors[] = 'Enter your date of birth.' ; }
  else
  { $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'dob' ] ) ) ; }

    # Check for a contact number.
  if ( empty( $_POST[ 'contact_number' ] ) )
  { $errors[] = 'Enter your phone number.' ; }
  else
  { $contact_number = mysqli_real_escape_string( $link, trim( $_POST[ 'contact_number' ] ) ) ; }

   # Check for a country.
  if ( empty( $_POST[ 'country' ] ) )
  { $errors[] = 'Enter your place of residence' ; }
  else
  { $country = mysqli_real_escape_string( $link, trim( $_POST[ 'country' ] ) ) ; }

////////////////
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date, dob, contact_number, country, status) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), $card_number, $exp_m, $exp_y, $cvv, NOW(), $dob, '$contact_number', '$country', 'active' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="alert alert-secondary" role="alert">
		<h4 class="alert-heading"Registered!</h4>
		<p>You are now registered.</p>
		<a class="alert-link" href="login.php">Login</a>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="alert alert-secondary" role="alert">
			<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<br>or please try again.</br></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}

?>
  
<h1 style='text-align:center; margin-top: 50px; margin-bottom:50px' >Register</h1>
<div class="container" style='margin-bottom:50px'>
    <div class="col-sm">
        <form action="register.php" method="post" class="alert-dismissible fade show" role="alert" >
            <div class="mb-3">
                <label  class="form-label" style="color: white">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Email address</label>
                <input type="email" class="form-control"  name="email" placeholder="email@example.com" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Card number</label>
                <input type="text" class="form-control" name="card_number" placeholder="Card number" value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Expiry month</label>
                <input type="text" class="form-control" name="exp_month" placeholder="Expiry month" value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">Expiry year</label>
                <input type="text" class="form-control" name="exp_year" placeholder="Expiry year" value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" style="color: white">CVV</label>
                <input type="text" class="form-control" name="cvv" placeholder="CVV" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">
            </div>
              <div class="mb-3">
                <label  class="form-label" style="color: white">Date of birth</label>
                <input type="text" class="form-control" name="dob" placeholder="Date of birth" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>">
            </div>
              <div class="mb-3">
                <label  class="form-label" style="color: white">Telephone number</label>
                <input type="text" class="form-control" name="contact_number" placeholder="Telephone number" value="<?php if (isset($_POST['contact_number'])) echo $_POST['contact_number']; ?>">
            </div>
              <div class="mb-3">
                <label  class="form-label" style="color: white">Place of residence</label>
                <input type="text" class="form-control" name="country" placeholder="Place of residence" value="<?php if (isset($_POST['country'])) echo $_POST['country']; ?>">
            </div>
            <button style='margin-bottom:100px' type="submit" class="btn " id="button1" value="Register" >Register</button>
        </form>
    </div>
</div>
<?php
include ( 'includes/footer.html' );
?>