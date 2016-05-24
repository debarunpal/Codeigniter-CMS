<?php $this->load->view('admin/components/page_header'); ?>

  <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li><?php echo anchor('admin/page', 'Pages'); ?></li>
            <li><?php echo anchor('admin/user', 'Users'); ?></li>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="row">
        <!--Main Column -->
        <div class="col-md-9">
          <section>
            <h2>Page Name</h2>
          </section>
        </div>
        <!--Sidebar -->
        <div class="col-md-3">
          <section>
            <?php echo mailto('contact@debarunpal.com', '<i class="glyphicon glyphicon-user"></i> contact@debarunpal.com'); ?> <br>
            <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-log-out"></i> Logout'); ?>
          </section>
        </div>
      </div>
    </div>

<?php $this->load->view('admin/components/page_footer'); ?>