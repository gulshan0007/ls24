<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Learners' Space | Registrations</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'head_links.php';?>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php
    require 'functions.php';

    // LDAP of the user
    $user_email = $_SESSION['user_email'];

    // Register all logic
    if (array_key_exists('register_all', $_POST)) {
        registerAll($user_email);
    }

    // Connecting to the database
    include 'config/dbconnect.php';

    // Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }

    $select_query = "
        SELECT * FROM learnerspace_2024_reg1
        WHERE user_email = '$user_email'
    ";

    $count_query = "
        SELECT COUNT(*) FROM learnerspace_2024_reg1
        WHERE user_email = '$user_email'
    ";

    $result = mysqli_query($conn, $select_query);
    $N_CART = mysqli_query($conn, $count_query);
    $cart_rows = mysqli_fetch_array($N_CART);
    $total = $cart_rows[0];
    ?>

    <div class="container mb-5" style="margin-top: 100px">
        <div class="card" style="background: #0f2b55">
            <div class="card-header text-center text-white mt-2">
                <h2>Your Registrations</h2>
                <p>
                    <b class="badge badge-pill badge-light text-dark"><?php echo $total; ?></b> courses registered
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <ul class="list-group mx-auto shadow col-md-9 pr-0">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="list-group-item">
                        <div class="d-inline-block">
                            <?php
                            echo '<b class="lead" style="color: black;">'.$row["course_name"].'</b>';
                            $course_code = $row["course_code"];
                            ?>
                        </div>
                        <div class="d-inline-block float-right">
                            <form method="POST" action="temp2.php?code=<?php echo $course_code; ?>&ldap=<?php echo $user_email; ?>" class="my-md-0 my-2">
                                <small class="badge badge-light badge-pill font-weight-normal"></small>
                                <input 
                                    type="submit" 
                                    name="<?php echo htmlspecialchars('remove_from_cart_'.$course_code); ?>"
                                    class="btn btn-danger btn-sm" value="Deregister"
                                />
                            </form>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } else {
            echo '<p class="text-center my-5"><i class="alert alert-warning">No courses registered</i></p>';
        }
        mysqli_close($conn);
        ?>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
