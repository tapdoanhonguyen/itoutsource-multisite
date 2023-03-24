<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$lang_translator['author'] = 'CLB NUKEVIET HCMC (adminwmt@gmail.com)';
$lang_translator['createdate'] = '14/11/2016, 03:54';
$lang_translator['copyright'] = '@Copyright (C) 2016 CLB NUKEVIET HCMC All rights reserved';
$lang_translator['info'] = '';
$lang_translator['langtype'] = 'lang_module';

$lang_module['no_permission'] = 'Bạn không được phép sử dụng module Multiple Site';
$lang_module['main'] = 'Trang chính';
$lang_module['config'] = 'Cấu hình';
$lang_module['config_cpanel'] = 'Cấu hình Cpanel';
$lang_module['config_vesta'] = 'Cấu hình vesta';
$lang_module['config_da'] = 'Cấu hình Directadmin';
$lang_module['save'] = 'Save';
$lang_module['alow_multi'] = 'Bật chức năng multi website';
$lang_module['ftp_user_name'] = 'FTP USER';
$lang_module['ftp_user_pass'] = 'FTP PASS';
$lang_module['pre_host'] = 'Tiền tố host';
$lang_module['save_cf'] = 'Lưu cấu hình';

//Lang for function cat
$lang_module['cat'] = 'Danh mục site';
$lang_module['add'] = 'Thêm mới';
$lang_module['edit'] = 'Sửa';
$lang_module['delete'] = 'Xóa';
$lang_module['number'] = 'STT';
$lang_module['active'] = 'Trạng thái';
$lang_module['search_title'] = 'Nhập từ khóa tìm kiếm';
$lang_module['search_submit'] = 'Tìm kiếm';
$lang_module['title'] = 'Tiêu đề danh mục';
$lang_module['theme'] = 'Giao diện sử dụng';
$lang_module['module'] = 'Module sử dụng';
$lang_module['error_required_title'] = 'Lỗi: bạn cần nhập dữ liệu cho Tiêu đề danh mục';
$lang_module['error_required_theme'] = 'Lỗi: bạn cần nhập dữ liệu cho Giao diện';
$lang_module['error_required_module'] = 'Lỗi: bạn cần nhập dữ liệu cho Module';

//Lang for function site
$lang_module['add_site'] = 'Thêm website';
$lang_module['cid'] = 'Thuộc danh mục';
$lang_module['domain'] = 'Tên miền chính';
$lang_module['subdomain'] = 'Tên miền phụ';
$lang_module['domaintype'] = 'Chọn loại tên miền';
$lang_module['dbsite'] = 'CSDL của site con';
$lang_module['allowuserreg'] = 'Cho đăng ký user';
$lang_module['error_required_cid'] = 'Lỗi: bạn cần nhập dữ liệu cho Cid';
$lang_module['error_required_domain'] = 'Lỗi: bạn cần nhập dữ liệu cho Domain';
$lang_module['error_required_subdomain'] = 'Lỗi: tên miền phụ không hợp lệ';
$lang_module['error_required_dbsite'] = 'Lỗi: bạn cần nhập dữ liệu cho CSDL site con';
$lang_module['reinstall'] = 'Cài lại';
$lang_module['reinstall_note1'] = 'Việc cài lại module sẽ làm mất toàn bộ dữ liệu, cấu hình hiện có của module và không thể khôi phục lại được';
$lang_module['reinstall_site'] = 'Cài lại dữ liệu của site';

