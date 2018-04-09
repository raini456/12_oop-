<?php
require_once './config.php';
require_once './classes/DbClass.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 12 DBCLASS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <fieldset>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 bg-warning">
                        <p> 
                      <?php
                          $db=new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
                          $db->setTable('tb_cities');
                          //$db->deleteById(5);
                          $rows=$db->getAllData();                            
                          foreach($rows[0] as $row){
                            echo $row."<br>";
                          }
                          echo "<br><br>";
                          echo $db->deleteById(24, 'id');                   
                        ?>
                        </p>                         
                    </div>
                    <!--div class="col-12 col-sm-12 col-md-6 bg-success">
                        <p> 
                      <?php
                        
                        ?> 
                        </p>                        
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 bg-warning">
                        <p> 
                      <?php
                        
                        ?>
                        </p>                         
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 bg-success">
                        <p> 
                      <?php
                          
                        ?> 
                        </p>                        
                    </div-->
                </div>
            </fieldset>

        </div>
        <pre>
          
        </pre>

    </body>
</html>
