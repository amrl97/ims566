<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
							<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="row">
	<div class="col-md-9">
		<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
			<div class="card-body text-body-secondary">
            <h3><?= h($user->fullname) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('User Group') ?></th>
                    <td><?= $user->hasValue('user_group') ? $this->Html->link($user->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fullname') ?></th>
                    <td><?= h($user->fullname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar') ?></th>
                    <td><?= h($user->avatar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar Dir') ?></th>
                    <td><?= h($user->avatar_dir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ip Address') ?></th>
                    <td><?= h($user->ip_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($user->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Email Verified') ?></th>
                    <td><?= $this->Number->format($user->is_email_verified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $user->created_by === null ? '' : $this->Number->format($user->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $user->modified_by === null ? '' : $this->Number->format($user->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Token Created At') ?></th>
                    <td><?= h($user->token_created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= h($user->last_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            </div>

			</div>
		</div>
		

            
            

            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related Contacts') ?></h4>
                <?php if (!empty($user->contacts)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Ticket') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Category') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Note Admin') ?></th>
                            <th><?= __('Ip') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Is Replied') ?></th>
                            <th><?= __('Respond Date Time') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->contacts as $contacts) : ?>
                        <tr>
                            <td><?= h($contacts->id) ?></td>
                            <td><?= h($contacts->user_id) ?></td>
                            <td><?= h($contacts->ticket) ?></td>
                            <td><?= h($contacts->subject) ?></td>
                            <td><?= h($contacts->category) ?></td>
                            <td><?= h($contacts->name) ?></td>
                            <td><?= h($contacts->email) ?></td>
                            <td><?= h($contacts->notes) ?></td>
                            <td><?= h($contacts->note_admin) ?></td>
                            <td><?= h($contacts->ip) ?></td>
                            <td><?= h($contacts->status) ?></td>
                            <td><?= h($contacts->is_replied) ?></td>
                            <td><?= h($contacts->respond_date_time) ?></td>
                            <td><?= h($contacts->slug) ?></td>
                            <td><?= h($contacts->created) ?></td>
                            <td><?= h($contacts->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related User Logs') ?></h4>
                <?php if (!empty($user->user_logs)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Useragent') ?></th>
                            <th><?= __('Os') ?></th>
                            <th><?= __('Ip') ?></th>
                            <th><?= __('Host') ?></th>
                            <th><?= __('Referrer') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_logs as $userLogs) : ?>
                        <tr>
                            <td><?= h($userLogs->id) ?></td>
                            <td><?= h($userLogs->user_id) ?></td>
                            <td><?= h($userLogs->action) ?></td>
                            <td><?= h($userLogs->useragent) ?></td>
                            <td><?= h($userLogs->os) ?></td>
                            <td><?= h($userLogs->ip) ?></td>
                            <td><?= h($userLogs->host) ?></td>
                            <td><?= h($userLogs->referrer) ?></td>
                            <td><?= h($userLogs->status) ?></td>
                            <td><?= h($userLogs->created) ?></td>
                            <td><?= h($userLogs->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserLogs', 'action' => 'view', $userLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserLogs', 'action' => 'edit', $userLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLogs', 'action' => 'delete', $userLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related Audit Logs') ?></h4>
                <?php if (!empty($user->audit_logs)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Transaction') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Primary Key') ?></th>
                            <th><?= __('Source') ?></th>
                            <th><?= __('Parent Source') ?></th>
                            <th><?= __('Original') ?></th>
                            <th><?= __('Changed') ?></th>
                            <th><?= __('Meta') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->audit_logs as $auditLogs) : ?>
                        <tr>
                            <td><?= h($auditLogs->id) ?></td>
                            <td><?= h($auditLogs->transaction) ?></td>
                            <td><?= h($auditLogs->type) ?></td>
                            <td><?= h($auditLogs->primary_key) ?></td>
                            <td><?= h($auditLogs->source) ?></td>
                            <td><?= h($auditLogs->parent_source) ?></td>
                            <td><?= h($auditLogs->original) ?></td>
                            <td><?= h($auditLogs->changed) ?></td>
                            <td><?= h($auditLogs->meta) ?></td>
                            <td><?= h($auditLogs->status) ?></td>
                            <td><?= h($auditLogs->slug) ?></td>
                            <td><?= h($auditLogs->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AuditLogs', 'action' => 'view', $auditLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AuditLogs', 'action' => 'edit', $auditLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuditLogs', 'action' => 'delete', $auditLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auditLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related Applications') ?></h4>
                <?php if (!empty($user->applications)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Staff Id') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Reason') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Image Dir') ?></th>
                            <th><?= __('Approval Status') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->applications as $applications) : ?>
                        <tr>
                            <td><?= h($applications->id) ?></td>
                            <td><?= h($applications->staff_id) ?></td>
                            <td><?= h($applications->department_id) ?></td>
                            <td><?= h($applications->type_id) ?></td>
                            <td><?= h($applications->start_date) ?></td>
                            <td><?= h($applications->end_date) ?></td>
                            <td><?= h($applications->reason) ?></td>
                            <td><?= h($applications->image) ?></td>
                            <td><?= h($applications->image_dir) ?></td>
                            <td><?= h($applications->approval_status) ?></td>
                            <td><?= h($applications->status) ?></td>
                            <td><?= h($applications->created) ?></td>
                            <td><?= h($applications->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>

		
	</div>
	<div class="col-md-3">
	  Column
	</div>
</div>




