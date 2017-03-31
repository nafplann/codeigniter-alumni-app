<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">Data Users</span>
          <a href="<?php echo base_url('users/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
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
                      <th>Username</th>
                      <th>Level</th>
                      <th class="center-align">Active</th>
                      <th class="center-align">Last Login</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($users): ?>
                  <?php $no = 0; foreach($users as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td><?php echo $row->level; ?></td>
                      <td class="center-align"><?php echo $row->active; ?></td>
                      <td class="center-align"><?php echo $row->last_login; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('users/edit/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('users/delete/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="6">Belum ada data user</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>