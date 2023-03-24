<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SML Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
		  
          <img src="{USER.photo}" class="img-circle elevation-2" alt="{USER.full_name}">
        </div>
        <div class="info">
          <a href="{USER.link}" class="d-block">{USER.full_name}</a>
		  <a style="font-size:8px;position: absolute;"><i class="fa fa-circle text-success"></i> Online</a>
		  
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
		[MENU_SIDEBAR]
        
		<script>$('li[data-mod="{MODULE_NAME}"]').addClass('menu-open')</script>
		<span style="color:#fff">[MEMORY_TIME_USAGE]</span>
	  </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">{MODULE_TITLE}</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="/personnel/">Nhân sự</a></li>
            </ol>
          </div>
        </div>
      </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div id="container-fluid" class="container-fluid">
		{MODULE_CONTENT}
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper style="visibility:hidden"-->
  <footer class="main-footer" style="visibility:hidden">
	
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->