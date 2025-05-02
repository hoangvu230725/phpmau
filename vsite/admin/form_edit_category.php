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
        <h1>Add New Category</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Category info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->

                        <form action="edit.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <?php $getCateByID = $category->getCateById($id);
                            foreach ($getCateByID as $vl):
                            ?>
                                <div class="control-group">
                                    <label class="control-label">Name </label>
                                    <div class="controls">
                                        <input type="hidden" name="cate-id" value="<?php echo $vl['id']?>">
                                        <input type="text" class="span11" value="<?php echo $vl['name'] ?>" name="name" /> *
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            <?php endforeach; ?>
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