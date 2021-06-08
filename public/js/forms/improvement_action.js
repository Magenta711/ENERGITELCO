$(function () {
    $('.textarea').wysihtml5()
  })

  $(document).ready(function() {
      let users = $('.user_id');
      for (let i = 0; i < users.length; i++) {
          select(users[i].id);
      }
      incre=0;
      $(".bnt-clone-action").click(function() {
          incre++;
          type = this.id.split('_')[0];
          newELement = $('#origer_action').clone().appendTo('#destino_action');
          newELement.attr('id','div_'+type+'_'+incre);
          newELement.children('.col-sm-4').children('.form-group').children('.action_user_id').attr('id','user_id_'+incre).val('');
          newELement.children('.col-sm-12').children('.form-group').children('.homework').attr('id','homework_'+incre).val('');
          newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.start_date').attr('id','start_date_'+incre).val('');
          newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.end_date').attr('id','end_date_'+incre).val('');
          newELement.children('.col-sm-1').children('.remove').attr('id',type+'_remove_'+incre).click(function () {
              remove(this.id);
          });
      });
      $(".bnt-clone-tracing").click(function() {
          incre++;
          type = this.id.split('_')[0];
          newELement = $('#origer_tracing').clone().appendTo('#destino_tracing');
          newELement.attr('id','div_'+type+'_'+incre);
          newELement.children('.col-sm-4').children('.form-group').children('.user_id').attr('id','user_id_'+incre).val('');
          newELement.children('.col-sm-12').children('.form-group').children('.action').attr('id','action_'+incre).val('');
          newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.start_date').attr('id','start_date_'+incre).val('');
          newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.end_date').attr('id','end_date_'+incre).val('');
          newELement.children('.col-sm-1').children('.remove').attr('id',type+'_remove_'+incre).click(function () {
              remove(this.id);
          });
      });
      
      $('.user_id').change(function () {
          select(this.id);
      });
  });
  
  function remove(id) {
      idU = id.split('_')[id.split('_').length - 1];
      type = id.split('_')[0];
      console.log('type-->',type);
      if (idU != 0) {
          $('#div_'+type+'_'+idU).remove();
      }
  }
  
  function select(id) {
      idU = id.split('_')[id.split('_').length - 1];
      type = id.split('_')[0];
      idUGet = $('#'+type+'_id_'+idU).val();
      $('#'+type+'_name_'+idU).val($('#name_user_'+idUGet).val());
      $('#'+type+'_position_'+idU).val($('#position_user_'+idUGet).val());
  }