<style>
    .ala {
        margin: 200px;
        top: -170px;
    }
</style>
<?php
include './config/connect_db.php';
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="index.php?page=MyProfile">My Profile</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container col-6">
            <div class="container-fluid">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <h3>Profile</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="">
                                        <div class="">
                                            <div class="form-gruop">

                                                <label for="" class="control-label">Full Name</label>

                                                <input type="text" name="full_name" value="<?= $_SESSION['user_name']?>" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="problem" class="control-label">User Name</label>
                                                <input type="text" class="form-control" value="<?= $_SESSION['user_user']?>" name="user_name">
                                            </div>
                                        </div>

                                       

                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="problem_work" class="control-label">Password</label>
                                                <input type="text" id="" class="form-control" name="pass"></textarea>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Branch</label>
                                                <input type="text" value="<?= $_SESSION['brn_name']?>" class="form-control" name="brn" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Department</label>
                                                <input type="text" value="<?= $_SESSION['dept_name']?>"class="form-control" name="dept" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Position</label>
                                                <input type="text" class="form-control" value="<?= $_SESSION['pst_name']?>" name="position" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <br>
                                                <button type="submit" class="btn btn-primary" id="btn_ok" name="btn_ok">Save</button>
                                            </div>

                                        </div>
                                    </div>
                                    <?php

                                    if (isset($_POST['btn_ok'])) {
                                       
                                    }

                                    ?>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>



<!-- Modal -->