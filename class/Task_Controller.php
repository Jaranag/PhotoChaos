<?php



class TaskController {

    public function indexAction(){

        echo "funciona?";
    }

    
    public function addlogin(){
        echo "funciona?";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['_username']) && isset($_POST['password'])){
                $arrFields = array(
                    '_username' => $_POST["_username"],
                    '_password' => $_POST["_password"]);
            }
        }
    }
}           
            
?>