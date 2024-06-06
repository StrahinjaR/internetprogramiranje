<?php
$action=isset($_REQUEST['action'])?$_REQUEST['action']:"";
require_once '../DAOStudent.php';
if(!isset($_SESSION)) session_start();

if($_SERVER["REQUEST_METHOD"]==="GET")
{
    if($action=="logout")
    {
        if($_SESSION["korisnik"]!=""){

            session_unset();
            session_destroy();
            include "E:\XMPP\htdocs\Prip\index.php";
        }
    }


}
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    if($action=="Update"){
        $id=isset($_POST["id"])?$_POST['id']:"";
        $ime=isset($_POST["ime"])?$_POST['ime']:"";
        $prezime=isset($_POST["prezime"])?$_POST['prezime']:"";
        $indeks=isset($_POST["indeks"])?$_POST['indeks']:"";

    
        
            $dao=new DAOStudent();
            $postoji=$dao->studentExist($id);
            if($postoji==true)
            {
                $dao->update($id,$ime,$prezime,$indeks);
                $_SESSION["korisnik"]=$id;
                include 'E:\XMPP\htdocs\Prip\prikaz.php';
            }
            else {
                echo "<h2>Nema Studenta </h2>";
                include 'E:\XMPP\htdocs\Prip\index.php';
            }
        
    
        
    }
}
?>