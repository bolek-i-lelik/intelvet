<div class="clinic-default-index">
    <div class="panel panel-info">
        <div class="panel-heading">Общая информация</div>
        <div class="panel-body">
            Basic panel example
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
