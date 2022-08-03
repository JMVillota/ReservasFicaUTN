<?php
require_once '../model/modeluserapp.php';
class userappcontroller{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $userapp=new Modelo();

        $dato=$userapp->mostrar("userapp", "2");
        require_once '../view/userapp/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../view/userapp/AgregarModal.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dates=$_POST['dates'];
                $alm->hour=$_POST['hour'];
                $alm->codpaci=$_POST['codpaci'];
				$alm->coddoc=$_POST['coddoc'];
				$alm->codespe=$_POST['codespe'];
				$alm->estado=$_POST['estado'];
				
				
                

     $this->model->insertar($alm);
     //-------------
header("Location: userapp.php");

          }

            //ELIMINAR
            function eliminar(){
                $codcit=$_REQUEST['codcit'];
                $condicion="codcit=$codcit";
                $userapp=new Modelo();
                $dato=$userapp->eliminar("userapp", $condicion);
                header("location:userapp.php");
            }

    }
