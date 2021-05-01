<div class="main-panel" id="user_topbar">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2" style="margin-top: 35px; margin-bottom: 35px;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="margin-top: 35px; margin-bottom: 35px;">
                    <h2 class="text-center"><?= $title; ?></h2>
                </div>
                
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?= base_url('owner/profile'); ?>" class="text-center author"><img class="avatar border-gray preview_img" src="<?= base_url('assets/img/profile/').$profile['photo']; ?>" alt="..." width="60" height="60"/></a>
                    </li>
                    <li>
                        <a href="<?= base_url('auth/logout'); ?>">
                            <button class="btn btn-secondary btn-fill" title="hahah"><i class="fas fa-sign-out-alt"></i> Log out (<?= $profile['username']; ?>)</button>
                        </a>
                    </li>
                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>