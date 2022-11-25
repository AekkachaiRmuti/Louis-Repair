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
                                                    <th>เลขที่แจ้งซ่อม</th>
                                                    <th>วันที่แจ้งซ่อม</th>
                                                    <th>ผู้ดำเนินการ</th>
                                                    <th>ผู้ทำแบบประเมิน</th>
                                                    <th>ผลประเมิน</th>
                                                    <th>ข้อเสนอแนะ</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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