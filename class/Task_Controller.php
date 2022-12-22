<?php



class TaskController {

    public function indexAction(){

        echo "funciona?";
    }

    
    public function addlogin(){
        echo "funciona?";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['_username']) && isset($_POST['_password'])){
                $arrFields = array(
                    '_username' => $_POST["_username"],
                    '_password' => $_POST["_password"]);
            }
        }
    }

    public function register() {
        echo "funciona?";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['_username']) && isset($_POST['password']) && isset($_POST['_confirm_password']) && isset ($_POST['_first_name']) && isset ($_POST['_last_name']) && isset ($_POST['_birthdate']) ){
                $arrFields = array(
                    '_username' => $_POST["_username"],
                    '_password' => $_POST["_password"],
                    '_confirm_password' => $_POST["_confirm_password"],
                    '_first_name' => $_POST["_first_name"],
                    '_last_name' => $_POST["_last_name"],
                    '_birthdate' => $_POST["_birthdate"]);
            }
        }


        $sql = "INSERT INTO users (username, password, first_name, last_name, birthdate, image_profile ) VALUES ($this -> _username, $this -> _password, $this -> _first_name, $this -> _last_name, $this -> _birthdate, $this -> _image_profile)";
        $result = mysqli_query($sql);
        if($result){
            $msg = "Registered Sussecfully";
            echo $msg;
        }
        else
            $msg = "Error Registering";
            echo $msg;
        
    }
}           
            
?>