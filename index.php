<?php
require_once './config.php';
require_once './classes/DbClass.php';

try {
  $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD); //, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  $e->$errorCodes[getCode()[$language]];
}
$db->setTable('tb_cities');
//filter_input
/**
 * 
 * 
 * */
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
                            $data = [];
                            $errorCodes = [];
                            $errorCode[1049] = [];
                            $errorCode[1049]['de'] = "Datenbank unbekannt";
                            $errorCode[1049]['en'] = "Datenbank unknown";
                            $errorCode['42S02']['de'] = "Keine Daten zurückgeliefert";
                            $errorCode['42S02']['en'] = "No datas in return";
                            $data['city'] = 'Magdeburg';
                            $data['province'] = 'Sachsen-Anhalt';
                            $data['iso2'] = 'DE';
                            $language = "en";


                            //$db->deleteById(5);
                            try {
                              $rows = $db->getAllData();
                              //throw new Exception("Leider keine Daten gefunden");
                            } catch (PDOException $e) {
                              $e->getCode();
                            }
//                            } catch (Exception $ex) {
//                              echo $ex->getCode();
//                            }
                            foreach ($rows[0] as $row) {
                              echo $row . "<br>";
                            }
                            $db->deleteById(24, 'id');
                            $db->insert($data);
                            echo $db->update($data, 10); //WHERE id=10
                            //$db->update($data, 'Magdeburg', 'city');//WHERE city='Magdeburg'
                            ?>
                        </p>                         
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 bg-success">
                        <h1>Eingabe Citys</h1>
                        <hr>
                        <form method="post">
                            <div class="form-group">
                                <label for="field_city">City</label>
                                <input value="Bansin" type="text" class="form-control" id="field_city" name="field_city">                                
                            </div>
                            <div class="form-group">
                                <label for="field_city_ascii">City ASCII Code</label>
                                <input value="Bansin" type="text" class="form-control" id="field_city_ascii" name="field_city_ascii">                                
                            </div>
                            <div class="form-group">
                                <label for="field_city_province">Province</label>
                                <input  value="Vorpommern" type="text" class="form-control" id="field_city_province" name="field_province">                                
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Senden</button>
                            </div>
                        </form>                        
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 bg-success">
                        <p> 
                            <?php ?> 
                        </p>                        
                        </div-->
                    </div>
            </fieldset>

        </div>
        <pre>
          
        </pre>

    </body>
</html>
