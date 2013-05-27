<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
        <fieldset>
            <legend><?php echo __('Додати повідомлення'); ?></legend>
            <?php
                echo $this->Form->input('title', array('label' => 'Тема'));
                echo $this->Form->input('description', array(
                    'label' => 'Короткий опис', 'rows' => '3'));
                echo $this->Form->input('message', array(
                    'label' => 'Текст', 'rows' => '6'));
                echo $this->Form->input('tags', array('label' => 'Теги'));
                echo $this->Form->input('user_id');
            ?>
        </fieldset>
<?php echo $this->Form->end(__('Зберегти')); ?>
</div>