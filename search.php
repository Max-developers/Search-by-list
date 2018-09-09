<?php
  

class database {
    public $HOST;
    public $LOGIN;
    public $PASSWORD;
    public $DB_NAME;
  
    public function DB(){
     
        mysql_connect($this->HOST, $this->LOGIN, $this->PASSWORD);
        mysql_select_db($this->DB_NAME); 
        mysql_set_charset('utf8'); // Кодировка базы данных в UTF8 

    }
}


class search {
   public $TABL_NAME;
   public $COLUMN_NAME;
  
   public function sear(){    
       $info = $_POST['uses'];
       $info = strip_tags($info); // Фильтрация входящих данных
       $info = trim($info); // убираем пробелы с начала и конца строки
       $quantity = iconv_strlen($info); 
       $infoTOupper = mb_strtoupper($info,'UTF-8'); 
    
       $result = mysql_query("SELECT * FROM  ".$this->TABL_NAME." "); 
       while($x = mysql_fetch_array($result)){   
         
           $tabl_name = $x[$this->COLUMN_NAME]; 
           $src = mb_substr($tabl_name, 0,$quantity); 
           $srcRG = mb_strtoupper($src, 'UTF-8'); 
     
               if($infoTOupper == $srcRG and $quantity >0){ 
                   echo '<p  class="list">'.$tabl_name.'</p>'; 
               } 
       }
     
        mysql_close;
     
    }
  
   
}


$object = new database;
$sear = new search;

require_once('authorization_db.php');

$object -> HOST = HOST_DB; 
$object -> LOGIN = LOGIN_DB;      
$object -> PASSWORD = PASSWORD_DB;
$object -> DB_NAME = NAME_DB;
$object -> DB();


$sear -> TABL_NAME = TABL_NAME_DB;
$sear -> COLUMN_NAME = COLUMN_NAME_DB;
$sear -> sear();
