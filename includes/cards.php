                                            <div class="col-md-4 col-xl-4">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-users bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">All Users</span>
                                                        <h4><?= $globalclass->countByOneColumn('tbluser','usertype','User'); ?></h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>all registered users
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xl-4">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-card bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Response</span>
                                                        <h4><?= $globalclass->count('tblresponse'); ?></h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>all available response
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xl-4">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-mail bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Keywords</span>
                                                        <h4><?= $globalclass->count('tblkeyword'); ?></h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 icofont icofont-calendar m-r-10"></i>all available keyword
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            
