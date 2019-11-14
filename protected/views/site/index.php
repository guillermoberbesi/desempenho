
<div id="content-wrapper">

<div class="container-fluid">

<?php $form=$this->beginWidget('ext.booster.widgets.TbActiveForm', array(
    'id'=>'caousuario-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
  'htmlOptions'=>array(
    'class'=>'row',
  ),
              ));  ?>


  
    <div class="col-xl-4 col-sm-4 mb-4">
      <?php echo $form->textFieldGroup($model,'desde',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200,'data-format'=>'MM-YYYY','data-template'=>'MM-YYYY','id'=>'CAOOS_data_emissao')))); ?>
        </div>

     <div class="col-xl-4 col-sm-4 mb-4">

      <h6>A</h6>
     </div>
     <div class="col-xl-4 col-sm-4 mb-4">
      <?php echo $form->textFieldGroup($model,'hasta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200,'data-format'=>'MM-YYYY','data-template'=>'MM-YYYY','id'=>'CAOOS_data_emissao2')))); ?>
        </div>  

 <div class="col-xl-12 col-sm-12 mb-12">
  <input type="button" class="col-xl-3 col-sm-3 mb-3" onclick="findRelatorio()" value="Relatorio">
  <input type="button" class="col-xl-3 col-sm-3 mb-3" onclick="findGrafico()" value="Grafico">
  <input type="button" class="col-xl-3 col-sm-3 mb-3" onclick="findPizza()" value="Pizza" >
 </div>

 <div class="col-xl-12 col-sm-12 mb-12">
  <label>Consultores</label>
  	<select id='pre-selected-options' multiple='multiple' >
    <?php  foreach ($consultor as $key => $value) {
     
      echo " <option value='".$value->co_sistema."'>".$value->coUsuario->usuario_nombre." ".$value->coUsuario->usuario_apellido."</option>";

    } ?>   
  </select>
   </div>


<div class="row col-xl-12 col-sm-12 mb-12" id="Relatorio">
  </div>

<div class="row col-xl-12 col-sm-12 mb-12" id="Grafico">      
        </div>

  <div class="row col-xl-12 col-sm-12 mb-12" id="Pizza">
             </div>


                 

<?php $this->endWidget(); ?>
   
</div></div>



  <script type="text/javascript">
          jQuery(function($) {
          $('#CAOOS_data_emissao').combodate({maxYear: <?php echo date('Y') ?>,minYear :1900,customClass:'form-control-date',smartDays:true});
          $('#CAOOS_data_emissao2').combodate({maxYear: <?php echo date('Y') ?>,minYear :1900,customClass:'form-control-date',smartDays:true});
          });
          
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
   <script src="js/jquery.multi-select.js"></script>
  
   <script type="text/javascript">$('#pre-selected-options').multiSelect();</script>
 
 <script >
   function findRelatorio(){

   var co_usuarios=$('#pre-selected-options').val();
   var fecha= $('#CAOOS_data_emissao').val();
   var fecha2= $('#CAOOS_data_emissao2').val();

   if(fecha > fecha2){

     alert("fecha inicial debe ser menor que la final ");
     return false;

   }

   if(!co_usuarios || co_usuarios==""){

      alert("Debe seleccionar un consultor");
      $('#Relatorio').html('');
      $('#Grafico').html('');
      $('#Pizza').html('');

   }else{

    $.ajax({ 
      method: "POST", 
      dataType: "html",
      url: "<?php echo CController::createUrl('Relatorio') ?>",

      data: {co_usuarios:co_usuarios,fecha:fecha,fecha2:fecha2}
    })
    .done(function(msg) {
      $('#Relatorio').html(msg);
      $('#Grafico').html('');
      $('#Pizza').html('');
   
});
}
  }


  function findGrafico(){

 var co_usuarios=$('#pre-selected-options').val();
 var fecha= $('#CAOOS_data_emissao').val();
 var fecha2= $('#CAOOS_data_emissao2').val();


   if(fecha > fecha2){

     alert("fecha inicial debe ser menor que la final ");
     return false;

   }

  if(!co_usuarios || co_usuarios==""){

      alert("Debe seleccionar un consultor");
      $('#Relatorio').html('');
      $('#Grafico').html('');
      $('#Pizza').html('');

   }else{

    $.ajax({ 
      method: "POST", 
      dataType: "html",
      url: "<?php echo CController::createUrl('Grafico') ?>",

      data: {co_usuarios:co_usuarios,fecha:fecha,fecha2:fecha2}
    })
    .done(function(msg) {
      $('#Relatorio').html('');
      $('#Grafico').html(msg);
      $('#Pizza').html('');
   
});
}
  }

   function findPizza(){



 var co_usuarios=$('#pre-selected-options').val();
 var fecha= $('#CAOOS_data_emissao').val();
   var fecha2= $('#CAOOS_data_emissao2').val();

   if(fecha > fecha2){

     alert("fecha inicial debe ser menor que la final ");
     return false;

   }

  if(!co_usuarios || co_usuarios==""){

      alert("Debe seleccionar un consultor");
      $('#Relatorio').html('');
      $('#Grafico').html('');
      $('#Pizza').html('');

   }else{

    $.ajax({ 
      method: "POST", 
      dataType: "html",
      url: "<?php echo CController::createUrl('Pizza') ?>",

      data: {co_usuarios:co_usuarios,fecha:fecha,fecha2:fecha2}
    })
    .done(function(msg) {
      $('#Relatorio').html('');
      $('#Grafico').html('');
      $('#Pizza').html(msg);
  
});
}
  }


 </script>

  
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="vendor/chart.js/Chart.min.js"></script>

  


 





  
