<?php

function partners()
{
	wp_enqueue_media(); 
	$list_table = new Partnerss_List_Table();
	?>
<style>
.form-inline {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: nowrap;
}
.form-inline label {
  margin: 5px 10px 5px 0;
}
.form-inline input, .form-inline select, .form-inline textarea {
    vertical-align: middle;
    margin: 5px 10px 5px 0;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    width: 100%;
}
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
  cursor: pointer;
}
.form-inline button:hover {
  background-color: royalblue;
}

@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }
  
  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}
</style>
	<div class="wrap" >
	<h1 class="wp-heading-inline">Partners</h1>
	<div class="container" style="background: white;padding: 3%;float: left;width: 90%;">
		<form  method="post" action="?page=partners">
			<div class="row" style=" width: 100%; float: left; ">
				<div class="col-100">
					</hr>
						<center><h1 style=" text-align: left; ">Add Partners</h1></center>
					</hr>
				</div>
				<div class="col-100">
					</hr>
						<p style="color: green; text-align: left; padding-top: 20px; font-weight: 700; font-size: 16px;"><?php echo $_GET['msg'];?></p>
					</hr>
				</div>
				
				<div class="form-inline" >
						<label for="pname">Name*:</label>
						<input type="text" id="pname" value="<?php echo $_POST['pname'];?>" placeholder="Enter Partners Name" name="pname" required >
						
						<label for="email">Email:</label>
						<input type="email" id="email" value="<?php echo $_POST['email'];?>" placeholder="Enter email" name="email" >
					 
						<label for="phone">Phone:</label>
						<input type="number" id="phone" value="<?php echo $_POST['phone'];?>" placeholder="Enter phone" name="phone" >
						
						<label for="address">Address:</label>
						<input type="text" id="address" value="<?php echo $_POST['address'];?>" placeholder="Enter Address" name="address"  >
						
				</div>
				<div class="form-inline" >
						
						<label for="city">City*:</label>
						<input type="text" id="city" value="<?php echo $_POST['city'];?>" placeholder="Enter city" name="city" required >
						
						<label for="pincode">Pincode:</label>
						<input type="number" id="pincode" value="<?php echo $_POST['pincode'];?>" placeholder="Enter pincode" name="pincode" >
						
						<label for="state">State*:</label>
						<input type="text" id="state" value="<?php echo $_POST['state'];?>" placeholder="Enter State" name="state" required >
						
						<label for="country">Country*:</label>
						<input type="text" id="country" value="<?php echo $_POST['country'];?>" placeholder="Enter country" name="country" required >
					 
				</div>
				<div class="form-inline" >
						<label for="region">Region*:</label>
						<input type="text" id="region" value="<?php echo $_POST['region'];?>" placeholder="Enter region" name="region" required >
						
						<label for="description">Description:</label>
						<textarea name="description" id="description"/><?php echo $_POST['description'];?></textarea>
						
						<label for="type">Type:</label>
						<select id="type" name="type" >
							<option value="">Select Distributor Type</option>
							<option <?php if($_POST['type'] == 'Online'){echo 'selected';} ?> value="Online">Online</option>
							<option <?php if($_POST['type'] == 'Retail'){echo 'selected';} ?> value="Retail">Retail</option>
						</select>
						
						<label for="link">Link*:</label>
						<input type="text" id="link" value="<?php echo $_POST['link'];?>" placeholder="Enter link" name="link" required >
						
				</div>
				<div class="form-inline" >
					<div class="inputclass">
							<a style="float:left;cursor:pointer" id="image_url_btn">Click To Select Logo*</a>
							<input type="hidden" name="logo" id="attach_id" required >
							<img style="max-width: 100px;float:left;clear: both;margin-top: 20px;"  src id="distributorsimage">
						</div>
						
					<button name="add_partner" value="add_partner" type="submit">Submit</button>
				</div>
				
			</div>
		</form>
			
	</div>

	<div class="wrap">
		<?php $list_table->prepare_items(); ?>
		<form method="get">
			<?php  $list_table->display(); ?>	
		</form>
	</div>
	<?php
}	

