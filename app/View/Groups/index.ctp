<div class="groups index">
    <h2><?php echo __('Groups'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	<th><?php echo $this->Paginator->sort('name'); ?></th>
	<th><?php echo $this->Paginator->sort('created'); ?></th>
	<th><?php echo $this->Paginator->sort('modified'); ?></th>
	<th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($groups as $group): ?>
    <tr>
	<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
	<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
	<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
	<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
	<td class="actions">
            <?php echo $this->Html->link(__('Переглянути'), 
                    array('action' => 'view', $group['Group']['id'])); ?>
            <?php echo $this->Html->link(__('Редагувати'), 
                    array('action' => 'edit', $group['Group']['id'])); ?>
            <?php echo $this->Form->postLink(__('Видалити'), array('action' => 'delete', 
                    $group['Group']['id']), null, __('Ви впевнені, що хочете видалити # %s?', 
                    $group['Group']['id'])); ?>
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
    ?>	
    </p>
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
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
	<li><?php echo $this->Html->link(__('Створити групу'), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('Список прав'), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Створити право'), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('Список користувачів'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Створити користувача'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
