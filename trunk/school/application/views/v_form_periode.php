		<?php
			$id_periode = $flag==2?$periode[0]->id_periode:'';
			$tahun_periode = $flag==2?$periode[0]->tahun_periode:'';
			$periode_semester = $flag==2?$periode[0]->periode_semester:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/submit_periode' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Tahun Ajaran:</th>
			<td><input name='tahun_periode' type="text" class="inp-form" value="<?=$tahun_periode?>" /></td>
			<input name='id_periode' type="hidden" value="<?=$id_periode?>" />
			<input name='flag' type="hidden" value="<?=$flag?>" />
		</tr>
		<tr>
			<th valign="top">Semester:</th>
			<td><input name='periode_semester' type="text" class="inp-form" value="<?=$periode_semester?>" /></td>
		</tr>
		<tr>
			<th valign="top">Dari Tanggal:</th>
			<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<select name="d1" id="d" class="styledselect-day">
					<?=$d?>
				</select>
				</td>
				<td>
					<select name="m1" id="m" class="styledselect-month">
					<?=$m?>
					</select>
				</td>
				<td>
					<select name="y1" id="y"  class="styledselect-year">
					<?=$y?>
					</select>
				</td>
				<td><a href="" id="date-pick"><img src="/school/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<th valign="top">Sampai Tanggal:</th>
			<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<select name="d2" id="d2" class="styledselect-day">
					<?=$d?>
				</select>
				</td>
				<td>
					<select name="m2" id="m2" class="styledselect-month">
					<?=$m?>
					</select>
				</td>
				<td>
					<select name="y2" id="y2"  class="styledselect-year">
					<?=$y?>
					</select>
				</td>
				<td><a href="" id="date-pick2"><img src="/school/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick2')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d2 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m2 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y2 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d2, #m2, #y2')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y2').val(),
						$('#m2').val()-1,
						$('#d2').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d2').trigger('change');
});
</script>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_master_data/show_periode">Kembali</a>
			</td>
		</tr>
		</table>
		<input name="flag" type="hidden" value="<?=$flag?>"/>
		</form>
		<!-- end id-form  -->
		
