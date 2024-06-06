<?php
require_once 'db.php';

class DAOStudent {
    private $db;
    
    private $STUDENTPOSTOJI = "SELECT * FROM student WHERE id=?";
    private $UPDATESTUDENT = "UPDATE student SET ime=?, prezime=?, brIndex=? WHERE id=?";
    
    public function __construct() {
        $this->db = DB::createInstance();
    }
    
    public function studentExist($id) {
        $statement = $this->db->prepare($this->STUDENTPOSTOJI);
        $statement->bindValue(1, $id);
        $statement->execute();
        if ($result = $statement->fetch()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getStudentExist($id) {
        $statement = $this->db->prepare($this->STUDENTPOSTOJI);
        $statement->bindValue(1, $id);
        $statement->execute();
        return $result = $statement->fetch();
    }
    
    public function update($id, $ime, $prezime, $brIndex) {
        $statement = $this->db->prepare($this->UPDATESTUDENT);
        $statement->bindValue(1, $ime);
        $statement->bindValue(2, $prezime);
        $statement->bindValue(3, $brIndex);
        $statement->bindValue(4, $id);
        $statement->execute();
    }
}
?>
