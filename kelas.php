<?php 
require_once "koneksi.php";
class lecturers extends database {
  public function __construct() {
    parent::__construct();
  }

  public function tampilData() {
    $sql = "SELECT * FROM lecturers"; 
    $sqil = $this->conn->query($sql);
    return $sqil;
  }
}

class classes extends database {
  public function __construct(){
    parent::__construct();
  }

  public function tampilData(){
    $sql = "SELECT * FROM classes";
    $sqil = $this->conn->query($sql);
    return $sqil;
  }
}

class lecturers_1 extends lecturers{
  public function __construct(){
    parent::__construct();
  }

  public function tampilData(){
    $sql = "SELECT * FROM lecturers WHERE address = 'Cilacap' ";
    $sqil = $this->conn->query($sql);
    return $sqil;
  }
}

class classes_1 extends classes{
  public function __construct(){
    parent::__construct();
  }

  public function tampilData(){
    $sql = "SELECT * FROM classes WHERE academic_year = 2024";
    $sqil = $this->conn->query($sql);
    return $sqil;
  }
} 
?>