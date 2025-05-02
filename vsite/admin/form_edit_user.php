<?php
include "header.php";
include "sidebar.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Add New Author</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Author info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="edit.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <?php $getUserById = $thanhvien->getUserById($id);
                            foreach($getUserById as $value):?>
                            <input type="hidden" name="user-id" value="<?php echo $value['id']?>">
                            <div class="control-group">
                                <label class="control-label">Username </label>
                                <div class="controls">
                                    <input type="text" class="span11" value="<?php echo $value['username']?>" name="title" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password </label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $pass = password_hash($value['password'],PASSWORD_DEFAULT) ?>" class="span11" name="title" /> *
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                            <?php endforeach;?>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>