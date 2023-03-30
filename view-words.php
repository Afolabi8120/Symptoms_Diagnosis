<?php
    
    $pageTitle = "All Keyword";
    require('core/validate/keyword.php');

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
                                                        <h4>All Available Keyword</h4>
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
                                                    <div class="card-header mb-3">
                                                        <h5>Keywords</h5>
                                                        <span>
                                                            <?php foreach($globalclass->select('tblkeyword') as $key): ?>
                                                                <span class="badge bg-dark mr-2 text-white"><?= $key->keyword; ?></span>
                                                            <?php endforeach; ?>
                                                        </span>
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>

                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
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
        </div>

       <?php include('includes/footer.php'); ?>


