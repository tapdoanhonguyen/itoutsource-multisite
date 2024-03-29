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

if (!function_exists('nv_view_product_prices')) {

    /**
     * nv_block_config_product_price_blocks()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_product_prices_blocks($module, $data_block, $lang_block)
    {
        $html = '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['price_begin'] . '</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_price_begin" class="form-control w200" value="' . $data_block['price_begin'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['price_end'] . '</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_price_end" class="form-control w200" value="' . $data_block['price_end'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['price_step'] . '</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_price_step" class="form-control w200" value="' . $data_block['price_step'] . '"/></div>';
        $html .= '</div>';
        return $html;
    }



    /**
     * nv_block_config_product_price_blocks_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_product_prices_blocks_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['price_begin'] = $nv_Request->get_float('config_price_begin', 'post', 0);
        $return['config']['price_end'] = $nv_Request->get_float('config_price_end', 'post', 0);
        $return['config']['price_step'] = $nv_Request->get_float('config_price_step', 'post', 0);
        return $return;
    }

    /**
     * nv_view_product_price()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_view_product_prices($block_config)
    {
        global $site_mods, $global_config, $module_info, $nv_Request, $catid, $global_array_shops_cat;
		$catid_old= $nv_Request->get_int('catid', 'session', 0);
		$nv_Request->set_Session('catid', $catid, NV_LIVE_SESSION_TIME);

        $cataid = $nv_Request->get_int('cata', 'get', 0);

        if ($cataid == 0) {
            $cataid = $catid;
        }
        $recata = '';
        if ($cataid > 0) {
            $recata = '&cata=' . $cataid;
        }

        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];

        include NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . NV_LANG_DATA . '.php';

        if (file_exists(NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $mod_file . '/block.price.tpl')) {
            $block_theme = $module_info['template'];
        } else {
            $block_theme = 'default';
        }

        $xtpl = new XTemplate('block.price.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('TEMPLATE', $block_theme);
        $xtpl->assign('MODULE_FILE', $mod_file);
		$xtpl->assign('CATID', $catid);
		$xtpl->assign('REWRITE_ENABLE', $global_config['rewrite_enable'] ? 'true' : 'false');
		$xtpl->assign('AJAX_URL', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module . '&' . NV_OP_VARIABLE . '=' . $global_array_shops_cat[$catid]['alias'], true));
        $xtpl->assign('LINK_URL', rtrim(nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module . '&' . NV_OP_VARIABLE . '=' . $global_array_shops_cat[$catid]['alias'], true), '/'));

        $val = $block_config['price_begin'];
		$xtpl->assign('PRICEMIN', $block_config['price_begin']);
		$xtpl->assign('PRICESTEP', $block_config['price_step']);
		$xtpl->assign('PRICEMAX', $block_config['price_end']);
		
		//print_r($catid_old);print_r('/'.$catid.'/');
		if($catid != $catid_old){
			$nv_Request->set_Session('pricestart', $val, NV_LIVE_SESSION_TIME);
			$nv_Request->set_Session('priceend', $block_config['price_step']*780, NV_LIVE_SESSION_TIME);
		}
        $start_old = $nv_Request->get_int('pricestart','session',$val);
        $end_old = $nv_Request->get_int('priceend','session',$block_config['price_step']*780);
		//print_r($start_old);
		$xtpl->assign('PRICESTART', $start_old);
		$xtpl->assign('PRICEEND', $end_old);
		//$nv_Request->set_Session('pricestart', $val, NV_LIVE_SESSION_TIME);
        while (true) {
            $price1 = $val;
            $price2 = $val + $block_config['price_step'];
            $arr_price = array();

            if ($val < $block_config['price_end']) {
                //$title = '<span class="label label-success">' . numoney_to_strmoney($price1, $mod_file) . '</span> <span class="glyphicon glyphicon-arrow-right"></span> ' . '<span class="label label-success">' . numoney_to_strmoney($price2, $mod_file) . '</span>';
                $link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search_result&price1=' . $price1 . '&price2=' . $price2 . $recata;
                $arr_price = array(
                    'title' => $title,
                    'link' => $link
                );
            } elseif ($val >= $block_config['price_end']) {
                //$title = '<span class="label label-warning">' . $lang_module['price2_over'] . ' ' . numoney_to_strmoney($val, $mod_file) . '</span>';
                $link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search_result&price2=' . $val . $recata;
                $arr_price = array(
                    'title' => $title,
                    'link' => $link
                );
            }

            $xtpl->assign('ROW', $arr_price);
            $xtpl->parse('main.loopprice');

            if ($val >= $block_config['price_end']) {
                break;
            }

            $val += $block_config['price_step'];
        }

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_view_product_prices($block_config);
}
