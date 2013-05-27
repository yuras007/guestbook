<div class="permissions view">
<h2><?php  echo __('Permission'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Редагувати права'), array('action' => 'edit', $permission['Permission']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Видалити права'), array('action' => 'delete', $permission['Permission']['id']), null, __('Are you sure you want to delete # %s?', $permission['Permission']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Список прав'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити право'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Список груп'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити групу'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Groups'); ?></h3>
	<?php if (!empty($permission['Group'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($permission['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['id']; ?></td>
			<td><?php echo $group['name']; ?></td>
			<td><?php echo $group['created']; ?></td>
			<td><?php echo $group['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Переглянути'), array('controller' => 'groups', 'action' => 'view', $group['id'])); ?>
				<?php echo $this->Html->link(__('Редагувати'), array('controller' => 'groups', 'action' => 'edit', $group['id'])); ?>
				<?php echo $this->Form->postLink(__('Видалити'), array('controller' => 'groups', 'action' => 'delete', $group['id']), null, __('Are you sure you want to delete # %s?', $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Створити групу'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
