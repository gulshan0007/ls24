<?php
  session_start();
  if (isset($_SESSION['ldap'])) {
    $logged_in = True;
    $USER_NAME = $_SESSION['name'];
    $USER_LDAP = $_SESSION['ldap'];
    $USER_ROLL = $_SESSION['rollno'];
  } else {
    $logged_in = false;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Learners' Space</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    <?php require 'head_links.php'; ?>

    <style>
    .text-white {
        color: white !important;
    }

    .bg-light {
        background: transparent !important;
    }

    .bg-light.scrolled {
        background-color: #ff3f81 !important;
    }

    .btn-outline-success {
        color: #28a745 !important;
        border-color: #28a745 !important;
    }

    .btn-outline-success:hover {
        color: #fff !important;
        background-color: #28a745 !important;
        border-color: #28a745 !important;
    }

    .home-office {
        margin: 0 auto;
        display: block;
    }

    .typed-cursor {
        display: none;
    }

    .dotted-border {
        border-style: dashed;
        border-color: #ff3f81;
    }

    .navbar .itc {
        max-height: 45px;
    }

    .navbar .ugac {
        max-height: 60px;
    }

    @media (max-width: 768px) {
        .navbar .itc {
            max-height: 30px;
        }

        .navbar .ugac {
            max-height: 45px;
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
        transition: background-color 0.5s ease;
    }

    .navbar-scrolled {
        background-color: #0a0a0a !important;
    }

    
.container2 {
  margin:auto;
  display: flex;
  flex-direction:row;
  width: 800px;
  height: 600px;
  perspective: 800px;
}

.card1:hover {
  cursor: pointer;
  transform: rotateY(180deg);
}

.card2:hover {
  cursor: pointer;
  transform: rotateY(180deg);
}

.card1 {
  margin-right: 15px;
  height: 100%;
  width: 100%;
  transition: transform 1500ms;
  transform-style: preserve-3d;
}

.card2 {
  height: 100%;
  width: 100%;
  transition: transform 1500ms;
  transform-style: preserve-3d;
}

.front,
.back {
  height: 100%;
  width: 100%;
  border-radius: 2rem;
  box-shadow: 0 0 5px 2px rgba(50, 50, 50, 0.25);
  position: absolute;
  backface-visibility: hidden;
  background-size: cover; /* Add this line */
  background-position: center; /* Add this line */
}

.card1 .front .back a:hover {
  width: 50px;
  height: 20px;
  background-color: #ff3f81;
  color: white;
}

.card1 .front {
  background-image: url('assets/img/tss.jpeg');
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5rem;
}

.card1 .back {
  background-image: url('assets/img/tss.jpeg');
  transform: rotateY(180deg);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 5rem;
}

.card2 .front {
  background-image: url('assets/img/ntss.jpeg');
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5rem;
}

.card2 .back {
  background-image: url('assets/img/ntss.jpeg');
  transform: rotateY(180deg);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 5rem;
}


    </style>
</head>

<body>
    <header>
        <?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>
    </header>

    <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container2">
    <div class="card1">
      <div class="front">
        <h1>TSS</h1>
      </div>
      <div class="back">
      <a class="btn btn-outline-light  mx-2 my-2 dotted-border" style="width:50%;height:8%; " href="tss.php">View Courses<i class="fas fa-home"></i></a>
      </div>
    </div>
    <div class="card2">
      <div class="front">
        <h1>NTSS</h1>
      </div>
      <div class="back">
      <a class="btn btn-outline-light  mx-2 my-md-0 my-1 dotted-border" style="width:50%;height:8% " href="ntss.php">View Courses <i class="fas fa-home"></i></a>
      </div>
    </div>
  </div>
    </section>

    <?php require 'footer.php'; ?>

    <script>
        VANTA.NET({
            el: "#hero",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            backgroundColor: 0xa0a0a,
            points: 15.00,
            maxDistance: 19.00
        })
    </script>

    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>

    <script>
    $(window).on('scroll', function() {
        var windowHeight = $(window).height();
        var windowScrollTop = $(window).scrollTop();

        $('.counts span[data-toggle="counter-up"]').each(function() {
            var $this = $(this);
            if (!$this.hasClass('counted') && $this.offset().top < (windowScrollTop + windowHeight - 100)) {
                $this.addClass('counted');
                var countTo = parseInt($this.attr('data-value'));
                $({
                    countNum: 0
                }).animate({
                    countNum: countTo
                }, {
                    duration: 1250,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum) + '+');
                    },
                    complete: function() {
                        $this.text(this.countNum + '+');
                    }
                });
            }
        });
    });
    </script>

    <script type="text/javascript">
    $(window).scroll(function() {
        var $hero = $("#hero");
        $('nav').toggleClass('scrolled', $(this).scrollTop() > $hero.height());
    });
    </script>

</body>

</html>



