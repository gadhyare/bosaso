<?php class sectionModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $op = new khas();
        if (isset($_POST['submit'])) {
            if ($op->pro_field($_POST['section_name']) == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($op->pro_field($_POST['section_name']))) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->add();
            }
        }
        $this->query('SELECT * FROM section WHERE in_trash =0 ORDER BY sec_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function add()
    {
        $op = new khas();
        $this->query('INSERT INTO section( section_name , active) VALUES (:section_name,:active)');
        $this->bind(':section_name', $op->pro_field($_POST['section_name']));
        $this->bind(':active', $op->pro_field($_POST['active']));
        $this->execute();
        if ($this->lastInsertId()) {
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url=' . ROOT_URL . '/section');
        }
    }

    public function update()
    {
        $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec'] == 'yes')) {
            $this->query('UPDATE section SET  section_name= :section_name_edit,active= :active_edit WHERE sec_id=:id');
            $this->bind(':section_name_edit',  $op->pro_field($_POST['section_name_edit']));
            $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }

    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $op->pro_field($_GET['replace']) == 'yes') {
            $this->query('UPDATE section SET in_trash=0 WHERE sec_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/section/trash');
        }

        if (isset($_GET['remove']) && $op->pro_field($_GET['remove']) == 'yes') {
            $this->query('DELETE FROM section  WHERE sec_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/section/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM section WHERE sec_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }

        $this->query('SELECT * FROM section WHERE in_trash=1');
        $rec = $this->resultSet();
        return $rec;
    }

    public function delete()
    {
        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE section SET in_trash=1 WHERE sec_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:0;url=' . ROOT_URL . '/section');
        }
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    } 
}
