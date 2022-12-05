<?php include_once "header.php"; ?>
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Login or Register</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form action="register.php" method="post">
                    <div class="login-form">
                        <h4 class="login-title">SIGN UP</h4>
                        <p>
                            <span class="font-weight-bold">I am a new customer</span>
                        </p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="name">Full Name</label> <input name="fname"
                                    class="mb-0 form-control" type="text" id="name"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="email">Email</label> <input name="userid"
                                    class="mb-0 form-control" type="email" id="email"
                                    placeholder="Enter Your Email Address Here..">
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Password</label> <input name="pwd"
                                    class="mb-0 form-control" type="password" id="password"
                                    placeholder="Enter your password">
                                    <input type="hidden" name="role" value="c">
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Repeat Password</label> <input name="pwd"
                                    class="mb-0 form-control" type="password" id="repeat-password"
                                    placeholder="Repeat your password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outlined">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="validate.php" method="post" autocomplete="off">
                    <div class="login-form">
                        <h4 class="login-title">SIGN IN</h4>
                        <p>
                            <span class="font-weight-bold">I am existing customer</span>
                        </p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Enter your email address here...</label> <input
                                    class="mb-0 form-control" type="email" id="email1" name="userid"
                                    placeholder="Enter you email address here...">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Password</label> <input name="pwd"
                                    class="mb-0 form-control" type="password" id="login-password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outlined">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once "footer.php"; ?>