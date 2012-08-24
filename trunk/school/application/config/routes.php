<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "c_login/index";
$route['index'] = "c_login/index";
$route['index_absensi'] = "c_absensi/index";
$route['index_admin'] = "c_admin/index";
$route['index_admin_menu'] = "c_admin/indexMenu";
$route['index_kategori'] = "c_kategori/index";
$route['index_sms'] = "c_sms/index";
$route['index_spp'] = "c_spp/index";
$route['data_siswa'] = "c_master_data/show_data_siswa";
$route['data_guru'] = "c_master_data/show_data_guru";
$route['data_staff'] = "c_master_data/show_data_staff";
$route['index_nilai'] = "c_nilai/index";
$route['hari_libur'] = "c_config/show_hari_libur";
$route['absen_belum_masuk'] = "c_absensi/displayBelumAbsen";
$route['config'] = "c_config/show_config";
$route['login'] = "c_login/login";
$route['logout'] = "c_login/logout";
$route['sms_broadcast'] = "c_sms/broadcast_form";
$route['do_broadcast'] = "c_sms/broadcast";
$route['edit_siswa'] = "c_master_data/edit_siswa";
$route['mesin_absensi'] = "c_config/show_mesin";
$route['tambah_kategori'] = "c_kategori/viewTambahKategori";
$route['kategori_siswa'] = "c_kategori/kategoriSiswa";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */