<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('store.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "<p>Opened database successfully</p>";
   }

   $sql =<<<EOF
      SELECT * from item;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "ID = ". $row['itemid']."\r\n";
      echo "NAME = ". $row['itemname'] ."\r\n";
      // echo "COST = ". $row['cost] ."\n";
      // echo "PRICE =  ".$row['price'] ."\n\n";
   }
   #echo "Operation done successfully\n";
   $db->close();
?>