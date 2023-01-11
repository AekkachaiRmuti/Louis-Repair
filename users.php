<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">Chat</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- <link rel="stylesheet" href="style.css"> -->
        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">

                            <div class="card-body">
                                <div class="wrapper">
                                    <section class="users">
                                        <header>
                                            <div class="content">
                                                <?php

                                                $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_unique_id = {$_SESSION['user_unique_id']}");
                                                if (mysqli_num_rows($sql) > 0) {
                                                    $row = mysqli_fetch_assoc($sql);
                                                }
                                                ?>
                                                <img style="width: 50px; height: 50px;" class="img-circle elevation-2" src="<?php echo $row['user_img']; ?>" alt="">
                                                <div class="details">
                                                    <span><?php echo $row['user_name'] . " " . $row['user_user'] ?></span>
                                                    <p style="color:green;"><?php echo $row['user_chat_status']; ?></p>
                                                </div>
                                            </div>
                                            <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
                                        </header>
                                        <div class="search">
                                            <span class="text">ค้นหาสมาชิก</span>
                                            <input type="text" placeholder="Enter name to search..." class="form-control">
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                        </div>
                                        <div class="users-list">

                                        </div>
                                    </section>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">

                            <div class="card-body">
                                <div class="wrapper">
                                    <section class="chat-area">
                                        <?php
                                        if(@$_GET['user_id']){
                                            ?>
                                            <header>
                                           <?php
                                            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                                            $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_unique_id = {$user_id}");
                                            if (mysqli_num_rows($sql) > 0) {
                                               @ $row = mysqli_fetch_assoc($sql);
                                            } else {
                                                header("location: users.php");
                                            }
                                            ?>
                                            <!-- <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> -->
                                            <img src="<?= @$row['user_img'] ?>" alt="">
                                            <div class="details">
                                                <span><?php echo @$row['user_name'] ?></span>
                                                <p><?php echo @$row['user_status']; ?></p> 
                                            </div>
                                        </header>
                                        <?php
                                         
                                        }
                                        ?>
                                        <div class="chat-box">

                                        </div>
                                        <div>

                                        </div>
                                        <form action="#" class="typing-area">
                                            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                                            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                                            <button><i class="fab fa-telegram-plane"></i></button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="javascript/users.js"></script>
                <script src="javascript/chat.js"></script>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->