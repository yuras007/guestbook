<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
<fieldset>
    <legend>
        <?php echo __('Вхід'); ?>
    </legend>
    <?php
        echo $this->Form->input('email', array('label' => 'Пошта (email)'));
        echo $this->Form->input('password', array('label' => 'Пароль'));
    ?>
    <?php echo $this->Form->end(__('Увійти')); ?>
</fieldset>
    <small><?php echo $this->Html->link(__('Зареєструватися'), array('action' => 'signup')); ?></small>
    <br /><br />
    <small><?php echo $this->Html->link(__('Забули пароль?'), array('action' => 'signup')); ?></small>
</div>
