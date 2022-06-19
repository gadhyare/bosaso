<?php class programsModel extends Model
{
    public  $rowss;
    public function index()
    {

        $this->query('SELECT * FROM    programs  ORDER BY edulev_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function add()
    {
        $op = new khas();
        if (isset($_GET['addRec']) && $op->pro_field($_GET['addRec']) == 'yes') {
            $this->query('INSERT INTO programs(edulev_id ,  fac_id, academics_id, active) VALUES (:edulev_id,  :fac_id, :academics_id, :active)');
            $this->bind(':edulev_id', $op->pro_field($_POST['edulev_id']));
            $this->bind(':fac_id', $op->pro_field($_POST['fac_id']));
            $this->bind(':academics_id', $op->pro_field($_POST['academics_id']));
            $this->bind(':active', $op->pro_field($_POST['active']));
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
            } 
        }
    }


    public function update()
    {
        $op = new khas();
        if (isset($_GET['updateRec']) && $_GET['updateRec'] == 'yes') {
            $this->query('UPDATE programs SET  edulev_id=:edulev_id, fac_id=:fac_id, academics_id=:academics_id, active=:active WHERE prog_id=:id');
            $this->bind(':edulev_id',  $op->pro_field($_POST['edulev_id']));
            $this->bind(':fac_id',  $op->pro_field($_POST['fac_id']));
            $this->bind(':academics_id',  $op->pro_field($_POST['academics_id']));
            $this->bind(':active',  $op->pro_field($_POST['active']));
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS; 
        }
        $this->query('SELECT * FROM programs WHERE prog_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }





    public function delete()
    {
        $op = new khas;
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE   programs SET active =2 WHERE prog_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 2; ' . ROOT_URL . '/programs');
        }
        $this->query('SELECT * FROM programs WHERE prog_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }



    public function prosub()
    {
     
        $op = new khas;
            if (isset($_GET['addRec']) && $_GET['addRec'] == 'yes' && isset($_GET['prog_id'])) {
                $this->query('INSERT INTO subject( subject_name ,  prog_id, active) VALUES (:subject_name,:prog_id,:active)');
                $this->bind(':subject_name' , $op->pro_field($_POST['subject_name']));
                $this->bind(':prog_id' , $op->pro_field($_GET['prog_id']));            
                $this->bind(':active', $op->pro_field($_POST['active']));
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] =   SUCCESS; 
                }
            } 
    }


    public function setprogreport()
    {
         $op = new khas();

        if (isset($_GET['selprog_id'])) {
                    $this->query('INSERT INTO  exam_reports (  prog_id ,  report ) VALUES (:prog_id ,  :report)');
                    $this->bind(":prog_id", $op->pro_field($_GET['selprog_id']));
                    $this->bind(":report", "custom");
                    $this->execute();                    
            if($this->lastInsertId()){
                $_SESSION['msg'] = SUCCESS;
                header ('refresh:0;url=' . ROOT_URL . '/programs');
            }
        }

        if (isset($_GET['upselprog_id'])) {
            $this->query('DELETE FROM exam_reports  WHERE  prog_id=:prog_id');
            $this->bind(":prog_id", $op->pro_field($_GET['upselprog_id']));
            $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header('refresh:0;url=' . ROOT_URL . '/programs');
        }
 
    }


 

    
}
