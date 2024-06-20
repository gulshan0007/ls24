<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup for Learner's Space Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signupform">
                    <form action="_handelsignup.php" method="post">
                        <div class="mb-3">
                            <label for="signupemail" class="form-label">Roll Number</label>
                            <input type="text" maxlength="25" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp" required>
                        </div>
                        <script>
    document.getElementById('signupemail').addEventListener('input', function (event) {
        const input = event.target;
        // Remove non-alphanumeric characters and convert to lowercase
        input.value = input.value.replace(/[^a-z0-9]/gi, '').toLowerCase();
    });
</script>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                            <div id="emailHelp" class="form-text">Make sure passwords match</div>
                        </div>
                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="generateOTP">Generate OTP</button>
                        <button type="submit" class="btn btn-success" id="verifyOTP" disabled>Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('generateOTP').addEventListener('click', function() {
        var signupemail = document.getElementById('signupemail').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("OTP sent to " + signupemail + "@iitb.ac.in");
            }
        };
        xhttp.open("GET", "_handelsignup.php?signupemail=" + signupemail, true);
        xhttp.send();
    });

    document.getElementById('otp').addEventListener('input', function() {
        var otp = document.getElementById('otp').value;
        if (otp.length === 6) {
            document.getElementById('verifyOTP').disabled = false;
        } else {
            document.getElementById('verifyOTP').disabled = true;
        }
    });
</script>
