<?php
require_once APP_ROOT . '/Views/layouts/header.php';
require_once APP_ROOT . '/Views/layouts/sidebar.php';
?>
    <div class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Edit</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/update">
                        <div class="form-group">
                            <label for="workName">Work Name</label>
                            <input type="text" value="<?php echo $data['title']; ?>" name="workName" class="form-control" id="workName" placeholder="To do ....">
                        </div>
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" value="<?php echo $data['start']; ?>" name="startDate" class="form-control" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="startDate">End Date</label>
                            <input type="date" value="<?php echo $data['end']; ?>" name="endDate" class="form-control" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="1" <?php echo $data['status']==1 ? 'selected': '' ?> >Planing</option>
                                <option value="2" <?php echo $data['status']==2 ? 'selected': '' ?>>Doing</option>
                                <option value="3" <?php echo $data['status']==3 ? 'selected': '' ?>>Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php
require_once APP_ROOT . '/Views/layouts/footer.php';
?>