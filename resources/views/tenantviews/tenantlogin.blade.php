<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link href="Tenant/css/login-styles.css" rel="stylesheet" />

</head>

<body>
    <section class="login-section">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="Tenant/resource/login-photo.png" alt="login form"
                                    class="img-fluid custom-img-height" />
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body">

                                <form method="POST" action="{{ route('tenantlogin_submit') }}">
                                @csrf
                                    <div class="logo">
                                    <img src="Tenant/resource/Main_logo.png" alt="login form" class="main-logo" />
                                        <span class="h1 fw-bold mb-0">TourGov.PH</span>
                                    </div>

                                    <h5 class="small mb-3">Sign into your account</h5>

                                    <div class="form-outline small mb-3">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <div class="form-outline small mb-3">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-dark btn-md btn-block" type="submit">Login</button>
                                    </div>

                                    <div class="mb-3 small text-center"> <!-- Center align forgot password link -->
                                        <a href="" class="text-muted">Forgot password?</a>
                                    </div>
                                    <p class="mb-2 small text-center" style="color: #393f81;">Don't have an account?
                                        <a href="#!" style="color: #393f81;">Register here</a></p>
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
