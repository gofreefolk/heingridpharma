<?php 
class News extends Pharmacy
{
	function add_news($val=0)
	{
		$data['title'] = 'Add Notification';
		$data['menu'] = 'menu/admin_menu';
		$data['main_content'] = "admin_operation/add_news";
		
		$data['val']=$val;
		
		
		
		$this->load->view("includes/common_template.php", $data);
		
	}
	
	function do_upload()
	{
		date_default_timezone_set('Asia/Kolkata');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file'))
		{
			//$error = array('error' => $this->upload->display_errors());
				echo $this->upload->display_errors();
			//$this->add_event(0);
		}
		else
		{
			$file_data  =   $this->upload->data('file');
			$data = array(
                            
							'title' => $this->input->post('title'),
                            'details' => $this->input->post('details'),
                            'image' => $file_data['file_name'],                          
                            'ndate'=>date('Y-m-d')
                            
                    );
			$this->load->model('news_model');
			$val= $this->news_model->insert_news($data);
			$this->add_news($val);
			//print_r($file_data);
			//$this->load->view('upload_success', $data);

		}	
	}
}
