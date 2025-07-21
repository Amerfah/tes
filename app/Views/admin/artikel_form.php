<?= $this->include('partials/head') ?>
<?= $this->include('partials/side_nav') ?>
<h1><?= isset($artikel) ? 'Edit' : 'Tambah' ?> Artikel</h1>
<form method="post" action="<?= isset($artikel) ? '/artikel/update/' . $artikel['id'] : '/artikel/simpan' ?>">
  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" value="<?= old('judul', $artikel['judul'] ?? '') ?>" class="form-control">
    <?php if (session('errors.judul')): ?><small class="text-danger"><?= session('errors.judul') ?></small><?php endif; ?>
  </div>
  <div class="mb-3">
    <label>Isi</label>
    <textarea name="isi" class="form-control"><?= old('isi', $artikel['isi'] ?? '') ?></textarea>
  </div>
  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
      <option value="draft" <?= old('status', $artikel['status'] ?? '') == 'draft' ? 'selected' : '' ?>>Draft</option>
      <option value="publish" <?= old('status', $artikel['status'] ?? '') == 'publish' ? 'selected' : '' ?>>Publish</option>
    </select>
    <?php if (session('errors.status')): ?><small class="text-danger"><?= session('errors.status') ?></small><?php endif; ?>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?= $this->include('partials/footer') ?>