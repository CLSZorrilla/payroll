<?php
	$attributes=array('id'=>'create_user_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'col-md-2 col-lg-3');
	$labels=array('Employee ID:','Full Name:', 'Position:', 'Basic Pay:','Tax Status:', 'Dependents:', 'Gross Pay','Pagibig Fund:','PhilHealth Share:', 'GSIS(9% of GP):', 'Withholding Tax:');
	$dName=array('empID','fName','positionCode','bPay', 'tStatus' , 'dependents', 'gPay','pagIbig','pHealth', 'gsis', 'wTax');
	$dType=array('text','text','dropdown','text', 'dropdown', 'number', 'text','text','text', 'text', 'text');

	$ESlip =array($pInfoRes[0]->row(0)->empID,
				$pInfoRes[0]->row(3)->name, 
				$pInfoRes[0]->row(2)->positionName,
				$pInfoRes[0]->row(7)->step_1, 
				$pInfoRes[0]->row(5)->maritalStatus, 
				$pInfoRes[0]->row(6)->noOfDependents,
				$pInfoRes[1],'100',
				$pInfoRes[2],
				$pInfoRes[3],
				$pInfoRes[4]);
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="<?php echo base_url(); ?>Clerk">Payroll</a></li>
		<li class="active">Salary Computation</li>
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>Salary Computation</h4>
			<h5>By default it is set to <b>MONTHLY</b> with an official time of <b>8am-5pm</b></h5>
		</div>
		<?php 
			/*foreach($pInfoRes[1] as $pres){
				echo $pres."<br/>";
			}*/

			//echo $pInfoRes[1];

			//echo date("H:i",strtotime("04:00:00")) + date("H:i",strtotime("00:00:00"));
		?>
		<?php echo form_open_multipart("employee/createUserAcct", $attributes); ?>

		<div class="col-md-6">
			<?php foreach($labels as $key => $label){
				switch($dType[$key]){
					case 'dropdown':
			?>
			<div class="form-group">
				<?php echo form_label($label, $dName[$key], $lAttrib); ?>
				<div class="col-md-10 col-lg-9">
					<?php if($dName[$key] == 'positionCode'): ?>
						<select name="position" disabled>
							<?php echo "<option value=".$ESlip[$key]." readonly>".$ESlip[$key]."</option>"; ?>
						</select>
					<?php elseif($dName[$key] == 'payrollPeriod'): ?>
						<select name="pPeriod" id="pPeriod">
							<option value='Daily'>Daily</option>
							<option value='Monthly'>Monthly</option>
							<option value='Semi-Monthly'>Semi-Monthly</option>
						</select>
					<?php elseif($dName[$key] == 'tStatus'): ?>
						<select name="taxStatus" id="tStatus" disabled>
							<?php echo "<option value=".$ESlip[$key].">".$ESlip[$key]."</option>"; ?>
							<option>chris</option>
						</select>
					<?php endif; ?>
				</div>
			</div>
			<?php
					break;
					default:
			?>
			<div class="form-group">
				<?php echo form_label($label, $dName[$key], $lAttrib); 
				if($dName[$key] == 'fName'):?>
				<div class="col-md-10 col-lg-9">
					<?php
						echo form_input(array(
							'class' => 'form-control text-box single-line',
							'name' => $dName[$key],
							'id' => $dName[$key],
							'placeholder' => $label,
							'type' => $dType[$key],
							'value' => $ESlip[$key]
						));

						echo form_error($dName[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
					?>
				</div>
			<?php else:?>
				<div class="col-md-5">
					<?php
						echo form_input(array(
							'class' => 'form-control text-box single-line',
							'name' => $dName[$key],
							'id' => $dName[$key],
							'placeholder' => $label,
							'type' => $dType[$key],
							'value' => $ESlip[$key]
						));

						echo form_error($dName[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
					?>
				</div>
			<?php endif; ?>
			</div>
			<?php 
				} 
			}
			?>
		</div>

		<!-- Additional Deductions -->
		<?php foreach($pInfoRes[5] as $key => $data){?>
		<div class="col-md-6">
			<div class="form-group">
				<label for="" class="control-label col-md-2 col-lg-3"><?php echo $pInfoRes[5][$key] ?></label>
				<div class="col-md-10 col-lg-9">
					<input type="text" value="<?php echo round($pInfoRes[6][$key],2) ?>" class="form-control text-box single-line" readonly />
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- Additional Deductions -->

		<!-- moved Submition form -->
		<div class="row">
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<?php
					echo form_submit(array(
						'class' =>'btn btn-primary',
						'name' =>'submit',
						'value' => 'Register'
						));
					?>
				</div>
			</div>
		</div>
		<!-- Additional Deductions -->
	</div>

</div>
<div class="Footer">
	<div class="pull-right">
		<p>&copy; Copyright 2017 All Rights Reserved.</p>
	</div>
</div>
<script type="text/javascript">
	/*$('#timeadjust').click(function(){
		var startTime = $( "#sTime option:selected" ).val();
		var endTime = $( "#eTime option:selected" ).val();
		var eid = "<?php echo $this->uri->segment(3); ?>";
		
		$.ajax({
			type: "POST",
			url:"<?php echo base_url(); ?>" + "Clerk/adjPayroll",
			data:{startTime,endTime, eid},
			success: function(r){
				var result = $.parseJSON(r);
				alert(r);
			},
			error: function(r){
				alert("FAIL" +r);
			}
		});
	});*/
</script>