<nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span><?= $getStudent->surname . " " . $getStudent->other_name; ?></span>
                                        <span id="more-details" class="badge bg-success text-white">Active</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="./">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Profile</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="view-words">
                                        <span class="pcoded-micon"><i class="ti-book"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">View Keywords</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="diagnosis">
                                        <span class="pcoded-micon"><i class="ti-folder"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Start Diagnosis</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <?php if($getStudent->usertype == 'Admin'): ?>
                                <li>
                                    <a href="keyword">
                                        <span class="pcoded-micon"><i class="ti-comment-alt"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Add Keyword</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="response">
                                        <span class="pcoded-micon"><i class="ti-comment-alt"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Response</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="all-users">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Users</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="logout">
                                        <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>