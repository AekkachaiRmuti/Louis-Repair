<style>
    .chartone {
        align-content: center;
    }
</style>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ค่าใช้จ่าย</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">ค่าใช้จ่าย</a></li>

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
                            <div class="card-header">
                                <b>สรุปค่าใช้จ่ายแยกตามแผนก/หน่วยงาน</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">วันที่เริ่มต้น</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">ถึง</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br><button name="" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-gl-12">
                                        <table class="table" id="example" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>สาขาหน่วยงาน</th>
                                                    <th>หน่วยงาน/แผนก</th>
                                                    <th>ค่าซ่อม</th>
                                                    <th>ค่าอะไหล่</th>
                                                    <th>ค่าอุปกรณ์</th>
                                                    <th>VAT 7%</th>
                                                    <th>รวมค่าใช้จ่าย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>สาทร</td>
                                                    <td>ACC</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <b>สรุปค่าใช้จ่ายแยกตามประเภทงานซ่อม</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">วันที่เริ่มต้น</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">ถึง</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br><button name="" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-gl-12">
                                        <table class="table" id="example1" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ประเภทงานซ่อม</th>
                                                    <th>ค่าซ่อม</th>
                                                    <th>ค่าอะไหล่</th>
                                                    <th>ค่าอุปกรณ์</th>
                                                    <th>VAT 7%</th>
                                                    <th>รวมค่าใช้จ่าย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>โปรแกรม</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    <td>000</td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>

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
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'excel', 'print'
            ]
        });
    });
  
</script>
<!-- Modal -->