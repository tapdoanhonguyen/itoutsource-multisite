<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 
 * @Copyright (C) 2017. All rights reserved
 * @Forum support 
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Wed, 18 Oct 2016 00:00:01 GMT 
 */

if( ! defined( 'NV_MAINFILE' ) )
{
	die( 'Stop!!!' );
}

if( ! nv_function_exists( 'nv_page_dichvu' ) )
{
	function nv_block_config_page_dichvu( $module, $data_block, $lang_block )
	{
		global $nv_Cache, $site_mods, $db, $nv_Request;
		if( defined( 'NV_EDITOR' ) )
		    {
			require NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
		    }
			$dichvu = htmlspecialchars( nv_editor_br2nl( $data_block['dichvu'] ) );
		    if( defined( 'NV_EDITOR' ) and nv_function_exists( 'nv_aleditor' ) )
		    {
			$dichvu = nv_aleditor( 'config_dichvu', '100%', '150px', $dichvu, 'Basic' );
		    }
		    else
		    {
			$dichvu = '<textarea class=\"form-control w500\" name="config_dichvu" id="config_dichvu" cols="20" rows="8">' . $dichvu . '</textarea>';
		    }
		
		// Xu?t n?i dung khi có ch?n module
        if ($nv_Request->isset_request('loadajaxdata', 'get')) {
            $module = $nv_Request->get_title('loadajaxdata', 'get', '');
        
		    $html = '';
			$html .= '<div class="form-group">';
            $html .= '	<label class="control-label col-sm-6">' . $lang_block['numrow'] . ':</label>';
            $html .= '	<div class="col-sm-9"><input type="text" name="config_numrow" class="form-control" value="' . $data_block['numrow'] . '"/></div>';
            $html .= '</div>';
		    $html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['title_length'] . ':</label>';
	        $html .= '<div class="col-sm-18"><input type="text" class="form-control" name="config_title_length" size="5" value="' . $data_block['title_length'] . '"/></div>';
	        $html .= '</div>';
			
			$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['description_length'] . ':</label>';
	        $html .= '<div class="col-sm-18"><input type="text" class="form-control" name="config_description_length" size="5" value="' . $data_block['description_length'] . '"/></div>';
	        $html .= '</div>';
			
			$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['dichvu'] . ':</label>';
	        $html .= '<div class="col-sm-18">' . $dichvu . '</div>';
	        $html .= '</div>';
			

		nv_htmlOutput($html);
		}

        $html = '';
        $html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">' . $lang_block['selectmod'] . '</label>';
        $html .= '<div class="col-sm-18">';
        $html .= '<select name="config_selectmod" class="form-control w300">';
        $html .= '<option value="">--</option>';

        foreach ($site_mods as $title => $mod) {
            if ($mod['module_file'] == 'page') {
                $html .= '<option value="' . $title . '"' . ($title == $data_block['selectmod'] ? ' selected="selected"' : '') . '>' . $mod['custom_title'] . '</option>';
            }
        }

        $html .= '</select>';
        $html .= '
        <script type="text/javascript">
        $(\'[name="config_selectmod"]\').change(function() {
            var mod = $(this).val();
            var file_name = $("select[name=file_name]").val();
            var module_type = $("select[name=module_type]").val();
            var blok_file_name = "";
            if (file_name != "") {
                var arr_file = file_name.split("|");
                if (parseInt(arr_file[1]) == 1) {
                    blok_file_name = arr_file[0];
                }
            }
            if (mod != "") {
                $.get(script_name + "?" + nv_name_variable + "=" + nv_module_name + \'&\' + nv_lang_variable + "=" + nv_lang_data + "&" + nv_fc_variable + "=block_config&bid=" + bid + "&module=" + module_type + "&selectthemes=" + selectthemes + "&file_name=" + blok_file_name + "&loadajaxdata=" + mod + "&nocache=" + new Date().getTime(), function(theResponse) {
        			$("#block_config").append(theResponse);
        		});
            }
        });
        $(function() {
            $(\'[name="config_selectmod"]\').change();
        });
        </script>
        ';

        $html .= '</div';
        $html .= '</div>';

        return $html;
	}

	function nv_block_config_page_dichvu_submit( $module, $lang_block )
	{
		global $nv_Request;
		$dichvu = $nv_Request->get_editor( 'config_dichvu', '', NV_ALLOWED_HTML_TAGS );
		$dichvu = strtr( $dichvu, array(
			"\r\n" => '',
			"\r" => '',
			"\n" => '' ) );
		$return = array();
		$return['error'] = array();
		$return['config'] = array();
		$return['config']['selectmod'] = $nv_Request->get_title('config_selectmod', 'post', '');
		$return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 6);
		$return['config']['title_length'] = $nv_Request->get_int( 'config_title_length', 'post', 60 );
		$return['config']['description_length'] = $nv_Request->get_int( 'config_description_length', 'post', 200 );
		$return['config']['dichvu'] = $dichvu;
		return $return;
	}

	/**
	 * nv_page_one()
	 *
	 * @return
	 */
	function nv_page_dichvu( $block_config )
	{
		global $nv_Cache, $global_config, $site_mods, $db, $module_name;
		$block_config['module'] = $block_config['selectmod'];
        $module = $block_config['module'];
		
		if( ! isset( $site_mods[$module] ) )
		{
			return '';
		}

		$db->sqlreset()->select( 'id, title, alias, description, image' )->from( NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] )->where( 'status = 1' )->order('weight ASC')->limit($block_config['numrow']);

		$list = $nv_Cache->db( $db->sql(), 'id', $module );

		if( ! empty( $list ) )
		{
			if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.page_dichvu.tpl' ) )
			{
				$block_theme = $global_config['module_theme'];
			}
			elseif( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.page_dichvu.tpl' ) )
			{
				$block_theme = $global_config['site_theme'];
			}
			else
			{
				$block_theme = 'default';
			}
			$xtpl = new XTemplate( 'global.page_dichvu.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks' );
			$xtpl->assign( 'TEMPLATE', $block_theme );
			$xtpl->assign( 'BLOCK_TITLE', $block_config['title'] );
			$dichvu = strip_tags($block_config['dichvu']);
            $dichvu = nv_clean60($dichvu, 300);
			$xtpl->assign( 'DICHVU', $dichvu );

			foreach( $list as $l )
			{
				
				if (!empty($l['image']) and !nv_is_url($l['image'])) {
                $imagesize = @getimagesize(NV_UPLOADS_REAL_DIR . '/' . $module . '/' . $l['image']);
                $l['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module . '/' . $l['image'];
                $l['imageWidth'] = $imagesize[0] > 500 ? 500 : $imagesize[0];
                }
				$l['title_cut'] = nv_clean60( $l['title'], $block_config['title_length'] );
				$l['description_cut'] = nv_clean60( $l['description'], $block_config['description_length'] );
				$l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'] . $global_config['rewrite_exturl'];
				$xtpl->assign( 'ROW', $l );
				$xtpl->parse('main.loop');
			}
			$xtpl->parse( 'main' );
			return $xtpl->text( 'main' );
		}
		else
		{
			return '';
		}
	}
}
if( defined( 'NV_SYSTEM' ) )
{
	$content = nv_page_dichvu( $block_config );
}
