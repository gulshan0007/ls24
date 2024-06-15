<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Learners' Space | FAQ's</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?php require 'head_links.php';?>

    <!-- cards css -->
    <style>
    .text-success {
        color: #0f2b55 !important;
    }

    .bg-success {
        background-color: #0f2b55 !important;
    }

    .faq-cell:hover {
        background-color: #ddd;
    }

    .faq-cell {
        background-color: #eee;
        padding: 20px;
        width: 60%;
        margin: auto;
        margin-bottom: 12px;
        font-size: 18px;
        border-radius: 10px;
    }

    .answer {
        display: none;
    }

    .ext {
        float: right;
        margin-right: 3%;
        cursor: pointer;
        font-size: 22px;
        color: #323b75;
    }
    </style>
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

}

.navbar-nav .nav-item .btn:hover {
    background-color: #ff3f81 !important;
}

</style>
<?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>
<!--/Navbar-->


    <!-- <div class="container mt-5 p-5">
        <h2 class="text-success text-center">Frequently Asked Questions</h2>
        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">How do I login and start registering?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <li>For desktop users: Click on the “Login via SSO ” tab in the top right corner. <br> For
                                mobile users: Tap on the three horizontal lines in the top right corner beside
                                “Learners’ Space” and then tap on the “Login” option in the drop-down menu.</li>
                            <li>Sign in using SSO. You will be able to see new tabs after logging in.</li>
                            <li>If some of your details are missing from the IITB Gymkhana profile, you will be prompted
                                to fill those in by clicking on the “Update your details” button which will redirect you
                                to the gymkhana profiles page.</li>
                            <li>Click the “Moodle” button available in the navigation bar, and create your username and
                                password. This moodle is different from moodle.iitb.ac.in, so you can create different
                                login credentials. You can fill in the login credentials only if you have registered for
                                one or more courses. </li>
                        </ul>
                        *Make sure you have entered your alternate email and contact numbers otherwise you might receive
                        an error message.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">How do I register for courses?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <li>Go to the “Courses” tab. Choose between the TSS and NTSS tabs and click on the details
                                button on any course placard. You will then be directed to that course page. </li>
                            <li>
                                Scrolling to the bottom you will have the option of “Add to cart”
                            </li>

                            <li>
                                Add as many courses you wish to your cart, and then click on the "Your Cart" button
                                present above to register for all the courses you have selected.
                            </li>
                            <li>
                                Join all the MS Team links shown. This is a very important step(use your IITB account
                                for the same)
                            </li>
                            <li>You can see all the successfully registered courses in the “Your Registrations” tab.
                            </li>
                            <li>Keep checking the email ID you submit at regular intervals, including the SPAM folder
                            </li>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">How many courses can I register for?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            You can register for as many courses as you like! <br> Happy learning :)
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">I have registered for a course by mistake and/or I
                            realized that I don’t want to register for that course, what do I do?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            You can review your registrations by selecting the “Your Registrations” tab. You can
                            deregister from any course if you want to.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">I am facing some issues related to Learners' Space, whom
                            do I contact?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            There is a “Contact Us” section where contacts of people are provided
                        <ul>
                            <li>If you are facing issues related to website navigation, contact "Career Cell" moderators
                            </li>
                            <li>If you have issues/queries regarding specific courses, go to the course and find out the
                                club and moderators. Contact the same from the “Contact Us” section.</li>
                            <li>If you are facing any issue related to website, click on "Want to report a bug?" link at
                                the bottom of this page, or contact the UGAC Web Team</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">Can I take courses from NTSS as well as TSS?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <li>
                                Yes, you can! You can select courses from NTSS, add them to your cart and do the same
                                for TSS courses. Finally, you can register for all the courses from the “Your Cart” tab.
                            </li>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">What is the deadline for registration?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Registrations will be open till 11:59 PM, 27th June 2023
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">What is the method of teaching in Learners’ Space? How
                            will the material be provided and is it self-learning based?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            This year, Learners’ Space will be conducted in a ‘hybrid’ mode, a mix of live
                            sessions/webinars, supplementary material provided by course instructors, and some
                            mini-projects. For more details, please refer to the details in the “Courses” tab, as they
                            might differ per course.
                        </p>
                    </div>
                </div>
            
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-sm-3">

            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white pt-2">How will further communication be carried out?</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <li>Firstly please fill in the correct Email IDs and secondly please keep checking those at
                                regular intervals, including the SPAM folder</li>
                            <li>Join the MS Teams Links displayed after you have successfully registered for the
                                quizzes. The course instruction will be through MS Teams.
                            </li>
                            <li><strong>Keep checking teams at constant intervals to get all the updates regarding your
                                    course.</li></strong>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div> -->

    <section id="faqs">
        <div class="container">
            <h1 style="
            font-family: 'Poppins', sans-serif;
            color: #323b75;
            margin-top : 150px;
            margin-bottom : 30px;
          " class="text-center" data-aos="zoom-in">
                FREQUENTLY ASKED QUESTIONS
            </h1>
            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    How do I register for the courses?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <ul>
                    <li>
                        First Login with your IITB LDAP Email Id via SSO using the Login button at the top-right corner of the page.
                        Please note that you cannot register for the courses unless you are logged in.
                        </li>
                        <li>
                            Go to the “Courses” tab. Choose between the TSS and NTSS tabs and click on the details
                            button on any course placard. You will then be directed to that course page.
                        </li>
                        <li>
                            For each course you have "Add to cart" option. You can click on that to add that course to cart.
                        </li>
                        <li>
                            Add as many courses you wish to your cart, and then click on the "Your Cart" button present
                            above to register for all the courses you have selected.
                        </li>
                        <li>Please wait till the registration deadline is completed. Once deadline is passed you will get a mail
                            regarding the MS Teams Code for all the courses that you have registered.
                        </li>
                        <li>You can see all the successfully registered courses in the “Your Registrations” tab.
                        </li>
                        <li>Keep checking the LDAP email ID that you submit at regular intervals, including the SPAM folder</li>
                    </ul>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    How many courses can you register for?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        You can register for as many courses as you like!
                        Happy learning :)
                    </p>

                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    I have registered for a course by mistake and/or I realised that I don’t want to register for that
                    course, what do I do?

                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        You can review your registrations by selecting the “Your Registrations” tab. You can deregister
                        from any course if you want to before the deadline passes.

                    </p>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    I am facing some issues regarding Learners’ Space. Whom should I contact?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        There is a “Contact Us” section where contacts of people are provided
                    </p>
                    <ul>
                        <li>If you are facing issues related to website navigation, contact "Career Cell" moderators
                        </li>
                        <li>If you have issues/queries regarding specific courses, go to the course and find out the
                            club and moderators. Contact the same from the “Contact Us” section.
                        </li>
                        <li>If you are facing any issue related to website, click on "Want to report a bug?" link at the
                            bottom of this page, or contact the UGAC Web Team</li>
                    </ul>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    Can I take courses from NTSS as well as TSS?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        Yes, you can! You can select courses from NTSS, add them to your cart and do the same for TSS
                        courses. Finally, you can register for all the courses from the “Your Cart” tab.

                    </p>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    What is the deadline of registration?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        Registrations will be open till 11:59 PM,  1st July 2023
                    </p>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    What is the method of teaching in Learners’ Space? How will the material be provided and is it
                    self-learning based?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <p>
                        This year, Learners’ Space will be conducted in a ‘hybrid’ mode, a mix of live
                        sessions/webinars, supplementary material provided by course instructors, and some
                        mini-projects. For more details, please refer to the details in the “Courses” tab, as they might
                        differ per course.
                    </p>
                </div>
            </div>

            <div class="faq-cell" data-aos="fade-in">
                <div class="question text-center">
                    How will further communication be carried out?
                    <span class="ext">+</span>
                </div>
                <div class="answer">
                    <hr />
                    <ul>
                        <li>Firstly please fill in the correct Email IDs and secondly please keep checking those at
                            regular intervals, including the SPAM folder
                        </li>
                        <li>The MS Teams Code for the courses you have registered will be sent to you on your email ID by the end of registration. Please check your spam folder.
                        
                        <li>Keep checking teams at constant intervals to get all the updates regarding your course.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- faq dropdown functionality -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const questions = document.getElementsByClassName("question");

        for (let i = 0; i < questions.length; i++) {
            questions[i].addEventListener("click", function() {
                const answer = this.nextElementSibling;
                const ext = this.querySelector(".ext");
                if (answer.style.display === "none") {
                    answer.style.display = "block";
                    ext.textContent = "-";
                } else {
                    answer.style.display = "none";
                    ext.textContent = "+";
                }
            });
        }
    });
    </script>


    <?php require "footer.php" ?>

</body>

</html>
