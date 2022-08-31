
<?php

use yii\bootstrap4\Html;

\app\assets\LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <?php $this->head() ?>
    <meta charset="UTF-8">

    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
<?php $this->beginBody() ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
<!--            <form class="login100-form validate-form">-->
<!--					<span class="login100-form-title p-b-43">-->
<!--						Login to continue-->
<!--					</span>-->
            <?php $form = \yii\bootstrap4\ActiveForm::begin([
                    'id' => 'login-form',
                'options' => [
                    'class' => 'login100-form validate-form'
                ]
            ]) ?>

                <div class="wrap-input100" >
<!--                    <input class="input100" type="text" name="email">-->
                    <?= $form->field($model, 'username', ['options' => ['class' => 'custom_class_div']])->textInput(['class' => 'input100'])->label(false) ?>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
<!--                    <input class="input100" type="password" name="pass">-->
                    <?= $form->field($model, 'password', ['options' => ['class' => 'custom_class_div']])->passwordInput(['class' => 'input100'])->label(false) ?>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
<!--                    <button class="login100-form-btn">-->
<!--                        Login-->
<!--                    </button>-->
                    <?= Html::submitButton('Sign In', ['class' => 'login100-form-btn']) ?>
                </div>

                <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
<!--            </form>-->
                <?php \yii\bootstrap4\ActiveForm::end(); ?>
            <?php
           $image = Yii::$app->urlManager->createAbsoluteUrl('images/login_page.jpg');
            ?>
            <div class="login100-more" style="background-image: url(<?= $image ?>);">
            </div>
        </div>
    </div>
</div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
