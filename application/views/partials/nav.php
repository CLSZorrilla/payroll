<nav class="navbar navbar-default navbar-fixed-top">
	<div class="TitleBar row">
		<div class="navbar-header col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a class="navbar-brand navbar-link" href="#">
				<img src="<?php echo base_url();?>assets/images/LTO-logo.png" alt="Logo" />
				<p>LAND TRANSPORTATION OFFICE</p>
			</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<ul class="pull-right">
				<li>
					<a href="#">
						<i class="circle"><span class="glyphicon glyphicon-envelope"></span></i>
					</a>
				</li>
				<li>
					<a href="logout">
						<i class="circle"><span class="glyphicon glyphicon-log-out"></span></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="MenuBar row">
			<ul>
				<a href="<?php echo base_url(); ?>main/home_view">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<span class="glyphicon glyphicon-home"></span><br/>
						Home
					</li>
				</a>
				<a href="<?php echo base_url(); ?>attendance/index">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<span class="glyphicon glyphicon-time"></span><br/>Attendance
					</li>
				</a>
				<?php if($this->session->userdata('aType') == 'Payroll Clerk'){?>
				<a href="Payroll.php">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<span class="glyphicon glyphicon-calendar"></span><br/>Payroll
					</li>
				</a>
				<?php } ?>
				<a href="<?php echo base_url(); ?>Deduction">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<span class="glyphicon glyphicon-minus-sign"></span><br/>Deductions
					</li>
				</a>
				<!--
				<a href="Profile.php">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<span class="glyphicon glyphicon-user"></span><br/>Profile
					</li>
				</a>
				-->
				<?php if($this->session->userdata('aType') == 'HR'){?>
				<a href="<?php echo base_url(); ?>employee/manageUserAcct">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<span class="glyphicon glyphicon-wrench"></span><br/>Maintenance
					</li>
				</a>
				<?php } ?>
				<a href="<?php echo base_url(); ?>leave">
					<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<span class="glyphicon glyphicon-minus-sign"></span><br/>Leave Management
					</li>
				</a>
			</ul>
	</div>
</nav>
<div class="PangUsog">&nbsp;</div>