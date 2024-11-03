<?php include('inc/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        
        <div class="card">

            <div class="card-header">
                <h4>Edit User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="code.php" method="POST">
                    <?php 
                        $paramRes= CheckParamId('id');
                        if(!is_numeric($paramRes))
                        {
                            echo '<h5>'.$paramRes.'</h5>';
                            return false;
                        }

                        $user= getById('users', CheckParamId('id'));
                        if($user['status'] == 200)
                        {
                            ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>User Name</label>
                                            <input type="text" name="name" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Role</label>
                                            <select name="role" required class="form-select">
                                                <option value="">Select Role</option>
                                                <option value="">Admin</option>
                                                <option value="">User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <br>
                                            <input type="checkbox" name="is_ban" style="width:30px;height:30px">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 text-end">
                                            <br />
                                            <button type="submit" name="user_update" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        else
                        {
                            echo '<h5>'.$user['message'].'</h5>';
                        }
                    ?>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>