$lang_module['modules'] = array();
$lang_module['modules']['about'] = 'Giới thiệu';
$lang_module['modules']['about_for_acp'] = '';
$lang_module['modules']['news'] = 'Tin Tức';
$lang_module['modules']['news_for_acp'] = '';
$lang_module['modules']['users'] = 'Thành viên';
$lang_module['modules']['users_for_acp'] = 'Tài khoản';
$lang_module['modules']['contact'] = 'Liên hệ';
$lang_module['modules']['contact_for_acp'] = '';
$lang_module['modules']['statistics'] = 'Thống kê';
$lang_module['modules']['statistics_for_acp'] = '';
$lang_module['modules']['voting'] = 'Thăm dò ý kiến';
$lang_module['modules']['voting_for_acp'] = '';
$lang_module['modules']['banners'] = 'Quảng cáo';
$lang_module['modules']['banners_for_acp'] = '';
$lang_module['modules']['seek'] = 'Tìm kiếm';
$lang_module['modules']['seek_for_acp'] = '';
$lang_module['modules']['menu'] = 'Menu Site';
$lang_module['modules']['menu_for_acp'] = '';
$lang_module['modules']['comment'] = 'Bình luận';
$lang_module['modules']['comment_for_acp'] = 'Quản lý bình luận';
$lang_module['modules']['siteterms'] = 'Điều khoản sử dụng';
$lang_module['modules']['siteterms_for_acp'] = '';
$lang_module['modules']['feeds'] = 'RSS-feeds';
$lang_module['modules']['Page'] = 'Page';
$lang_module['modules']['Page_for_acp'] = '';
$lang_module['modules']['freecontent'] = 'Giới thiệu sản phẩm';
$lang_module['modules']['freecontent_for_acp'] = '';

$lang_module['modfuncs'] = array();
$lang_module['modfuncs']['users'] = array();
$lang_module['modfuncs']['users']['login'] = 'Đăng nhập';
$lang_module['modfuncs']['users']['register'] = 'Đăng ký';
$lang_module['modfuncs']['users']['lostpass'] = 'Khôi phục mật khẩu';
$lang_module['modfuncs']['users']['active'] = 'Kích hoạt tài khoản';
$lang_module['modfuncs']['users']['editinfo'] = 'Thiếp lập tài khoản';
$lang_module['modfuncs']['users']['memberlist'] = 'Danh sách thành viên';
$lang_module['modfuncs']['users']['logout'] = 'Thoát';
$lang_module['modfuncs']['users']['groups'] = 'Quản lý nhóm';

$lang_module['modfuncs']['statistics'] = array();
$lang_module['modfuncs']['statistics']['allreferers'] = 'Theo đường dẫn đến site';
$lang_module['modfuncs']['statistics']['allcountries'] = 'Theo quốc gia';
$lang_module['modfuncs']['statistics']['allbrowsers'] = 'Theo trình duyệt';
$lang_module['modfuncs']['statistics']['allos'] = 'Theo hệ điều hành';
$lang_module['modfuncs']['statistics']['allbots'] = 'Theo máy chủ tìm kiếm';
$lang_module['modfuncs']['statistics']['referer'] = 'Đường dẫn đến site theo tháng';

$lang_module['blocks_groups'] = array();
$lang_module['blocks_groups']['news'] = array();
$lang_module['blocks_groups']['news']['module.block_newscenter'] = 'Tin mới nhất';
$lang_module['blocks_groups']['news']['global.block_category'] = 'Chủ đề';
$lang_module['blocks_groups']['news']['global.block_tophits'] = 'Tin xem nhiều';
$lang_module['blocks_groups']['banners'] = array();
$lang_module['blocks_groups']['banners']['global.banners1'] = 'Quảng cáo giữa trang';
$lang_module['blocks_groups']['banners']['global.banners2'] = 'Quảng cáo cột trái';
$lang_module['blocks_groups']['banners']['global.banners3'] = 'Quảng cáo cột phải';
$lang_module['blocks_groups']['statistics'] = array();
$lang_module['blocks_groups']['statistics']['global.counter'] = 'Thống kê';
$lang_module['blocks_groups']['about'] = array();
$lang_module['blocks_groups']['about']['global.about'] = 'Giới thiệu';
$lang_module['blocks_groups']['voting'] = array();
$lang_module['blocks_groups']['voting']['global.voting_random'] = 'Thăm dò ý kiến';
$lang_module['blocks_groups']['users'] = array();
$lang_module['blocks_groups']['users']['global.user_button'] = 'Đăng nhập thành viên';
$lang_module['blocks_groups']['theme'] = array();
$lang_module['blocks_groups']['theme']['global.company_info'] = 'Công ty chủ quản';
$lang_module['blocks_groups']['theme']['global.menu_footer'] = 'Các chuyên mục chính';
$lang_module['blocks_groups']['freecontent'] = array();
$lang_module['blocks_groups']['freecontent']['global.free_content'] = 'Sản phẩm';

