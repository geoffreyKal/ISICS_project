<?php
	class dispPage{
	private $page = "<html>
			 <head>
				<title> TEST </title>
				<meta charset='utf-8'/>
			</head>
			<body>
			<form method='post' action = '#'>
				<input type='button' name='import' value='Import File.csv'/>
				%1<br/>
				<input type='submit' value='valider'/>
			</form>
			</body>
			</html>";
	private $this->file;
	
	public function __construct(){
		$this->display($this->page);
	}

	public function fileTreatment(){
		$Traitement = new Traitement($this->getFile);
	}

	public function getFile(){
		if isset($_FILES["import"]){
			$this->file = $_FILES['import'];
			$unePage = str_replace("%1","OK",$this->page);
			$this->display($unePage);
			return $this->file;
		}
		else {
			$unePage = str_replace("%","NonOK",$this->page);
			$this->display($unePage);
		}
	}

	public function display($Mypage){
		echo $Mypage;
	}
?>
