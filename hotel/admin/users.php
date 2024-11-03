<?php include('inc/header.php'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h4>Users List
                    <a href="user-add.php" class="btn btn-primary float-end">Add User</a>
                </h4>
            </div>

            <div class="card-body">
                <?php alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Banned?</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $users= get_all_rec('users');
                            if(mysqli_num_rows($users) > 0)
                            {
                                foreach($users as $userItem)
                                {
                                    ?>
                                        <tr>
                                            <td><?=$userItem['id']; ?></td>
                                            <td><?=$userItem['name']; ?></td>
                                            <td><?=$userItem['email']; ?></td>
                                            <td><?=$userItem['phone']; ?></td>
                                            <td><?=$userItem['user_state'] == 1 ? 'Banned':'Active'; ?></td>
                                            <td><?=$userItem['user_role']; ?></td>
                                            <td>
                                                <a href="user-edit.php?id=<?=$userItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="user-delete.php" class="btn btn-danger btn-sm mx-2">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="7">No Records Founded!</td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>
