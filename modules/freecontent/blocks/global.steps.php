<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/25/2010 18:6
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_block_steps')) {
    /**
     * nv_block_config_freecontent()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_steps($module, $data_block, $lang_block)
    {
        global $site_mods, $nv_Cache;
		if( defined( 'NV_EDITOR' ) )
		    {
			require NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
		    }
			$gioithieu = htmlspecialchars( nv_editor_br2nl( $data_block['gioithieu'] ) );
		    if( defined( 'NV_EDITOR' ) and nv_function_exists( 'nv_aleditor' ) )
		    {
			$gioithieu = nv_aleditor( 'config_gioithieu', '100%', '150px', $gioithieu, 'Basic' );
		    }
		    else
		    {
			$gioithieu = '<textarea class=\"form-control w500\" name="config_gioithieu" id="config_gioithieu" cols="20" rows="8">' . $gioithieu . '</textarea>';
		    }

        $html = '';

        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['blockid'] . ':</label>';
        $html .= '	<div class="col-sm-9">';
        $html .= '		<select name="config_blockid" class="form-control">';

        $sql = 'SELECT bid, title FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_blocks ORDER BY title ASC';
        $list = $nv_Cache->db($sql, '', $module);

        foreach ($list as $row) {
            $html .= '	<option value="' . $row['bid'] . '"' . ($row['bid'] == $data_block['blockid'] ? ' selected="selected"' : '') . '>' . $row['title'] . '</option>';
        }

        $html .= '		</select>';
        $html .= '	</div>';
        $html .= '</div>';

        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['numrows'] . ':</label>';
        $html .= '	<div class="col-sm-9">';
        $html .= '		<select name="config_numrows" class="form-control">';

        for ($i = 1; $i <= 10; $i++) {
            $html .= '	<option value="' . $i . '"' . ($i == $data_block['numrows'] ? ' selected="selected"' : '') . '>' . $i . '</option>';
        }

        $html .= '		</select>';
        $html .= '	</div>';
        $html .= '</div>';
		
		$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['title_profe'] . ':</label>';
	        $html .= '<div class="col-sm-18"><input type="text" class="form-control" name="config_title_profe" size="5" value="' . $data_block['title_profe'] . '"/></div>';
	        $html .= '</div>';
			
			$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['gioithieu'] . ':</label>';
	        $html .= '<div class="col-sm-18">' . $gioithieu . '</div>';
	        $html .= '</div>';

        return $html;
    }

    /**
     * nv_block_config_freecontent_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_steps_submit($module, $lang_block)
    {
        global $nv_Request;
		$gioithieu = $nv_Request->get_editor( 'config_gioithieu', '', NV_ALLOWED_HTML_TAGS );
		$gioithieu = strtr( $gioithieu, array(
			"\r\n" => '',
			"\r" => '',
			"\n" => '' ) );
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['blockid'] = $nv_Request->get_int('config_blockid', 'post', 0);
        $return['config']['numrows'] = $nv_Request->get_int('config_numrows', 'post', 2);
		$return['config']['title_profe'] = $nv_Request->get_title('config_title_profe', 'post', '');
		$return['config']['gioithieu'] = $gioithieu;
        return $return;
    }

    /**
     * nv_block_freecontent()
     *
     * @return
     */
    function nv_block_steps($block_config)
    {
        global $global_config, $site_mods, $module_config, $nv_Cache, $db;

        $module = $block_config['module'];

        // Set content status
        if (!empty($module_config[$module]['next_execute']) and $module_config[$module]['next_execute'] <= NV_CURRENTTIME) {
            $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows SET status = 2 WHERE end_time > 0 AND end_time < ' . NV_CURRENTTIME;
            $db->query($sql);

            // Get next execute
            $sql = 'SELECT MIN(end_time) next_execute FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows WHERE end_time > 0 AND status = 1';
            $result = $db->query($sql);
            $next_execute = intval($result->fetchColumn());
            $sth = $db->prepare("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = :config_value WHERE lang = '" . NV_LANG_DATA . "' AND module = :module_name AND config_name = 'next_execute'");
            $sth->bindParam(':module_name', $module, PDO::PARAM_STR);
            $sth->bindParam(':config_value', $next_execute, PDO::PARAM_STR);
            $sth->execute();

            $nv_Cache->delMod('settings');
            $nv_Cache->delMod($module);

            unset($next_execute);
        }

        if (!isset($site_mods[$module]) or empty($block_config['blockid'])) {
            return '';
        }

        $sql = 'SELECT id, title, description, image, link, target FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows WHERE status = 1 AND bid = ' . $block_config['blockid'];
        $list = $nv_Cache->db($sql, 'id', $module);
		if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $site_mods[$module]['module_file'] . '/block.steps.tpl')) {
			$block_theme = $global_config['module_theme'];
		} elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $site_mods[$module]['module_file'] . '/block.steps.tpl')) {
			$block_theme = $global_config['site_theme'];
		} else {
			$block_theme = 'default';
		}

		$xtpl = new XTemplate('block.steps.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $site_mods[$module]['module_file']);
		$xtpl->assign('BLOCK_TITLE', $block_config['title']);
		$xtpl->assign('TEMPLATE', $block_theme);
		$xtpl->assign('TITLE_PROFE', $block_config['title_profe']);
		$gioithieu = $block_config['gioithieu'];
		//$gioithieu = nv_clean60($gioithieu, 300);
		$xtpl->assign( 'GIOITHIEU', $gioithieu );
        if (!empty($list)) {
            

            shuffle($list);
            if ($block_config['numrows'] <= sizeof($list)) {
                $list = array_slice($list, 0, $block_config['numrows']);
            }
            $a = 0;
            foreach ($list as $row) {
                if (!empty($row['image'])) {
                    $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['image'];
                }
				++$a;
				$xtpl->assign('ROW', $row);
				if ($a == 1) {
				$xtpl->parse('main.loop1');
                } elseif ($a == 2) {
				$xtpl->parse('main.loop2');
                } elseif ($a == 3) {
				$xtpl->parse('main.loop3');
                } else {
				$xtpl->parse('main.loop');
                }
            }

            
        }
		$xtpl->parse('main');
        return $xtpl->text('main');

        //return '';
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_steps($block_config);
}
