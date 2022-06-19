<?php class departmentModel extends Model
{
    public  $rowss;
    public function index()
    {

        $op = new khas();
        if (isset($_POST['submit'])) {
            if ($op->pro_field($_POST['department_name']) == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($op->pro_field($_POST['department_name']))) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->add();
            }
        }
        $this->query('SELECT * FROM department WHERE in_trash=0  ORDER BY dep_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {

        $op = new khas();
        $this->query('INSERT INTO department( department_name , active) VALUES (:department_name,:active)');
        $this->bind(':department_name', $op->pro_field($_POST['department_name']));
        $this->bind(':active', $op->pro_field($_POST['active']));
        $this->execute();
        if ($this->lastInsertId()) {
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url=' . ROOT_URL . '/department');
        }
    }



    public function update()
    {

        $op = new khas();
        if (isset($_GET['updateRec']) && $op->pro_field($_GET['updateRec']) == 'yes') {
            $this->query('UPDATE department SET  department_name= :department_name_edit,active= :active_edit WHERE dep_id=:id');
            $this->bind(':department_name_edit',  $op->pro_field($_POST['department_name_edit']));
            $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] =   SUCCESS;
        }
        $this->query('SELECT * FROM department WHERE dep_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }




    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $op->pro_field($_GET['replace']) == 'yes') {
            $this->query('UPDATE department SET in_trash=0 WHERE dep_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/department/trash');
        }

        if (isset($_GET['remove']) && $op->pro_field($_GET['remove'] == 'yes')) {
            $this->query('DELETE FROM department  WHERE dep_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/department/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM department WHERE dep_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM department WHERE in_trash=1');
        $rom = $this->resultSet();;
        return $rom;
    }
    public function delete()
    {
        $op = new khas();

        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE   department SET in_trash=1 WHERE dep_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['id']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:0;url=' . ROOT_URL . '/department');
        }
        $this->query('SELECT * FROM department WHERE dep_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function doupload()
    {
    }

    public function showStuRecordLev()
    {
        global $stu_lev;
        $op =  new khas();
        $id = $op->pro_field(intval($_GET['id']));
        if ($id) {
            $this->query('SELECT * FROM exams WHERE stu_num =:stu_num AND stu_lev=:stu_lev');
            $this->bind(':stu_num', $id);
            $this->bind(':stu_num', $stu_lev);
            $this->single();
            $rows = $this->resultSet();
            return $rows;
        }
    }
}
