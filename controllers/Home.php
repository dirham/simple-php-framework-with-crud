<?php

namespace controllers;

use apps\controllers\Base;
use models\Address;

/*
	
	http://localhost/address/{controller}/{method}/{id}
	example fetch url : http://localhost/address/Home/edit/1
	Home is @class
	edit is @method
	1 is ?id=1 can get 1 with $_GET['id']


*/

class Home extends Base {
    public function Index() {
    	// get data from model
        $this->data['address'] = Address::getUser();
        $this->data['breadcrumb'] = "AddressBook";
        $this->ToView($this->data);
        // $this->data['address']->close();
    }

   	public function getData()
   	{
   		$value=$_POST['zip'];
   		$this->data['address'] = Address::getCity($value);
		
		$h = count($this->data['address']);
		
		for($i=0; $i<$h; $i++){
            $add1[] = $this->data['address'][$i];

        }
        // echo json_encode($this->data['address']);
        echo json_encode($add1, JSON_FORCE_OBJECT);
   	}

    public function Add(){
    	$this->data['breadcrumb'] = "AddressBook Add";
    	if(isset($_POST['save']) == 'Save'){
    		// $get_input 
    		$input = $_POST['name'].",".$_POST['firstname'].", ".$_POST['address'].", ".$_POST['zip'].", ".$_POST['city'];
    		$bind = explode(',', $input);

    		$this->data['msg'] = Address::insert($bind);
    		// $this->data['msg'] = $bind;
    		
    	}else{
    		$this->data['msg'] = "All input is Required !!!";
    	}
    	return $this->ToView($this->data);

    }

    public function edit(){
    	$this->data['breadcrumb'] = "AddressBook Edit";
    	$data['id']	 = addslashes($_GET['id']);

    	if(!empty($_POST['save'])){
    		$input = trim($_POST['name']).",".trim($_POST['firstname']).", ".trim($_POST['address']).", ".trim($_POST['zip']).", ".$_POST['city'].", ".$_GET['id'];
    		$bind = explode(',', $input);
    		$this->data['msg'] 	 = @Address::update($id,$bind);
    	}
    	$this->data['form']		 = addslashes($_GET['id']);
    	$this->data['address'] = Address::edit($data['id']); 
    	return $this->ToView($this->data);
    	
    }

    public function delete(){

    	$this->data['breadcrumb'] = "AddressBook Delete";
    	$id = $_GET['id'];
    	if(Address::destroy($id)){
    		$this->data['msg'] 	 = "Success Delete Data with id : $id";
    	}else{
    		$this->data['msg'] 	 = "Failed Delete Data with id : $id";
    	}
    	return $this->ToView($this->data);

    }

    public function about(){
        $this->data['intro']            = "Hi,I'm Dirham. I call my self web developer :D. 
        I hope the results of my hard work will let me work with you.
        Well, I can wait for your email :).";
        $this->data['breadcrumb'] = "About Me";
        $this->data['msg']        = "Even if I can't pass this test, please tell me what's wrong or what i need to do. Thanks :)";

        return $this->ToView($this->data);
        
    }

    public function xmlExport(){
        header('Content-disposition: attachment; filename="newfile.xml"');
        header("Content-type: text/xml");
        $this->data['address'] = Address::getXml();
        $xml_output = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml_output .= "<entries>";
        foreach ($this->data['address'] as $key => $value) {
                $xml_output .= "<AddressBook><Id>" .$value['id']."</Id>";
                $xml_output .= "<fullname>" . $value['name'] . "</fullname>";
                $xml_output .= "<firstname>" . $value['first_name'] . "</firstname>";
                $xml_output .= "<street>" . $value['address'] . "</street>";
                $xml_output .= "<zip>" . $value['zip'] . "</zip>";
                $xml_output .= "<city>" . $value['city'] . "</city>";
                $xml_output .= "</AddressBook>";
      }
       $xml_output .= "</entries>";
        echo $xml_output;


    }


}