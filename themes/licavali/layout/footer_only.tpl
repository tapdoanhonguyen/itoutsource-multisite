        <script type="text/javascript" src="https://shop.mango.com/javax.faces.resource/panelBasic.js.faces?ln=panels&amp;v=9_42_0&amp;ts=1598"></script><script type="text/javascript" src="https://shop.mango.com/javax.faces.resource/events.js.faces?ln=common&amp;v=9_42_0&amp;ts=1598"></script><script>function _mng_preSubmit(name, value, formName) { 
 	if (document.getElementById(name)) document.getElementById(name).value = value; 
 	else {  
 		var _mngh = document.createElement('input'); 
 		_mngh.setAttribute('type','hidden'); 
 		_mngh.setAttribute('name',name); _mngh.setAttribute('id',name); 
 		_mngh.setAttribute('value',value); 
 		document.forms[formName].appendChild(_mngh); 
 	} 
 } 
 function _mng_ButtonTRender(cell, src, color, style, styleClass) { 
 	if (src != 'null') cell.style.backgroundImage= "url('"+src+"')"; 
 	if (color != 'null') cell.style.color=color; 
 	if (style != 'null') cell.style.cssText=style; 
 	if (styleClass != 'null') cell.className=styleClass; 
 } 
 function _mng_autoscrollAdd(anchor) {
	try { 
 		if (window.pageYOffset) 
 			anchor.href = anchor.href + '?scroll=' + window.pageYOffset; 
 		else if (window.scrollY) 
 			anchor.href = anchor.href + '?scroll=' + window.scrollY; 
 		else if (document.documentElement.scrollTop) 
 			anchor.href = anchor.href + '?scroll=' + document.documentElement.scrollTop; 
 		else if (document.body.scrollTop) 
 			anchor.href = anchor.href + '?scroll=' + document.body.scrollTop; 
 	} catch (ex) {} 
 } 
 function _mng_autoscrollSet() {
try { 
 	if (document.location.href.indexOf('scroll=') != -1) { 
		var scr = document.location.href.substring( document.location.href.indexOf('scroll=')+7); 
 		if (scr.indexOf('&') != -1) scr = scr.substring(0, scr.indexOf('&')); 
 		window.scrollTo(0, scr); 
 	} 
 } catch (ex) {} 
 } 
 function _mng_add_onload(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload.call();
			}
			func.call();
		}
	}
}
_mng_add_onload(_mng_autoscrollSet); 

			if ($('.panelDroppointsGeneral').length > 0) {
				$('.panelDroppointsGeneral').remove();
				$('.blancoModal').removeClass('abierto');
			}
		function _mng_popupShow(container, content) { 
	var doc = document.documentElement, body = document.body;  
	var top = (doc && doc.scrollTop  || body && body.scrollTop  || 0); 
	container.style.height = (document.documentElement.offsetHeight-120)+'px';   
	container.style.width = document.documentElement.offsetWidth+'px'; 
	content.style.display = 'block'; 
	if (window.innerHeight) wh = window.innerHeight; 
	else if (document.body.clientHeight) wh = document.body.clientHeight;   
	else if (document.documentElement.offsetHeight) wh = document.documentElement.clientHeight; 
	content.style.top = (top+((wh/2)-(content.offsetHeight/2)))+'px';  
	container.style.display = 'block'; 
} 
function _mng_popupHide(container, content) { 
	container.style.display = 'none'; 
	content.style.display = 'none'; 
} 
function mostrarInfoPopup() { 
	var div1 = document.getElementById('Form:SVLoading:popupLoading'); 
	var div2 = document.getElementById('Form:SVLoading:popupLoading_t'); 
	document.getElementById('_mng_dialogVisible_popupLoading').value = 'true'; 
	_mng_popupShow(div1, div2); 
} 
function ocultarInfoPopup() { 
	var div1 = document.getElementById('Form:SVLoading:popupLoading'); 
	var div2 = document.getElementById('Form:SVLoading:popupLoading_t'); 
	document.getElementById('_mng_dialogVisible_popupLoading').value = 'false'; 
	_mng_popupHide(div1, div2); 
} 

			function showAviso() {
				_mng_showPanel('popupAviso','40%','40%','_panel_visiblepopupAviso','','');
			}
			function hideAviso() {
				_mng_closePanel('popupAviso','_panel_visiblepopupAviso');
			}
			document.getElementById('popupAviso').style.left = '40%'; document.getElementById('popupAviso').style.top = '40%';
		
				function updateLangLinks() {
					if (typeof(langLinks) != 'undefined' && langLinks != null) {
						$(".langCountry__container .langSelector__lang .langSelector__list a").each(function(index, element) {
							$(element).attr("href", langLinks[$(element).attr("data-lang-iso")]);
						});
					}
				}
			
							$(document).ready(function() {
								$(updateLangLinks);
							});
						</script>

		<script>
			// Script que recarga los iframes de paginas externas para mobile, por el bug del back en iPhone
			if (false && typeof(window.frames['bodyFrame']) != 'undefined') {
				var ts = new Date().getTime();
				if (document.getElementById('bodyFrame').src.indexOf("?") > -1) {
					document.getElementById('bodyFrame').src = document.getElementById('bodyFrame').src+'&ts='+ts;
				} else {
					document.getElementById('bodyFrame').src = document.getElementById('bodyFrame').src+'?ts='+ts;
				}
			}
			
		</script>

		
		<script type="text/javascript" src="https://st0.mngbcn.com/static/js/pluginsTOP.js?v=9_42_0&amp;ts=1598"></script>

		
		<script type="text/javascript" src="https://st0.mngbcn.com/static/js/topLayoutDivs.js?v=9_42_0&amp;ts=1598"></script>
		<script type="text/javascript" src="https://st0.mngbcn.com/static/js/plugins.js?v=9_42_0&amp;ts=1598"></script>
		<script type="text/javascript" src="https://st0.mngbcn.com/static/js/oldLibs.js?v=9_42_0&amp;ts=1598" defer="defer"></script>

		
		<script type="text/javascript" src="https://st0.mngbcn.com/static/shop/desktop/specifics/common/main.js?v=9_42_0&amp;ts=1598"></script>
		<script type="text/javascript" src="https://st0.mngbcn.com/static/shop/desktop/specifics/register/components.js?v=9_42_0&amp;ts=1598"></script>
	    	<script type="text/javascript" src="https://st0.mngbcn.com/static/shop/desktop/custom.js?v=9_42_0&amp;ts=1598"></script>

	


	

			<script defer="defer" type="text/javascript" src="https://st0.mngbcn.com/lib/mng-chatbot/index.js?v=9_42_0&amp;ts=1598"></script>

		<script type="text/javascript">window.shoppingCartToggle = true</script><form id="j_id_8s:shoppingCartCheckoutButton" name="j_id_8s:shoppingCartCheckoutButton" method="post" action="https://shop.mango.com/home.faces?state=she_690_IN&amp;ts=1676554247785" enctype="application/x-www-form-urlencoded"><span id="shopping-cart-to-checkout" onclick="_mng_preSubmit('_mng_hidde_valueshopping-cart-to-checkout','shopping-cart-to-checkout','j_id_8s:shoppingCartCheckoutButton');return myfaces.oam.submitForm('j_id_8s:shoppingCartCheckoutButton','shopping-cart-to-checkout');" style="cursor: pointer;display:none;"></span><input type="hidden" name="j_id_8s:shoppingCartCheckoutButton_SUBMIT" value="1" /><input type="hidden" name="javax.faces.ViewState" id="j_id__v_0:javax.faces.ViewState:6" value="BvQMmrrjjyyKAM0P2PAIS3Y+eKdXdmK/IjLN41IgE33nWGsj
" /></form>

		

	
		<script type="text/javascript" src="https://st0.mngbcn.com/static/js/vendor/modernizr-custom.js?v=9_42_0&amp;ts=1598"></script>
		 
    </body>
</html>
