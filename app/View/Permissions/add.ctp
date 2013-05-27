<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<legend><?php echo __('Додати права'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Додати')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Список прав'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Список груп'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Стоврити групу'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
