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
	  
                [THEME_ERROR_INFO]
