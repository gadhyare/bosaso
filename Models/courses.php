<?php class coursesModel extends Model
{


    public function index()
    {
        /**
         * getl all recoreds from table in database 
         */
        $this->query("SELECT * FROM courses ORDER BY cou_id DESC");
        $row = $this->resultSet();
        if ($row) {
            return json_encode($this->resultSet());
        }
    }


    public function add()
    {
        /**
         * Add new Record to the table of database 
         */
        if (isset($_POST['add_rec'])) {
            if (empty($_POST['cou_title'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['cou_title'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO courses( cou_title,cou_startdate,cou_enddate, cou_status) VALUES (:cou_title,:cou_startdate,:cou_enddate, :cou_status)");
                $this->bind(":cou_title", $_POST['cou_title']);
                $this->bind(":cou_startdate", $_POST['cou_startdate']);
                $this->bind(":cou_enddate", $_POST['cou_enddate']);
                $this->bind(":cou_status", $_POST['cou_status']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }
    }



    /**
     * update record in database 
     */

    public  function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['edit_submit'])) {

            $this->query("SELECT * FROM courses WHERE cou_id=:id");
            $this->bind(":id", $id);
            $UpdateRow = $this->resultSet();
            if ($UpdateRow) {
                $this->query("UPDATE courses SET cou_title=:cou_title,cou_startdate=:cou_startdate,cou_enddate=:cou_enddate, cou_status=:cou_status WHERE cou_id=:id");
                $this->bind(":cou_title", $_POST['cou_title_update']);
                $this->bind(":cou_startdate", $_POST['cou_startdate_update']);
                $this->bind(":cou_enddate", $_POST['cou_enddate_update']);
                $this->bind(":cou_status", $_POST['cou_status_update']);
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }


        $this->query("SELECT * FROM courses WHERE cou_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            return $this->resultSet();
        }
    }



    /**
     * Delete Only One Record from database 
     */

    public   function delete()
    {
        $id = $_GET['id'];
        $op = new Khas();
        if (isset($_POST['delete_items'])) {
            $this->query("SELECT * FROM courses WHERE cou_id=:id");
            $this->bind(":id", $id);
            $delRow = $this->resultSet();
            if ($delRow) {
                $op->delete_all_coulesson($id);
                $this->query("DELETE  FROM courses WHERE cou_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0;url=" . ROOT_URL . '/courses');
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }

        $this->query("SELECT * FROM courses WHERE cou_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            return $this->resultSet();
        }
    }
}
