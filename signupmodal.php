<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup for iDiscuss Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signupform">
                    <form action="_handelsignup.php" method="post">
                        <div class="mb-3 ">
                            <label for="signupemail" class="form-label">Email</label>
                            <input type="email" maxlength="25" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                            <div id="emailHelp" class="form-text">Make sure passwords match</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign UP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
