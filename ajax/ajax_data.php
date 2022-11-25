<?php
include '../config/connect_db.php';

if ($_GET['brn']) {
?>
   <select name="dept" id="dept" class="form-control" onchange="get_dept()" required>
        <option value="">-Select-</option>
        <?php
        $sql_dept = "SELECT * FROM `tbl_department` WHERE dept_brance = '{$_GET['brn']}'";
        $qr_dept = mysqli_query($conn, $sql_dept);
        while ($rs_dept = mysqli_fetch_array($qr_dept)) {
        ?>
            <option value="<?= $rs_dept["dept_id"] ?>"><?= $rs_dept["dept_name"] ?></option>

        <?php
        }
        ?>

    </select>
<?php
}

if($_GET['dept']){
    ?>
    <select name="pst" id="pst" class="form-control"  required>
    <option value="">-Select-</option>
    <?php
    $sql_pst = "SELECT * FROM `tbl_position` WHERE pst_department ='{$_GET['dept']}'";
    $qr_pst = mysqli_query($conn, $sql_pst);
    while ($rs_pst = mysqli_fetch_array($qr_pst)) {
    ?>
        <option value="<?= $rs_pst["pst_id"] ?>"><?= $rs_pst["pst_name"] ?></option>
    <?php
    }
    ?>
</select>
<?php
}
?>