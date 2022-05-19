<?php
# Access session.
session_start();

$userID = $_SESSION['user_id'];
# Set page title and display header section.
$page_title = 'About';
if($userID == null){
   include ( 'includes/login.html' ); 
}else{
   include ( 'includes/logout.php' ); 
}

# Display body section.
echo "<h1 style='text-align:center;'>About</h1>";
?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100" >
                <img src="img/seats.jpg" class="card-img-top" alt="seats">
                <div class="card-body">
                    <h5 class="card-title">Entertain yourself at home!</h5>
                    <q class="card-text"> Reasonable price to access movies and TV shows on one platform </q>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/popcorn.jpg" class="card-img-top" alt="popcorn">
                <div class="card-body">
                    <h5 class="card-title">Daily updates!</h5>
                    <q class="card-text">Our Admins work to update our services daily by adding freshest available shows to our platform.</q>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/audience.png" class="card-img-top" alt="audience">
                <div class="card-body">
                    <h5 class="card-title"> We don't mind if you share your password with your relatives. </h5>
                    <q class="card-text">Understanding that subscription is purchased often for the whole family we expect you to share your pass within the household.</q>
                </div>
            </div>
        </div>
        <div class="col" style=" padding-bottom: 20px">
            <div class="card h-100">
                <img src="img/ticket.jpg" class="card-img-top" alt="ticket">
                <div class="card-body">
                    <h5 class="card-title">Discount code for food deliveries!</h5>
                    <q class="card-text">As nothing beats a good snack to a good movie use the provided discount code of 10APRILWEBFLIX on just-eat and Deliveroo to get 10% discount of your food order. </q>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
include('includes/footer.html');