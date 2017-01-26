
<section class="bgWhite">
	<div class="container">
		<div class="row">
			<div class="containerBox">
				
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2><?php echo $college->name; ?></h2>
					<?php echo $college->description; ?>
					<span><?php echo $college->contact_person_name; ?></span>
					<span><?php echo $college->designation; ?></span>
					<span><?php echo $college->email_id; ?></span>
					<p><?php echo $college->address; ?>
					<?php echo $college->city; ?>, 
					<?php echo $college->state; ?><br/>
					<?php echo $college->country; ?> <?php echo $college->pincode; ?></p>
 					
					<p><?php echo $college->phone; ?></p>
					<img width ="150" src='<?php echo base_url()."upload/".$college->logo; ?>'/>
					<img width ="150" src='<?php echo base_url()."upload/".$college->banner; ?>'/>
					<?php echo $college->title; ?>
					<?php echo $college->duration; ?>
					<?php echo $college->recognition; ?>
					<?php echo $college->fee; ?>
					<?php echo $college->exam; ?>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
