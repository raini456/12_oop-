<?php

class FilterForm {

  private $scheme = [];

  public function __construct() {    
  }

  public function setFilter(string $field, int $filter, $column = false) {
    $col = (!$column) ? $field : $column;
    $this->scheme[] = [
        'fieldname' => $field,
        'columnname' => $col,
        'filter' => $filter
    ];
  }

  public function getScheme() {
    return $this->scheme;
  }

  public function filter($method) {
    $data = [];
    foreach ($this->scheme as $field) {
      $val = filter_input($method, $field['fieldname'], $field['filter']);      
      if ($val !== false && $val!==NULL) {
        $data[$field['columnname']] = $val;
      }
    }
    //var_dump($data);
    return $data;
  }

}
