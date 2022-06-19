<?php 
require getcwd() . '/lib/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Helper\Sample;
class subjectModel extends Model
{
    public  $rowss;
    public function index()
    {
        $this->query('SELECT * FROM subject WHERE in_trash=0');
        $rows = $this->resultSet();
        return  json_encode($rows);
    }


    public function add()
    {
        $op = new khas();
        if (isset($_GET['addRec']) && $_GET['addRec'] == 'yes') {
                $this->query('INSERT INTO subject( subject_name , subject_code , prog_id, active) VALUES (:subject_name,:subject_code,:prog_id,:active)');
                $this->bind(':subject_name', $op->pro_field($_POST['subject_name']));
                $this->bind(':subject_code', $op->pro_field($_POST['subject_code']));
                $this->bind(':prog_id', $op->pro_field($_POST['prog_id']));
                $this->bind(':active', $op->pro_field($_POST['active']));
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] =   SUCCESS;
                }
        }
    }

    public function update()
    {
        $op = new khas();
        if (isset($_GET['updateRec']) && $_GET['updateRec'] == 'yes') {
                $this->query('UPDATE subject SET  subject_name= :subject_name_edit,subject_code= :subject_code_edit,prog_id=:prog_id,active= :active_edit WHERE sub_id=:id');
                $this->bind(':subject_name_edit',  $op->pro_field($_POST['subject_name_edit']));
                $this->bind(':subject_code_edit',  $op->pro_field($_POST['subject_code_edit']));
                $this->bind(':prog_id',  $op->pro_field($_POST['prog_id']));
                $this->bind(':active_edit',  $op->pro_field($_POST['selected_value']));
                $this->bind(':id',  $op->pro_field($_GET['ids']));
                $this->execute();
                $_SESSION['msg'] =  SUCCESS;
        }
        $this->query('SELECT * FROM subject WHERE sub_id=:id');
        $this->bind(':id',  $op->pro_field($_GET['id']));
        $rom = $this->resultSet();;
        return $rom;
    }

    public function trash()
    {
        $op = new khas();
        if (isset($_GET['replace']) && $op->pro_field($_GET['replace']) == 'yes') {
            $this->query('UPDATE subject SET in_trash=0 WHERE sub_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/subject/trash');
        }

        if (isset($_GET['remove']) && $op->pro_field($_GET['remove']) == 'yes') {
            $this->query('DELETE FROM subject  WHERE sub_id=:id');
            $this->bind(':id',  $op->pro_field($_GET['ids']));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/subject/trash');
        }



        if (isset($_POST['btns'])) {
            $chk = $_REQUEST['chid'];
            $a = implode(", ", $chk);
            $this->query("DELETE FROM subject WHERE sub_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }

        $this->query('SELECT * FROM subject WHERE in_trash=1');
        $rec = $this->resultSet();
        return $rec;
    }

    public function delete()
    {
        $op = new Khas();
        if (isset($_POST['delete_items'])) {
            if (!$op->chek_subject_before_delete($op->pro_field($_GET['id']))) {
                $_SESSION['msg'] = ERR_DELETE_LINKED_RECORDS;
            } else {
                $this->query('UPDATE   subject SET in_trash=1  WHERE sub_id=:id');
                $this->bind(':id',  $op->pro_field($_GET['id']));
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header('refresh:0;url=' . ROOT_URL . '/subject');
            }
        }
        $this->query('SELECT * FROM subject WHERE sub_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function subjectlevel()
    {
    }


    public function ordersubByfacl()
    {
        $op = new khas();
        if (isset($_POST['seledulev_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/subject/ordersubByfacl?edulev_id=" . $op->pro_field($_POST['edulev_id']));
        }
        if (isset($_POST['pro_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/subject/ordersubByfacl?edulev_id=" . $op->pro_field($_GET['edulev_id']) . "&pro_id=" . $op->pro_field($_POST['pro_id']));
        }

        if (isset($_GET['pro_id'])) {
            $this->query('SELECT * FROM subject WHERE prog_id=:prog_id');
            $this->bind(":prog_id", $op->pro_field($_GET['pro_id']));
            $rows = $this->resultSet();
            return  json_encode($rows);
        }
    }


    public function ordersubByfaclprint()
    {
        $op = new khas();
        if (isset($_GET['pro_id']) && isset($_GET['edulev_id'])) {
            $this->query('SELECT * FROM subject WHERE prog_id=:prog_id');
            $this->bind(":prog_id", $op->pro_field($_GET['pro_id']));
            $rows = $this->resultSet();
            return  json_encode($rows);
        }
    }

    public function uploadsujectlist()
    { 
        if (isset($_POST['FileUp'])) { 
            $op = new Khas();
            $files = $_FILES['uploadFile'];
            $f_name    = $files['name'];
            $f_tmp     = $files['tmp_name'];
            $f_size    = $files['size'];
            $f_error   = $files['error'];
            $file_type = pathinfo($f_name, PATHINFO_EXTENSION);
    
            if ( $file_type == "xlsx"  ) {
                if ($f_error === 0) {
                    if ($f_size < 2000000) {
                        $f_upload_dir =   getcwd() . "/uplouds/";
                        $inputFileNmae =   $f_upload_dir . $op->random_string(20) . "." . $file_type;
                        if (move_uploaded_file($f_tmp, $inputFileNmae  )) {
                            $inputType = "Xlsx";
                            $reader = IOFactory::createReader($inputType);
                            $reader->setReadDataOnly(true);
                            $spreadsheet = $reader->load($inputFileNmae);
                            $sheetData = $spreadsheet->getActiveSheet()->toArray();
                            $x = 1;
                            foreach ($sheetData as $row) {
                                if ($x != 1) :
                                    $subject_name =  $row[1];
                                    $subject_code =  $row[2];
                                    if ($subject_name == "") continue;
                                    $this->query('INSERT INTO subject(subject_name,subject_code,prog_id, active) VALUES (:subject_name,:subject_code,:prog_id,:active)');
                                    $this->bind(':subject_name', $op->pro_field($subject_name));
                                    $this->bind(':subject_code', $op->pro_field($subject_code));
                                    $this->bind(':prog_id', $op->pro_field($_GET['pro_id']));
                                    $this->bind(':active', 1);
                                    $this->execute();
                                    if ($this->lastInsertId()) {
                                        $_SESSION['msg'] =   SUCCESS;
                                    }
                                endif;
                                $x++;
                            }


                            if ($this->lastInsertId()) {
                                $_SESSION['msg'] = SUCCESS;
                                unlink($inputFileNmae);
                            }
                        }
                    } else {
                        $_SESSION['msg']  = FILE_SIZE_ERR;
                    }
                } else {
                    $_SESSION['msg'] = ERR_UPLOADS;
                }
            } else {
                $_SESSION['msg']  = FILE_TYPE_ERR;
            }

        }
    }


    public function ordersubByfacldel()
    {
        $sub_id = explode(",", $_GET['sub_id']);
        $op = new khas;
        for($b = 0; $b < count($sub_id) ; $b++){
            $this->query("DELETE FROM subject WHERE sub_id=:sub_id");
            $this->bind(':sub_id' , $op->pro_field($sub_id[$b]));
            $this->execute();
        }
        $_SESSION['msg'] =   SUCCESS;
        header('refresh:0;url=' . ROOT_URL . '/subject/ordersubByfacl?edulev_id='.$_GET['edulev_id'].'&pro_id='.$_GET['pro_id']);
    }
}
