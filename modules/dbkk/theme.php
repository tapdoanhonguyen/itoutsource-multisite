<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 28 Apr 2023 13:15:07 GMT
 */

if (!defined('NV_IS_MOD_DBKK'))
    die('Stop!!!');

/**
 * nv_theme_dbkk_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_dbkk_main($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

   if(!empty($array_data)) {
    foreach($array_data as $data ) {
      $result[] =[$data["title"], $data["ma_dbkk"]];
    }

    $data_utf8 = array_map(function($item) {
      return mb_convert_encoding($item, 'UTF-8', 'auto');
  }, $result);
  
  // Encode data to JSON
  $json = json_encode($data_utf8, JSON_UNESCAPED_UNICODE);
  $xtpl->assign('DATA', $json);
  
   }
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_dbkk_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_dbkk_search($response)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

   if(!empty($response)) {
     nv_jsonOutput($response);
   }
    $xtpl->parse('main');
    return $xtpl->text('main');
}


