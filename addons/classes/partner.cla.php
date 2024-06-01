<?php
class partner{
    private $table = 'partner_table';
    private $media_table = 'partner_media_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    
    public $id;
    public $name;
    
    public $type;
    public $file_name;
    public $extension;
    
    private $current_admin;
    private $last_id;
    private $full_file_name;
    private $full_path;
    
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
    
    
    public function insert_partner(){
        if(content_data('partner_table','p_id',$this->name,'p_name') !== false){
            return 'exists';
        }else{
            $this->dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            try{
                //begin transaction
                $this->dbconn->beginTransaction();
                $this->dbsql = "INSERT INTO {$this->table}(p_name)VALUES(:name)";
                $this->dbstmt = $this->dbconn->prepare($this->dbsql);
                $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
                $this->dbstmt->execute();
                $this->last_id = $this->dbconn->lastInsertId(); //last id
                if($this->type === 'normal'){
                    // insert image
                    $this->dbsql = "INSERT INTO {$this->media_table}(pm_link_name,pm_extension,p_id) VALUES(:link_name,:extension,:pid)";
                    $this->dbstmt = $this->dbconn->prepare($this->dbsql);
                    $this->dbstmt->bindParam(':link_name',$this->file_name,PDO::PARAM_STR);
                    $this->dbstmt->bindParam(':extension',$this->extension,PDO::PARAM_STR);
                    $this->dbstmt->bindParam(':pid',$this->last_id,PDO::PARAM_INT);
                    $this->dbstmt->execute();
                }
                // commit the transation
                if($this->dbconn->commit()){return $this->last_id;}//if commit
            }catch(PDOException $e){
                //rollback
                if($this->dbconn->rollback()){
                    if($this->type === 'normal'){
                        //delete image
                        $this->full_file_name = $this->file_name.".".$this->extension;
                        $this->full_path = file_location('media_path','partner/'.$this->full_file_name);
                        if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){unlink($this->full_path);}
                    }
                    return false;
                }//if rollback
            }// end of try and catch   
        }
    }//end insert partner
    
    public function update_partner(){
        $this->dbsql = "UPDATE {$this->table} SET p_name = :name WHERE p_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){return true;}else{return false;} 
    }
    
    public function delete_partner(){
        $this->full_file_name = get_media('partner',$this->id);
        $this->dbsql = "DELETE FROM {$this->table} WHERE p_id = :id LIMIT 1";
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
    
    public function remove_image(){
        $this->full_file_name = get_media('partner',$this->id);
        $this->full_path = file_location('media_path',$this->full_file_name);
        if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){
                if(unlink($this->full_path)){
                    $this->dbsql = "DELETE FROM {$this->media_table} WHERE p_id = :id LIMIT 1";
                    $this->dbstmt = $this->dbconn->prepare($this->dbsql);
                    $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
                    $this->dbstmt->execute();
                    return true;
                }else{
                    return false;
                }
        }
    }
    public function change_image(){
        $this->full_file_name = get_media('partner',$this->id);
        $this->full_path = file_location('media_path',$this->full_file_name);
        
        if(content_data($this->media_table,'pm_id',$this->id,'p_id') !== false){
            $this->dbsql = "UPDATE {$this->media_table} SET pm_link_name = :link_name,pm_extension = :extension WHERE p_id = :id LIMIT 1";
        }else{
            $this->dbsql = "INSERT INTO {$this->media_table}(pm_link_name,pm_extension,p_id)VALUES(:link_name,:extension,:id)";
        }
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':link_name',$this->file_name,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':extension',$this->extension,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){
            //delete the existing image
            if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){unlink($this->full_path);}
            return true;
        }else{
            //delete new image
            $this->full_file_name = $this->file_name.".".$this->extension;
            $this->full_path = file_location('media_path','partner/'.$this->full_file_name);
            if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){unlink($this->full_path);}
            return false;
        }
    }//end of store user image
}
?>