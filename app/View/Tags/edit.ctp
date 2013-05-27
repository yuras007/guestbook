<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Редагувати теги'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Post');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Зберегти')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Видалити'), array('action' => 'delete', $this->Form->value('Tag.id')), null, __('Ви впевнені, що хочете видалити # %s?', $this->Form->value('Tag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Список тегів'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Список повідомлень'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити повідомлення'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
