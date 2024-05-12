<?php

date_default_timezone_set("Asia/Kolkata");

class Connection {

    public $link = NULL;
    protected $host = "localhost";
    protected $dbname = "db_adsp";
    protected $user = "root";
    protected $pass = "";

//    protected $dbname = "u159287473_ADSP_SEO";
//    protected $user = "u159287473_ADSP";
//    protected $pass = "ADSPanyintech1";

    function __construct() {

        try {

            $this->link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {

            $this->link = $ex->getMessage();
        }
    }

    function encrypt_decrypt($string, $action = 'encrypt') {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
        $secret_iv = '5fgf5HJ5g27'; // user define secret key
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    public function isRecordExsistInTable($tbName, $condition) {
        $Result = $this->fatchRecordFromTable($tbName, "*", $condition);
        if ($Result == NULL) {
            return false;
        } else {
            return true;
        }
    }

    public function fatchRecordFromTable($tbName, $fieldName, $condition) {
        if ($this->link != NULL) {
            try {
                $query = "SELECT " . $fieldName . " FROM " . $tbName . " " . $condition;
                $Rec = $this->link->query($query);
                $Result = $Rec->fetchAll(PDO::FETCH_ASSOC);
                return $Result;
            } catch (PDOException $ex) {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function updateDataInTable($tbName, $setValue, $condition) {
        if ($this->link != NULL) {
            try {
                $query = "UPDATE " . $tbName . " SET " . $setValue . " " . $condition;
//                echo $query;
                $stmt = $this->link->prepare($query);
                $stmt->execute();

                return TRUE;
            } catch (PDOException $ex) {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function insertDataInTable($tbName, $fieldName, $fieldValue) {
        if ($this->link != NULL) {
            try {
                $query = "INSERT INTO  " . $tbName . " (" . $fieldName . ") VALUES(" . $fieldValue . ")";
//                echo $query;
                $this->link->exec($query);
                return TRUE;
            } catch (PDOException $ex) {
                return $ex->getMessage();
            }
        } else {
            return FALSE;
        }
    }

}

?>