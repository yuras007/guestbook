<?php echo $surname.' '.$name; ?> Ви зареєструвались на <?php $server_name; ?>.
Для підтвердження реєстрації перейдіть, будь ласка, по ссилці:
<a href="http://<?php echo $server_name; ?><?php echo $this->Html->url(array('controller'=>'users','action'=>'confirm'));?>/
    <?php echo $id; ?>/<?php echo $code; ?>>Підтвердити реєстрацію!</a>
