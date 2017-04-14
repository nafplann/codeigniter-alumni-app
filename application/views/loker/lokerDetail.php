<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12 m6">
              <input readonly id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?php echo $loker->nama_perusahaan; ?>">
              <label for="nama_perusahaan" class="">Nama Perusahaan</label>
          </div>
          <div class="input-field col s12 m6">
              <input readonly id="contact" name="contact" type="text" value="<?php echo $loker->contact; ?>">
              <label for="contact" class="">Contact Person</label>
          </div>
          <div class="input-field col s12 m6">
              <input readonly id="tanggal_berakhir" name="tanggal_berakhir" type="text" value="<?php echo $loker->tanggal_berakhir; ?>">
              <label for="tanggal_berakhir" class="">Tanggal Berakhir</label>
          </div>
          <div class="input-field col s12 m6">
              <input readonly id="posisi" name="posisi" type="text" value="<?php echo $loker->posisi; ?>">
              <label for="posisi" class="">Posisi</label>
          </div>
          <div class="col s12 m12">
              <label for="deskripsi">Deskripsi</label>
              <?php echo $loker->deskripsi; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>