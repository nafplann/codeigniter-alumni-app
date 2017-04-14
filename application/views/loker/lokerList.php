<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">Data Lowongan Kerja</span>
          <a href="<?php echo base_url('loker/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table class="bordered highlight">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Perusahaan</th>
                      <th>Contact</th>
                      <th class="center-align">Tgl. Berakhir</th>
                      <th>Posisi</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($loker): ?>
                  <?php $no = $this->uri->segment(3); foreach($loker as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama_perusahaan; ?></td>
                      <td><?php echo $row->contact; ?></td>
                      <td class="center-align"><?php echo $row->tanggal_berakhir; ?></td>
                      <td><?php echo $row->posisi; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('loker/detail/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Detail"><i class="material-icons">list</i></a>
                        <a <?php echo ($this->session->userdata('username') !== $row->username) ? 'disabled' : ''; ?> href="<?php echo base_url('loker/edit/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a <?php echo ($this->session->userdata('username') !== $row->username) ? 'disabled' : ''; ?> href="<?php echo base_url('loker/delete/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data lowongan kerja</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
          <div class="center-align">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
    </div>
</div>