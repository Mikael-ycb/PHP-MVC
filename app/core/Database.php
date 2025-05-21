<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME; 

    private $dbh;
    private $stmt;


    public function __construct(){
        
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO :: ATTR_PERSISTENT => true,//untuk membuat koneksi kita terjaga terus
            PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION //untuk mode errornya tampilkan exception
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);//persiapkan apakah user mau select atau delete
    }

    public function bind($param, $value, $type = null){//wajib ada
        if(is_null($type)){// cek apa jenis typenya
            switch(true){
                case is_int($value):
                    $type = PDO :: PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO :: PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO :: PARAM_NULL;
                    break;
                default:
                    $type = PDO :: PARAM_STR;
                
            }
        }
        $this->stmt->bindValue($param, $value, $type);// baru di bind kesini agar aman dari sql injection

    }

    //eksekusi
    public function execute(){
        $this->stmt->execute();
    }

    public function resultSet(){//jika ingin mengambil banyak data
        $this->execute();
        return $this->stmt->fetchAll(PDO :: FETCH_ASSOC);
    }

    public function single(){//jika ingin mengambil danya satu data
        $this->execute();
        return $this->stmt->fetch(PDO :: FETCH_ASSOC);
    }


}