$lang_module['cron'] = array();
$lang_module['cron']['cron_online_expired_del'] = 'Xóa các dòng ghi trạng thái online đã cũ trong CSDL';
$lang_module['cron']['cron_dump_autobackup'] = 'Tự động lưu CSDL';
$lang_module['cron']['cron_auto_del_temp_download'] = 'Xóa các file tạm trong thư mục tmp';
$lang_module['cron']['cron_del_ip_logs'] = 'Xóa IP log files, Xóa các file nhật ký truy cập';
$lang_module['cron']['cron_auto_del_error_log'] = 'Xóa các file error_log quá hạn';
$lang_module['cron']['cron_auto_sendmail_error_log'] = 'Gửi email các thông báo lỗi cho admin';
$lang_module['cron']['cron_ref_expired_del'] = 'Xóa các referer quá hạn';
$lang_module['cron']['cron_auto_check_version'] = 'Kiểm tra phiên bản NukeViet';
$lang_module['cron']['cron_notification_autodel'] = 'Xóa thông báo cũ';

$lang_module['groups']['NukeViet-Fans'] = 'Nhóm những người hâm mộ hệ thống NukeViet';
$lang_module['groups']['NukeViet-Admins'] = 'Nhóm những người quản lý website xây dựng bằng hệ thống NukeViet';
$lang_module['groups']['NukeViet-Programmers'] = 'Nhóm Lập trình viên hệ thống NukeViet';

$lang_module['vinades_fullname'] = "Công ty cổ phần phát triển nguồn mở Việt Nam";
$lang_module['vinades_address'] = "Phòng 2004 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội";
$lang_module['nukeviet_description'] = 'Chia sẻ thành công, kết nối đam mê';
$lang_module['disable_site_content'] = 'Vì lý do kỹ thuật website tạm ngưng hoạt động. Thành thật xin lỗi các bạn vì sự bất tiện này!';


$lang_module['authors'] = 'Quản trị';
$lang_module['dieu_hanh_chung'] = 'Điều hành chung';
$lang_module['password'] = 'Mật khẩu';
$lang_module['repassword'] = 'Mật khẩu lại';
$lang_module['error_pass'] = 'Mật khẩu không trùng khớp';
$lang_module['exist_domain'] = 'Tên miền đã tồn tại';
$lang_module['exist_csdl'] = 'CSDL đã tồn tại';
$lang_module['account_deny_name'] = 'Rất tiếc, tài khoản %s đã bị cấm sử dụng để đăng ký tài khoản mới';
$lang_module['account_registered_name'] = 'Rất tiếc, tài khoản %s đã có người sử dụng. Nếu đây là tài khoản của bạn, hãy đăng nhập hoặc sử dụng chức năng Quên mật khẩu để lấy lại mật khẩu';

$lang_module['egovernment'] = 'Chính phủ';
$lang_module['ecommerce'] = 'Thương mại điện tử';
$lang_module['sample_install'] = 'Loại dữ liệu mẫu';
$lang_module['sample'] = 'Dữ liệu mẫu';

$lang_module['hello'] = 'Xin chào';
$lang_module['your_added_site'] = 'Chúc mừng bạn đã tạo website';
$lang_module['success_at'] = 'thành công tại';
$lang_module['thanks'] = 'Cám ơn quý khách đã sử dụng dịch vụ của chúng tôi! Chúc quý khách một ngày may mắn';
$lang_module['your_go_to_site'] = 'Quý khách hãy truy cập ngay website';
$lang_module['use_manager_site'] = 'để quản lý gian hàng của quý khách';
