<?php
class Student extends CI_Model
{
	public function __construct()
{
    parent::__construct();
    $this->load->database();
}
	public function getAll(){
		$query = $this->db->query("SELECT id, first_name, last_name, pocket_money from student where is_deleted = 0");
   		return $query->result();
	}

	public function getSecondHighestPocketMoney(){
		$query = $this->db->query("SELECT distinct(pocket_money), first_name, last_name FROM student ORDER BY pocket_money DESC LIMIT 1, 1");
		return $query->result();
	}

    public function saveStudent()
    {
	   $data['name'] = $this->input->post('name');
	   $data['email'] = $this->input->post('email');
	   $data['password'] = md5($this->input->post('password'));
	   $data['contact_no'] = $this->input->post('contact_no');
	   $this->db->insert('student', $data);
    }

    public function checkDuplicate($email)
	{
		$this->db->select('email');
		$this->db->from('student');
		$this->db->like('email', $email);
		return $this->db->count_all_results();
	}

	function insertUser($data)
	{
		if($this->db->insert('student', $data))
		{
			return  $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
}