<?php

require_once("DataBase.php");
require_once("crypt.php");

class user extends Crypt {

    public function __construct() {
        
    }

    public function login($login, $pass) {


        $pass = parent::encrypt($pass);
        $select = DataBase::connect()->prepare("SELECT * FROM respensable WHERE login= :login AND pass= :pass");
        $select->bindParam(":login", $login);
        $select->bindParam(":pass", $pass);
        $select->execute();
        $e = $select->fetch(PDO::FETCH_NUM);

        if ($e > 0) {
            return true;
        } else {

            return false;
        }
    }

    public function select_pass($login) {
        $select = DataBase::connect()->query("select * from respensable where login like '$login'");

        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
            $pass = $donnees->pass;
        }

        return $pass;
    }

    public function value_session() {

        session_start();
        $data = array();
        $data['pass'] = $_SESSION['p'];
        $data['login'] = $_SESSION['l'];


        return $data;
    }

    public function changer_pass($npass, $login) {

        $MODIFIER = DataBase::connect()->prepare('UPDATE respensable SET
pass=:pass where login=:login');

        try {

            $success = $MODIFIER->execute(array(
                'pass' => $npass,
                'login' => $login
            ));
        } catch (Exception $e) {

            echo 'Erreur de requète : ', $e->getMessage();
        }
        return true;
    }

    public function location($link) {

        header('Location: ' . $link);
    }

    public function logout() {

        session_name('K1Q');
        session_start();
        session_destroy();
        header('location:../');
    }

    public function affichage() {

        if (isset($_GET["message"])) {
            $msg = $_GET["message"];
            if ($msg == 'delete') {
                $message = "<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Supression avec succées</div>";
            }
            if ($msg == 'add') {

                $message = "<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Ajout avec succées</div>";
            }
            if ($msg == 'archive') {

                $message = "<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Archive avec succées</div>";
            }
            if ($msg == 'update') {

                $message = "<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Modification avec succées</div>";
            }
        } else {
            $message = "";
        }

        echo $message;
    }

}

?>