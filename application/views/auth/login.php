<!DOCTYPE html>
<html lang="en">
    
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Kcdev Codeigniter</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('assets/materialize/css/materialize.min.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
      body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }

      main {
        flex: 1 0 auto;
      }
      .login-box {
        margin-top: 7%;
      }
    </style>
  </head>

  <body>
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo">Kcdev Codeigniter</a></div>
    </nav>
        
    <main>
      <div class="container login-box">
        <div class="card z-depth-5">
          <div class="card-content">
            <span class="card-title">Login</span>
            <div class="row">
              <form class="col s12" id="login-form" method="post" action="<?php echo base_url('auth/login'); ?>">
                <div class="row">
                  <?php if(validation_errors()): ?>
                  <div class="col s12">
                    <div class="card-panel red">
                      <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                    </div>
                  </div>
                  <?php endif; ?>
                  <div class="input-field col m12">
                    <input id="username" type="text" class="validate" name="username">
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field col m12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password" data-error="Password yang anda masukkan salah">Password</label>
                  </div>
                  <div class="input-field col m12 right-align">
                    <button class="btn waves-effect waves-light btn-login amber" type="submit" name="submit" value="login">
                      Submit <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="page-footer white">
      <div class="footer-copyright  blue darken-3">
        <div class="container center-align">
          Copyright &copy; <a class="white-text text-lighten-3" href="https://www.kcdev.id">Kcdev Interactive Software</a>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url('assets/materialize/js/materialize.js'); ?>"></script>
  </body>
</html>
