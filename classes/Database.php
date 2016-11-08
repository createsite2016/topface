<?php 

class Database{
    public $isConn;
    protected $datab;
    
    // connect to db
    public function __construct($username = "root", $password = "root", $host = "localhost", $dbname = "topface", $options = []){
        $this->isConn = TRUE;
        try {
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
    }
    
    // disconnect from db
    public function Disconnect(){
        $this->datab = NULL;
        $this->isConn = FALSE;
    }
    // get row
    public function getRow($query, $params = []){
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    // get rows
    public function getRows($query, $params = []){
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    // insert row
    public function insertRow($query, $params = []){
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return TRUE;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    // update row
    public function updateRow($query, $params = []){
        $this->insertRow($query, $params);
    }
    // delete row
    public function deleteRow($query, $params = []){
        $this->insertRow($query, $params);
    }
    // go page
    public function goWay($way,$message){
        // если переданно сообщение, то выводим его, а потом делаем переадресацию
        if (!empty($message)) {
            exit("<html><head><meta http-equiv='Refresh' content='2; URL=../".$way.".php'></head><body><center><br><br><br><h3><font color='red'>".$message."</font></h3></center></body></html>");
        }
        if (empty($message)) {
            exit("<html><head><meta http-equiv='Refresh' content='0; URL=../".$way.".php'></head></html>");
        }

    }
}

?>