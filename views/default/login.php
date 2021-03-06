<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var auth\models\LoginForm $model
 */
$this->title = \Yii::t('core.user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Login wrapper -->
<div class="login-wrapper">
<?php
	$flashes = Yii::$app->getSession()->getAllFlashes();
	if(count($flashes)) {
		foreach($flashes as $type => $message) {
			echo '<div class="bg-'.$type.' has-padding widget-inner">'.$message.'</div>';
		}
		Yii::$app->getSession()->removeAllFlashes();
	}
?>
	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'options' => [
			'role' => 'form',
			'class' => 'small-form',
		],
        'enableClientValidation' => false,
        'validateOnSubmit' => false,
        'validateOnChange' => false,		
		'fieldConfig' => [
			'template' => "{input}{hint}{error}",
		],
	]); ?>
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="fa fa-user"></i> User login</h6></div>
            <div class="panel-body">
				<?= $form->field($model, 'email', ['template' => '<div class="form-group has-feedback">{label}{input}{hint}{error}<i class="fa fa-user form-control-feedback"></i></div>'])->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

				<?= $form->field($model, 'password', ['template' => '<div class="form-group has-feedback">{label}{input}{hint}{error}<i class="fa fa-lock form-control-feedback"></i></div>'])->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

				<?php if ($model->scenario == 'withCaptcha'): ?>
					<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction' => 'default/captcha', 'options' => ['class' => 'form-control'],]) ?>
				<?php endif; ?>
				<div class="row form-actions">
					<div class="col-xs-6">
						<?= $form->field($model, 'rememberMe')->checkbox(['class' => 'styled']) ?>
					</div>
					<div class="col-xs-6">
						<?= Html::submitButton(\Yii::t('core.user', '<i class="fa fa-bars"></i> Login'), ['class' => 'btn btn-success pull-right']) ?>
					</div>
				</div>

				<div class="form-group">
					<div class="text-center">
						<?= Html::a(\Yii::t('core.user', 'Forgot Password'), ['request-password-reset'], ['class' => 'btn btn-default btn-lg btn-block']) ?>
					</div>
				</div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>  
<!-- /login wrapper -->  


<div class="site-login center-block col-lg-3 col-md-4 col-sm-6" style="float:none;">


</div>
