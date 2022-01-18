<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['adm-kominfo'] = 'Login';
$route['login'] = 'Login/check_Login';
$route['logout'] = 'Login/logout';
$route['visimisi'] = 'Home/visimisi';
//general
$route['general'] = 'settings/general';
$route['general_add'] = 'settings/general/add_data';
$route['general_add_logo'] = 'settings/general/general_logo';
$route['general_add_favicon'] = 'settings/general/general_favicon';
$route['general_update'] = 'settings/general/update_data';
$route['logo_update'] = 'settings/general/logo_update';
$route['icon_update'] = 'settings/general/icon_update';
$route['bga_update'] = 'settings/general/bga_update';
$route['bgt_update'] = 'settings/general/bgt_update';
$route['bgf_update'] = 'settings/general/bgf_update';
//database
$route['backup'] = 'settings/database';
$route['backup_db'] = 'settings/database/backup_db';
$route['restore_db'] = 'settings/database/restore_db';
$route['download_db/(:any)'] = 'settings/database/download_db/$1';
$route['delete_db/(:any)'] = 'settings/database/delete_db/$1';
//module
$route['module'] = 'settings/module';
$route['module_add'] = 'settings/module/add_data';
$route['module_edit/(:num)'] = 'settings/module/edit_data/$1';
$route['module_update'] = 'settings/module/update_data';
$route['module_delete'] = 'settings/module/delete_data';
$route['module_status'] = 'settings/module/change_status';
$route['module_check'] = 'settings/module/update_checkbox';
//slider
$route['slider'] = 'informasi/slider';
$route['slider_add'] = 'informasi/slider/add_data';
$route['slider_edit/(:num)'] = 'informasi/slider/edit_data/$1';
$route['slider_update'] = 'informasi/slider/update_data';
$route['slider_delete'] = 'informasi/slider/delete_data';
$route['slider_status'] = 'informasi/slider/change_status';
$route['slider_check'] = 'informasi/slider/update_checkbox';
//operation
$route['operations'] = 'settings/operations';
$route['operations_add'] = 'settings/operations/add_data';
$route['operations_edit/(:num)'] = 'settings/operations/edit_data/$1';
$route['operations_update'] = 'settings/operations/update_data';
$route['operations_delete'] = 'settings/operations/delete_data';
//roles
$route['roles'] = 'settings/roles';
$route['roles_add'] = 'settings/roles/add_data';
$route['roles_update'] = 'settings/roles/update_data';
$route['roles_delete'] = 'settings/roles/delete_data';
$route['roles_edit/(:num)'] = 'settings/roles/edit_data/$1';
$route['roles_permissions/(:num)'] = 'settings/permissions/index/$1';
$route['roles_permission_edit'] = 'settings/permissions/edit_data';
//users
$route['users'] = 'settings/users';
$route['users_add'] = 'settings/users/add_data';
$route['users_update'] = 'settings/users/update_data';
$route['users_edit/(:num)'] = 'settings/users/edit_data/$1';
$route['users_delete'] = 'settings/users/delete_data';
$route['users_load_edit/(:num)'] = 'settings/users/load_edit/$1';
$route['users_load_pass/(:num)'] = 'settings/users/load_edit/$1';
$route['users_change_pass'] = 'settings/users/change_pass';
$route['users_status'] = 'settings/users/change_status';
$route['reset_password/(:num)'] = 'settings/users/reset_password/$1';
$route['users_check'] = 'settings/users/update_checkbox';
//profile
$route['profile'] = 'settings/profile';
$route['profile_edit'] = 'settings/profile/edit_data';
$route['profile_change_pass'] = 'settings/profile/change_pass';
//kategori
$route['kategori'] = 'master_data/kategori';
$route['kategori_add'] = 'master_data/kategori/add_data';
$route['kategori_edit/(:num)'] = 'master_data/kategori/edit_data/$1';
$route['kategori_update'] = 'master_data/kategori/update_data';
$route['kategori_delete'] = 'master_data/kategori/delete_data';
//tentang
$route['tentang'] = 'informasi/tentang';
$route['tentang_add'] = 'informasi/tentang/add_data';
$route['tentang_edit/(:num)'] = 'informasi/tentang/edit_data/$1';
$route['tentang_update'] = 'informasi/tentang/update_data';
$route['tentang_delete'] = 'informasi/tentang/delete_data';
//konten
$route['konten'] = 'informasi/konten';
$route['konten_add'] = 'informasi/konten/add_data';
$route['konten_edit/(:num)'] = 'informasi/konten/edit_data/$1';
$route['konten_update'] = 'informasi/konten/update_data';
$route['konten_delete'] = 'informasi/konten/delete_data';
//kategori konten
$route['kategori_konten'] = 'kategori/konten';
$route['kategori_konten_add'] = 'kategori/konten/add_data';
$route['kategori_konten_edit/(:num)'] = 'kategori/konten/edit_data/$1';
$route['kategori_konten_update'] = 'kategori/konten/update_data';
$route['kategori_konten_delete'] = 'kategori/konten/delete_data';
//kategori portal
$route['kategori_portal'] = 'kategori/portal';
$route['kategori_portal_add'] = 'kategori/portal/add_data';
$route['kategori_portal_edit/(:num)'] = 'kategori/portal/edit_data/$1';
$route['kategori_portal_update'] = 'kategori/portal/update_data';
$route['kategori_portal_delete'] = 'kategori/portal/delete_data';
//kategori galeri
$route['kategori_galeri'] = 'kategori/galeri';
$route['kategori_galeri_add'] = 'kategori/galeri/add_data';
$route['kategori_galeri_edit/(:num)'] = 'kategori/galeri/edit_data/$1';
$route['kategori_galeri_update'] = 'kategori/galeri/update_data';
$route['kategori_galeri_delete'] = 'kategori/galeri/delete_data';
//visimisi
$route['visimisi'] = 'informasi/visimisi';
$route['visimisi_add'] = 'informasi/visimisi/add_data';
$route['visimisi_edit/(:num)'] = 'informasi/visimisi/edit_data/$1';
$route['visimisi_update'] = 'informasi/visimisi/update_data';
$route['visimisi_delete'] = 'informasi/visimisi/delete_data';
//tupoksi
$route['tupoksi'] = 'informasi/tupoksi';
$route['tupoksi_add'] = 'informasi/tupoksi/add_data';
$route['tupoksi_edit/(:num)'] = 'informasi/tupoksi/edit_data/$1';
$route['tupoksi_update'] = 'informasi/tupoksi/update_data';
$route['tupoksi_delete'] = 'informasi/tupoksi/delete_data';
//egoverment
$route['egoverment'] = 'informasi/egoverment';
$route['egoverment_add'] = 'informasi/egoverment/add_data';
$route['egoverment_edit/(:num)'] = 'informasi/egoverment/edit_data/$1';
$route['egoverment_update'] = 'informasi/egoverment/update_data';
$route['egoverment_delete'] = 'informasi/egoverment/delete_data';
//foto
$route['foto'] = 'informasi/foto';
$route['foto_add'] = 'informasi/foto/add_data';
$route['foto_edit/(:num)'] = 'informasi/foto/edit_data/$1';
$route['foto_update'] = 'informasi/foto/update_data';
$route['foto_delete'] = 'informasi/foto/delete_data';
//video
$route['video'] = 'informasi/video';
$route['video_add'] = 'informasi/video/add_data';
$route['video_edit/(:num)'] = 'informasi/video/edit_data/$1';
$route['video_update'] = 'informasi/video/update_data';
$route['video_delete'] = 'informasi/video/delete_data';
//sosialmedia
$route['sosialmedia'] = 'informasi/sosialmedia';
$route['sosialmedia_add'] = 'informasi/sosialmedia/add_data';
$route['sosialmedia_edit/(:num)'] = 'informasi/sosialmedia/edit_data/$1';
$route['sosialmedia_update'] = 'informasi/sosialmedia/update_data';
$route['sosialmedia_delete'] = 'informasi/sosialmedia/delete_data';
//ppid
$route['ppid'] = 'informasi/ppid';
$route['ppid_add'] = 'informasi/ppid/add_data';
$route['ppid_edit/(:num)'] = 'informasi/ppid/edit_data/$1';
$route['ppid_update'] = 'informasi/ppid/update_data';
$route['ppid_delete'] = 'informasi/ppid/delete_data';
//struktur
$route['struktur'] = 'informasi/struktur';
$route['struktur_add'] = 'informasi/struktur/add_data';
$route['struktur_edit/(:num)'] = 'informasi/struktur/edit_data/$1';
$route['struktur_update'] = 'informasi/struktur/update_data';
$route['struktur_delete'] = 'informasi/struktur/delete_data';
//opd
$route['opd'] = 'portal/opd';
$route['opd_add'] = 'portal/opd/add_data';
$route['opd_edit/(:num)'] = 'portal/opd/edit_data/$1';
$route['opd_update'] = 'portal/opd/update_data';
$route['opd_delete'] = 'portal/opd/delete_data';
//kecamatan
$route['kecamatan'] = 'portal/kecamatan';
$route['kecamatan_add'] = 'portal/kecamatan/add_data';
$route['kecamatan_edit/(:num)'] = 'portal/kecamatan/edit_data/$1';
$route['kecamatan_update'] = 'portal/kecamatan/update_data';
$route['kecamatan_delete'] = 'portal/kecamatan/delete_data';

//error
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;
