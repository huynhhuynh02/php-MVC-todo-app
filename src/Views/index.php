<?php
require_once APP_ROOT . '/Views/layouts/header.php';
require_once APP_ROOT . '/Views/layouts/sidebar.php';
$page = 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

?>
    <div class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5>Todo list</h5>
                                <a class="btn btn-primary" href="/add" >Add ToDo</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Work Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    if(count($data['todoList'])>0){
                                        foreach($data['todoList'] as $todo){
                                        $i++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $todo['title']; ?></td>
                                            <td><?php echo $todo['start']; ?></td>
                                            <td><?php echo $todo['end']; ?></td>
                                            <td><?php 
                                                if($todo['status']==1){
                                                    echo 'Planning';
                                                }
                                                else if($todo['status']==2){
                                                    echo 'Doing';
                                                }else{
                                                    echo 'Complete';
                                                }
                                            ?></td>
                                            <td>
                                                <a href="/update/<?php echo $todo['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></i></a>
                                                <a href="/delete/<?php echo $todo['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                <?php }
                                    }else{ ?>
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </td>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item <?php echo $data['current']>1 ? '':'disabled'?>">
                                        <a class="page-link" href="?page=<?php echo $data['current']-1; ?>" tabindex="-1">Previous</a>
                                    </li>
                                    <?php
                                        for($i=1;$i <= $data['pages']; $i++){
                                            if($i == $data['current']){ ?>
                                                <li class="page-item active" aria-current="page">
                                                    <span class="page-link">
                                                        <?php echo $i; ?>
                                                        <span class="sr-only">(current)</span>
                                                    </span>
                                                </li>
                                           <?php }else{ ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>">
                                                    <?php echo $i; ?></a>
                                                </li>
                                            <?php }
                                        }
                                    ?>
                                    
                                    <li class="page-item <?php echo $data['current'] == $data['pages'] ? 'disabled':''?>">
                                        <a class="page-link" href="?page=<?php echo $data['current']+1; ?>" tabindex="-1">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
require_once APP_ROOT . '/Views/layouts/footer.php';
?>