<?php

add_action('wp_footer','wp_footer_distributors');
function wp_footer_distributors(){
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	h4.group_region {
		padding: 0%2%;
	}
	.our_distributors, .our_partners {
		margin: 0;
		padding: 0;
		list-style: none;
		float: left;
		width: 100%;
	}
	.our_distributors li {
		width: 29.33%;
		float: left;
		box-shadow: 0px 13px 20px 11px rgb(0 0 0 / 9%);
		margin: 2%;
		padding: 2%;
		border-radius: 16px;
		height: 320px;
		min-height: 300px;
		position: relative;
		margin-bottom: 20px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.our_partners li {
		width: 29.33%;
		float: left;
		box-shadow: 0px 13px 20px 11px rgb(0 0 0 / 9%);
		margin: 2%;
		padding: 2%;
		border-radius: 16px;
		height: 400px;
		min-height: 300px;
		position: relative;
		margin-bottom: 20px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.inner-div-distributor,.inner-div-partner {
		float: left;
		width: 100%;
	}
	.imagediv, .addressdiv, .iconlist {
		float: left;
		width: 100%;
	}
	.addressdiv {
		line-height: 34.5px;
		padding-top: 20px;
		text-transform: capitalize;
		color: #3B3939;
		font-family: "Barlow Condensed", Sans-serif;
		font-size: 19px;
		font-weight: 500;
	}
	.iconlist {
		padding-top: 20px;
		color: rgb(230 123 85);
		display: flex;
		flex-direction: column;
		font-size: 14px;
		font-weight: 400;
		line-height: 23px;
		text-transform: lowercase;
		width: 100%;
	}
	.linkdiv a {
		font-weight: 500;
		line-height: 28px;
		padding-top: 20px;
		color: #e05b2a;
		font-size: 16px;
		text-transform: uppercase;
		font-family: "Barlow Condensed", sans-serif;
	}
	.linkdiv {
		float: left;
		padding-top: 20px;
		color: rgb(230 123 85);
		display: flex;
		flex-direction: column;
		font-size: 14px;
		font-weight: 400;
		line-height: 23px;
		text-transform: lowercase;
		width: 100%;
	}
	div#partnerstab .elementor-tab-title.elementor-active {
		border-bottom: 2px solid #E05B2A;
	}
	div#partnerstab .elementor-tab-content {
		padding: 0;
		border-style: none solid solid;
	}
	div.our_distributors_search input, div.our_partners_search input {
		width: 100%;
		border-color: #eaeaea !important;
		outline: none !important;
		color: #666;
		padding: 0.75em;
		height: 54px;
		border-width: 1px;
		border-style: solid;
		border-color: #eaeaea;
		border-radius: 2px;
		background: #fafafa;
		box-shadow: none;
		box-sizing: border-box;
		transition: all .2s linear;
	}
	div.our_distributors_search, div.our_partners_search {
		padding: 2%;
		display: flex;
		justify-content: space-around;
	}
	div.our_distributors_search button, div.our_partners_search button {
		background: #e05b31;
		color: white;
		border-radius: 0 !important;
		border: none !important;
		font-size: 28px;
		font-weight: normal;
		padding: 3px 16px;
		height: 53px;
	}
	@media screen and (max-width: 767px) {
		.our_distributors li, .our_partners li {
			width: 96%;
			padding: 6%;
		}
	}
	@media (min-width: 768px) and (max-width: 1023px) {
		.our_distributors li, .our_partners li {
			width: 46%;
			padding: 5%;
		}
	}
	@media (min-width: 1024px) and (max-width: 1199px) {
		.our_distributors li, .our_partners li {
			width: 30.33%;
			margin: 1%;
		}	
	}
	@media screen and (min-width: 1200px){
		.our_distributors li, .our_partners li {
			
		}		
	}
	</style>

	<?php
}

