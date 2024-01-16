  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo url('/admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="posts-list">
                <div class="box-header with-border">
                  <h3 class="box-title">Dashboard </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h1 class="text-center" style="font-weight: bold">Welcome to Blog WIKI</h1>
                </div>
                <br>
                <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number"><?= $userCount ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Categories</span>
                    <span class="info-box-number"><?= $categoryCount ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tags</span>
                    <span class="info-box-number"><?= $tagCount ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Posts</span>
                    <span class="info-box-number"><?= $postCount ?></span>
                </div>
            </div>
        </div>
    </div>
                  <!-- /.box-body -->
              </div>
              
          </div>
          
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

