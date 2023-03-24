<noscript>
		<div class="alert alert-danger">{LANG.nojs}</div>
	</noscript>
    <header class="header sticker"  >
      <div class="wraper">   
		 <div class="middle-header">
            <div class="container">
               <div class="header-main">
                  <div class="menu-bar hidden-md hidden-lg">
                     <i class="fa fa-bars" aria-hidden="true"></i>
                  </div>
                  <div class="logo">
				     <!-- BEGIN: image -->
                     <a title="{SITE_NAME}" href="{THEME_SITE_HREF}" class="logo-wrapper">		
                     <img class="img-responsive" src="{LOGO_SRC}" alt="{SITE_NAME}" />
                     </a>
					 <!-- END: image -->
                  </div>
                  <div class="main-nav">
                     <nav>
                        [MENU_SITE]
						[MENU_MOBI]
                     </nav>
                  </div>
                  <div class="box-right">
                     <div class="search headerSearch">
                        <i class="fa fa-search"></i>
                        <div class="header_search search_form">
                           <div class="input-group search-bar search_form">		
                              <input type="text" maxlength="{NV_MAX_SEARCH_LENGTH}" placeholder="{LANG.search}..." class="input-group-field st-default-search-input search-text">
                              <span class="input-group-btn">
                              <button type="button" data-url="{THEME_SEARCH_URL}" data-minlength="{NV_MIN_SEARCH_LENGTH}" data-click="y" class="btn icon-fallback-text">
                              <i class="fa fa-search"></i>
                              </button>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="mini-cart text-xs-center">
					 [CART]    
                     </div>
                     <div class="box-user">
					    [PERSONALAREA]
                     </div>
					 <div id="tip" data-content="">
                     <div class="bg"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 </div>
      </header>
      <h1 class="hidden">{SITE_NAME}</h1>
	  <!-- BEGIN: breadcrumbs -->
	  <section>
                <nav class="third-nav">
    				<div class="row">
                        <div class="bg">
						<div class="wraper">  
                        <div class="clearfix">
                            <div class="col-xs-24 col-sm-18 col-md-18">
                                <div class="breadcrumbs-wrap">
                                	<div class="display">
                                		<a class="show-subs-breadcrumbs hidden" href="#" onclick="showSubBreadcrumbs(this, event);"><em class="fa fa-lg fa-angle-right"></em></a>
		                                <ul class="breadcrumbs list-none"></ul>
									</div>
									<ul class="subs-breadcrumbs"></ul>
	                                <ul class="temp-breadcrumbs hidden">
	                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{THEME_SITE_HREF}" itemprop="url" title="{LANG.Home}"><span itemprop="title">{LANG.Home}</span></a></li>
	                                    <!-- BEGIN: loop --><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{BREADCRUMBS.link}" itemprop="url" title="{BREADCRUMBS.title}"><span class="txt" itemprop="title">{BREADCRUMBS.title}</span></a></li><!-- END: loop -->
	                                </ul>
								</div>
                            </div>
                        </div>
                        </div>
						</div>
                    </div>
                </nav>
       </section>
	<!-- END: breadcrumbs -->
                [THEME_ERROR_INFO]
