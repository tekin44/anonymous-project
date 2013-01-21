<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- start of CSS linking -->
<style>
    .arealabel{
        height: 50px;
        width: 100%;
        font-size: 18px;
        text-align: center;
    }
    #control-panel{
        padding-top: 20px;
        font-size: 20px;
        width: 100%;
        height: 20px;
    }
    #second-navigation{
        float: left;
        width:  100%;
    }
    #main-container{    
        float: left;
        background-color: silver;
        width: 100%;
        height: 500px;        
    }
    .leftcolumn {
    background-color: blueviolet;
    position: absolute;
    padding-top: 135px;
    left:25px;
    width:32%;
    min-height: 300px;
    text-align: justify;}
    .rightcolumn {
    background-color: #1C94C4;
    position: absolute;
    padding-top: 135px;
    left: 34%;
    width:32%;
    min-height: 300px;
    text-align: justify;}
    .thirdcolumn {
    background-color: aqua;    
    position: absolute;
    padding-top: 135px;
    right:25px;
    width:32%;
    min-height: 300px;
    text-align: justify;}
    #amount-wrapper{
        padding-top: 20px;
    }
    #textwrap{
      font-size: 18px;
      hegiht: 20px;
      width: 100%;
    }
    #right_table{
        padding-top: 10px;        
        float: right; 
        width: 49%;
        font-size: 18px;
        text-align: center;
    }
    #left_table{
        padding-top: 10px;
        float: left; 
        width: 49%;
        font-size: 18px;
        text-align: center;
    }
    
</style>

<link rel="stylesheet" href="/school/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="/school/css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="/school/js/jquery/jquery-1.9.0.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="/school/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="/school/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="/school/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
//$(function(){
//	$('input').checkBox();
//	$('#toggle-all').click(function(){
// 	$('#toggle-all').toggleClass('toggle-checked');
//	$('#mainform input[type=checkbox]').checkBox('toggle');
//	return false;
//	});
//});
</script>  

<!--  styled select box script version 2 --> 
<script src="/school/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
//$(document).ready(function() {
//	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
//	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
//});
</script>

<!--  styled select box script version 3 --> 
<script src="/school/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
//$(document).ready(function() {
//	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
//});
</script>

