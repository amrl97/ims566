<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $userGroups
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                
                    <?php echo $this->Form->control('user_group_id', ['options' => $userGroups, 'empty' => true]); ?>
                    <?php echo $this->Form->control('fullname'); ?>
                    <?php echo $this->Form->control('password'); ?>
                    <?php echo $this->Form->control('email'); ?>
                    <?php echo $this->Form->control('avatar'); ?>
                    <?php echo $this->Form->control('avatar_dir'); ?>
                    <?php echo $this->Form->control('token'); ?>
                    <?php echo $this->Form->control('token_created_at'); ?>
                    <?php echo $this->Form->control('status'); ?>
                    <?php echo $this->Form->control('is_email_verified'); ?>
                    <?php echo $this->Form->control('last_login', ['empty' => true]); ?>
                    <?php echo $this->Form->control('ip_address'); ?>
                    <?php echo $this->Form->control('slug'); ?>
                    <?php echo $this->Form->control('created_by'); ?>
                    <?php echo $this->Form->control('modified_by'); ?>
               
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>