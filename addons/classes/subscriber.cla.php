<?php
class subscriber{
    private $table = 'subscriber_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    
    public $id;
    public $name;
    public $email;
    
    private $current_admin;
    private $last_id;
    
    public function __construct($conn = ''){
        if(!empty($conn)){
            //CREATE CONNECTION
            require_once(file_location('inc_path','connection.inc.php'));
            $this->dbconn = dbconnect($conn,'PDO');
        }
    }
    
    public function __destruct(){
    	//CLOSES ALL CONNECTION
        if(is_resource($this->dbconn)){
            closeconnect('db', $this->dbconn);
        }
        if(is_resource($this->dbstmt)){
            closeconnect('stmt',$this->dbstmt);
        }
    }
    
    
    public function insert_subscriber(){
        if(content_data('subscriber_table','s_id',$this->email,'s_email') === false){
            $this->dbsql = "INSERT INTO {$this->table}(s_name,s_email) VALUES(:name,:email)";
            $this->dbstmt = $this->dbconn->prepare($this->dbsql);
            $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':email',$this->email,PDO::PARAM_STR);
            if($this->dbstmt->execute()){return true;}else{return false;}
        }else{
            return true;
        }
    }//end insert subscribe
    
    public function delete_subscriber(){
        $this->dbsql = "DELETE FROM {$this->table} WHERE s_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){return true;}else{return false;} 
    }
}
?>