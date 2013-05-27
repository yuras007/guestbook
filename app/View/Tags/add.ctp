<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Додати теги'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Post');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Додати')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Список тегів'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Список повідомлень'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити повідомлення'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
