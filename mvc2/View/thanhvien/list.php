<div class="danhsach">
<style>
.danhsach{
    width: 100%;
    
    margin-top:50px;
}
.danhsach table,th,tr,td{
    width: 100%;
    border: 1px groove;
    border-collapse:collapse;
}
.danhsach h1{
    text-align: left;
    padding-left:30px;
    padding-bottom:20px;
    float:left;
}
.danhsach  button{
    float:right;
    padding-right:30px;
    padding-bottom:20px;
}
</style>
    <h1>Manage</h1>
    <button onclick="document.location='View/thanhvien/add_user.php'">New</button>
    <table border="1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumb</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $value){     
            ?>
            <tr>
                <td width="300"><?php echo $value['id']; ?></td>
                <td><img width="180" height="180" src="<?php echo "uploads/".$value['image']; ?>" /></td>
                <td><?php echo $value['title'];?></td>
                <td><?php echo $value['status'];?></td>
                <td>
                <p><a href="index.php?controller=thanh-vien&action=show&id=<?php echo $value['id'];?>">Show</a>|
                    <a href="index.php?controller=thanh-vien&action=edit&id=<?php echo $value['id'];?>">Edit</a>|
                    <a href="index.php?controller=thanh-vien&action=delete&id=<?php echo $value['id'];?>" title = "Xóa">Delete</a>
                </p>
                </td>
            </tr>
            <?php
                }
            ?>     
        </tbody>
    </table>
</div>