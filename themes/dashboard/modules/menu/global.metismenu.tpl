<!-- BEGIN: tree -->
<li class="nav-item">
	<a title="{MENUTREE.note}" href="{MENUTREE.link}" class="nav-link"{MENUTREE.target}>
	<i class="far {MENUTREE.html_class} nav-icon"></i>
	<p>{MENUTREE.title}</p>
	</a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->

	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- BEGIN: loopcat1 -->
          <li data-mod="{CAT1.note}" class="nav-item has-treeview">
            <a  class="nav-link">
			  <i class="fas {CAT1.html_class}"></i>
              <p>
                {CAT1.title}
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<!-- BEGIN: cat2 -->
			<ul class="nav nav-treeview">
				{HTML_CONTENT}
			</ul>
			<!-- END: cat2 -->
          </li>
		  <!-- END: loopcat1 -->
          
 
        </ul>

<!-- END: main -->

<link rel="stylesheet" type="text/css"	href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/jquery.metisMenu.css" />
<script type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery/jquery.metisMenu.js"></script>

<div class="clearfix panel metismenu">
	<aside class="sidebar">
		<nav class="sidebar-nav">
			<ul id="menu_{MENUID}">
				
					<li>
						<a title="" href="{CAT1.link}"{CAT1.target}>{CAT1.title_trim}</a>
						<!-- BEGIN: expand -->
						<span class="fa arrow expand"></span>
						<!-- END: expand -->

						
					</li>
				
			</ul>
		</nav>
	</aside>
</div>
<script type="text/javascript">
$(function () {
	$('#menu_{MENUID}').metisMenu({
        toggle: false
    });
});
</script>


<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li data-mod="personnel" class="nav-item has-treeview">
            <a href="/personnel/" class="nav-link">
			  <i class="fas fa-id-card"></i>
              <p>
                Quản lý nhân sự
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/personnel/workforce/" class="nav-link">
               
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hồ sơ nhân sự</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/personnel/contract/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hợp đồng</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="/personnel/Insurrance/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảo hiểm</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/personnel/kpi/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đánh giá năng lực</p>
                </a>
              </li> -->
               
            </ul>
          </li>
		  
          <li data-mod="customer" class="nav-item has-treeview">
            <a href="/" class="nav-link">
			  <i class="fas fa-users"></i>
              <p>
               Khách hàng
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm khách hàng</p>
                </a>
              </li>
              
               
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
			  <i class="fas fa-project-diagram"></i>
              <p>
               Q.Lý Dự án - Công việc
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dự án thực hiện</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Báo cáo công việc</p>
                </a>
              </li>
     
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
			 <i class="fas fa-briefcase"></i>
              <p>
               Q.Lý Kế toán - Thu chi
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý hóa đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý thu chi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
			  <i class="fas fa-newspaper"></i>
              <p>
               Bản tin nội bộ
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nội quy công ty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khen thưởng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
			  <i class="fas fa-gem"></i>
              <p>
				Bản mô tả công việc
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng quản lý"><i class="far fa-circle nav-icon"></i>Phòng quản lý</a>   
				</li>
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng kế toán - HCNS"><i class="far fa-circle nav-icon"></i>Phòng kế toán - HCNS</a>   
				</li >
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng kinh doanh"><i class="far fa-circle nav-icon"></i>Phòng kinh doanh</a>   
				</li>
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng Lập Trình"><i class="far fa-circle nav-icon"></i>Phòng Lập Trình</a>   
				</li>
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng Seo Marketing"><i class="far fa-circle nav-icon"></i>Phòng Seo Marketing</a>   
				</li>
				<li class="nav-item">
					 <a class="nav-link" class="nav-link" href="#" title="Phòng Thiết Kế"><i class="far fa-circle nav-icon"></i>Phòng Thiết Kế</a>   
				</li>
				<li class="nav-item">
					 <a class="nav-link" href="#" title="Phòng chăm sóc khách hàng"><i class="far fa-circle nav-icon"></i>Phòng chăm sóc khách hàng</a>   
				</li>
			</ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
			 <i class="far fa-file"></i>
              <p>
				Quy trình - Nghiệp vụ
				<i class="fas fa-angle-left right"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Phòng Seo</p>
                </a>
              </li>
     
            </ul>
          </li>
 
        </ul>