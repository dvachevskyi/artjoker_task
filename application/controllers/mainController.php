<?php

class mainController extends Controller
{
	function __construct()
	{
		$this->model = new mainModel();
		$this->view = new View();
	}
	
	function indexAction()
	{
		$this->view->generate('mainView.php', 'template_view.php');
	}

	function createAction(){
		$email = $_POST["email"];
		$user_exists = $this->model->is_registered($email);
		if ($user_exists['success']) {
			echo json_encode($user_exists);
		}else{
			$data = $this->model->create($_POST);
			echo json_encode($data);
		}
	}

	function get_regionAction(){
		$data = $this->model->get_region();
		echo json_encode($data);
	}

	function get_citiesAction(){
		if (!$_POST["regId"]) return;
		$data = $this->model->get_cities($_POST["regId"]);
		echo json_encode($data);
	}

	function get_districtsAction(){
		if (!$_POST["cityId"]) return;
		$data = $this->model->get_districts($_POST["cityId"]);
		echo json_encode($data);
	}
}