
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
				<th colspan="4" style="background: #000;color:#fff;font-size: 18px;">Report</th>
			</tr>
		</table>
	</div>
	<div style="width:100%;margin:auto;padding-top:20px;">
		<table style="width:100%;" >
			<thead>
				<tr>
					<th>Sr.No</th>
					<th>Date</th>
					<th>Client Name</th>
					<th>Position</th>
					<th>Candidate Name</th>
					<th>Contact No</th>
				</tr>	
			</thead>
			<tbody>
				<?php $Srno=1; foreach($Shortlisted_Candidates as $row) { ?>
					<tr class="fnt-sz-p">
						<td><?php echo $Srno; $Srno++; ?> </td>
						<td class="bg-col-p text_left wid-p" style="width:20%; text-align: center;"> <?php echo $row['date']; ?></td>
						<td class="text_right wid-pr" style="width:20%; text-align: center;"><?php echo @$row['sheetname']; ?></td>
						<td class="bg-col-p text_left wid-p" style="width:20%; text-align: center;"> <?php echo $row['position_skills']; ?></td>
						<td class="text_right wid-pr" style="width:30%; text-align: center;"><?php echo $row['candidate_name']; ?></td>
						<td class="bg-col-p text_left wid-p" style="width:10%; text-align: center;"> <?php echo $row['contact_no']; ?></td>
						
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</body>
</html>