<?php

class DbClass extends PDO {

  private $tablename = '';

  public function setTable($tn) {
    $this->tablename = $tn;
  }

  public function getAllData() {
    $query = "SELECT * FROM $this->tablename";
    try {
      $getData = $this->query($query);
      $returnData = [];
      $returnData = $getData->fetchall(PDO::FETCH_BOTH);
      return $returnData;
    } catch (Exception $ex) {
      echo "<b style='color:red'>ERROR: getAllData() " . $ex->getCode() . "<b>";
      exit();
    }
  }

  public function deleteById(int $id, $colname = 'id') {
    $query = "DELETE FROM $this->tablename WHERE $colname=:id";
    try {
      $stmt = $this->prepare($query);
      $stmt->bindValue(':id', $id, self::PARAM_INT);
      return $stmt->execute();
    } catch (Exception $e) {
      echo "<b style='color:red'>ERROR: DeleteById() " . $e->getCode() . "<b>";
    }
//    $query="SELECT * FROM $this->tablename WHERE id=$id";
//    $getData=$this->query($query);
//    $returnData=[];
//    $returnData=$getData->fetchAll(PDO::FETCH_BOTH);
  }

  public function insert($data) {
    $j = 0;
    $cols = [];
    $placeholder = [];
    $rowNumber = count($data);
    $stmt;
    if (is_array($data) && $data != NULL) {
      foreach ($data as $key => $value) {
        $cols[] = $key;
        $placeholder[] = '?';
      }
      $rows = implode(",", $cols);
      $placeholders = implode(",", $placeholder);
      $query = "INSERT INTO $this->tablename($rows) VALUES($placeholders);";
      $stmt = $this->prepare($query);
      foreach ($data as $value) {
        $stmt->bindValue(++$j, $value);
      }
      return $stmt->execute();
    }
  }

  public function update($data, $val = "", $colName = "id") {
    $i = 0;
    $rowNumber = count($data);
    $stmt;
    if (is_array($data) && $data != NULL) {
      $query = "UPDATE $this->tablename SET(?=?) WHERE $colName='$val';";
      echo "<br>" . $query . "<br><br>";
      foreach ($data as $key => $value) {        
        $stmt->bindValue( ++$i, $key);
        $stmt->bindValue( ++$i, $value);
        $stmt->execute();
      }
      return "It works";
    }
  }

}
