<?php 
class Product extends Pharmacy
{
	function add_product($val=0)
	{
		$data['title']="Product Wise Secondary";
		$data['menu'] = 'menu/admin_menu';
		$data['val']=$val;
		$data['main_content'] = "product/add_product";  
		$this->load->view("includes/common_template.php", $data);
	}
	function save_product()
	{
					$data = array(
                            
							'product_name' => $this->input->post('product'),
                            'details'=> $_POST['details'],
                            'pdate'=>date('Y-m-d')                            
                    );
			$this->load->model('product_model');
			$val= $this->product_model->save_product($data);
			$this->add_product($val);
	}
	function view_product()
	{
		$data['title']="Products";
		$data['menu'] = 'menu/admin_menu';
		$this->load->model("product_model");
		$data['product']=$this->product_model->getall();
		$data['main_content'] = 'product/view';
		$this->load->view("includes/common_template.php", $data);
	}
}