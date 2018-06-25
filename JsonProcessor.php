<?php

	class JsonProcessor {

		private $students;
		private $result;

		function __construct(){

			$data = file_get_contents("uploads/students.json");
			$this -> students = json_decode($data, true);
		}

		function getStudents(){
		    $students = array();
            foreach ($this ->students as $student){
                $students[] = $student["nombre"];
            }
            return $students;
        }
		
		function getAbilities(){
			$abilities = array();
			$abilities[0] = "Alumno";
			foreach ($this -> students as $student) {
				foreach ($student as $clave => $valor){
                    if(!in_array($clave, $abilities ) && $clave != "nombre"){
                        $abilities[] = $clave;
                    }
                }
			}
			return $abilities;
		}

		function setAbilitie($student){
            $abilities = $this->getAbilities();
            $result = array();
		    foreach ($abilities as $ability){
		        if($ability == "Alumno"){
		            $result[] = $student["nombre"];
                }
                else {
		            if (isset($student[$ability])){
		                $result[] = $student[$ability];
                    }
                    else
                        $result[] = 0;
                }
            }

            return $result;
        }

        function getStudent($name){
            foreach ($this ->students as $student){
                if ($student["nombre"] == $name){
                    return $student;
                }
            }
            return null;
        }

        function getAbilitiesStudent($name){
            $result[] = ["Skill", "level"];
            $student = $this -> getStudent($name);
            foreach ($student as $clave => $valor){
                if ($clave != "nombre"){
                    $result[] = [$clave, $valor];
                }
            }
            return $result;
        }

		function do_matrix(){
		    $this ->result[] = $this-> getAbilities();
		    foreach ($this ->students as $student){
		        $this -> result[] = $this -> setAbilitie($student);
            }
            return $this -> result;
        }
	}

	?>



