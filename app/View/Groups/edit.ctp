<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
    <fieldset>
	<legend><?php echo __('Редагувати групу'); ?></legend>
    <?php
	echo $this->Form->input('id');
	echo $this->Form->input('name');
	echo $this->Form->input('Permission');
	echo $this->Form->input('User');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Зберегти')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Меню'); ?></h3>
    <ul>
	<li><?php echo $this->Form->postLink(__('Видалити'), array('action' => 'delete', 
                       $this->Form->value('Group.id')), null, __('Ви впевнені, що хочете видалити # %s?', 
                       $this->Form->value('Group.id'))); ?></li>
	<li><?php echo $this->Html->link(__('Список груп'), array('action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('Список прав'), array('controller' => 'permissions', 
                                            'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__(''), array('controller' => 'permissions', 
                                            'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('Список користувачі'), array('controller' => 'users', 
                                            'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'users', 
                                            'action' => 'signup')); ?> </li>
    </ul>
</div>