if (!class_exists('WP_List_Table'))
{
    require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Partnerss_List_Table extends WP_List_Table
{

    public $found_data = array();

    function withdrawals_request_data()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'partners';
        $all_requests = $wpdb->get_results("SELECT * FROM $table_name");
        $ps = array();
        foreach ($all_requests as $partner)
        {   
            $entries = array(
				'id' =>  $partner->id,
                'name' =>	$partner->pname,
                'email' => $partner->email.'<br>'.$partner->phone,
                'phone' => $partner->email.'<br>'.$partner->phone,
                'logo' => wp_get_attachment_image($partner->logo),
                'address' => $partner->address,//.' '.$partner->city.' '.$partner->pincode.' '.$partner->state.' '.$partner->country,
                'description' => $partner->description,
				'region' => $partner->region,
				'type' => $partner->type,
            );
            array_push($ps, $entries);
        }
        return $ps;
    }

    function no_items()
    {
        _e('No Entry found, dude.');
    }

    function column_default($item, $column_name)
    {
        switch ($column_name)
        {
            case 'id':
            case 'name':
            case 'email':
            case 'phone':
            case 'logo':
            case 'address':
            case 'description':
            case 'region':
            case 'type':
                return $item[$column_name];
            default:
                return print_r($item, true);
        }
    }

    function get_sortable_columns()
    { 
        $sortable_columns = array(
			'id' => array( 'ID', true ) ,
            'name' => array( 'name', false ) ,
            'email' => array( 'email', false ) ,
            'phone' => array( 'phone', false ) ,
            //'logo' => array( 'logo', false ) ,
            'address' => array( 'address', false ) ,
            'description' => array( 'description', false ) , 
            'region' => array( 'region', false ) , 
            'type' => array( 'type', false ) , 
        );
        return $sortable_columns;
    }

    function get_columns()
    {
        $columns = array(
			'cb' => '<input type="checkbox" />',
            'name' => 'Name',
            'phone' => 'Email / Phone',
            'logo' => 'Logo',
            'address' => 'Address',
            'description' => 'Description',
			'region' => 'Region',
			'type' => 'Type',
        );

        return $columns;
    }
	
	function process_bulk_action()
    {
		global $wpdb;
		$table_name = $wpdb->prefix . 'partners';
		
        if ('delete' === $this->current_action())
        {
            $ids = $_GET['id'];
            foreach ($ids as $k)
            {
				$wpdb->delete( $table_name,array('id'=>$k));
            }
        }
        if ('delete-single' === $this->current_action())
        {
			$wpdb->delete( $table_name,array('id'=>$_GET['id']));
        }

    }
	function column_cb($item)
    {
        return sprintf('<input type="checkbox" name="id[]" value="%s" />', $item['id']);
    }

    function column_name($item)
    {

        $actions['delete'] =	sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'delete-single', $item['id']);
        return sprintf('%1$s %2$s',  $item['name'], $this->row_actions($actions));
    }

    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete',
        );
        return $actions;
    }
    function usort_reorder($a, $b)
    {
        $orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'date';
        $order = (!empty($_GET['order'])) ? $_GET['order'] : 'desc';
        $result = strcmp($a[$orderby], $b[$orderby]);
        return ($order === 'desc') ? $result : -$result;
    }

    function prepare_items()
    {

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array(
            $columns,
            $hidden,
            $sortable
        );
        $this->process_bulk_action();
        $data = $this->withdrawals_request_data();
        usort($data, array(&$this,
            'usort_reorder'
        ));
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $total_items = count($data);
        $this->found_data = array_slice($data, (($current_page - 1) * $per_page) , $per_page);
        $this->items = $this->found_data;
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page 
        ));

    }

}



