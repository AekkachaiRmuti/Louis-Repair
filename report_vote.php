<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ประเมินความพึงพอใจ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">ประเมินความพึงพอใจ</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <table class="table-striped table-bordered detail-view" id="example"" style=" width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">เลขที่แจ้งซ่อม</th>
                                                    <th style="text-align: center;">วันที่แจ้งซ่อม</th>
                                                    <th style="text-align: center;">ผู้ดำเนินการ</th>
                                                    <th style="text-align: center;">ผู้ทำแบบประเมิน</th>
                                                    <th style="text-align: center;">ผลประเมิน</th>
                                                    <th style="text-align: center;">ข้อเสนอแนะ</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_vote = "SELECT *, sum(if(uv_vote = 5,uv_vote*5,''))  + sum(if(uv_vote = 4,uv_vote*4,'')) + sum(if(uv_vote = 3,uv_vote*3,''))+ sum(if(uv_vote = 2,uv_vote*2,''))+ sum(if(uv_vote = 1,uv_vote*1,'')) as q1  FROM `tbl_user_vote`
                                                LEFT OUTER JOIN tbl_repair on tbl_repair.rp_job = tbl_user_vote.uv_key
                                                GROUP BY uv_key;";
                                                $qr_vote = mysqli_query($conn, $sql_vote);

                                                while($rs_vote = mysqli_fetch_assoc($qr_vote)){
                                                  
                                                ?>
                                                <tr>
                                                    <td><a href="index.php?page=view_vote&vote_key=<?= $rs_vote['rp_job'] ?>"><?= $rs_vote['rp_job'] ;?></a></td>
                                                    <td><?= $rs_vote['rp_date_repair'] ;?></td>
                                                    <td><?= $rs_vote['rp_user_accept'] ;?></td>
                                                    <td><a href="index.php?page=view_vote&vote_key=<?= $rs_vote['rp_job'] ?>"><?= $rs_vote['uv_name'] ;?></a></td>
                                                    <td style="text-align: center;"> <?= number_format($rs_vote['q1']/5,2)/10 ;?></td>
                                                    <td><?= $rs_vote['uv_offer'] ;?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <hr>
                                   

                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'excel', 'print'
            ]
        });
    });
</script>

<!-- Modal -->