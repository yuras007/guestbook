<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<legend><?php echo __('Редагувати права'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Зберегти')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Видалити'), array('action' => 'delete', $this->Form->value('Permission.id')), null, __('Ви впевнені, що хочете видалити # %s?', $this->Form->value('Permission.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Список прав'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Список груп'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
