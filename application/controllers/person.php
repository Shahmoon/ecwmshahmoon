<?php
class Person extends CI_Controller {

	// num of records per page
	private $limit = 5000;
	
	function Person(){
		parent::__construct();

		// load library
		$this->load->library(array('table','validation','authlib'));
		
		// load helper
		$this->load->helper('url');

		// load model
		$this->load->model('personmodel','',TRUE);

	
}
	function index($offset = 0){

		
		// load view
		$this->load->view('personList');
	}

	function add(){
		// set validation properties
		$this->_set_fields();
		
		// set common properties
		$data['title'] = 'Add new person';
		$data['message'] = '';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('personEdit', $data);
	}
	
	function addPerson(){
		// set common properties
		$data['title'] = 'Add new person';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			var_dump($_POST);
			$person = array('first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'gender' => $this->input->post('gender'),
							'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
							'hire_date' => date('Y-m-d', strtotime($this->input->post('hire_date'))));
			$id = $this->personmodel->save($person);
			
			// set form input name="id"
			$this->validation->id = $id;
			
			// set user message
			$data['message'] = '<div class="success">add new person success</div>';
		}
		
		// load view
		$this->load->view('personEdit', $data);
	}

	function view($id){
		// set common properties
		$data['title'] = 'Person Details';
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// get person details
		$data['person'] = $this->personmodel->get_by_id($id)->row();
		
		// load view
		$this->load->view('personView', $data);
	}
	
	function update(){		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('person/updatePerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('personUpdate', $data);
	}
	
	function updatePerson(){
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('person/updatePerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
		// set validation properties
		$this->_set_fields();
		$this->_set_rules();
		
		// run validation
		if ($this->validation->run() == FALSE){
			$data['message'] = '';
		}else{
			// save data
			$id = $this->input->post('id');
			$person = array('first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'gender' => $this->input->post('gender'),
							'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
							'hire_date' => date('Y-m-d', strtotime($this->input->post('hire_date'))));
			$this->personmodel->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		$this->load->view('personUpdate', $data);
	}
// validation fields 
	function _set_fields(){
		//feilds name added to feild array to be validated.
		$fields['id'] = 'id';
		$fields['emp_no'] = 'emp_no';
		$fields['first_name'] = 'first_name';
		$fields['last_name'] = 'last_name';
		$fields['gender'] = 'gender';
		$fields['birth_date'] = 'birth_date';
		$fields['hire_date'] = 'hire_date';
		
		$this->validation->set_fields($fields);
	}
	
	// validation rules
	function _set_rules(){
		//sets validations rules for each of the feilds specified
		$rules['first_name'] = 'trim|required';
		$rules['last_name'] = 'trim|required';
		$rules['gender'] = 'trim|required';
		$rules['birth_date'] = 'trim|required|callback_valid_date';
		$rules['hire_date'] = 'trim|required|callback_valid_date';
		
		$this->validation->set_rules($rules);
		//the error messages to be
		$this->validation->set_message('required', '* required');
		$this->validation->set_message('isset', '* required');
		$this->validation->set_error_delimiters('<p class="error">', '</p>');

	}

//this function will open the view specified
	function del()
	{
		$this->load->view('deleteView');
	}
	
	function delete(){
		$id = $this->input->post('emp_no');
		// delete person
		$this->personmodel->delete($id);
		
		$this->load->view('personList');
	  
	}
	
//function to load view deptEdit
	function updep()
	{
		$this->load->view('deptEdit');
	}
	
 function updtitle() 
{   
    $data = array(
        'titles' => 'titles', // pass the real table name
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title')
        
    );

    $this->load->model('updatemodel'); // updatemodel will be loaded
    if($this->updatemodel->upddata($data)) // call this method from the model
    {
        	redirect('person/index/');//redirect to the original page
    }
}
//function to load view updept
function updept()
{
	$this->load->view('moveEdit');
}
//moves employees departments no.
 function movedept() 
{   
    $emp_no = $this->input->get('emp_no');//stores this into the variable
    $dept_no = $this->input->get('dept_no');

    $this->load->model('updatedept'); // load the model first
    if($this->updatedept->upedit($emp_no, $dept_no)) // call the method from the model
    {
        	redirect('person/index/');
    }
}
   //loads this salaryEdit
     function upsalary()
{
    $this->load->view('salaryEdit');

}

public function editsal() 
{   
    $emp_no = $this->input->get('emp_no');//stores this into the variable
    $salary = $this->input->get('salary');

    $this->load->model('salary_model'); // will load this model 
    if($this->salary_model->upsalary($emp_no, $salary)) // the method from the model will be called and the variables will be passed into the model function
    {
        	redirect('person/index/');
    }
 

}
//this function loads this view specified
function promoteMan(){

	$this->load->view('promoteMan');
}

function manPromote(){
	$emp_no = $this->input->post('emp_no');//
	$dept_no = $this->input->post('dept_no');
	$this->load->model('personmodel'); //load the model
	$this->personmodel->promoMan($emp_no, $dept_no);//pass these variables in the function specified in the model
	$this->load->view('success');
}

function removeMan()
{
    $this->load->view('salaryEdit');
}
	function deleteMan($id){
		// delete person
		$this->personmodel->deleteMan($id);

		
		// redirect to person list page
		redirect('person/index/','refresh');
	}

}