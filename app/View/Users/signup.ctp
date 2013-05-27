<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Реєстрація користувача'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('label' => 'Пароль'));
                echo $this->Form->input('password2',array('type'=>'password','label' => 'Підтвердіть пароль:'));
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
		echo $this->Form->input('active');
		echo $this->Form->input('Group');
	?>
    <small>
    * Поля обов'язкові для заповнення    
    </small>
	</fieldset>
    
<?php echo $this->Form->end(__('Зареєструватися')); ?>
</div>