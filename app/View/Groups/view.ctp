<div class="groups view">
<h2><?php  echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Меню'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Редагувати групу'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Видалити групу'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Список груп'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити групу'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Список прав'), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити право'), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Список користувачів'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Permissions'); ?></h3>
	<?php if (!empty($group['Permission'])): ?>
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
		foreach ($group['Permission'] as $permission): ?>
		<tr>
			<td><?php echo $permission['id']; ?></td>
			<td><?php echo $permission['name']; ?></td>
			<td><?php echo $permission['created']; ?></td>
			<td><?php echo $permission['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Переглянути'), array('controller' => 'permissions', 'action' => 'view', $permission['id'])); ?>
				<?php echo $this->Html->link(__('Редагувати'), array('controller' => 'permissions', 'action' => 'edit', $permission['id'])); ?>
				<?php echo $this->Form->postLink(__('Видалити'), array('controller' => 'permissions', 'action' => 'delete', $permission['id']), null, __('Are you sure you want to delete # %s?', $permission['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Surname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Confirm Code'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['surname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['confirm_code']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Переглянути'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Редагувати'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Видалити'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
