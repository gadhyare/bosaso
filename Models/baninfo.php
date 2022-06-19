<?php class baninfoModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $op = new khas;
        if (isset($_POST['addRec'])) {
            if (empty($op->pro_field($_POST['Ban_name'])) || empty($op->pro_field($_POST['Ban_num']))) {
                $_SESSION['msg'] = ERR_EMPTY;
            }elseif(!$op->chek_csrf()){ 
                $_SESSION['msg'] = ERR_CSRF;
            }elseif($op->chek_if_data_is_in('ban_info', 'Ban_name', $_POST['Ban_name'])){ 
                $_SESSION['msg'] = ERR_DATA_IS_IN;
            }
             else {
                $this->query("INSERT INTO ban_info(Ban_name, Ban_num, Ban_date,Ban_op_acc, Ban_active) 
                VALUES (:Ban_name, :Ban_num, :Ban_date,:Ban_op_acc, :Ban_active)");
                $this->bind(":Ban_name", $op->pro_field($_POST['Ban_name']));
                $this->bind(":Ban_num", $op->pro_field($_POST['Ban_num']));
                $this->bind(":Ban_date", $op->pro_field($_POST['Ban_date']));
                $this->bind(":Ban_op_acc", $op->pro_field($_POST['Ban_op_acc']));
                $this->bind(":Ban_active", $op->pro_field($_POST['Ban_active']));
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }

        $this->query('SELECT * FROM ban_info ORDER BY ban_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function update()
    {
        $op = new khas();
        if (isset($_GET['updateRec']) && $_GET['updateRec'] == 'yes') {
                $this->query("UPDATE  ban_info SET Ban_name=:Ban_name, Ban_num=:Ban_num, Ban_date=:Ban_date,Ban_op_acc=:Ban_op_acc, Ban_active=:Ban_active WHERE  Ban_id=:id");
                $this->bind(":Ban_name", $op->pro_field($_POST['Ban_name']));
                $this->bind(":Ban_num", $op->pro_field($_POST['Ban_num']));
                $this->bind(":Ban_date", $op->pro_field($_POST['Ban_date']));
                $this->bind(":Ban_op_acc", $op->pro_field($_POST['Ban_op_acc']));
                $this->bind(":Ban_active", $op->pro_field($_POST['Ban_active']));
                $this->bind(":id", $op->pro_field($_GET['ids']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
        }

        $this->query('SELECT * FROM ban_info WHERE ban_id=:id');
        $this->bind(":id", $op->pro_field($_GET['id']));
        $rows = $this->resultSet();
        return $rows;
    }

    public function delete()
    {
        $op = new khas();
        if (isset($_GET['id'])) {
            $this->query("DELETE FROM  ban_info   WHERE  Ban_id=:id");
            $this->bind(":id", $op->pro_field($_GET['id']));
            $this->execute();
            header("refresh:0;url=" . ROOT_URL . "/baninfo");
            $_SESSION['msg'] = SUCCESS;
        }
    }
}
