<?php
	if(isset($_GET['load_test_case_page'])){
		$problem_id=$_GET['load_test_case_page'];
		echo "<div style='text-align: right; margin-bottom: 10px;'><button onclick='load_add_test_case_page()'><span class='glyphicon glyphicon-plus'></span> Add Test Case</button></div>";
		echo "<table width='100%'>";
		echo "<tr>
			<td class='td1'>Order</td>
			<td class='td1'>Input File</td>
			<td class='td1'>Output File</td>
			<td class='td1'>Added Date</td>
			<td class='td1'>Added By</td>
			<td class='td1'></td>
			</tr>";
		$info=$test_case->get_test_case_list(1);
		$c=0;
		foreach ($info as $key => $value) {
			$c++;
			$date=$value['test_case_added_date'];
			$handle=$value['user_handle'];
			$input_url=$value['input_url'];
			$input_size=$value['input_file_size'];
			$output_url=$value['output_url'];
			$output_size=$value['output_file_size'];
			$hash_id=$value['test_case_id_hash'];
			echo "<tr>
			<td class='td2'>$c</td>
			<td class='td2'><a href='$input_url' target='_blank'>input-$c.txt ($input_size Bytes)</a></td>
			<td class='td2'><a href='$output_url' target='_blank'>output-$c.txt ($output_size Bytes)</a></td>
			<td class='td2'>$date</td>
			<td class='td2'>$handle</td>
			<td class='td2'> 
				<button value='$hash_id' class='btn-sm' id='btn_edit_$c' onclick='load_edit_test_case_page($c)'><span class='glyphicon glyphicon-pencil'></span></button>
				<button id='btn_del_$c' onclick='delete_test_case($c)' value='$hash_id' class='btn-sm'><span class='glyphicon glyphicon-trash'></span></button>
			</td>
			</tr>";
		}
		echo "</table>";
	}

	else if(isset($_GET['load_add_test_case_page'])){
		echo "<b style='font-size: 17px;'>Input</b><br/><textarea class='dashboard_input_text_area' id='input_value'></textarea><br/>";
		echo "<b style='font-size: 17px;'>Output</b><br/><textarea class='dashboard_input_text_area' id='output_value'></textarea><br/>";
		echo "<center><button onclick='add_test_case()'>Add Test Case</button></center>";
	}

	else if(isset($_GET['load_edit_test_case_page'])){
		$hash_id=$_GET['load_edit_test_case_page'];
		$info=$test_case->get_test_case_data($hash_id);
		$input=$info['input'];
		$output=$info['output'];
		echo "<b style='font-size: 17px;'>Input</b><br/><textarea class='dashboard_input_text_area' id='input_value'>$input</textarea><br/>";
		echo "<b style='font-size: 17px;'>Output</b><br/><textarea class='dashboard_input_text_area' id='output_value'>$output</textarea><br/>";
		echo "<center><button onclick='update_test_case()' id='btn_update' value='$hash_id'>Update Test Case</button></center>";
	}

	else if(isset($_GET['load_overview_page'])){
		echo "<div class='ui-widget'>
  			<label for='tags'>Tags: </label>
  			<input id='tags'>
	</div>";
	}

	else if(isset($_GET['load_moderators_page'])){
		$problem_id=$_GET['load_moderators_page'];
		echo "
		<div class='row'>
			<div class='col-md-3'></div>
			<div class='col-md-6'>
				Enter Moderators Handle:
				<input type='text' onkeyup='search_moderators()' autocomplete='off' class='form-control' id='search_moderators' placeholder='Example input'>
				<div id='suggestion_box' class='moderators_suggestion_box'>
					
				</div>
			</div>
			<div class='col-md-3'></div>
			<div class='col-md-3'></div>
			<div class='col-md-6'>
				profile
			</div>

		</div>";
	}


?>


<style type="text/css">
	.moderators_suggestion_li{
		padding: 5px;
		border: 1px solid #C2C7D0;
		border-width: 0px 1px 1px 1px;
		margin-top: 1px;
		width: 100%;
		font-size: 16px;
		cursor: pointer;
		border-radius: 0px;
	}
	.moderators_suggestion_li:hover{
		background-color: #A0B4C3;
	}
	
	.moderators_suggestion_box{
		position: absolute;
		width: 100%;
		margin-top: -8px;
		border-radius: 0px;
	}
	.moderators_suggestion_li_img{
		height: 50px;
		width: 50px;
		margin-right: 5px;
	}
</style>