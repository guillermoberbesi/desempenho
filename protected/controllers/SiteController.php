<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model=new CAOOS;


		$consultor=PERMISSAOSISTEMA::model()->findAll('co_tipo_usuario=:id AND in_ativo=:in ',array('id'=>1,'in'=>'S'));

		
		$this->render('index',array('consultor'=>$consultor,'model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

public function actionRelatorio() {
	
	$co_usuarios=$_POST['co_usuarios'];
	$fecha=date("Y-m-d",strtotime("01-".$_POST['fecha']));   
	$fecha2=date("Y-m-d",strtotime("01-".$_POST['fecha2']));   


foreach ($co_usuarios as $key => $value) {
	if($key==0){ $html='';}else{$html.='';}

	$consultor2=CAOFATURA::model()->find('co_sistema ='.$co_usuarios[$key].'');
	if($consultor2){
	$sql='SELECT EXTRACT(MONTH FROM data_emissao) AS "mes",EXTRACT(YEAR FROM data_emissao) as "ano" , (SUM(valor)-(SUM(valor) * total_imp_inc) ) as "suma"
				FROM cao_os
				WHERE co_os IN(SELECT co_os FROM cao_fatura WHERE co_sistema ='.$co_usuarios[$key].') and data_emissao BETWEEN \''.$fecha.'\' AND \''.$fecha2.'\'
				GROUP BY 
						  EXTRACT(YEAR FROM data_emissao), 
			              EXTRACT(MONTH FROM data_emissao),
						  total_imp_inc';

				    $command = Yii::app()->db->createCommand($sql);
				    $dataModel = $command->queryAll();

	

		$html.='<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Dato del Consultor</div>
          <div class="card-body">
            <div class="table-responsive">
            <p>
         '.$consultor2->coSistema->coUsuario->usuario_nombre.' '.$consultor2->coSistema->coUsuario->usuario_apellido.'
        </p>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Periodo</th>
                    <th>Receita Liquida</th>
                    <th>Costo Fixo</th>
                    <th>Comissao</th>
                    <th>lucro</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Periodo</th>
                    <th>Receita Liquida</th>
                    <th>Costo Fixo</th>
                    <th>Comissao</th>
                    <th>lucro</th>
                  </tr>
                </tfoot>';
                
		foreach ($dataModel as $key => $value2) {
			
			$comision= $consultor2->commissao_cn * (int)$value2['suma'];
			$beneficio=(int)$value2['suma']-($consultor2->coSistema->cAOSALARIOs[0]->brut_salario + $comision);

              $html.='<tbody>
              		<tr>
                    <td>'.$value2['mes'].'/'.$value2['ano'].'</td>
                    <td>'.$value2['suma'].'</td>
                    <td>'.$consultor2->coSistema->cAOSALARIOs[0]->brut_salario.'</td>
                    <td>'.$comision.'</td>
                    <td>'.$beneficio.'</td>
                  </tr>
                </tbody>';
						}

              $html.='
		               </table>
            </div>
          </div>
        </div> ';
							} }
	echo $html; 
}

public function actionGrafico() {

	$co_usuarios=implode(",", $_POST['co_usuarios']);
	$fecha=date("Y-m-d",strtotime("01-".$_POST['fecha']));   
	$fecha2=date("Y-m-d",strtotime("01-".$_POST['fecha2'])); 

	$consultor2=PERMISSAOSISTEMA::model()->findAll('co_sistema IN('.$co_usuarios.')');


	$salarios=0;
	foreach ($consultor2 as $key => $value) {
		if($consultor2[$key]->cAOSALARIOs){
		$salarios=$salarios+$consultor2[$key]->cAOSALARIOs[0]->brut_salario;
		}
	}

	$html='<div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Costo Fijo Promedio</div>
              <div class="card-body">
                <canvas id="myBarChart2" width="100%" height="50"></canvas>
              </div>
             
            </div>
          </div>
          <script >

// Bar Chart Example
var ctx = document.getElementById("myBarChart2");
var myLineChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Costo Fijo Promedio"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: ['.$salarios.'],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: "month"
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

  </script>';

		$sql='SELECT (SUM(valor)-(SUM(valor) * total_imp_inc) )  as "ganancias"
				FROM cao_os
				WHERE co_os IN(SELECT co_os FROM cao_fatura WHERE co_sistema IN ('.$co_usuarios.')) and data_emissao BETWEEN \''.$fecha.'\' AND \''.$fecha2.'\'
				GROUP BY total_imp_inc 
				';

				    $command = Yii::app()->db->createCommand($sql);
				    $dataModel = $command->queryAll();
 		$ganancias=(int)$dataModel[0]['ganancias'];

	   $html.='<div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Ganancias</div>
              <div class="card-body">
                <canvas id="myBarChart3" width="100%" height="50"></canvas>
              </div>
             
            </div>
          </div>
          <script >

// Bar Chart Example
var ctx = document.getElementById("myBarChart3");
var myLineChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Ganancias"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: ['.$ganancias.'],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: "month"
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 150000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

  </script>';



	echo $html; 
}

public function actionPizza() {

			$co_usuarios=$_POST['co_usuarios'];
			$fecha=date("Y-m-d",strtotime("01-".$_POST['fecha']));   
	       $fecha2=date("Y-m-d",strtotime("01-".$_POST['fecha2']));
			$nombres="";
			$ganancias="";
			$gananciastotal=0;
		foreach ($co_usuarios as $key => $value) {

				$co=(int)$co_usuarios[$key];

				$consultor2=CAOFATURA::model()->find('co_sistema ='.$co.'');
				
				if($consultor2){

				$sql='SELECT  (SUM(valor)-(SUM(valor) * total_imp_inc) ) as "suma"
							FROM cao_os
							WHERE co_os IN(SELECT co_os FROM cao_fatura WHERE co_sistema ='.$co.') and data_emissao BETWEEN \''.$fecha.'\' AND \''.$fecha2.'\'
							GROUP BY total_imp_inc
							';

							    $command = Yii::app()->db->createCommand($sql);
							    $dataModel = $command->queryAll();

						 if($nombres==""){
					       $nombres='["'.$consultor2->coSistema->coUsuario->usuario_nombre.'"';
					}else{
						$nombres=$nombres.',"'.$consultor2->coSistema->coUsuario->usuario_nombre.'"';
					}

					if($ganancias==""){
						$ganancias=$dataModel[0]['suma'];
					}else{
						$ganancias=$ganancias.','.$dataModel[0]['suma'];
					}
					
					$gananciastotal=$gananciastotal+(int)$dataModel[0]['suma'];

					}
					
				}
			$nombres=$nombres.',"total"]';
			$ganancias=$ganancias.','.$gananciastotal;

		$html=' <div class="col-lg-7">
		            <div class="card mb-3">
		              <div class="card-header">
		                <i class="fas fa-chart-pie"></i>
		                Pie Chart Example</div>
		              <div class="card-body">
		                <canvas id="myPieChart" width="100%" height="100"></canvas>
		              </div>
		              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		            </div>
		          </div>

		            <script >
					 var ctx = document.getElementById("myPieChart");
					var myPieChart = new Chart(ctx, {
					  type: "pie",
					  data: {
					    labels: '.$nombres.',
					    datasets: [{
					      data: ['.$ganancias.'],
					      backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745","#007bff", "#dc3545", "#ffc107", "#28a745"],
					    }],
					  },
				});
		  </script>

		          ';
		
		echo $html; 


}

}



