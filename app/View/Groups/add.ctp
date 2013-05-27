<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
    <fieldset>
	<legend><?php echo __('Додати групу'); ?></legend>
    <?php
	echo $this->Form->input('name');
	echo $this->Form->input('Permission');
	echo $this->Form->input('User');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Додати')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Меню'); ?></h3>
    <ul>
	<li><?php echo $this->Html->link(__('Список груп'), array('action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('Список прав'), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Створити право'), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('Список користувачів'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
