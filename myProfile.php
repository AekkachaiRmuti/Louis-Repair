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

                                                <input type="text" name="full_name" value="<?= $_SESSION['user_name'] ?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="problem" class="control-label">User Name</label>
                                                <input type="text" class="form-control" value="<?= $_SESSION['user_user'] ?>" name="user_name">
                                            </div>
                                        </div>



                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="problem_work" class="control-label">Old Password</label>
                                                <div id="ck" class="m-2"></div>
                                                <input type="password" id="Old_pass" class="form-control" onkeyup="Oldpass(<?= $_SESSION['user_id'] ?>)" name="oldpass"></textarea>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="problem_work" class="control-label">New Password</label>
                                                <input type="password" id="" class="form-control" name="newpass"></textarea>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Branch</label>
                                                <input type="text" value="<?= $_SESSION['brn_name'] ?>" class="form-control" name="brn" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Department</label>
                                                <input type="text" value="<?= $_SESSION['dept_name'] ?>" class="form-control" name="dept" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">Position</label>
                                                <input type="text" class="form-control" value="<?= $_SESSION['pst_name'] ?>" name="position" id="fileupload" disabled>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-gruop">
                                                <br>
                                                <!-- <button type="submit" class="btn btn-primary" id="" name="btn_ok">Update</button> -->
                                                <div id="btn-ok"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php

                                    if (isset($_POST['btn_ok'])) {
                                        $profile = "UPDATE tbl_user SET user_name = '{$_POST['full_name']}', user_user = '{$_POST['user_name']}', user_pw = '{$_POST['newpass']}' WHERE user_id = {$_SESSION['user_id']}";
                                        $qr_profile = mysqli_query($conn, $profile);
                                        if($qr_profile){
                                            echo "<script>swal('Updated Successfully', 'You clicked the button!', 'success');</script>";
                                        }
                                        // echo "sdvsdsd";
                                    }

                                    ?>
                                    <script>
                                        function Oldpass(id_user) {
                                            let oldpass = document.getElementById("Old_pass").value;


                                            $.ajax({
                                                url: 'ajax/ck_pass.php?pass=' + oldpass + '&id=' + id_user,
                                                type: 'get',
                                                success: function(result) {
                                                    if(result == 1){
                                                        $('#ck').html("<a class='text-success'>***password is correct (รหัสผ่านถูกต้อง)</a>");
                                                        $('#btn-ok').html('<button type="submit" class="btn btn-primary" id="" name="btn_ok">Update</button>');
                                                    }else{
                                                        $('#ck').html("<a class='text-danger'>***password is incorrect (รหัสผ่านไม่ถูกต้อง)</a>");
                                                    }

                                                }
                                            });
                                        }
                                    </script>
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