<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Tution</title>
        <base href="<?= base_url() ?>"/>
        <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="assets/libs/animate.css/animate.css" type="text/css" />
        <link rel="stylesheet" href="assets/libs/font-awesome/css/font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="assets/libs/jquery/waves/dist/waves.css" type="text/css" />
        <link rel="stylesheet" href="assets/styles/material-design-icons.css" type="text/css" />
        <!--<link rel="stylesheet" href="assets/styles/dataTables.min.css" type="text/css" />-->

        <link rel="stylesheet" href="assets/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="assets/styles/dataTables.bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
        <link rel="stylesheet" href="assets/styles/app.css" type="text/css" />
        <link rel="stylesheet" href="assets/styles/custom.css" type="text/css"/>
        <script src="assets/libs/jquery/jquery/dist/jquery.js"></script>
        <script src="assets/scripts/Angular/1.5.8/angular.js"></script>
        
    </head>
    <body>
        <div class="app">
            <?php include_once("header.php") ?>

            <!-- content -->
            <div id="content" class="app-content" role="main">
                <div class="box">
                    <!-- Content Navbar -->
                    <?php include_once("search.php") ?>  
                    <!-- Content -->

                    <div class="box-row">
                        <?php echo $body; ?>
                    </div>
                </div>
            </div>
            <!-- / content -->
            <?php include_once("chat.php"); ?>
        </div>
    </div>

    <div class="modal fade" id="chat" data-backdrop="false">
        <div class="right w-xxl bg-white md-whiteframe-z2">
            <div class="box">
                <div class="p p-h-md">
                    <a data-dismiss="modal" class="pull-right text-muted-lt text-2x m-t-n inline p-sm">&times;</a>
                    <strong>Chat</strong>
                </div>
                <div class="box-row bg-light lt">
                    <div class="box-cell">
                        <div class="box-inner">
                            <div class="p-md">
                                <div class="m-b">
                                    <a href class="pull-left w-40 m-r-sm"><img src="assets/images/a2.jpg" alt="..." class="w-full img-circle"></a>
                                    <div class="clear">
                                        <div class="p p-v-sm bg-warning inline r">
                                            Hi John, What's up...
                                        </div>
                                        <div class="text-muted-lt text-xs m-t-xs"><i class="fa fa-ok text-success"></i> 2 minutes ago</div>
                                    </div>
                                </div>
                                <div class="m-b">
                                    <a href class="pull-right w-40 m-l-sm"><img src="assets/images/a3.jpg" class="w-full img-circle" alt="..."></a>
                                    <div class="clear text-right">
                                        <div class="p p-v-sm bg-info inline text-left r">
                                            Lorem ipsum dolor soe rooke..
                                        </div>
                                        <div class="text-muted-lt text-xs m-t-xs">1 minutes ago</div>
                                    </div>
                                </div>
                                <div class="m-b">
                                    <a href class="pull-left w-40 m-r-sm"><img src="assets/images/a2.jpg" alt="..." class="w-full img-circle"></a>
                                    <div class="clear">
                                        <div class="p p-v-sm bg-warning inline r">
                                            Good!
                                        </div>
                                        <div class="text-muted-lt text-xs m-t-xs"><i class="fa fa-ok text-success"></i> 5 seconds ago</div>
                                    </div>
                                </div>
                                <div class="m-b">
                                    <a href class="pull-right w-40 m-l-sm"><img src="assets/images/a3.jpg" class="w-full img-circle" alt="..."></a>
                                    <div class="clear text-right">
                                        <div class="p p-v-sm bg-info inline text-left r">
                                            Dlor soe isep..
                                        </div>
                                        <div class="text-muted-lt text-xs m-t-xs">Just now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-h-md p-v">
                    <a class="pull-left w-32 m-r"><img src="assets/images/a3.jpg" class="w-full img-circle" alt="..."></a>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Say something">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">SEND</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="assets/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/libs/jquery/waves/dist/waves.js"></script>

<script src="assets/scripts/dataTables.min.js"></script>
<script src="assets/scripts/dataTables.bootstrap.min.js"></script>
<script src="assets/scripts/ui-load.js"></script>
<script src="assets/scripts/ui-jp.config.js"></script>
<script src="assets/scripts/ui-jp.js"></script>
<script src="assets/scripts/ui-nav.js"></script>
<script src="assets/scripts/ui-toggle.js"></script>
<script src="assets/scripts/ui-form.js"></script>
<script src="assets/scripts/ui-waves.js"></script>
<script src="assets/scripts/ui-client.js"></script>

</body>
</html>
