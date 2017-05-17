<table question_id="example1" id="dashboard" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>coupon</th>
			<th>course_name</th>
			<th>username</th>
			<th>college_name</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>	
	<?php
	if($a_coupons) {
		foreach($a_coupons as $coupon) {
		?>
		<tr>
			<td><?php echo $coupon['coupon_id'];?></td>
			<td><?php echo $coupon['coupon'];?></td>
			<td><?php echo $coupon['course_name'];?></td>				  
			<td><?php echo $coupon['username'];?></td>				  
			<td><?php echo $coupon['college_name'];?></td>				  
			<td></td>
		</tr>
		<?php 
		}
		?>
		<tr>		  
			<td colspan='6'>
			<?php 
			echo $this->paginationajax->create_links();
			?>
			</td>
		</tr>
		<?php
	} else {
		?>
		<tr>		  
			<td colspan='6'>No Records Exists.</td>
		</tr>
		<?php
	}
	?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>coupon</th>
			<th>course_name</th>
			<th>username</th>
			<th>college_name</th>
			<th>Manage</th>
		</tr>
	</tfoot>
</table>