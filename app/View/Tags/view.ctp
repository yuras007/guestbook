<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Редагувати тег'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Видалити тег'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Список тегів'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити тег'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Список повідомлень'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити повідомлення'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($tag['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Меню'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['description']; ?></td>
			<td><?php echo $post['message']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Переглянути'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Редагувати'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Видалити'), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Створити повідомлення'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
