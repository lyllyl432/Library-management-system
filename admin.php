<?php
include "includes/header.inc.php";
?>
<section id="admin-login-portal">
    <div class="container">
        <div class="row min-vh-100 align-content-center">
        <h1 class="admin-login-title text-center mb-4">Library System in PHP</h1>
            <div class="col col-md-4 mx-auto bg-white p-3">
                
                <p class="text-center form-text">Sign in to start your session</p>
                <form id="admin-form" action="includes/admin.inc.php" method="post">
                    <div class="mb-3 input-group position-relative">
                        <input type="text" id="username" class="form-control" name="username"
                            placeholder="input Username">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="mb-3 input-group">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="input Password">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    include "includes/script.inc.php";
    include "includes/footer.inc.php";
?>
</body>

</html>