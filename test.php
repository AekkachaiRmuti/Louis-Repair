<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Database Info</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">Database Info</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-6">

                            <div class="card-body">
                                <?php
                                $user = "root";
                                $password = "";
                                $host = "localhost";
                                $db_name = 'louis_repair';

                                $connection = mysqli_connect($host, $user, $password, $db_name);

                                $field = $_GET['field'];
                                @$show = mysqli_query($connection, "SHOW COLUMNS FROM tbl_user");

                                if (mysqli_num_rows($show) > 0) {
                                    while ($row = mysqli_fetch_assoc($show)) {
 print_r($row);
                                        echo "<br>";
                                        foreach($row as $value[0]){
                                            echo $value[0];
                                            echo "<br>";
                                        }
                                       
                                    }
                                }
                                ?>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->