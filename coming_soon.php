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
$page_title = 'Coming Soon';
include ( 'includes/logout.php' );

# Display body section.
echo "<h1 style='text-align:center; '>Coming Soon</h1>";

# Open database connection.
require ( 'connect_db.php' );

?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100" >
                <img src="img/belle.jpg" class="card-img-top" alt="Belle">
                <div class="card-body">
                    <h5 class="card-title">Belle</h5>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/spider.jpg" class="card-img-top" alt="Spider-man">
                <div class="card-body">
                    <h5 class="card-title"> Spider-man - No Way Home</h5>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/yourname.jpg" class="card-img-top" alt="Your Name">
                <div class="card-body">
                    <h5 class="card-title"> Your Name </h5>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/mulan.jpg" class="card-img-top" alt="Mulan">
                <div class="card-body">
                    <h5 class="card-title"> Mulan </h5>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
include('includes/footer.html');