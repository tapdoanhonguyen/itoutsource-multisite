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

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];
$rowcontent['dcode'] = $nv_Request->get_title('dcode', 'post', '');
$rowcontent['nocache'] = $nv_Request->get_title('nocache', 'post', '');


if(!empty($rowcontent['dcode'])) {
    // Initialize cURL
    $ch = curl_init();

    // Set the API endpoint URL
    //https://diemthi.tuyensinh247.com/tracuu/ajaxXaKhoKhan?dcode=
    curl_setopt($ch, CURLOPT_URL, "https://diemthi.tuyensinh247.com/tracuu/ajaxXaKhoKhan?dcode=".$rowcontent['dcode']);
    // Set the request method to GET
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    // Set the expected response format to JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    // Return the response instead of outputting it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Execute the cURL request
    $response = curl_exec($ch);
    // Check for errors
    if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
    } else {
    // Process the response
    $array_data = $response ;
    // Do something with $data...
    }
    // Close the cURL session
    curl_close($ch);
    echo nv_jsonOutput($array_data);
}

$db_slave->select('*')
->from(NV_PREFIXLANG . '_' . $module_data)
->where('status=1')
->order('weight DESC');
$result = $db_slave->query($db_slave->sql());
while ($row = $result->fetch()) {
 
    $array_data[$row['id']] = $row;
}


$contents = nv_theme_dbkk_main($array_data);
echo nv_site_theme($contents);
