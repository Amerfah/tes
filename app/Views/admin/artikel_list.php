<?= $this->include('partials/head') ?>
<?= $this->include('partials/side_nav') ?>
<h1>Daftar Artikel</h1>
<a href="/artikel/tambah" class="btn btn-primary mb-3">Tambah Artikel</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($artikel as $i => $a): ?>
    <tr>
      <td><?= $i + 1 ?></td>
      <td><?= esc($a['judul']) ?></td>
      <td><?= esc($a['status']) ?></td>
      <td>
        <a href="/artikel/edit/<?= $a['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <button onclick="confirmDelete('/artikel/delete/<?= $a['id'] ?>')" class="btn btn-sm btn-danger">Hapus</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script>
function confirmDelete(url) {
  Swal.fire({
    title: 'Yakin hapus data ini?',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}
</script>
<?= $this->include('partials/footer') ?>