<?php 
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"uploads/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thành viên - Quản lý thành viên</title>
</head>
<body>
<style>
.capnhatthanhvien{
    width:400px;
    border: 1px solid #DDDDDD;
    margin-top: 60px;
    margin:0px auto;
}
.capnhatthanhvien h3{
    padding: 5px;
    text-align: center;
}
.capnhatthanhvien form table tr td{
    padding: 5px;
}
.capnhatthanhvien form table tr td input{
    padding:3px 5px;
}

</style>
    <div class="content">
        <div class="capnhatthanhvien">
            <a href="index.php?controller=thanh-vien&action=list" class="list">Danh sách</a>    
            <h3>Edit</h3>
            <form action="" enctype="multipart/form-data" method="POST">
                <table>
                <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" value="<?php echo $dataID['title']; ?>" placeholder="Title"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="description" value="<?php echo $dataID['description']; ?>" placeholder="description"></td>
                    </tr>
                    <tr>
                        <td>Thumb</td>
                        <td><input type="file"  name="image"  ></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td><img width="180" height="180" src="<?php echo "uploads/".$dataID['image']; ?>" /></td>
                        
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input type="text" name="status" value="<?php echo $dataID['status']; ?>" placeholder="Status"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit"  name="update_user" value="Cập nhật"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>        
</body>
<html>
