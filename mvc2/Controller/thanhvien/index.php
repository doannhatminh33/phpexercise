<?php
  
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action ='';
    }
    switch($action){
        case 'show':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable="imagetable";
                $dataID=$db->getDataID($tblTable,$id);
            }
        
        require_once('View/thanhvien/show_user.php');
        break;
        }
        case 'add':{
            
            if(isset($_POST['add_user'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $image = $_POST['image'];
                $status = $_POST['status'];
                if($db->InsertData($title,$description,$image,$status)){
                    header('location: index.php?controller=thanh-vien&action=list');
                }
                else
                {   
                   
                    echo "FAILED!";
                }
            }
            require_once('View/thanhvien/add_user.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable="imagetable";
                $dataID=$db->getDataID($tblTable,$id);

                if(isset($_POST['update_user'])){
                    $title=$_POST['title'];
                    $description = $_POST['description'];
                    $image = $_FILES['image']['name'];
                    $status= $_POST['status'];
                    if($db->UpdateData($id,$title,$description,$image,$status)){
                        header('location: index.php?controller=thanh-vien&action=list');
                    }
                }
                
            }
            require_once('View/thanhvien/edit_user.php');
            break;
        }
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable="thanhvien";

                if($db->Delete($id, $tblTable)){
                    header('location:index.php?controller=thanh-vien&action=list'); 
                }
            }
            else{
                header('location:index.php?controller=thanh-vien&action=list'); 
            }
            //require_once('View/thanhvien/delete_user.php');
            break;
        }
        case 'list':{
            $tblTable ="imagetable";
            $data = $db->getAllData($tblTable);
            require_once('View/thanhvien/list.php');
            break;
        }
        default:{
            require_once('View/thanhvien/list.php');
            break;
        }
    }
?>