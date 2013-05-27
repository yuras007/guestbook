<div class="tags index">
	<h2><?php echo __('Tags'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Меню'); ?></th>
	</tr>
	<?php foreach ($tags as $tag): ?>
	<tr>
		<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
		<td><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Переглянути'), array('action' => 'view', $tag['Tag']['id'])); ?>
			<?php echo $this->Html->link(__('Редагувати'), array('action' => 'edit', $tag['Tag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Видалити'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Сторінка {:page} з {:pages}'.'<br />'.'(показується по {:current} записи з
                {:count} загальних)'
	));
	?>	</p>
	<div class="paging">
	<?php
	// Показуємо лінк на попередню сторінку
        echo $this->Paginator->prev('« Попередня   ', null, null, array('class' => 'disabled'));

        // Показуємо номери сторінок
        echo $this->Paginator->numbers();

        // Показуємо лінк на наступну сторінку
        echo $this->Paginator->next('   Наступна »', null, null, array('class' => 'disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Створити тег'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Список повідомлень'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити повідомлення'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
