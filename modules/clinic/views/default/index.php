<?php
    $user_id = Yii::$app->user->id;
?>

<div class="clinic-default-index">
    <div class="panel panel-info">
        <div class="panel-heading">Общая информация</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="thumbnail">
                        <img src="/uploads/logo.png" alt="...">
                    </a>
                </div>
                <div class="col-lg-8">
                    <?php if($clinic): ?>
                    <?php else:?>
                        <div class="alert alert-danger">
                            Информация о вашей клинике/сети клиник отсутствует. Пожалуйста заполните!&nbsp;&nbsp;&nbsp;&nbsp;    
                            <button type="button" class="btn btn-danger" onclick="addInfoAboutClinic(<?= $user_id ?>)">Заполнить</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">Адреса клиник и филиалов</div>
        <div class="panel-body">
            <?php if(empty($adresses)):?>
                <p>Не внесены параметры клиник и/или филиалов</p>
            <?php else:?>
                <?= var_dump($adresses) ?>
            <?php endif;?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="conference">
                    <button id="btn_getUserMedia" onclick="getUserMedia_click()">getUserMedia</button>
                    <button id="btn_createOffer" onclick="createOffer_click()">createOffer</button>
                    <button id="btnHangup" onclick="btnHangupClick()">HangUp</button>
                    <br />
                    <video id="localVideo1" autoplay="true"></video>
                    <br>
                    <video id="remoteVideo1" autoplay=true></video>
                    <video id="remoteVideo2" autoplay=true></video>
                    <audio id="localAudio" autoplay="true"></audio>
                </div>
            </div>
        </div>
    </div>
    
</div>
