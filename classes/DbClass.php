<?php
class DbClass extends PDO{ 
  private $tablename='';  
  public function setTable($tn){
    $this->tablename=$tn;    
  }
  public function getAllData(){
    $query="SELECT * FROM $this->tablename";     
    $getData=$this->query($query);
    $returnData=[];
    $returnData=$getData->fetchall(PDO::FETCH_BOTH);
    return $returnData;    
  }
  public function deleteById(int $id, $colname='id'){    
    $query="DELETE FROM $this->tablename WHERE $colname=:id";    
    $stmt = $this->prepare($query);     
    $stmt->bindValue(':id', $id, self::PARAM_INT);    
    return $stmt->execute();    
//    $query="SELECT * FROM $this->tablename WHERE id=$id";
//    $getData=$this->query($query);
//    $returnData=[];
//    $returnData=$getData->fetchAll(PDO::FETCH_BOTH);
    
  }
}
