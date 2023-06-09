<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 10 Dec 2011 06:46:54 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if( ! nv_function_exists( 'creat_thumbs_hotslider' ) )
{
	function creat_thumbs_hotslider( $id, $homeimgfile, $module_name, $width = 200, $height = 150 )
	{
		if( $width >= $height ) $rate = $width / $height;
		else  $rate = $height / $width;
		$image = NV_UPLOADS_REAL_DIR . '/' . $module_name . '/' . $homeimgfile;
		if( $homeimgfile != '' and file_exists( $image ) )
		{
			$imgsource = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
			$imginfo = nv_is_image( $image );
			$basename = $module_name . $width . 'x' . $height . '-' . $id . '-' . md5_file( $image ) . '.' . $imginfo['ext'];
			if( file_exists( NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $basename ) )
			{
				$imgsource = NV_BASE_SITEURL . NV_TEMP_DIR . '/' . $basename;
			}
			else
			{
				$_image = new NukeViet\Files\Image( $image, NV_MAX_WIDTH, NV_MAX_HEIGHT );
				if( $imginfo['width'] <= $imginfo['height'] )
				{
					$_image->resizeXY( $width, 0 );
				}
				elseif( ( $imginfo['width'] / $imginfo['height'] ) < $rate )
				{
					$_image->resizeXY( $width, 0 );
				}
				elseif( ( $imginfo['width'] / $imginfo['height'] ) >= $rate )
				{
					$_image->resizeXY( 0, $height );
				}
				$_image->cropFromCenter( $width, $height );
				$_image->save( NV_ROOTDIR . '/' . NV_TEMP_DIR, $basename );
				if( file_exists( NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $basename ) )
				{
					$imgsource = NV_BASE_SITEURL . NV_TEMP_DIR . '/' . $basename;
				}
			}
		}
		elseif( nv_is_url( $homeimgfile ) )
		{
			$imgsource = $homeimgfile;
		}
		else
		{
			$imgsource = '';
		}
		return $imgsource;
	}
}
if (! nv_function_exists('nv_block_news_tinhot')) {
    /**
     * nv_block_config_news_tinhot()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_tinhot($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods, $nv_Request;

        // Xuất nội dung khi có chọn module
        if ($nv_Request->isset_request('loadajaxdata', 'get')) {
            $module = $nv_Request->get_title('loadajaxdata', 'get', '');
		
            $html_input = '';
            $html = '';
            $html .= '<div class="form-group">';
            $html .= '<label class=\"control-label col-sm-6\">' . $lang_block['blockid'] . '</label>';
            $html .= '<div class=\"col-sm-18\"><select name="config_blockid" class="form-control w200">';
            $html .= '<option value="0"> -- </option>';
            $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_block_cat ORDER BY weight ASC';
            $list = $nv_Cache->db($sql, '', $module);
            foreach ($list as $l) {
                $html_input .= '<input type="hidden" id="config_blockid_' . $l['bid'] . '" value="' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $site_mods[$module]['alias']['groups'] . '/' . $l['alias'] . '" />';
                $html .= '<option value="' . $l['bid'] . '" ' . (($data_block['blockid'] == $l['bid']) ? ' selected="selected"' : '') . '>' . $l['title'] . '</option>';
            }
            $html .= '</select>';
            $html .= $html_input;
            $html .= '<script type="text/javascript">';
            $html .= '	$("select[name=config_blockid]").change(function() {';
            $html .= '		$("input[name=title]").val($("select[name=config_blockid] option:selected").text());';
            $html .= '		$("input[name=link]").val($("#config_blockid_" + $("select[name=config_blockid]").val()).val());';
            $html .= '	});';
            $html .= '</script>';
            $html .= '</div>';
			$html .= '</div>';
			
			$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['title_length'] . ':</label>';
	        $html .= '<div class="col-sm-18"><input type="text" class="form-control" name="config_title_length" size="5" value="' . $data_block['title_length'] . '"/></div>';
	        $html .= '</div>';
			
			$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['numrow'] . ':</label>';
	        $html .= '<div class="col-sm-18"><input type="text" class="form-control" name="config_numrow" size="5" value="' . $data_block['numrow'] . '"/></div>';
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
            if ($mod['module_file'] == 'news') {
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

    /**
     * nv_block_config_news_tinhot_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_tinhot_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['selectmod'] = $nv_Request->get_title('config_selectmod', 'post', '');
        $return['config']['blockid'] = $nv_Request->get_int('config_blockid', 'post', 0);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 20);
		
        return $return;
    }

    /**
     * nv_block_news_tinhot()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_block_news_tinhot($block_config)
    {
        global $site_mods;

        $block_config['module'] = $block_config['selectmod'];
        $module = $block_config['module'];

        if (isset($site_mods[$module])) {
            global $global_array_cat, $module_name, $db, $global_config, $nv_Cache, $module_config, $lang_global;

            $module_array_cat = array();
            $module_data = $site_mods[$module]['module_data'];
            $module_upload = $site_mods[$module]['module_upload'];
            $show_no_image = $module_config[$module]['show_no_image'];
            $blockwidth = $module_config[$module]['blockwidth'];

            // Xác định danh sách chuyên mục
            if ($module_name == $module) {
                $module_array_cat = $global_array_cat;
            } else {
                $sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, status, keywords, groups_view FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE status=1 OR status=2 ORDER BY sort ASC';
                $list = $nv_Cache->db($sql, 'catid', $module);
                if (!empty($list)) {
                    foreach ($list as $l) {
                        $module_array_cat[$l['catid']] = $l;
                        $module_array_cat[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
                    }
                }
            }
            $db->sqlreset()
                ->select('t1.id, t1.catid, t1.title, t1.alias, t1.homeimgfile, t1.homeimgthumb,t1.hometext,t1.publtime,t1.author,t1.hitscm,t1.external_link')
                ->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows t1')
                ->join('INNER JOIN ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_block t2 ON t1.id = t2.id')
                ->where('t2.bid= ' . $block_config['blockid'] . ' AND t1.status= 1')
                ->order('t2.weight ASC')
                ->limit($block_config['numrow']);

            $list = $nv_Cache->db($db->sql(), '', $module);

            if (!empty($list)) {
                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.news_tinhot.tpl')) {
                    $block_theme = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.news_tinhot.tpl')) {
                    $block_theme = $global_config['site_theme'];
                } else {
                    $block_theme = 'default';
                }

                include NV_ROOTDIR . '/themes/' . $block_theme . '/language/' . NV_LANG_INTERFACE . '.php';

                $xtpl = new XTemplate('global.news_tinhot.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
                $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
                $xtpl->assign('TEMPLATE', $block_theme);
                $xtpl->assign('LANG', $lang_global);
				$xtpl->assign('BLOCK_TITLE', $block_config['title']);

				$i=1;
                foreach ($list as $l) {
                    $l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $module_array_cat[$l['catid']]['alias'] . '/' . $l['alias'] . '-' . $l['id'] . $global_config['rewrite_exturl'];
                    if ($l['homeimgthumb'] == 1) {
						$l['thumb'] = creat_thumbs_hotslider( $l['id'], $l['homeimgfile'], $module, 600, 400 );
                    } elseif ($l['homeimgthumb'] == 2) {
                        $l['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $l['homeimgfile'];
                    } elseif ($l['homeimgthumb'] == 3) {
                        $l['thumb'] = $l['homeimgfile'];
                    } elseif (! empty($show_no_image)) {
                        $l['thumb'] = NV_BASE_SITEURL . $show_no_image;
                    } else {
                        $l['thumb'] = '';
                    }
                    $l['blockwidth'] = $blockwidth;
                    $l['hometext_clean'] = strip_tags($l['hometext']);
                    $l['hometext_clean'] = nv_clean60($l['hometext_clean'], 150, true);
					$l['publtime'] = nv_date('d/m/Y', $l['publtime']);
					

                    $l['title_clean'] = nv_clean60($l['title'], $block_config['title_length']);

                    if ($l['external_link']) {
                        $l['target_blank'] = 'target="_blank"';
                    }
					if($i==1)
				        {
					    $xtpl->assign( 'CONTENT', $l );
						if (! empty($l['thumb'])) {
                            $xtpl->parse('main.content.img');
                        }
					    $xtpl->parse( 'main.content' );
					    ++$i;
				        }
				        else
				        {
                       $xtpl->assign('ROW', $l);
			           $xtpl->parse( 'main.loop' );
					   }
                }
                $xtpl->parse('main');
                return $xtpl->text('main');
            }
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_news_tinhot($block_config);
}