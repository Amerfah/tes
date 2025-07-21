<?= $this->include('partials/head') ?>
<?= $this->include('partials/side_nav') ?>
<h1>Feedback Pengguna</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Pesan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($feedback as $i => $f): ?>
    <tr>
      <td><?= $i + 1 ?></td>
      <td><?= esc($f['nama']) ?></td>
      <td><?= esc($f['email']) ?></td>
      <td><?= esc($f['pesan']) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->include('partials/footer') ?>
