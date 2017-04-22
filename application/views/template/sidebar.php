<aside>
  <ul id="sidenav" class="side-nav fixed">
    
    <li>
      <div class="userView">
        <div class="background">
          <img src="<?php echo base_url('assets/images/nav6.jpg'); ?>">
        </div>
        <a href="#!user"><img class="circle" src="<?php echo base_url('assets/images/') . $this->session->userdata('avatar'); ; ?>"></a>
        <a href="#!name"><span class="white-text name"><?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></span></a>
        <a href="#!email"><span class="white-text email"><?php echo ucwords(strtolower($this->session->userdata('level'))); ?></span></a>
      </div>
    </li>

    <li>
      <a class="waves-effect" href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">home</i>Dashboard</a>
    </li>

    <li>
      <a class="waves-effect" href="<?php echo base_url('events'); ?>"><i class="material-icons">event</i>Events</a>
    </li>

    <li>
      <a class="waves-effect" href="<?php echo base_url('loker'); ?>"><i class="material-icons">work</i>Lowongan Kerja</a>
    </li>
    
    <li>
      <div class="divider"></div>
    </li>

    <?php if($this->session->userdata('level') === 'administrator'): ?>
      <li>
        <a class="subheader">Admin</a>
      </li>
      
      <li>
        <a class="waves-effect" href="<?php echo base_url('users'); ?>"><i class="material-icons">people</i>Users</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>
    <?php endif; ?>

    <li>
      <a class="waves-effect" href="<?php echo base_url('profile'); ?>"><i class="material-icons">person</i>Profile</a>
    </li>

    <li>
      <a class="waves-effect"  href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons">exit_to_app</i>Logout</a>
    </li>
    
  </ul>
</aside>