<!--  styled file upload script --> 
<script src="/school/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="/school/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="/school/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="/school/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<script src="/school/js/jquery/date.js" type="text/javascript"></script>
<script src="/school/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function()
{

// initialise the "Select date" link
$('#date-pick')
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
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="/school/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<!-- end of CSS linking -->
<title>Internet Dreams</title>
</head>
    <body>
        <div id="page-top-outer">
            <div id="page-top">
            <!-- start logo -->
            <div id="logo">
            <a href=""><img src="/school/images/shared/logo.png" width="300" height="40" alt="" /></a>
            </div>
            <!-- end logo -->
            <div class="clear"></div>
            </div>
        </div>
        <div id="second-navigation">
            <div class="nav-outer-repeat"> 
            <!--  start nav-outer -->
            <div class="nav-outer"> 

                            <!-- start nav-right -->
                            <div id="nav-right">

                            <!--	<div class="nav-divider">&nbsp;</div>
                                    <div class="showhide-account"><img src="/school/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
                                    -->
                                    <div class="nav-divider">&nbsp;</div>
                                    <a href="/school/logout" id="logout"><img src="/school/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
                                    <div class="clear">&nbsp;</div>                                   

                            </div>
                            <!-- end nav-right -->


                            <!--  start nav -->
                            <div class="nav">
                            <div class="table">

                            <?php foreach($menus as $menu){ 
                                    if(!$menu->men_id_menu){?>            
                            <ul class="select"><li><a href=""><b><?=$menu->nama_menu?></b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub show">
                                    <ul class="sub">
                            <?php foreach($menus as $men){ 
                                    if($men->men_id_menu == $menu->id_menu){ ?>
                                                    <li><a href="<?=$men->action_menu?>"><?=$men->nama_menu?></a></li>
                                            <?php }} ?>
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>
                            <?php }} ?>

                            </div>
                            </div>
                            <!--  start nav -->

            </div>
            <!--  start nav-outer -->
            </div>
        </div>
        
        <!-- this "main-container" DIV is containing all the information which want to be shown-->        
        <div id="main-container">
            <div id="control-panel">
                <form action="<?=$action?>" method="post">
					<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
						<tr>
							<td valign="top" width="70">Tanggal:</td>
                                                        <td valign="top"><?php echo $tanggal;?></td>
							<td valign="top">                                                            
								<table border="0" cellpadding="0" cellspacing="0">
									<tr  valign="top">
										<td>			
											<select name="d" id="d" class="styledselect-day">
                                                                                            <option value="" selected="selected">day</option>
												<?php for($i=1;$i<=31;$i++){
													echo "<option value='".$i."'>".$i."</option>";
												}?>
											</select>
										</td>
										<td>
											<select name="m" id="m" class="styledselect-month">
												<option value="" selected="selected">month</option>
											<?php for($i=1;$i<=12;$i++){
												echo "<option value='".$i."'>".$i."</option>";
											}?>
											</select>
										</td>
										<td>
											<select name="y" id="y"  class="styledselect-year">
												<option value="" selected="selected">year</option>
											<?php for($i=2007;$i<=2015;$i++){
												echo "<option value='".$i."'>".$i."</option>";
											}?>
											</select>
										</td>
									</tr>
								</table>
							</td>	
                                                        <td>Nama Siswa : <input type="text" name="person_name" id="person_name"></input></td>                                                       
							<td><input type="submit" value="Cari" name="search" /></td>
						</tr>
					</table>
				</form>
            </div>
            <div id="amount-wrapper">
                <div class="leftcolumn">
                    <div class="arealabel">
                        <div style="text-align:center;">Jumlah Log Server</div>
                        <div style="text-align:center; padding-top: 110px; font-size: 80px;"><?php echo $jum_server;?></div>
                    </div>
                </div>

                <div class="rightcolumn">                        
                    <div class="arealabel">
                        <div style="text-align:center;">Jumlah Log FingerPrint</div>
                        <div style="text-align:center; padding-top: 110px; font-size: 80px;"><?php echo $jum_fingerprint;?></div>
                    </div>
                </div>

                <div class="thirdcolumn">       
                    <div class="arealabel">
                        <div style="text-align:center;">Jumlah Selisih Log</div>
                        <div style="text-align:center; padding-top: 110px; font-size: 80px;"><?php echo $jum_selisih;?></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div id="left_table">
                    <div style="padding-top : 10px; padding-bottom: 10px;">
                     TABEL DATA SERVER
                    </div>                               
                                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Tanggal</a></th>					
				</tr>				
				<?php										
					if(isset($rec_server)){
					foreach ($rec_server as $item) {						
                                ?>				
				<tr class="alternate-row">										
					<td><? echo $item->nama_siswa ?></td>
					<td><? echo $item->tanggal_absensi ?></td>			
				</tr>				
				<?}}?>
				</table>
            </div>
            
            <div id="right_table">
                        <div style="padding-top : 10px; padding-bottom: 10px;">
                        TABEL DATA FINGERPRINT        
                        </div>                                                                                                               
                                <br></br>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Tanggal</a></th>					
				</tr>				
				<?php										
					if(isset($rec_fp)){
					foreach ($rec_fp as $item) {						
                                ?>				
				<tr class="alternate-row">										
					<td><? echo $item->nama_siswa ?></td>
					<td><? echo $item->checktime ?></td>			
				</tr>				
				<?}}?>
				</table>
            </div>    
        </div>
        <!-- end of the "main-container" DIV-->
    </body>
</html>    