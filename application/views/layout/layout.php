<?php $this->load->view('layout/header'); ?>

<?php $this->load->view('layout/sidebar'); ?>	

<main>
	<div class="container">
		<?php echo $content; ?>
	</div>
</main>

<?php $this->load->view('layout/footer'); ?>