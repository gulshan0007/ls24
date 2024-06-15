<?php 
session_start();
include 'config/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
    padding-top: 90px;

}

.top {
    /* margin-top: 3%; */
    width: 70%;
    margin: 3% auto;
    font-family: 'Poppins', sans-serif;
}

.top h2 {
    font-weight: 600;
    color: #0a0a0a;
}

.container {
    width: 75%;
    margin: 0 auto;
}

.card-title {
    padding: 15px;
    background-color: #0a0a0a;
    color: white;
    height: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-text {
    align-items: center;
}

.card {
    border-radius: 10px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-bottom: 30px;
    transform: all 1s ease-in-out;
    padding-bottom: 40px;

}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.buttonss {
    position: absolute;
    bottom: 5px;
    display: flex;
    justify-content: space-between;
    width: 90%;
    margin: auto;
}

.gap {
    margin-top: 5%;
}

.card-body {
    height: 150px;
    overflow: scroll;
}

.card-body::-webkit-scrollbar {
    width: 8px;
    /* Adjust the width as needed */
}

.card-body::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 4px;
}

.card-body::-webkit-scrollbar-thumb:hover {
    background-color: #555;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learners' Space | NTSS</title>
    <?php require 'head_links.php';?>
</head>

<body>
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
    border-color:#0a0a0a;
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

}

.navbar-nav .nav-item .btn:hover {
    background-color: #ff3f81 !important;
}

</style>
<?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>
<!--/Navbar-->

    <div class="top text-center">
        <h2>Non Technical Summer School</h2>
        <h6>This stands as a perfect platform to grasp skills in a variety of interesting topics which are fundamental
            to develop an intriguing profile for some of the most popular non-technical vocations existing today.</h6>
    </div>


    <?php
        include 'config/dbconnect.php';
        $query = "SELECT * FROM learnerspace2023_courses WHERE course_type='NTSS'";
        if($result = mysqli_query($conn, $query))
        {
        ?>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                while($row = mysqli_fetch_array($result))
                { 
            ?>
            <div class="col">
                <div class="card h-100 shadow">
                    <h5 class="card-title text-center">
                        <?php echo $row['course_name']; ?>
                    </h5>
                    <!-- <hr /> -->
                    <div class="card-body h-100">
                        <div class="card-text text-center">
                            <h6><strong>By: <?php echo $row['course_by']; ?></strong></h6>
                            <h6>Description: <?php echo $row['course_desc']; ?></h6>
                        </div>

                        <!-- Button trigger modal -->
                        <div class="buttonss">
                            <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop<?php echo $row['id'] ?>"
                                style="background-color:  #ff3f81; border-color:  #ff3f81">
                                Details
                            </button>
                            <?php if(isset($_SESSION['ldap'])){ ?>
                            <form action="temp3.php" method="POST" type="submit">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color:  #ff3f81; border-color:  #ff3f81">
                                    <input type="hidden" name="cname" value="<?php echo $row['course_name']; ?>">
                                    <input type="hidden" name="code" value="<?php echo $row['id']; ?>">
                                    Add to Cart
                                </button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>



    <?php
    $query = "SELECT * FROM learnerspace2023_courses WHERE course_type='NTSS'";
        if($result = mysqli_query($conn, $query))
        {
                while($row = mysqli_fetch_array($result))
                { 
            ?>
    <div class="modal fade" id="staticBackdrop<?php echo $row['id'] ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <b>Detailed Course</b>: <?php echo $row['course_detailed']; ?>
                        </li>
                        <li><b>Start Date</b>: <?php echo $row['start_date']; ?></li>
                        <li>
                            <b>Course Duration</b>: <?php echo $row['course_duration']; ?>
                        </li>
                        <li><b>Timeline</b>: <?php echo $row['timeline']; ?></li>
                        <li>
                            <b>Weekly commitment</b>: <?php echo $row['weekly_commitment']; ?>
                        </li>
                        <li><b>Assignment</b>: <?php echo $row['assignment'];  ?>
                        </li>
                        <li>
                            <b>Certification</b>: <?php echo $row['certificate']; ?>
                        </li>
                        <li><b>Prerequisites</b>: <?php echo $row['pre_req']; ?></li>
                        <li><b>POCs</b>: <?php echo $row['poc']; ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>


    </div>

    <?php } ?>


    <?php } ?>
    </div>

    <div class="gap">
    </div>


</body>
<?php require 'footer.php';?>

</html>
