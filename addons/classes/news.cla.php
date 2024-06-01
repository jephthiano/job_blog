<?php
class news{
    private $table = 'news_table';
    private $media_table = 'news_media_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    
    public $id;
    public $title;
    public $keyword;
    public $imagecaption;
    public $paragraph1;
    public $paragraph2;
    public $paragraph3;
    public $source;
    public $status;
    public $regdatetime;
    public $ad_id;
    
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
        require_once(file_location('admin_inc_path','session_start.inc.php'));
        if(isset($_SESSION['admin_id'])){
         @$this->current_admin = test_input(ssl_decrypt_input($_SESSION['admin_id']));
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
    
    
    public function insert_news(){
        if(content_data('news_table','n_id',$this->title,'n_title') !== false){
            return 'exists';
        }else{
            $this->dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            try{
                //begin transaction
                $this->dbconn->beginTransaction();
                $this->dbsql = "INSERT INTO {$this->table}(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,
                n_paragraph2,n_paragraph3,n_source,n_regdatetime,ad_id)
                VALUES(:title,:category,:keyword,:imagecaption,:paragraph1,:paragraph2,:paragraph3,:source,:regdatetime,:ad_id)";
                $this->dbstmt = $this->dbconn->prepare($this->dbsql);
                $this->dbstmt->bindParam(':title',$this->title,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':category',$this->category,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':keyword',$this->keyword,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':imagecaption',$this->imagecaption,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':paragraph1',$this->paragraph1,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':paragraph2',$this->paragraph2,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':paragraph3',$this->paragraph3,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':source',$this->source,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':regdatetime',$this->regdatetime,PDO::PARAM_STR);
                $this->dbstmt->bindParam(':ad_id',$this->current_admin,PDO::PARAM_STR);
                $this->dbstmt->execute();
                $this->last_id = $this->dbconn->lastInsertId(); //last id
                if($this->type === 'normal'){
                    // insert image
                    $this->dbsql = "INSERT INTO {$this->media_table}(nm_link_name,nm_extension,n_id) VALUES(:link_name,:extension,:n_id)";
                    $this->dbstmt = $this->dbconn->prepare($this->dbsql);
                    $this->dbstmt->bindParam(':link_name',$this->file_name,PDO::PARAM_STR);
                    $this->dbstmt->bindParam(':extension',$this->extension,PDO::PARAM_STR);
                    $this->dbstmt->bindParam(':n_id',$this->last_id,PDO::PARAM_INT);
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
                        $this->full_path = file_location('media_path','news/'.$this->full_file_name);
                        if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){unlink($this->full_path);}
                    }
                    return false;
                }//if rollback
            }// end of try and catch
        }
    }//end insert news
    
    public function update_news(){
        $this->dbsql = "UPDATE {$this->table} SET n_title = :title,n_category = :category,n_keyword = :keyword,n_imagecaption = :imagecaption,
        n_paragraph1 = :paragraph1,n_paragraph2 = :paragraph2,n_paragraph3 = :paragraph3,n_source = :source,n_regdatetime = :regdatetime,ad_id = :ad_id
        WHERE n_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':title',$this->title,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':category',$this->category,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':keyword',$this->keyword,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':imagecaption',$this->imagecaption,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':paragraph1',$this->paragraph1,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':paragraph2',$this->paragraph2,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':paragraph3',$this->paragraph3,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':source',$this->source,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':regdatetime',$this->regdatetime,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':ad_id',$this->current_admin,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){return true;}else{return false;} 
    }
    
    public function change_status(){
        $this->dbsql = "UPDATE {$this->table} SET n_status = :status WHERE n_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        $this->dbstmt->bindParam(':status',$this->status,PDO::PARAM_STR);
        $this->dbstmt->execute();
        $this->dbnumRow = $this->dbstmt->rowCount();
        if($this->dbnumRow > 0){return true;}else{return false;} 
    }
    
    public function delete_news(){
        $this->full_file_name = get_media('news',$this->id);
        $this->dbsql = "DELETE FROM {$this->table} WHERE n_id = :id LIMIT 1";
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
        $this->full_file_name = get_media('news',$this->id);
        $this->full_path = file_location('media_path',$this->full_file_name);
        if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){
                if(unlink($this->full_path)){
                    $this->dbsql = "DELETE FROM {$this->media_table} WHERE n_id = :id LIMIT 1";
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
        $this->full_file_name = get_media('news',$this->id);
        $this->full_path = file_location('media_path',$this->full_file_name);
        
        if(content_data($this->media_table,'nm_id',$this->id,'n_id') !== false){
            $this->dbsql = "UPDATE {$this->media_table} SET nm_link_name = :link_name,nm_extension = :extension WHERE n_id = :id LIMIT 1";
        }else{
            $this->dbsql = "INSERT INTO {$this->media_table}(nm_link_name,nm_extension,n_id)VALUES(:link_name,:extension,:id)";
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
            $this->full_path = file_location('media_path','news/'.$this->full_file_name);
            if(file_exists($this->full_path) && $this->full_file_name !== 'home/no_media.png' && is_file($this->full_path)){unlink($this->full_path);}
            return false;
        }
    }//end of store user image
}
?>