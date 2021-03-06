


<div class="row">
	<div class="col-md-3 sidebar">
    <div style="margin-top: 50px;"></div>
    <div class="list-group">
        <span href="#" class="list-group-item active" style="background-color: var(--bg-color)">
            Problem Dashboard
        </span>
        <li onclick="changeOption('overview')" class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-comment-o"></i> OverView
        </li>
        <li class="list-group-item dashboard_sidebar_li" onclick="changeOption('edit')">
            <i class="fa fa-search"></i> Edit
        </li>
        <li onclick="changeOption('testCase')"  class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-user"></i> Test Case
        </li>
        <li onclick="changeOption('moderators')" class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-user"></i> Moderators
        </li>
        <li onclick="changeOption('testing')" class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-user"></i> Testing
        </li>
        <li class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-user"></i> Statics
        </li>
        <li class="list-group-item dashboard_sidebar_li">
            <i class="fa fa-user"></i> Submission
        </li>
       
    </div>        
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box_header" id="box_dashboard_header">
            	<?php echo ($page_action_name=="edit")?"Edit Problem":""; ?>
            </div>
            <div class="box_body" style="min-height: 400px;" id="option_box_body">
                <?php
                    if($page_action_name=="edit")
                    	include "$path/problem_edit.php";
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://localhost/project/EWUPSC/php_plugin/editarea_0_8_2/editarea_0_8_2/edit_area/edit_area_full.js"></script>

<script type="text/javascript" src="views/problems/problems_dashboard/problem_action_dashboard/js/problem_dashboard.js"></script>
