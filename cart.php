<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

include 'config/dbconnect.php';
require 'functions.php';
require 'navbar.php';

// User email
$user_email = $_SESSION['user_email'];

// Register all logic
if (isset($_POST['register_all'])) {
    registerAll($user_email);
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to select courses in the cart
$select_query = "SELECT * FROM learnerspace_2024_cart WHERE user_email = '$user_email'";
$result = mysqli_query($conn, $select_query);

// Query to count the number of courses in the cart
$count_query = "SELECT COUNT(*) FROM learnerspace_2024_cart WHERE user_email = '$user_email'";
$N_CART = mysqli_query($conn, $count_query);
$cart_rows = mysqli_fetch_array($N_CART);
$total = $cart_rows[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Learners' Space | Cart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'head_links.php'; ?>
    <style>
        .btn-outline-success {
            color: #0f2b55;
            border-color: #0f2b55;
        }
        .btn-outline-success:hover {
            color: #fff;
            background-color: #0f2b55;
            border-color: #0f2b55;
        }
        .bg-light-cart {
            background-color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="container mb-5" style="margin-top: 100px">
        <div class="card" style="background: #0f2b55">
            <div class="card-header text-center text-white mt-2">
                <h2>Your Cart</h2>
                <p>
                    <b class="badge badge-pill badge-light text-dark"><?php echo $total; ?></b> courses present inside your cart
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <ul class="list-group mx-auto shadow col-md-9 pr-0">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="list-group-item">
                        <div class="d-inline-block">
                            <?php
                            echo '<b class="lead">' . $row["course_name"] . '</b>';
                            $course_code = $row["course_code"];
                            ?>
                        </div>
                        <div class="d-inline-block float-right">
                            <form method="POST" action="temp.php?code=<?php echo $course_code; ?>&email=<?php echo $user_email; ?>" class="my-md-0 my-2">
                                <input type="submit" name="<?php echo htmlspecialchars('remove_from_cart_' . $course_code); ?>" class="btn btn-danger btn-sm" value="Remove" />
                            </form>
                        </div>
                    </li>
                <?php } ?>
                <li class="list-group-item bg-light-cart py-4 text-center">
                    <form method="POST" class="float-right">
                        <input type="submit" name="register_all" class="btn btn-outline-success shadow" value="Register for all" />
                    </form>
                    <!-- <a href="user_details.php" class="btn btn-outline-success shadow mt-4 float-left">Verify personal details</a> -->
                </li>
            </ul>
        <?php } else { ?>
            <p class="text-center my-5"><i class="alert alert-warning">No courses present inside the cart</i></p>
        <?php }
        mysqli_close($conn);
        ?>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
