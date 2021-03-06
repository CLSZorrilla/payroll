<?php
	$base_url = base_url();
?>
<?php include "/../partials/nav_customize.php"; ?>
<style type="text/css">
  	a.btnUpdate {
    	background-color:white;
    	color:black;
    	border: 2px solid <?php echo $company['colorTheme']; ?>;
    	-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.4s;
  	}
  	a.btnUpdate:hover {
      	background-color: <?php echo $company['colorTheme']; ?>;
      	color: white;
  	}
	table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
		background-color: <?php echo $company['colorTheme']; ?>;
	}
	table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
		background-color:black;
		color: white;
	}
</style>
	<div class="BodyContainer">
		<div class="BodyContent">
			<ol class="breadcrumb">
				<li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
				<li><a href="#">Maintenance</a></li>
				<li class="active">Manage Users</li>
			</ol>
      		<div class="row">
				<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE USERS</b></h4>
				<hr />
			</div>
			<div class="table-responsive">
				<div class="col-sm-6 CreateNew">
					<p class="pull-left" style="margin: 0px;">
						<a href="<?php echo base_url(); ?>employee/createUserAcct" style="color:<?php echo $company['colorTheme']; ?>;">Create User <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</p>
				</div>
				<div class="col-sm-6 CreateNew">
					<p class="pull-left" style="margin: 0px;">
						<a style="color:<?php echo $company['colorTheme']; ?>;" id="editBtn">Edit User <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</p>
				</div>
					<table class="table table-striped MaintenanceTable">
						<thead>
							<tr>
								<?php
								$tHeader=array('Employee ID', 'User Type' ,'Position', 'Department', 'Full Name', 'Address', 'Marital Status', 'Date Hired', 'GSIS No.', 'PhilHealth No.', 'TIN', 'Vacation Leave', 'Sick Leave' ,'Email Address', 'Birthdate', 'Contact No.', 'Sex', 'Picture');
									foreach($tHeader as $tHead){
										echo '<th>'.$tHead.'</th>';
									};

								?>
							</tr>
						</thead>
						<tbody>
								<?php 
									foreach($uinfo as $info){							
										if($info->activated == 'TRUE'){
											echo "<tr class='text-center clickable' id=".$info->empID.">";
										}	
										else{
											echo "<tr style='color:red' class='text-center clickable' id=".$info->empID.">";
										}
										echo "
											<td>".$info->empID."</td>
											<td>".$info->acctType."</td>
											<td>".$info->positionName."</td>
											<td>".$info->deptName."</td>
											<td>".$info->name."</td>
											<td>".$info->address."</td>
											<td>".$info->maritalStatus."</td>
											<td>".$info->dateHired."</td>
											<td>".$info->GSISNo."</td>
											<td>".$info->PhilHealthNo."</td>
											<td>".$info->TIN."</td>
											<td>".$info->VL."</td>
											<td>".$info->SL."</td>
											<td>".$info->emailAddress."</td>
											<td>".$info->birthDate."</td>
											<td>".$info->contactNo."</td>
											<td>".$info->sex."</td>
											<td><img src='".$info->picture."' width='50' height='50'/></td>";
									}	
								?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
	<script type="text/javascript">
        $(document).ready(function () {
			$('.MaintenanceTable').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": true,
				"bLengthChange": false,
				"ordering": true,
				responsive: true
			});
		});

		/*$('#deleteBtn').click(function(e){
			e.preventDefault();

			jConfirm('Are you sure you want to delete this?', 'Confirmation Dialog', function(r) {
			    if(r==true){
			    	window.location.href =$base_url + "employee/deleteUserAcct/" + $info->empID;
			    }

			});
		});*/

        
        /*function check(){
	        $.ajax({
				url: '<?php echo base_url();?>/employee/autoref',
				type:'POST',
				dataType: 'json',
				success: function(output_string){
						$('.MaintenanceTable').append(output_string);
					} // End of success function of ajax form
				}); // End of ajax call	
    	}*/

    	var ID = "";
    	$(document).on('click', '.clickable', function(){
    		$('.clickable').css('background-color',"white");
    		$('.clickable').css('color',"black");
    		$(this).css('background-color',"blue");
    		$(this).css('color',"white");
    		ID = $(this).attr('id');
    	});

    	$('#editBtn').click(function(){
    		if(ID!=""){
    			window.location.href = "editUsersAcct/"+ ID;
    		}else{
    			swal("Notice","Select a row first before clicking edit","error")
    		}
    	})
	</script>