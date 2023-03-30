<?php
    
    $pageTitle = "Profile";
    require('core/validate/profile.php');

    if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){
        
        $getStudent = $globalclass->selectByOneColumn('email','tbluser',$_SESSION['user']);

    }else{
        $_SESSION['ErrorMessage'] = "You Need to Login First";
        header('location: login');
    }

?>
<?php include('includes/header.php'); ?>
  <body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <?php include('includes/nav-bar.php'); ?>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    
                    <!-- Sidebar Starts -->
                    <?php include('includes/sidebar.php'); ?>
                    <!-- Sidebar Ends -->

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Profile</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="./">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                    echo SuccessMessage();
                                                    echo ErrorMessage();
                                                ?>
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>My Profile</h5>
                                                        <span>Edit your profile</span>
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>
                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <form method="POST">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Surname</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="text"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="surname" value="<?= $getStudent->surname; ?>">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Other Names</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="text"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="oname" value="<?= $getStudent->other_name; ?>">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Gender</label>
                                                                    <div class="col-lg-10 mt-2 mb-2">
                                                                        <select class="form-control form-control-round" name="gender">
                                                                            <option <?php $getStudent->gender == "Male" ? "selected" : ""; ?> value="Male">Male</option>
                                                                            <option <?php $getStudent->gender == "Female" ? "selected" : ""; ?> value="Female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Email Address</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="email"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="email" readonly="" value="<?= $getStudent->email; ?>">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Birth Date</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="date"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="dob" value="<?= $getStudent->dob; ?>">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Phone No.</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="tel" maxlength="11"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="phone" value="<?= $getStudent->phone; ?>">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                                    <div class="col-lg-10  mb-2">
                                                                         <textarea rows="5" cols="5" class="form-control" name="address" placeholder="Address..."><?= $getStudent->address; ?></textarea>

                                                                         <input type="submit" class="btn hor-grd btn-grd-primary mt-3" name="btnUpdateProfile" value="Update Profile">
                                                                        <a href="./" class="btn hor-grd btn-grd-danger mt-3">Back</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Change Password</h5>
                                                        <span>Leave form blank if you won't change your password</span>
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>
                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <form method="POST">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">New Password</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="password"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="password">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Retype Password</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                        <input type="password"
                                                                            class="form-control form-control-round"
                                                                            placeholder="" name="cpassword">
                                                                        <input type="submit" class="btn hor-grd btn-grd-primary mt-3" name="btnChangePassword" value="Update Password">
                                                                        <a href="./" class="btn hor-grd btn-grd-danger mt-3">Back</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php include('includes/footer.php'); ?>


