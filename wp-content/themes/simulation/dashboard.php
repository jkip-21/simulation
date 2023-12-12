<?php
/**
* Template Name: Dashboard-1
*/
get_header();
?>
<head>
    <link rel="stylesheet" href="wp-content/themes/wp_bootstrap5_theme/assets/css/dash.css">
</head>

    <div class="homepage-content">
        <h1>Effortlessly manage Your Projects with our Powerful Project Management System.</h1>
        <div class="buttons">
            <button class="login">Login</button>
            <button class="contact">Contact-Us</button>
        </div>
    </div>
</div>

<div class="second-page">
    <h1>OFFERED SERVICES</h1>
    <p>Effortlessly Manage Your Projects With Our Powerful Project Management System</p>
    <p>Assign Tasks, Track Progress and Streamline Workflows With Ease</p>

</div>
</header>
<!-- End Header -->

<!-- Start Main Content -->
<section class = 'container-fluid no-padding'>
<div class = 'row wrapper no-padding'>
<div class = 'col-xl-1 col-sm-2'>
<nav class = 'menu-left'>
<ul class = 'list'>
<li>
<a href = '#' title = ''>
<span class = 'icon flaticon-home'></span>
<span class = 'text'><h3>Home</h3></span>
</a>
</li>
<li>
<a href = '#' title = '' class = 'active'>
<span class = 'icon flaticon-notepad-1'></span>
<span class = 'text'>Tasks</span>
</a>
</li>
<li>
<a href = '#' title = ''>
<span class = 'icon flaticon-settings-5'></span>
<span class = 'text'>Settings</span>
</a>
</li>
<li>
<a href = '#' title = ''>
<span class = 'icon flaticon-power'></span>
<span class = 'text'>Exit</span>
</a>
</li>
</ul>
</nav>
</div>
<div class = 'col-xl-11 col-sm-10'>
<div class = 'main-content'>
<header class = 'header-content'>
<ul class = 'list list-inline'>
<li>
<a href = '' title = ''>
<span class = 'state red'></span>
<span>Task</span>
</a>
</li>
<li>
<a href = '' title = ''>
<span class = 'state yellow'></span>
<span>Blocker</span>
</a>
</li>
<li>
<a href = '' title = 'Bug'>
<span class = 'state green'></span>
<span>Notification</span>
</a>
</li>
</ul>
<div class = 'action'>
<a href = '' title = ''>New Task </a>
<button class = 'btn btn-primary'>New Board <span class = 'flaticon-add'></span></button>
</div>
</header>
<!-- Main content -->
<section class = 'content'>
<div class = 'container-fluid'>
<div class = 'col-lg-12'>
<div class = 'm-2 card card-outline card-success'>
<div class = 'card-header'>
<div class = 'card-tools'>
<a class = 'btn btn-primary' href = ''><i class = 'fa fa-plus'></i> Add New project</a>
</div>
</div>
<div class = 'card-body'>
<table class = 'table tabe-hover table-condensed' id = 'list'>
<colgroup>
<col width = '5%'>
<col width = '35%'>
<col width = '15%'>
<col width = '15%'>
<col width = '15%'>
<col width = '15%'>
</colgroup>
<thead>
<tr>
<th class = 'text-center'>Id</th>
<th>Project</th>
<th>Date Started</th>
<th>Due Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td class = 'text-center'>1</td>
<td>
<p><b>Sample Project</b></p>
<p class = 'truncate'>Fusce ullamcorper mattis semper. Nunc vel risus ipsum. Sed maximus dapibus nisl non laoreet.
Pellentesque quis mauris odio. Donec fermentum facilisis odio, sit amet aliquet purus scelerisque eget.&amp;
nbsp;
</p>
</td>
<td><b>Nov 03, 2022</b></td>
<td><b>Jan 20, 2023</b></td>
<td class = 'text-center'>
<span class = 'badge badge-info'>On-Progress</span>
</td>
<td class = 'text-center'>
<select id="edit" name="Edit" class = 'btn btn-default btn-sm btn-flat border-info wave-effect text-info'>
    Action
  <option value="View">View</option>
  <option value="Edit">Edit</option>
  <option value="Delete">Delete</option>
</select>
</td>
</tr>
<!-- <tr>
<td class = 'text-center'>2</td>
<td>
<p><b>Sample Project</b></p>
</td>
<td>
<p><b>Sample Task 2</b></p>
<p class = 'truncate'>
Sample Task 2
</p>
</td>
<td><b>Nov 03, 2022</b></td>
<td><b>Jan 20, 2023</b></td>
<td class = 'text-center'>
<span class = 'badge badge-info'>On-Progress</span>
</td>
<td>
<span class = 'badge badge-secondary'>Pending</span>
</td>
<td class = 'text-center'>
<button type = 'button' class = 'btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle' data-toggle = 'dropdown' aria-expanded = 'true'>
Action
</button>
<ul class = 'dropdown-menu' style = ''>
<li>
<a class = 'dropdown-item new_productivity' data-pid = '1' data-tid = '2'  data-task = 'Sample Task 2'  href = 'javascript:void(0)'>Add Productivity</a>
<a class = 'dropdown-item new_productivity' data-pid = '2' data-tid = '2'  data-task = 'Sample Task 2'  href = 'javascript:void(0)'>Add Productivity</a>
<a class = 'dropdown-item new_productivity' data-pid = '3' data-tid = '2'  data-task = 'Sample Task 2'  href = 'javascript:void(0)'>Add Productivity</a>
</li>
</div>
</td>
</tr>	 -->
<!-- <tr>
<td class = 'text-center'>3</td>
<td>
<p><b>Sample Project 102</b></p>
</td>
<td>
<p><b>Task Test</b></p>
<p class = 'truncate'>Sample</p>
</td>
<td><b>Dec 02, 2022</b></td>
<td><b>Dec 31, 2022</b></td>
<td class = 'text-center'>
<span class = 'badge badge-primary'>Started</span>
</td>
<td>
<span class = 'badge badge-secondary'>Pending</span>
</td>
<td class = 'text-center'>
<button type = 'button' class = 'btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle' data-toggle = 'dropdown' aria-expanded = 'true'>
Action
</button>
<div class = 'dropdown-menu' style = ''>
<a class = 'dropdown-item new_productivity' data-pid = '2' data-tid = '3'  data-task = 'Task Test'  href = 'javascript:void(0)'>Add Productivity</a>
</div>
    

</div>


</div>
</div>




</div>
</div>



<?php get_footer();?>