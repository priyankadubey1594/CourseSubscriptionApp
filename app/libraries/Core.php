<?php
class Core {
	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];
	protected $formData;

	public function __construct() {

		$url= $this->gerUrl();
		//check for the 1st part of URL i.e. controller
		if($url != null) {
			if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')){

				//set the new controller
				$this->currentController = ucwords($url[0]);
				unset($url[0]);
			}
		}
		

		//require the new controller
		require_once '../app/controllers/'. $this->currentController. '.php';
		$this->currentController = new $this->currentController;

		//check for the 2nd part of URL i.e. method
		if(isset($url[1]))
		{
			if(method_exists($this->currentController, $url[1])) 
			{
				$this->currentMethod= $url[1];
				unset($url[1]);
			}
		}

		//get parameters
		$this->params = $url ? array_values($url) : [];

		//call a callback with array of params
		call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
	}

	public function gerUrl()
	{
		if(isset($_GET['url'])) {
			$url = rtrim($_GET['url'] ,'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url= explode('/', $url);
			//print_r($url);
			return $url;
		}
		
	}
}
?>