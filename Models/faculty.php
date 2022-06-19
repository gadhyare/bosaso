<?php class facultyModel extends Model{
    public  $rowss;
    public function index(){
        if (isset($_POST['submitAdd'])) {
        if ($_POST['fac_name'] == '') {
            $_SESSION['msg'] = ERR_EMPTY;
        } elseif (is_numeric($_POST['fac_name'])) {
            $_SESSION['msg'] = ERR_NUMBER;
        } else {
            $this->add();
        }
    }
        $this->query('SELECT * FROM faculty WHERE in_trash=0 ORDER BY fac_id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function add()
    {
        $op = new khas();
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('INSERT INTO faculty( fac_name, code , active) VALUES (:faculty,:code,:active)');
        $this->bind(':faculty', $op->pro_field($_POST['fac_name']));
        $this->bind(':code', $op->pro_field($_POST['code']));
        $this->bind(':active', $op->pro_field($_POST['active']));
        $this->execute();
        if($this->lastInsertId()) {
            $_SESSION['msg'] = SUCCESS;         
        }
    }

    public function update(){
        $op = new khas();
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_GET['udapteRec']) && $_GET['udapteRec'] == 'yes'){ 
            $this->query('UPDATE faculty SET  fac_name= :fac_name_edit,code=:code_edit,active= :active_edit WHERE fac_id=:fac_id');
            $this->bind(':fac_name_edit' ,  $op->pro_field($_POST['fac_name_edit']));
            $this->bind(':code_edit',  $op->pro_field($_POST['code_edit']));
            $this->bind(':active_edit' ,  $op->pro_field($_POST['active_edit']));
            $this->bind(':fac_id' ,  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM faculty WHERE fac_id=:fac_id');
        $this->bind(':fac_id' ,  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
}




    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $_GET['replace'] == 'yes') {
            $this->query('UPDATE faculty SET in_trash=0 WHERE fac_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/faculty/trash');
        }

        if (isset($_GET['remove']) && $_GET['remove'] == 'yes') {
            $this->query('DELETE FROM faculty  WHERE fac_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/faculty/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM faculty WHERE fac_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM faculty WHERE in_trash=1');
        $rom = $this->resultSet();;
        return $rom;
    }

    public function delete(){
        $op = new khas();
        if(isset($_POST['delete_items'])){
            $this->query('UPDATE faculty SET in_trash=1 WHERE fac_id=:fac_id');
            $this->bind(':fac_id' ,  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ('Refresh: 0; ' . ROOT_URL .'/faculty');
        }
        $this->query('SELECT * FROM faculty WHERE fac_id=:fac_id');
        $this->bind(':fac_id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}