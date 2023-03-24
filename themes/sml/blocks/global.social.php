<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 04 May 2014 12:41:32 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_menu_theme_social')) {
    /**
     * nv_menu_theme_social_config()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_menu_theme_social_config($module, $data_block, $lang_block)
    {
	    if( defined( 'NV_EDITOR' ) )
		    {
			require NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
		    }
			$ketnoi = htmlspecialchars( nv_editor_br2nl( $data_block['ketnoi'] ) );
		    if( defined( 'NV_EDITOR' ) and nv_function_exists( 'nv_aleditor' ) )
		    {
			$ketnoi = nv_aleditor( 'config_ketnoi', '100%', '150px', $ketnoi, 'Basic' );
		    }
		    else
		    {
			$ketnoi = '<textarea class=\"form-control w500\" name="config_ketnoi" id="config_ketnoi" cols="20" rows="8">' . $ketnoi . '</textarea>';
		    }
        $html = '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['facebook'] . ':</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_facebook" class="form-control" value="' . $data_block['facebook'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['google_plus'] . ':</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_google_plus" class="form-control" value="' . $data_block['google_plus'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['youtube'] . ':</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_youtube" class="form-control" value="' . $data_block['youtube'] . '"/></div>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['twitter'] . ':</label>';
        $html .= '	<div class="col-sm-18"><input type="text" name="config_twitter" class="form-control" value="' . $data_block['twitter'] . '"/></div>';
        $html .= '</div>';
		$html .= '<div class="form-group">';
	        $html .= '<label class="control-label col-sm-6">' . $lang_block['ketnoi'] . ':</label>';
	        $html .= '<div class="col-sm-18">' . $ketnoi . '</div>';
	        $html .= '</div>';
        return $html;
    }

    /**
     * nv_menu_theme_social_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_menu_theme_social_submit($module, $lang_block)
    {
        global $nv_Request;
		$ketnoi = $nv_Request->get_editor( 'config_ketnoi', '', NV_ALLOWED_HTML_TAGS );
		$ketnoi = strtr( $ketnoi, array(
			"\r\n" => '',
			"\r" => '',
			"\n" => '' ) );
        $return = array();
        $return['error'] = array();
        $return['config']['facebook'] = $nv_Request->get_title('config_facebook', 'post');
        $return['config']['google_plus'] = $nv_Request->get_title('config_google_plus', 'post');
        $return['config']['youtube'] = $nv_Request->get_title('config_youtube', 'post');
        $return['config']['twitter'] = $nv_Request->get_title('config_twitter', 'post');
		$return['config']['ketnoi'] = $ketnoi;
        return $return;
    }

    /**
     * nv_menu_theme_social()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_menu_theme_social($block_config)
    {
        global $global_config, $site_mods, $lang_global;

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.social.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.social.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        $xtpl = new XTemplate('global.social.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('LANG', $lang_global);
        $xtpl->assign('BLOCK_THEME', $block_theme);
        $xtpl->assign('DATA', $block_config);
		$ketnoi = strip_tags($block_config['ketnoi']);
        $ketnoi = nv_clean60($ketnoi, 300);
		$xtpl->assign( 'KETNOI', $ketnoi );
        if (!empty($block_config['facebook'])) {
            $xtpl->parse('main.facebook');
        }
        if (!empty($block_config['google_plus'])) {
            $xtpl->parse('main.google_plus');
        }
        if (!empty($block_config['youtube'])) {
            $xtpl->parse('main.youtube');
        }
        if (!empty($block_config['twitter'])) {
            $xtpl->parse('main.twitter');
        }
        if (isset($site_mods['feeds'])) {
            $xtpl->assign('FEEDS_HREF', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=feeds');
            $xtpl->parse('main.feeds');
        }
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_menu_theme_social($block_config);
}
