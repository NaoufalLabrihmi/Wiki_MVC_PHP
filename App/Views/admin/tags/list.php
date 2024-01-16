<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tags</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger" id="tags-list">
                    <div class="box-header with-border">
                        <h3 class="box-title">Manage Your Tags</h3>
                        <button class="btn btn-danger pull-right open-popup" type="button" data-target="http://localhost/Naoufal_Labrihmi_Wiki/admin/tags/add" data-modal-target="#add-tag" class="btn btn-primary open-popup">Add New Tag</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="results"></div>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Tag Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($tags as $tag) { ?>
                                <tr>
                                    <td><?php echo $tag->id; ?></td>
                                    <td><?php echo $tag->name; ?></td>
                                    <td><?php echo ucfirst($tag->status); ?></td>
                                    <td>
                                        <button type="button" data-target="<?php echo url('admin/tags/edit/' . $tag->id) ?>" data-modal-target="#edit-tag-<?php echo $tag->id; ?>" class="btn btn-primary open-popup">
                                            Edit
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                        <button data-target="<?php echo url('admin/tags/delete/' . $tag->id) ?>" class="btn btn-danger delete">
                                            Delete
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <!-- Pagination, if needed -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    <div class="modal fade" id="add-tags-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo $action; ?>" class="form-modal form">
                    <div id="form-results"></div>
                    <div class="form-group col-sm-6">
                        <label for="tag-name">Tag name</label>
                        <input type="text" class="form-control" name="name" id="tag-name" value="<?php echo $name; ?>" placeholder="Tag Name">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="enabled">Enabled</option>
                            <option value="disabled" <?php echo $status == 'disabled' ? 'selected' : false; ?>>Disabled</option>
                        </select>
                    </div>
                    <button class="btn btn-info submit-btn">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->
