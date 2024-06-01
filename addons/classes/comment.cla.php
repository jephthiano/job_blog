<?php
class comment{
    private $table = 'comment_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    private $ipaddress;
    
    public $id;
    public $name;
    public $user_comment;
    public $status;
    public $regdatetime;
    public $c_id;
    
    
    public function __construct($conn = ''){
        if(!empty($conn)){
            //CREATE CONNECTION
            require_once(file_location('inc_path','connection.inc.php'));
            $this->dbconn = dbconnect($conn,'PDO');
            
            //get ipadress
            $this->ipaddress = get_ip_address();
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
    
    
    public function insert_comment(){
        if(content_data($this->table,'c_id',$this->user_comment,'c_comment',"AND c_name = '{$this->name}' AND n_id = '{$this->n_id}'")){
            return 'exist';
        }else{
            $this->dbsql = "INSERT INTO {$this->table}(c_name,c_comment,c_ipaddress,n_id)VALUES(:name,:user_comment,:ipaddress,:id)";
            $this->dbstmt = $this->dbconn->prepare($this->dbsql);
            $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':user_comment',$this->user_comment,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':ipaddress',$this->ipaddress,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':id',$this->n_id,PDO::PARAM_INT);
            if($this->dbstmt->execute()){return true;}else{return false;}
        }
    }//end of insert comment
    
    public function change_status(){
        $this->dbsql = "UPDATE {$this->table} SET c_status = :status WHERE c_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        $this->dbstmt->bindParam(':status',$this->status,PDO::PARAM_STR);
        $this->dbstmt->execute();
        $this->dbnumRow = $this->dbstmt->rowCount();
        if($this->dbnumRow > 0){return true;}else{return false;} 
    }
    
    public function delete_comment(){
        $this->full_file_name = get_media('comment',$this->id);
        $this->dbsql = "DELETE FROM {$this->table} WHERE c_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){
            $this->full_path = file_location('media_path',$this->full_file_name);
            if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png'){
                unlink($this->full_path);
            }
            return true;
        }else{
            return false;
        }
    }
}
?>