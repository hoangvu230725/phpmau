<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Add New Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Product info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="additem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Name </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" /> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Price</label>
                                <div class="controls">
                                    <textarea class="span11" name="price"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Content</label>
                                <div class="controls">
                                    <textarea class="span11" name="content"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose
                                    an image</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose a
                                    category</label>
                                <div class="controls">
                                    <select name="cate" id="cate">
                                        <?php foreach($getAllCates as $value): ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endforeach ?>
                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Featured
                                </label>
                                <div class="controls">
                                    <select name="featured" id="featured">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select> *
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" >Add</button>
                            </div>
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