<!-- load all modules css -->
<?= $this->include('admin/components/head') ?>

<!-- load navbar -->
<?= $this->include('admin/components/navbar') ?>

<!-- content -->

  <div class="container">
    <br/>
    <h2>CI4 Datatables Server-Side</h2>
    <br/>
    <table class="table table-striped" id="list-user-ajax">
      <thead>
        <tr class="overflow-hidden">
         <!--  <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Level Id</th>
          <th>Level User</th> -->

          <th>Nama</th>
          <th>Email</th>
          <th>Level</th>
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
        ajax: 'ajax-load-data',
        columns: [
            {data: 'username'},
            {data: 'email'},
            {data: 'name_level_user'}
        ]
    });
});
  </script>