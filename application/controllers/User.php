<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent :: __construct();
		$this->load->library('form_validation');
    	$this->load->model('Student');
	}

	public function index($success=TRUE, $message=NULL)
	{	
		// Get All students data
		$students = $this->Student->getAll();

		// Get second highest pocket money
		$secondLargestPocketMoney = $this->Student->getSecondHighestPocketMoney();
		$data['data'] = [
			'success' => $success,
			'message' => $message,
			'students' => $students,
			'secondLargestPocketMoney' => $secondLargestPocketMoney 
		];
		
		$this->load->view('Register_form',$data);
	}

	public function RegisterUser(){
		// Validation for password
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]|callback_chk_password_expression');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index(FALSE,'Passsword must be at least 6 characters and must contain at least one lower case letter, one upper case letter and one digit');
		} else {
			// Get form input fields value
			$firstName = $this->security->xss_clean($this->input->post('first_name'));
			$lastName = $this->security->xss_clean($this->input->post('last_name'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$pocketMoney = $this->security->xss_clean($this->input->post('pocket_money'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$age = $this->security->xss_clean($this->input->post('age'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->security->xss_clean($this->input->post('state'));
			$zip = $this->security->xss_clean($this->input->post('zip'));
			$country = $this->security->xss_clean($this->input->post('country'));

			// CHeck email is already exist or not
			$checkDuplicate = $this->Student->checkDuplicate($email);

			if($checkDuplicate == 0)
			{
				$insertData = array(
					'first_name' => $firstName,
					'last_name' => $lastName,
					'email' => $email,
					'pocket_money' => $pocketMoney,
					'password' => md5($password)
				);

				// Insert data into table
				$insertUser = $this->Student->insertUser($insertData);
				if($insertUser)
				{
					$this->index(TRUE,'Addes user successfully');
				}
				else
				{
					$this->index(FALSE,'Unable to save user. Please try again');
				}
			}
			else
			{
				$this->index(FALSE,'User email alreary exists');
			}
		}
	}

	public function chk_password_expression($str){
	    if (1 !== preg_match("/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $str))
	    {
	        return FALSE;
	    }
	    return TRUE;
	} 

}
