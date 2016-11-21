<?php

    namespace models;

    use apps\models\Model;

    class Address extends Model {
        public $name;
        public $firs_name;
        public $address;
        public $zip;
        public $city;

        public function __construct($id,$name, $first_name, $address, $zip, $city) {
            $this->id = $id;
            $this->name = $name;
            $this->first_name = $first_name;
            $this->address = $address;
            $this->zip = $zip;
            $this->city = $city;
        }

        public static function getUser() {
            $query = self::getDB()->prepare("SELECT * FROM `users`");
            $query->execute();

            $result = array();
            while ($row = $query->fetch()) {
                array_push($result,
                       new Address($row["id"],$row["name"], $row["first_name"], $row['address'], $row['zip'], $row['city']));
            }

            return $result;
        }

         public static function getCity($zip) {
            $query = self::getDB()->prepare("SELECT city FROM `zips` WHERE zip_code=$zip");
            $query->execute();

            $result = array();
            //  while ($row = $query->fetchAll()) {
            //     $result = $row['city'];
            // }
            foreach ($query->fetchAll() as $value) {
                $result[] = $value['city'];
            }
            return $result;
        }


        public static function getXml() {
            $query = self::getDB()->prepare("SELECT * FROM `users`");
            $query->execute();

            $result = array();
            //  while ($row = $query->fetchAll()) {
            //     $result = $row['city'];
            // }
            foreach ($query->fetchAll() as $value) {
                $result[] = $value;
            }
            return $result;
        }

        public function insert($value=array()){
            $sql = "INSERT INTO `users` (name,first_name,address,zip,city)VALUES (?,?,?,?,?)";
            $stmt = self::getDB()->prepare($sql);
            $a = count($value)+1;
            for ($i=1; $i<count($value)+1; $i++) { 
                $stmt->bindParam($i, trim($value[$i-1]));
            }
            if($stmt->execute()){
                return "Seccess, save data ".$value[0];
            }
            
        }

        public function update($id,$value=array()){
            $sql = "UPDATE `users` SET name = ?, 
                    first_name  = ?, 
                    address     = ?,  
                    zip         = ?,  
                    city        = ?  
                    WHERE id    = ?";
            $stmt = self::getDB()->prepare($sql);
            $a = count($value)+1;
            for ($i=1; $i<count($value)+1; $i++) { 
                $stmt->bindParam($i, trim($value[$i-1]));
            }
            if($stmt->execute()){
                return "Seccess, save data ".$value[0];
            }
            
        }


        public function edit($id){
           $query = self::getDB()->prepare("SELECT * FROM `users` WHERE id=$id");
            $query->execute();

            $result = array();
            //  while ($row = $query->fetchAll()) {
            //     $result = $row['city'];
            // }
            foreach ($query->fetchAll() as $value) {
                $result[] = $value;
            }
            return $result;
            
        }

        public function destroy($id){
            $sql = "DELETE FROM `users` WHERE id=:id";
            $stmt = self::getDB()->prepare($sql);
            $stmt->bindParam(':id', $id);   
            $stmt->execute();
        }
    }