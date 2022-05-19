<!doctype html>
<!--
Justyna Konowrocka EC1853300
-->
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="includes/styleSheet.css">
        <title>Webflix</title>
        
    </head>
    <body>
        <nav  id="nav1"  class="navbar navbar-expand-lg navbar-light" >
            <h3><a class="navbar-brand" href="about.php" style="color: white" >Webflix</a></h3>
       
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="container"> 
			
  <i class="fa-light fa-camera-movie"></i>

                <div class="collapse navbar-collapse" id="navbarScroll">
                     <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                          
              	
                           <li class="nav-item">
                            <a id="text2" class="nav-link active" href="movie_list.php">Movies</a>
                        </li>
                           <li class="nav-item">
                            <a id="text2" class="nav-link active" href="tv_show_list.php">TV Shows</a>
                        </li>
                        <li class="nav-item">
                            <a id="text2" class="nav-link active" href="review.php">All Reviews </a>
                        </li>
                        <li class="nav-item">
                            <a id="text2" class="nav-link active" href="coming_soon.php">Coming Soon</a>
                        </li>
                        <li class="nav-item">
                            <a id="text2" class="nav-link active" href="about.php">About </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                           <a id="text2" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <?php echo "{$_SESSION['first_name']} {$_SESSION['last_name']} " ?> 
                            </a>
                            <ul id="nav1"  class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a id="text2" class="dropdown-item" href="user.php">User Account</a></li>
                                <li><a id="text2" class="dropdown-item"  href="my_reviews.php">My Reviews</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a id="text2" class="dropdown-item" href="logout.php">Logout </a></li>
                            </ul>
                        </li>
                        </ul>
                </div>
            </div>
        </nav>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>
</html>