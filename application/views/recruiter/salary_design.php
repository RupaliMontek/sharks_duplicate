
<html lang="en">
<head>
	<title></title>
	
<head>
<body>
	<div style="width:100%;margin:auto;padding-top:60px;">
		<div class="flt-lft-p">
		
			<img src="<?php echo base_url();?>frontend/images/montek.jpg" style="width:55%;margin-top:-10px;">
		</div>
		<div class=" ">
			<h4 style="font-weight:bold;font-size:15px;">Biz Integrated, 5th Floor, F wing</br>
				Complex,</br>
				Satara Rd, K. K. Market,</br>
				Dhankawadi, Pune -411043
			</h4>
			
		</div>
	</div>
	<div style="width:100%;margin:auto;padding-top:20px;">
		<table style="width:100%;" >
			<tr>
				<th colspan="4" style="background: #000;color:#fff;font-size: 18px;">Report from <?php echo $details['fromdatea']; ?> To <?php echo $details['todatea']; ?></th>
			</tr>
		</table>
	</div>
	<div style="width:100%;margin:auto;padding-top:20px;">
		<table style="width:100%;" >
			<thead>
				<tr>
					<th>Sr.No</th>
					<th>Client Name</th>
					<th>No of Profiles</th>
				</tr>	
			</thead>
			<tbody>
				<?php $Srno=1; foreach($Client_Requirement as $row) { ?>
					<tr class="fnt-sz-p">
						<td><?php echo $Srno; $Srno++; ?> </td>
						<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> <?php echo $row['sheetname']; ?></td>
						<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo @$row['total_resume']; @$total_net_amount += @$row['total_resume']; ?></td>
					</tr>
				<?php } ?>	
					<tr>
	                  	<th></th>
	                  	<th>Total Resume Count</th>
	                  	<th><?php echo @$total_net_amount; ?></th>
                	</tr>
			</tbody>
		</table>
	</div>
	
	 <div style="width:100%;margin:auto;padding-top:20px;">
		<table style="width:100%;" >


			<thead>
				<tr>
					<th>Sr.No</th>
					<th>Status</th>
					<th>Count</th>
				</tr>	
			</thead>
			<tbody>
				<tr class="fnt-sz-p">
					<td>1</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Shortlisted Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Shortlisted_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>2</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Select Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Select_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>3</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Joined Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Joined_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>4</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Offered Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Offered_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>5</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Offered Decline Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Offer_Decline_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>6</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Screen Reject Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Screen_Reject_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>7</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Duplicate Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Duplicate_Candidates); ?></td>
				</tr>
				<tr class="fnt-sz-p">
					<td>8</td>
					<td class="bg-col-p text_left wid-p" style="width:50%; text-align: center;"> Abscond Candidates</td>
					<td class="text_right wid-pr" style="width:50%; text-align: center;"><?php echo count($Abscond_Candidates); ?></td>
				</tr>
			</tbody>
		</table>
	</div>


</body>
</html>