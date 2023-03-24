<?php
 
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Jun 20, 2010 8:59:32 PM
 */
 
namespace NukeViet\Module\news\Api;
 
use NukeViet\Api\Api;
use NukeViet\Api\ApiResult;
use NukeViet\Api\IApi;
 
if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}
 
class ListRowNewsByCat implements IApi
{
    private $result;
 
    /**
     * @return number
     */
    public static function getAdminLev()
    {
        return Api::ADMIN_LEV_MOD;
    }
 
    /**
     * @return string
     */
    public static function getCat()
    {
        return 'List';
    }
 
    /**
     * {@inheritDoc}
     * @see \NukeViet\Api\IApi::setResultHander()
     */
    public function setResultHander(ApiResult $result)
    {
        $this->result = $result;
    }
 
    /**
     * {@inheritDoc}
     * @see \NukeViet\Api\IApi::execute()
     */
    public function execute()
    {
        global $db,$nv_Request;
        $module_name = Api::getModuleInfo();
		$module_data = $module_name['module_data'];
		$catid = $nv_Request->get_int('catid', 'post', 0);
		if($catid >0){
			$sql1 = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows WHERE catid = '  . $catid . '';
			$result = $db->query($sql1);
			while ($row = $result->fetch()) {
				$data[] = $row;
			}
		
			$this->result->set('data', $data);
			$this->result->setMessage('OKE');
			$this->result->setSuccess();
		}else{
			$this->result->setMessage('NO_LIST');
		}
 
        return $this->result->getResult();
    }
}