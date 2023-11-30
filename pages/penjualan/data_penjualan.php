<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA PENJUALAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA PENJUALAN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
          </div>
          <div class="box-body table-responsive">
            <table id="penjualan" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>KASIR</th>
                  <th>TOTAL</th>
                  <th>TANGGAL</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../toko_buku/conf/conn.php";
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT penjualan.*, kasir.* FROM penjualan
                INNER JOIN kasir ON penjualan.id_kasir = kasir.id_kasir order by penjualan.id_penjualan DESc")
                  or die(mysqli_error($koneksi));
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#penjualan').DataTable();
  });

  function hapusPenjualan(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "pages/penjualan/hapus_penjualan.php?id=" + id;
    }
  }
</script>