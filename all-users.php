<?php
    
    $pageTitle = "All Users";
    require('core/validate/user.php');

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
                                                        <h4>All Users</h4>
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
                                                <div class="card">
                                                        <div class="card-header">
                                                            <h5>All Users</h5>
                                                            <div class="card-header-right">    
                                                                <ul class="list-unstyled card-option">        
                                                                    <li><i class="icofont icofont-simple-left "></i></li>    
                                                                    <li><i class="icofont icofont-minus minimize-card"></i></li>        
                                                                    <li><i class="icofont icofont-refresh reload-card"></i></li>   
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-block table-border-style">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Surname</th>
                                                                            <th>Other Names</th>
                                                                            <th>Email</th>
                                                                            <th>Gender</th>
                                                                            <th>Phone No.</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1; foreach($globalclass->selectWhere('tbluser','usertype','User') as $user) { ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $i++; ?></th>
                                                                            <td><?= $user->surname; ?></td>
                                                                            <td><?= $user->other_name; ?></td>
                                                                            <td><?= $user->email; ?></td>
                                                                            <td><?= $user->gender; ?></td>
                                                                            <td><?= $user->phone; ?></td>
                                                                            <td>
                                                                                <form method="POST">
                                                                                    <input type="hidden" readonly="" name="user_id" value="<?= $user->id; ?>">
                                                                                    <input type="submit" onclick="return confirm('Remove this User Account?')" class="btn btn-sm btn-danger mt-3" value="Delete" name="btnRemoveUser">
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
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


