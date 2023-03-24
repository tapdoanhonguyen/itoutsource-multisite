<!-- BEGIN: submenu -->				  
<ul class="dropdown-menu">
<!-- BEGIN: loop -->
<li class="nav-item-lv2">
<a class="nav-link" href="{SUBMENU.link}" title="{SUBMENU.note}" {SUBMENU.target}> <span>{SUBMENU.title_trim}</span></a>
<!-- BEGIN: submenu --><i class="fa fa-angle-down"></i><!-- END: submenu -->
<!-- BEGIN: item -->
{SUB}
<!-- END: item -->
</li>
<!-- END: loop -->
</ul>
<!-- END: submenu -->

<!-- BEGIN: main -->
<ul id="nav" class="nav hidden-sm hidden-xs">

<!-- BEGIN: top_menu -->
<li class="hidden-sm hidden-xs nav-item has-dropdown {TOP_MENU.current}">
<a TOP_MENU.dropdown_data_toggle} href="{TOP_MENU.link}" role="button" aria-expanded="false" title="{TOP_MENU.note}" {TOP_MENU.target} class="nav-link">{TOP_MENU.title_trim} <!-- BEGIN: has_sub --><i class="fa fa-angle-down" data-toggle="dropdown"></i><!-- END: has_sub --></a>			
<!-- BEGIN: sub -->
{SUB}
<!-- END: sub -->                            				 
</li>
<!-- END: top_menu -->                  
</ul>
<!-- END: main -->
