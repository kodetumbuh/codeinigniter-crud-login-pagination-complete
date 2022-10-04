<!-- load all modules css -->
<?= $this->include('admin/components/head') ?>

<!-- load navbar -->
<?= $this->include('admin/components/navbar') ?>

<!-- content -->

<div class="container">
  <div class="d-flex justify-content-between my-3">
   <h2><i class="fas fa-book"></i> CI4 Datatables Crud Lengkap</h2>
 </div>
 <a class="btn btn-success btn-sm my-3" href="/admin/create-user" role="button">Tambah Data</a>

 <table class="table table-striped" id="list-user-ajax">
  <thead>
    <tr class="overflow-hidden">
      <th>Nama</th>
      <th>Email</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>


<!-- load end body -->
<?= $this->include('admin/components/body') ?>

<script>
// test terbaru
$(document).ready(function() {
  $('#list-user-ajax').DataTable({
    processing: true,
    serverSide: true,
    order: [],
    ajax: 'ajax-load-data',
    columns: [
    {data: 'username'},
    {data: 'email'},
    {data: 'name_level_user'},
    {data: 'id_number', orderable: false},
    ]
  });
});
</script>
</script>