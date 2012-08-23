<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_message extends CI_Model {

	public function show_error($msg) {
		$pesan = '<!--  start message-red -->
					<div id="message-red">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="red-left">'.$msg.'</a></td>
						<td class="red-right"><a class="close-red"><img src="/school/images/table/icon_close_red.gif"   alt="" /></a></td>
					</tr>
					</table>
					</div>
					<!--  end message-red -->';
		return $pesan;
	}

	public function show_success($msg) {
		$pesan = '<!--  start message-green -->
					<div id="message-green">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="green-left">'.$msg.'</a></td>
						<td class="green-right"><a class="close-green"><img src="/school/images/table/icon_close_green.gif"   alt="" /></a></td>
					</tr>
					</table>
					</div>
					<!--  end message-green -->';
		return $pesan;
	}

	public function show_msg($msg) {
		$pesan = '<!--  start message-yellow -->
					<div id="message-yellow">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="yellow-left">'.$msg.'</a></td>
						<td class="yellow-right"><a class="close-yellow"><img src="/school/images/table/icon_close_yellow.gif"   alt="" /></a></td>
					</tr>
					</table>
					</div>
					<!--  end message-yellow -->';
		return $pesan;
	}

	public function show_state($msg) {
		$pesan = '<!--  start message-blue -->
					<div id="message-blue">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="blue-left">'.$msg.'</a> </td>
						<td class="blue-right"><a class="close-blue"><img src="/school/images/table/icon_close_blue.gif"   alt="" /></a></td>
					</tr>
					</table>
					</div>
					<!--  end message-blue -->';
		return $pesan;
	}
}
?>