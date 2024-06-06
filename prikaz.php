<?php
require_once '../DAOStudent.php';
if(!isset($_SESSION)) session_start();

if($_SESSION["korisnik"]!=""){
    $dao=new DAOStudent();
    $student= $dao->GetstudentExist($_SESSION['korisnik']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Id: <?= $student["id"]?> <br>
    Ime: <?= $student["ime"]?> <br>
    Prezime: <?= $student["prezime"]?> <br>
    Broj Indexa: <?= $student["brIndex"]?> <br>
    <a href="StudentController.php?action=logout"> LOGOUT </a>
</body>
</html>

<?php
}else{
	header("Location:index.php");
}
?>