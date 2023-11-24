<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 04/18/2017 09:47
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!function_exists('nv_filter_product_cat')) {
    /**
     * nv_block_config_filter_product_cat()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_filter_product_cat($module, $data_block, $lang_block)
    {
        global $nv_Cache, $db_config, $site_mods;

        $html = '';
        $html .= "<div class=\"form-group\">";
        $html .= "	<label class=\"control-label col-sm-6\">" . $lang_block['content'] . "</label>";
        $sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_group WHERE parentid = 0 ORDER BY weight';
        $list = $nv_Cache->db($sql, '', $module);

        $array_style = array(
            'checkbox' => 'Checkbox',
            'label' => 'Label',
            'image' => 'Image'
        );

        $html .= "	<div class=\"col-sm-18\"><div class=\"row\">";
        foreach ($list as $l) {
            $html .= "<div class=\"col-sm-6\">";
            $html .= $l[NV_LANG_DATA . '_title'];
            $html .= "</div>";
            $html .= "<div class=\"col-sm-18\">";
            foreach ($array_style as $key => $style) {
                if($data_block['group_style'][$l['groupid']] != $key && $key == 'checkbox') {
                    $ck = 'checked="checked"';
                }
                else {
                    $ck = $data_block['group_style'][$l['groupid']] == $key ? 'checked="checked"' : '';
                }
                $html .= "<label><input type=\"radio\" name=\"config_group_style[" . $l['groupid'] . "]\" value=\"" . $key . "\" " . $ck . " />" . $style . "</label>&nbsp;&nbsp;&nbsp;";
            }

            $html .= "</div>";
        }
        $html .= "   </div></div>";
        $html .= "</div>";

        return $html;
    }

    /**
     * nv_block_config_filter_product_cat_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_filter_product_cat_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = [];
        $return['error'] = [];
        $return['config'] = [];
        $return['config']['group_style'] = $nv_Request->get_array('config_group_style', 'post', []);
        return $return;
    }

    /**
     * nv_filter_product_cat()
     *
     * @return
     */
    function nv_filter_product_cat($block_config)
    {
        global $module_name, $lang_module, $module_info, $site_mods, $module_file, $module_upload, $db, $module_data, $db_config, $id, $catid, $pro_config, $global_config, $global_array_group, $global_array_shops_cat, $nv_Request, $array_id_group, $catid, $op;

        if ($op != 'viewcat') {
            return '';
        }

        // Lưu ý: $array_id_group được xác định tại viewcat.php

        $module = $block_config['module'];
        $array_cat = GetCatidInParent($catid);
        $group_style = $block_config['group_style'];

        $xtpl = new XTemplate('block.filter_product_cat.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('CATID', $catid);
        $xtpl->assign('REWRITE_ENABLE', $global_config['rewrite_enable'] ? 'true' : 'false');
        $xtpl->assign('AJAX_URL', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $global_array_shops_cat[$catid]['alias'], true));
        $xtpl->assign('LINK_URL', rtrim(nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $global_array_shops_cat[$catid]['alias'], true), '/'));

        $catid = GetParentCatFilter($catid);
		//SELECT sgc.groupid FROM nv4_shops_group_cateid as sgc LEFT JOIN nv4_shops_group as sg on sgc.groupid = sg.groupid WHERE sgc.cateid = 44 ORDER BY sg.weight;
        $result = $db->query('SELECT sgc.groupid FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_group_cateid as sgc LEFT JOIN ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_group as sg on sgc.groupid = sg.groupid WHERE sgc.cateid = ' . $catid . ' ORDER BY sg.weight');
        $i = 0;
		$k = 0;
		while (list ($groupid) = $result->fetch(3)) {
			
            $groupinfo = $global_array_group[$groupid];
            $groupinfo['key'] = str_replace('-', '_', $groupinfo['alias']);
            $groupinfo['class'] = strtolower($groupinfo['alias']);
			//print_r($global_array_group[$groupid]);
			if($groupinfo['parentid'] == 0 && $groupinfo['infilter'] == 1){
				$xtpl->assign('MAIN_GROUP', $groupinfo);
				
				$subgroup = GetGroupidInParent($groupid, 0, 1);
				$j=0;
				if (!empty($subgroup)) {
					
					foreach ($subgroup as $subgroup_id) {
						$resulid = array();
						$resulid = $db->query('SELECT groupid FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_group_cateid WHERE groupid = ' . $subgroup_id . ' and  cateid in (' . implode(',',$array_cat) . ')')->fetch(3);
						if($resulid ){
							if($j==4){
								
								$xtpl->parse('main.group.sub_group.more');
							}elseif($j>4){
								
							}else{
								
								if (!empty($global_array_group[$subgroup_id]['image'])) {
									$global_array_group[$subgroup_id]['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $global_array_group[$subgroup_id]['image'];
								}

								$global_array_group[$subgroup_id]['checked'] = '';
								if (in_array($subgroup_id, $array_id_group)) {
									$global_array_group[$subgroup_id]['checked'] = ' checked="checked"';
								}

								$xtpl->assign('SUB_GROUP', $global_array_group[$subgroup_id]);

								if ($group_style[$groupid] == 'label') {
									if (!empty($global_array_group[$subgroup_id]['checked'])) {
										$xtpl->parse('main.group.sub_group.loop.label.active');
									}
									$xtpl->parse('main.group.sub_group.loop.label');
								} elseif ($group_style[$groupid] == 'image') {
									if (!empty($global_array_group[$subgroup_id]['checked'])) {
										$xtpl->parse('main.group.sub_group.loop.image.active');
									}
									$xtpl->parse('main.group.sub_group.loop.image');
								} else {
									$xtpl->parse('main.group.sub_group.loop.checkbox');
								}
								
								$xtpl->parse('main.group.sub_group.loop');
							}	
							$j++;
						}
						
							
					}
					
					$xtpl->parse('main.group.sub_group');
				}
				$k++;
				if($k>4){
					
					$xtpl->assign('hide', 'style="display:none"');
				}
				if($k>5 and $groupinfo['parentid'] == 0 ){
					$xtpl->assign('class', '');
					if( $groupinfo['infilter'] == 1)
						$xtpl->parse('main.group.show_sub_group');
				}else{
					$xtpl->assign('class', 'show');
					$xtpl->parse('main.group.no_sub_group');
				}
			}
			
             if ($i == 0) {
                $xtpl->parse('main.group.border_top');
            }
			if($groupinfo['parentid'] == 0 ){
				if( $groupinfo['infilter'] == 1)
				$xtpl->parse('main.group');
			}
            $i++;
        }
//die;	
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $module = $block_config['module'];
    $content = nv_filter_product_cat($block_config);
}
