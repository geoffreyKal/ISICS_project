<?php
	if (isset($_FILES['import'])){
		$extension = ".csv";
		$file_ext = strrchr($_FILES['import']['name'], '.');
		if ($file_ext != $extension){
			echo "Erreur Mauvais Type de Fichier (uniquement.csv)";
		}
		else {
			
			$file = $_FILES["import"]["tmp_name"];
			$row = 1;
			if (($handle = fopen($file, "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
				$col_a_garder = array(3,5,6,2,7,11,9,10,18,16,15); //OK
				$row++;
				$fp = fopen("/root/Desktop/TEST/test.csv", "a+");
				for ($c=0; $c < count($col_a_garder);$c++) {
				    fputcsv($fp,$data[$col_a_garder[$c]]);
				    echo $data[$col_a_garder[$c]]."<br>"; // OK
				}
				fclose($fp);
			    }
			    fclose($handle);
		      }
		}
	}
?>
