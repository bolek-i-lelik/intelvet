<?php

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
                            <button type="button" class="btn btn-success" onclick="addInfoAboutClinic()">Заполнить</button>
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
    </div>
    
</div>
