<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/app.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/components.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url(); ?>public/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form id="loginForm" class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" required
                                            autofocus>
                                        <div class="invalid-feedback">Please fill in your email</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                        <div class="invalid-feedback">Please fill in your password</div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                    </div>
                                </form>

                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?=base_url(); ?>public/assets/js/app.min.js"></script>
    <script src="<?=base_url(); ?>public/assets/js/scripts.js"></script>
    <script src="<?=base_url(); ?>public/assets/js/custom.js"></script>
    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {e.preventDefault(); 
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        fetch('<?= base_url('authenticate') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email,
                    password
                })
            })
            .then(response => response.json())
            .then(result => {
                if (result.token) {
                    window.location.href = "<?= base_url('dashboard') ?>";
                } else {
                    alert(result.message || 'Login failed.');
                }
            })
            .catch(err => {
                console.error('Login error:', err);
                alert('An error occurred. Please try again.');
            });
    });

   
    </script>


</body>

</html>