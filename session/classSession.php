<?php

class Autenticacion {
	var $email;
	var $contraseña;
	var $dbemail;
	var $dbcontraseña;
	var $dbid;
	var $dbadmin;

	function consultadatos (){
		include_once ('../db/connect.php');
		$link = conectar();
		$result = mysqli_query ($link, "SELECT * FROM usuario WHERE email = '$this->email'");
		mysqli_close($link);
		$datos = mysqli_fetch_array ($result);
		$this->dbemail = $datos ['email'];
		$this->dbcontraseña = $datos ['password'];
		$this->dbid = $datos['id'];
		$this->dbadmin = $datos['admin'];
	}
	
	function check (){	/* Metodo comparacion de datos */
		try {																										/* Excepcion en caso de que existan datos erroneos */
			if (($this->email != $this->dbemail) or ($this->contraseña != $this->dbcontraseña)){
				throw new Exception ('Error',1);
			}
		}
		catch (Exception $e){
			return 1;
		}
		session_start();
		$_SESSION['status']= "connected";
		$_SESSION['timehours']= date("H");
		$_SESSION['timemins']= date("i");
		$_SESSION['timesegs']= date("s");
		$_SESSION['email']= $this->email;
		$_SESSION['id']= $this->dbid;
		$_SESSION['admin']= $this->dbadmin;
		return 'ok';
	}

	function logout (){							/* Funcion para el cierre de sesion */
		session_start();
		session_unset ();
		session_destroy();
		return true;
	}

	function estado (){
		session_start();
		$timehours = date('H');
		$timemins = date('i');
		$timesegs = date('s');
		$segsactual = ($timesegs)+($timemins * 60)+($timehours * 60 * 60);
		$segssesion = ($_SESSION['timesegs'])+($_SESSION['timemins'] * 60)+($_SESSION['timehours'] * 60 * 60);
		try {
			if (($_SESSION["status"] != "connected") or ((($segsactual - $segssesion) > (5*60)) xor ((0 < (24*60*60 - ($segssesion - $segsactual)) and ((24*60*60 - ($segssesion - $segsactual) < (24*60*60))))))) {
				throw new Exception ('Se perdio la Sesion.',0);
				exit();
			}
		}
		catch (Exception $e){
			return true;
		}
		$_SESSION['timehours']= date("H");
		$_SESSION['timemins']= date("i");
		$_SESSION['timesegs']= date("s");
		return false;
	}
}

?>