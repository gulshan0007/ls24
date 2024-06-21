<?php 
if(!isset($_SESSION))
{
    session_start(); 
}
?>
<!--Navbar-->
<?php require 'head_links.php';?>
<style>
.dotted-border {
    border-style: dashed;
    border-color: #ff3f81;
}

.navbar .itc {
    max-height: 45px;
    /* Adjust the value as per your requirement */
}

.navbar .ugac {
    max-height: 60px;
    /* Adjust the value as per your requirement */
}

@media (max-width: 768px) {
    .navbar .itc {
        max-height: 30px;
        /* Adjust the value to make the images smaller in mobile view */
    }

    .navbar .ugac {
        max-height: 45px;
        /* Adjust the value as per your requirement */
    }

    .navbar-toggler {
        color: red !important;
        border-color: red !important;
    }
}

.navbar-nav .nav-item .btn:hover {
    background-color: #ff3f81 !important;
}

.navbar-custom {
    background-color: #0a0a0a !important;
    transition: background-color 0.5s ease;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-custom">
    <img src="assets/img/UGAC logoWhite.png" width="60" class="d-inline-block align-top ugac" alt="" style="margin-right:10px">
    <img src="assets/img/ITC logoWhite.png" width="80" class="d-inline-block align-top itc" alt="">
    <a class="text-white h2 mb-0 ml-md-3 ml-0" style="text-decoration: none;" href="index.php"><b>Learners' Space</b></a>

    <button class="navbar-toggler ml-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars" style="color:yellow; font-size:28px;"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="index.php">Home <i class="fas fa-home"></i></a>
            </li>

            <li class="nav-item">
                <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="course.php">Courses <i class="fas fa-book"></i></a>
            </li>


            <li class="nav-item">
                <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="contact.php">Contact <i class="fas fa-book"></i></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="faq.php">FAQs <i class="fas fa-book"></i></a>
            </li>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="cart.php">Your Cart <i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="registrations.php">Your Registrations <i class="far fa-calendar-check"></i></a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="logout.php">
                        <button type="submit" class="btn btn-outline-danger mx-2 my-md-0 my-1 dotted-border" name="Logout">
                            Logout <i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="#" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="#" data-bs-toggle="modal" data-bs-target="#signupmodal">Register</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<!-- Include login and signup modals here -->
<?php include 'loginmodal.php'; ?>
<?php include 'signupmodal.php'; ?>