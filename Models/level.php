<?php class levelModel extends Model
{

    public function index()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['level_name'] == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['level_name'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->add();
            }
        }

        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM levels WHERE lev_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM levels WHERE in_trash=0 ORDER BY lev_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function add()
    {
        $op = new khas();

        $this->query('INSERT INTO levels( level_name , active) VALUES (:level_name,:active)');
        $this->bind(':level_name', $op->pro_field($_POST['level_name']));
        $this->bind(':active', $op->pro_field($_POST['active']));
        $this->execute();
        if ($this->lastInsertId()) {
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 2; ' . ROOT_URL . '/level');
        }
    }

    public function update()
    {
        $op = new khas();
        if (isset(  $_GET['updateRec'])  && $op->pro_field($_GET['updateRec']) == 'yes') {
            $this->query('UPDATE levels SET  level_name= :level_name_edit,active= :active_edit WHERE lev_id=:id');
            $this->bind(':level_name_edit',  $op->pro_field($_POST['level_name_edit']));
            $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM levels WHERE lev_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }





    public function delete()
    {
        $op= new khas;
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE levels SET in_trash=1 WHERE lev_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/level');
        }
        $this->query('SELECT * FROM levels WHERE lev_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $op->pro_field($_GET['replace']) == 'yes') {
            $this->query('UPDATE levels SET in_trash=0 WHERE lev_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/level/trash');
        }

        if (isset($_GET['remove']) && $op->pro_field($_GET['remove']) == 'yes') {
            $this->query('DELETE FROM levels  WHERE lev_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/level/trash');
        }

        

        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM levels WHERE lev_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM levels WHERE in_trash=1');
        $rom = $this->resultSet();;
        return $rom;
    }
}
