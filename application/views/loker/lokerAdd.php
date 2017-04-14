<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="add-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
              <input id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?php echo set_value('nama_perusahaan'); ?>">
              <label for="nama_perusahaan" class="">Nama Perusahaan</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="contact" name="contact" type="text" value="<?php echo set_value('contact'); ?>">
              <label for="contact" class="">Contact Person</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="tanggal_berakhir" class="datepicker" name="tanggal_berakhir" type="text" value="<?php echo set_value('tanggal_berakhir'); ?>">
              <label for="tanggal_berakhir" class="">Tanggal Berakhir</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="posisi" name="posisi" type="text" value="<?php echo set_value('posisi'); ?>">
              <label for="posisi" class="">Posisi</label>
          </div>
          <div class="col s12 m12">
              <label for="deskripsi">Deskripsi</label>
              <textarea id="deskripsi" name="deskripsi" type="text" value="<?php echo set_value('deskripsi'); ?>"></textarea>
          </div>
          <div class="input-field col s12 right-align">
              <button type="submit" name="submit" value="add_event" class="btn amber waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>