add_shortcode('our_distributors','our_distributors');
function our_distributors($attr){
	
	ob_start();
	?>
	<div id="<?php echo $attr['id'];?>search" class="our_distributors_search">
		<input type="text" placeholder="Search By Region,City or Country"/>
		<button><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
	<script>
	var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
	jQuery(document).ready(function(){
		 jQuery("#<?php echo $attr['id'];?>search button").on('click', function(){
			 jQuery.ajax({
				url: ajaxurl,
				dataType: 'json',
				method:"POST",
				data: {
					action: "get_distributors",
					id: "<?php echo $attr['id'];?>",
					search: jQuery("#<?php echo $attr['id'];?>search input").val(),
				},
				success: function(e) {
					jQuery("#<?php echo $attr['id'];?>filter_box").html(e.html);
				}
			});
		 });
		 jQuery("#<?php echo $attr['id'];?>search input").on('change', function(){
			 jQuery.ajax({
				url: ajaxurl,
				dataType: 'json',
				method:"POST",
				data: {
					action: "get_distributors",
					id: "<?php echo $attr['id'];?>",
					search: jQuery("#<?php echo $attr['id'];?>search input").val(),
				},
				success: function(e) {
					jQuery("#<?php echo $attr['id'];?>filter_box").html(e.html);
				}
			});
		 });
	});
	/* jQuery(document).ready(function(){
		var highestBox = 0;
		jQuery("#<?php echo $attr['id'];?> .single-distributor").each(function(){
			if(jQuery(this).height() > highestBox) {
				highestBox = jQuery(this).height(); 
			}
		});  
		jQuery("#<?php echo $attr['id'];?> .single-distributor").height(highestBox);
	}); */
	</script>
	<div id="<?php echo $attr['id'];?>filter_box">
	<?php
	global $wpdb;
	$table_name = $wpdb->prefix . 'distributors';
	$dgroup = $wpdb->get_results("SELECT * FROM $table_name GROUP BY region");
	foreach ($dgroup as $dsingle)
	{ 
		$distributors = $wpdb->get_results("SELECT * FROM $table_name where region='$dsingle->region'");
		?>
		<h4 class="group_region"><?php echo $dsingle->region;?></h4>
		<ul id="<?php echo $attr['id'];?>" class="our_distributors">
			<?php 
				foreach ($distributors as $distributor){   
			?>
				<li class="single-distributor">
						<div class="imagediv">
							<img src="<?php echo wp_get_attachment_url($distributor->logo);?>">
						</div>
						<div class="addressdiv">
							<?php echo $distributor->address;//.',<bR>'.$distributor->pincode.' '.$distributor->city.'<bR>'.$distributor->state.' '.$distributor->country;?>
						</div>
						<div class="iconlist">
							<span><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $distributor->email;?></span>
							<span><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $distributor->phone;?></span>
						</div>
				</li>
			<?php
				}
			?>
		</ul>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}

add_shortcode('our_partners','our_partners');
function our_partners($attr){
	ob_start();
	?>
	<div id="<?php echo $attr['id'];?>search" class="our_partners_search">
		<input type="text" placeholder="Search By Region,City or Country"/>
		<button><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
	<script>
	var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
	jQuery(document).ready(function(){
		 jQuery("#<?php echo $attr['id'];?>search button").on('click', function(){
			 jQuery.ajax({
				url: ajaxurl,
				dataType: 'json',
				method:"POST",
				data: {
					action: "get_partners",
					id: "<?php echo $attr['id'];?>",
					type: "<?php echo $attr['type'];?>",
					search: jQuery("#<?php echo $attr['id'];?>search input").val(),
				},
				success: function(e) {
					jQuery("#<?php echo $attr['id'];?>filter_box").html(e.html);
				}
			});
		});
		jQuery("#<?php echo $attr['id'];?>search input").on('change', function(){
			 jQuery.ajax({
				url: ajaxurl,
				dataType: 'json',
				method:"POST",
				data: {
					action: "get_partners",
					id: "<?php echo $attr['id'];?>",
					type: "<?php echo $attr['type'];?>",
					search: jQuery("#<?php echo $attr['id'];?>search input").val(),
				},
				success: function(e) {
					jQuery("#<?php echo $attr['id'];?>filter_box").html(e.html);
				}
			});
		 });
	});
	/* jQuery(document).ready(function(){
		var highestBox = 0;
		jQuery("#<?php echo $attr['id'];?> .single-partner").each(function(){
			if(jQuery(this).height() > highestBox) {
				highestBox = jQuery(this).height(); 
			}
		});  
		jQuery("#<?php echo $attr['id'];?> .single-partner").height(highestBox);
	}); */
	</script>
	<div id="<?php echo $attr['id'];?>filter_box">
	<?php
	global $wpdb;
	$type = $attr['type'];
	
	$table_name = $wpdb->prefix . 'partners';
	if($type){
		$dgroup = $wpdb->get_results("SELECT * FROM $table_name where type='$type' GROUP BY region");
	}else{
		$dgroup = $wpdb->get_results("SELECT * FROM $table_name GROUP BY region");
	}
	foreach ($dgroup as $dsingle)
	{ 
		if($type){
			$partners = $wpdb->get_results("SELECT * FROM $table_name where type='$type' and region='$dsingle->region'");
		}else{
			$partners = $wpdb->get_results("SELECT * FROM $table_name where region='$dsingle->region'");
		}
		
		?>
		<h4 class="group_region"><?php echo $dsingle->region;?></h4>
		<ul id="<?php echo $attr['id'];?>" class="our_partners">
			<?php 
				foreach ($partners as $partner){   
			?>
				<li class="single-partner">
					<div class="imagediv">
						<img src="<?php echo wp_get_attachment_url($partner->logo);?>">
					</div>
					<div class="addressdiv">
						<?php echo $partner->description;?>
					</div>
					<?php if(!empty($partner->link)){ ?>
					<div class="linkdiv">
						<a target="blank" href="<?php echo $partner->link;?>">Learn More</a>
					</div>
					<?php } ?>
				</li>
			<?php
				}
			?>
		</ul>
		<?php
	}
	echo '</div>';
	return ob_get_clean();
}


add_action('wp_ajax_nopriv_get_distributors', 'get_distributors');
add_action('wp_ajax_get_distributors','get_distributors');
		
function get_distributors()
{
	$search = ( isset($_POST["search"]) ) ? sanitize_text_field($_POST["search"]) : false ;
	$orwhere_text ='';
	if (isset($search) and !empty($search)){
		$andwhere[] = "address LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "region LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "city LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "state LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "country LIKE '%" . $_POST['search'] . "%'";
		$orwhere_text = " WHERE " . implode(' Or ', $andwhere);
	}
	ob_start();
	global $wpdb;
	$table_name = $wpdb->prefix . 'distributors';
	$dgroup = $wpdb->get_results("SELECT * FROM $table_name $orwhere_text GROUP BY region");
	foreach ($dgroup as $dsingle)
	{ 
		$distributors = $wpdb->get_results("SELECT * FROM $table_name where region='$dsingle->region'");
		?>
		<h4 class="group_region"><?php echo $dsingle->region;?></h4>
		<ul id="<?php echo $attr['id'];?>" class="our_distributors">
			<?php 
				foreach ($distributors as $distributor){   
			?>
				<li class="single-distributor">
					<div class="inner-div-distributor">
						<div class="imagediv">
							<img src="<?php echo wp_get_attachment_url($distributor->logo);?>">
						</div>
						<div class="addressdiv">
							<?php echo $distributor->address;//.',<bR>'.$distributor->pincode.' '.$distributor->city.'<bR>'.$distributor->state.' '.$distributor->country;?>
						</div>
						<div class="iconlist">
							<span><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $distributor->email;?></span>
							<span><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $distributor->phone;?></span>
						</div>
					</div>			
				</li>
			<?php
				}
			?>
		</ul>
		<?php
	}
	$html = ob_get_clean();
	echo json_encode(array('html'=>$html));
	exit;
}


add_action('wp_ajax_nopriv_get_partners', 'get_partners');
add_action('wp_ajax_get_partners','get_partners');
		
function get_partners()
{
	$search = ( isset($_POST["search"]) ) ? sanitize_text_field($_POST["search"]) : false ;
	$type = ( isset($_POST["type"]) ) ? sanitize_text_field($_POST["type"]) : false ;
	$orwhere_text ='';
	if (isset($search) and !empty($search)){
		$andwhere[] = "address LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "region LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "city LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "state LIKE '%" . $_POST['search'] . "%'";
		$andwhere[] = "country LIKE '%" . $_POST['search'] . "%'";
		if($type){
			$orwhere_text = " WHERE type='$type' and ( " . implode(' Or ', $andwhere).' ) ';
		}else{
			$orwhere_text = " WHERE " . implode(' Or ', $andwhere);
		}
	}else{
		if($type){
			$orwhere_text = " WHERE type='$type'";
		}else{
			$orwhere_text = "";
		}
	}
	ob_start();
	global $wpdb;
	$table_name = $wpdb->prefix . 'partners';
	$dgroup = $wpdb->get_results("SELECT * FROM $table_name $orwhere_text GROUP BY region");
	foreach ($dgroup as $dsingle)
	{ 
		if($type){
			$partners = $wpdb->get_results("SELECT * FROM $table_name where type='$type' and region='$dsingle->region'");
		}else{
			$partners = $wpdb->get_results("SELECT * FROM $table_name where region='$dsingle->region'");
		}
		?>
		<h4 class="group_region"><?php echo $dsingle->region;?></h4>
		<ul id="<?php echo $attr['id'];?>" class="our_distributors">
			<?php 
				foreach ($partners as $partner){   
			?>
				<li class="single-partner">
					<div class="inner-div-partner">
						<div class="imagediv">
							<img src="<?php echo wp_get_attachment_url($partner->logo);?>">
						</div>
						<div class="addressdiv">
							<?php echo $partner->description;?>
						</div>
						<?php if(!empty($partner->link)){ ?>
						<div class="linkdiv">
							<a target="blank" href="<?php echo $partner->link;?>">Learn More</a>
						</div>
						<?php } ?>
					</div>			
				</li>
			<?php
				}
			?>
		</ul>
		<?php
	}
	$html = ob_get_clean();
	echo json_encode(array('html'=>$html));
	exit;
}