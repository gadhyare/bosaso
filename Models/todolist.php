<?php class todolistModel extends Model{
    public function index(){
        $id =$_SESSION["log_id"] ;
        $this->query("SELECT * FROM todo WHERE JSON_CONTAINS(user_id,  '[\"".$id."\"]') AND active = 1   ORDER BY id ASC"); 
        
        $rows = $this->resultSet();
        return $rows;
    }

    public function add(){
        $op = new khas();
        if (isset($_GET['addRec']) && $op->pro_field($_GET['addRec']) == 'yes') {
            $usr =  $_POST['usr'] ;
            $a = implode(", ", $usr); 
            $i = json_encode($usr);
                if (!empty($op->pro_field($_POST['title'])) || !empty($op->pro_field($_POST['topic']))) {
                    $this->query('INSERT INTO todo( title , topic , user , status , active ,user_id,regDate) VALUES (:title , :topic , :user , :status , :active,:user_id ,:regDate)');
                    $this->bind(':title', $op->pro_field($_POST['title']));
                    $this->bind(':topic', $op->pro_field($_POST['topic']));
                    $this->bind(':user', $_SESSION['log_id']) ;
                    $this->bind(':status', $op->pro_field($_POST['status']));
                    $this->bind(':active', $op->pro_field($_POST['active']));
                    $this->bind(':user_id',    $i  );
                    $this->bind(':regDate', date("y-m-d"));
                    $this->execute();
                    if ($this->lastInsertId()) {
                        $_SESSION['msg'] =  SUCCESS;
                        header('refresh:1;url=' . ROOT_URL . '/todolist');
                    }
                } 
         } 
    }

   public function update(){
       $op = new Khas();
    if(isset($_POST['edit_submit'])){ 
        if($op->pro_field($_POST['title_edit']) == '' || empty($op->pro_field($_POST['title_edit'])) || is_null($op->pro_field($_POST['title_edit']))){
             $_SESSION['msg']  = ERR_EMPTY;
        }
        elseif(is_numeric($op->pro_field($_POST['title_edit']))){
             $_SESSION['msg']  = ERR_NUMBER;
        }
        else{
            $this->query('UPDATE todo SET  title= :title, topic =:topic,user =:user,status=:status,active=:active WHERE id=:id');  
            $this->bind(':title' , $op->pro_field($_POST['title_edit']));
            $this->bind(':topic', $op->pro_field($_POST['topic_edit']));
            $this->bind(':user', $_SESSION['log_id']) ;
            $this->bind(':status', $op->pro_field($_POST['status_edit']));
            $this->bind(':active', $op->pro_field($_POST['active_edit']));
            $this->bind(':id',$op->pro_field( $_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ("refresh:1;url=" . ROOT_URL .'/todolist');
        }
    }
    $this->query('SELECT * FROM todo WHERE id=:id');
    $this->bind(':id' ,  $_GET['id']);
    $rom = $this->resultSet();;
    return $rom;
   }

   


   public function show(){
       $op = new khas();
        if (isset($_GET['updateRec']) && $_GET['updateRec'] == 'yes') {
            $this->query('UPDATE todo SET active=:active,status=:status  WHERE id=:id'); 
            $this->bind(':active', $op->pro_field($_POST['active_edit']));
            $this->bind(':status', $op->pro_field($_POST['status_edit'])); 
            $this->bind(':id', $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . '/todolist');
        }
        $this->query('SELECT * FROM todo WHERE id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;    
   }

   public function endtodolist(){
       $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec'] )== 'yes') {
            $this->query('UPDATE todo SET active=:active  WHERE id=:id'); 
            $this->bind(':active', $op->pro_field($_POST['active_edit'])); 
            $this->bind(':id', $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . '/todolist');
        }
        $this->query('SELECT * FROM todo WHERE 	user_id in(:id) AND active=2 ORDER BY id ASC');
        $this->bind(":id", $_SESSION['log_id'] ?? 0);
        $rows = $this->resultSet();
        return $rows; 
   }
   
}