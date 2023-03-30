<?php
    
    $pageTitle = "Response";
    require('core/validate/response.php');

    if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){
        $getStudent = $globalclass->selectByOneColumn('email','tbluser',$_SESSION['user']);
        if(isset($_GET['rid']) AND !empty($_GET['rid'])){
            $_SESSION['response_id'] = $_GET['rid'];
            #header('location: edit-response');
            $getResponseData = $globalclass->selectByOneColumn('id','tblresponse',$_SESSION['response_id']); # to get the response table data base on the row id
            $getResponse = $response->getResponse($getResponseData->keyword_id); # using the keyword id to get the keyword name
        }else{
            header('location: response');
        }

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
                                                        <h4>Add Response</h4>
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
                                                        <h5>Response</h5>
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>
                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
                                                            </div>

                                                        </div>
                                                        <div class="card-block">
                                                            <form method="POST">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                                                    <div class="col-lg-10 mt-2 mb-2">
                                                                        <input type="hidden" name="res_id" readonly="" value="<?= $_SESSION['response_id']; ?>" placeholder="">
                                                                        <select class="form-control form-control-round" name="keyword">
                                                                            <option value="<?= $getResponse->id; ?>"><?= $getResponse->keyword; ?></option>
                                                                            <?php foreach ($globalclass->select('tblkeyword') as $keyword) {
                                                                                ?>
                                                                            <option <?php $getResponseData->keyword_id == $keyword->id ? "selected" : "sapa"; ?> value="<?= $keyword->id; ?>">
                                                                                <?= $keyword->keyword; ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Response</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                         <textarea rows="5" id="mytextarea" cols="5" class="textarea_editor html-editor form-control" name="response" placeholder="Response..."><?= $getResponse->response; ?></textarea>

                                                                         <input type="submit" class="btn hor-grd btn-grd-primary mt-3" name="btnEditResponse" value="Update Response">
                                                                        <a href="response" class="btn hor-grd btn-grd-danger mt-3">Back</a>
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
        <script src="assets/js/tinymce.min.js"></script>
        <script>
          // tinymce.init({
          //   selector: '#mytextarea'
          // });
        </script>

       <?php include('includes/footer.php'); ?>


