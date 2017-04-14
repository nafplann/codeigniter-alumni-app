$(document).ready(function() {
  $('.button-collapse').sideNav();
  
  $('select').material_select();
  
  $('.datepicker').pickadate({
    format: 'dd-mm-yyyy',
  });

  tinymce.init({
    selector: '#deskripsi',
    plugins : 'advlist autolink link lists charmap print preview'
  });
});