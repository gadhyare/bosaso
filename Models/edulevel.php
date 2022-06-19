<?php class edulevelModel extends Model
{
    public  $rowss;
    public function Index()
    {

        $op = new khas();

        if (isset($_POST['submitAdd'])) {
            if ($op->pro_field($_POST['edulev_name'])== '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($op->pro_field($_POST['edulev_name']))) {

                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->add();
            }

        }
        $this->query('SELECT * FROM edulevel WHERE in_trash=0 ORDER BY edulev_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function update()
    { 
        $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec']) == 'yes') {
                $this->query('UPDATE edulevel SET  edulev_name= :edulev_name_edit,code=:code,active= :active_edit WHERE edulev_id=:edulev_id');
                $this->bind(':edulev_name_edit',  $op->pro_field($_POST['edulev_name_edit']));
                $this->bind(':code',  $op->pro_field($_POST['code_edit']));
                $this->bind(':active_edit',  $op->pro_field($_POST['active_edit']));
                $this->bind(':edulev_id',  $op->pro_field($_GET['ids']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:edulev_id');
        $this->bind(':edulev_id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function add()
    {
        $op = new khas();
                $this->query('INSERT INTO edulevel ( edulev_name,code , active) VALUES (:edulevel,:code,:active)');
                $this->bind(':edulevel', $op->pro_field($_POST['edulev_name']));
                $this->bind(':code', $op->pro_field($_POST['code']));
                $this->bind(':active', $op->pro_field($_POST['active']));
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                    //header ('Refresh: 2; ' . ROOT_URL .'/edulevel');                   
                }
    }


 

    public function delete()
    {
        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE edulevel SET in_trash=1 WHERE edulev_id=:edulev_id');
            $this->bind(':edulev_id',  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/edulevel');
        }
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:edulev_id');
        $this->bind(':edulev_id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $_GET['replace'] == 'yes') {
            $this->query('UPDATE edulevel SET in_trash=0 WHERE edulev_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/edulevel/trash');
        }

        if (isset($_GET['remove']) && $op->pro_field($_GET['remove']) == 'yes') {
            $this->query('DELETE FROM edulevel  WHERE edulev_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/edulevel/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM edulevel WHERE edulev_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }

        $this->query('SELECT * FROM edulevel WHERE in_trash=1');
        $rec = $this->resultSet();
        return $rec;
    }



}
