<?php 
if(!isset($_SESSION)) {
    session_start(); 
}
?>
<!-- Head Links -->
<?php require 'head_links.php';?>
<!-- Include jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
.dotted-border {
    border-style: dashed;
    border-color: #ff3f81;
}

.navbar .itc {
    max-height: 30px;
    /* Adjust the value as per your requirement */
}

.navbar .ugac {
    max-height: 30px;
    /* Adjust the value as per your requirement */
}

.navbar-toggler {
    background-color: white !important;
    border-color: white !important;
    color: white !important;
    position: relative;
    padding: 0.25rem 0.75rem;
}

.navbar-toggler-icon::before {
    content: '\f0c9'; /* Font Awesome icon for bars */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 1.25rem;
    color: #0a0a0a;
}

.navbar-toggler.collapsed .navbar-toggler-icon::before {
    content: '\f00d'; /* Font Awesome icon for times (close) */
}

@media (max-width: 768px) {
    .navbar .itc {
        max-height: 25px;
        /* Adjust the value to make the images smaller in mobile view */
    }

    .navbar .ugac {
        max-height: 25px;
        /* Adjust the value as per your requirement */
    }

    .navbar-toggler {
        background-color: #ff3f81 !important;
        border-color: red !important;
        color: white !important;
    }

    .navbar-toggler-icon {
        color: #0a0a0a !important;
        font-size: 15px !important;
    }
}

.navbar-nav .nav-item .btn:hover {
    background-color: #ff3f81 !important;
}

.navbar-custom {
    background-color: #0a0a0a !important;
    transition: background-color 0.5s ease;
}

.navbar-nav .nav-item .btn {
    font-size: 14px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/UGAC logoWhite.png" class="d-inline-block align-top ugac" alt="">
            <img src="assets/img/ITC logoWhite.png" class="d-inline-block align-top itc" alt="">
            <span class="text-white h4 mb-0 ml-2" style="text-decoration: none;"><b>Learners' Space</b></span>
        </a>

        <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="course.php">Courses</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="faq.php">FAQs</a>
                </li>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="cart.php">Your Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="registrations.php">Your Registrations</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="logout.php" class="form-inline my-2 my-lg-0">
                            <button type="submit" class="btn btn-outline-danger mx-2 my-md-0 my-1 dotted-border" name="Logout">Logout</button>
                        </form>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="#" data-toggle="modal" data-target="#loginmodal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light mx-2 my-md-0 my-1 dotted-border" href="#" data-toggle="modal" data-target="#signupmodal">Register</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Include login and signup modals here -->
<?php include 'loginmodal.php'; ?>
<?php include 'signupmodal.php'; ?>

<script>
    // Track toggle state
    var navbarCollapsed = true;

    // Function to reload the page on second toggle click
    $('#navbarToggler').click(function() {
        if (!navbarCollapsed) {
            location.reload(); // Reload page only if previously expanded
        }
        navbarCollapsed = !navbarCollapsed;
    });
</script>
