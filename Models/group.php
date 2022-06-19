<?php class groupModel extends Model
{
    public  $rowss;
    public function index()
    {
        
        if (isset($_POST['submit'])) {
            if ($_POST['group_name'] == '') {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['group_name'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->add();
            }
        }
        $this->query('SELECT * FROM groups WHERE in_trash=0 ORDER BY grp_id ASC');
        $rows = $this->resultSet();
        return json_encode($rows);
    }

    public function add()
    {
        $op = new khas();
        $this->query('INSERT INTO groups( group_name , active) VALUES (:group_name,:active)');
        $this->bind(':group_name', $op->pro_field($_POST['group_name']));
        $this->bind(':active', $op->pro_field($_POST['active']));
        $this->execute();
        if($this->lastInsertid()) {
            $_SESSION['msg'] =   SUCCESS;
        }
    }



    public function update()
    {
        $op = new khas();
        if (isset( $_GET['updateRec'])   && $op->pro_field($_GET['updateRec']) == 'yes') {
            $this->query('UPDATE groups SET  group_name=:group_name_edit,active=:active_edit WHERE grp_id=:grp_id');
            $this->bind(':group_name_edit',  $op->pro_field($_POST['group_name_edit']));
            $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
            $this->bind(':grp_id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] =  SUCCESS;
        }
        $this->query('SELECT * FROM groups WHERE grp_id=:grp_id');
        $this->bind(':grp_id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }


    public function trash()
    {
        $op = new khas;
        if (isset( $_GET['replace'])   && $op->pro_field($_GET['replace']) == 'yes') {
            $this->query('UPDATE groups SET in_trash=0 WHERE grp_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/group/trash');
        }

        if (isset( $_GET['remove'])  && $op->pro_field($_GET['remove']) == 'yes') {
            $this->query('DELETE FROM groups  WHERE grp_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/group/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM groups WHERE grp_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }

        $this->query('SELECT * FROM groups WHERE in_trash=1');
        $rec = $this->resultSet();
        return $rec;
    }


    public function delete()
    {
        $op = new khas();
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE   groups  SET in_trash=1 WHERE grp_id=:grp_id');
            $this->bind(':grp_id',  $op->pro_field($_GET['id']) );
            $this->execute();
            $_SESSION['msg'] =  SUCCESS;
            header('refresh:0;url=' . ROOT_URL . '/group');
        }
        $this->query('SELECT * FROM groups WHERE grp_id=:grp_id');
        $this->bind(':grp_id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }
}
