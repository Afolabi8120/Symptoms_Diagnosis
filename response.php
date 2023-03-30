<?php
    
    $pageTitle = "Response";
    require('core/validate/response.php');

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
                                                                        <select class="form-control form-control-round" name="keyword">
                                                                            <option value="" disabled="">Select Keyword</option>
                                                                            <?php foreach ($globalclass->select('tblkeyword') as $keyword) {
                                                                                ?>
                                                                            <option value="<?= $keyword->id; ?>"><?= $keyword->keyword; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Response</label>
                                                                    <div class="col-lg-10 mb-2">
                                                                         <textarea rows="5" id="mytextarea" cols="5" class="textarea_editor html-editor form-control" name="response" placeholder="Response..."></textarea>

                                                                         <input type="submit" class="btn hor-grd btn-grd-primary mt-3" name="btnAddResponse" value="Save">
                                                                        <a href="./" class="btn hor-grd btn-grd-danger mt-3">Back</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>All Keywords</h5>
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
                                                                            <th>Keyword</th>
                                                                            <th>Response</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1; foreach($response->fetchResponse() as $response) { ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $i++; ?></th>
                                                                            <td><?= $response->keyword; ?></td>
                                                                            <td><?= $response->response; ?></td>
                                                                            <td>
                                                                                <form method="POST">
                                                                                    <input type="hidden" readonly="" name="response_id" value="<?= $response->id; ?>">
                                                                                    <a href="edit-response?rid=<?= $response->id; ?>" title="Sapa" class="btn btn-sm btn-info mt-3">Edit</a>
                                                                                    <input type="submit" onclick="return confirm('Remove this Response?')" class="btn btn-sm btn-danger mt-3" value="Delete" name="btnDeleteResponse">
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
        </div>
        <script src="assets/js/tinymce.min.js"></script>
        <script>
          // tinymce.init({
          //   selector: '#mytextarea'
          // });
        </script>

       <?php include('includes/footer.php'); ?>


