<?php class academicsModel extends Model
{
    public  $rowss;
    public function index()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['academics_name'] == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['academics_name'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->add();
            }
        }
        $this->query('SELECT * FROM academics WHERE in_trash =0 ORDER BY academics_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function update()
    {
        if (isset($_GET['updateRec']) && $_GET['updateRec'] == 'yes') {
        $this->query('UPDATE academics SET  academics= :academics_edit,code= :code_edit, active= :active_edit WHERE academics_id=:academics_id');
        $this->bind(':academics_edit',  $_POST['academics_edit']);
        $this->bind(':code_edit',  $_POST['code_edit']);
        $this->bind(':active_edit',  $_POST['selected_value']);
        $this->bind(':academics_id',  $_GET['ids']);
        $this->execute();
        $_SESSION['msg'] = SUCCESS;

        }
        $this->query('SELECT * FROM academics WHERE academics_id=:academics_id');
        $this->bind(':academics_id',  $_GET['id']);
        $rows = $this->resultSet();;
        return $rows;
    }


    public function add()
    {


                $this->query('INSERT INTO academics( academics , code,  active) VALUES (:academics,:code , :active)');
                $this->bind(':academics', $_POST['academics_name']);
                $this->bind(':code', $_POST['code']);
                $this->bind(':active', $_POST['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                    header('Refresh: 2; ' . ROOT_URL . '/academics');
                }
         
    }


    public function trash()
    {
        if (isset($_GET['replace']) && $_GET['replace'] == 'yes') {
            $this->query('UPDATE academics SET in_trash=0 WHERE academics_id=:id');
            $this->bind(':id',  $_GET['ids']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/academics/trash');
        }

        if (isset($_GET['remove']) && $_GET['remove'] == 'yes') {
            $this->query('DELETE FROM academics  WHERE academics_id=:id');
            $this->bind(':id',  $_GET['ids']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/academics/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM academics WHERE academics_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM academics WHERE in_trash=1');
        $rom = $this->resultSet();;
        return $rom;
    }

    public function delete()
    {
        if (isset($_POST['delete_items'])) {
            $this->query('UPDATE academics SET in_trash=1 WHERE academics_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/academics');
        }
        $this->query('SELECT * FROM academics WHERE academics_id=:academics_id');
        $this->bind(':academics_id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }
}
