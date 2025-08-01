<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserGroupsTable&\Cake\ORM\Association\BelongsTo $UserGroups
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\TodosTable&\Cake\ORM\Association\HasMany $Todos
 * @property \App\Model\Table\UserLogsTable&\Cake\ORM\Association\HasMany $UserLogs
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('fullname');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Todos', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserLogs', [
            'foreignKey' => 'user_id',
        ]);

        $this->hasMany('AuditLogs', [
            'foreignKey' => 'primary_key',
            'bindingKey' => 'id',
        ]);

		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['id'],
				]);
        
    $this->addBehavior('Josegonzalez/Upload.Upload', [
            'avatar' => [
                'fields' => [
                    'dir' => 'avatar_dir', 
                ],
                'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}{field-value:slug}',
            ],
        ]);

    $this->addBehavior(
            'Tools.Slugged',
            ['label' => 'fullname', 'unique' => true, 'mode' => 'ascii', 'field' => 'slug']
        );
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

public function validationPassword($validator)
    {
        $validator
            ->add('current_password', [
                'notBlank' => [
                    'rule' => 'notBlank',
                    'message' => __('Please enter old password'),
                    'last' => true
                ],
            ])

            ->add(
                'current_password',
                'custom',
                [
                    'rule' =>  function ($value, $context) {
                        $user = $this->get($context['data']['id']);
                        if ($user) {
                            if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                                return true;
                            }
                        }
                        return false;
                    },
                    'message' => 'The old password does not match the current password!',
                ]
            )


            ->add('password', [
                'notBlank' => [
                    'rule' => 'notBlank',
                    'message' => __('Please enter password'),
                    'last' => true
                ],
                'mustBeLonger' => [
                    'rule' => ['minLength', 6],
                    'message' => __('Password must be greater than 5 characters'),
                    'last' => true
                ]
            ])

            ->add('cpassword', [
                'notBlank' => [
                    'rule' => 'notBlank',
                    'message' => __('Please enter password'),
                    'last' => true
                ],
                'mustMatch' => [
                    'rule' => 'checkForSamePassword',
                    'provider' => 'table',
                    'message' => __('Both password must match')
                ]
            ]);

        return $validator;
    }
 

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_group_id')
            ->allowEmptyString('user_group_id');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 255)
            ->requirePresence('fullname', 'create')
            ->notEmptyString('fullname');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->allowEmptyString('avatar');

        $validator

            ->allowEmptyString('avatar_dir');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmptyString('token');

        $validator
            ->dateTime('token_created_at')
            ->requirePresence('token_created_at', 'create')
            ->notEmptyDateTime('token_created_at');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->notEmptyString('status');

        $validator
            ->integer('is_email_verified')
            ->notEmptyString('is_email_verified');

        $validator
            ->dateTime('last_login')
            ->allowEmptyDateTime('last_login');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 255)
            ->allowEmptyString('ip_address');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        return $validator;
    }

public function validationRegister($validator)
    {
        $validator
            ->scalar('fullname')
            ->minLength('fullname', 5, 'Minimum length is 5')
            ->requirePresence('fullname')
            ->notEmptyString('fullname', 'Fullname is required');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password')
            ->notEmptyString('password', 'Password is required')
            ->add('cpassword', [
                'compare' => [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Password not match'
                ]
            ]);

        $validator
            ->email('email')
            ->requirePresence('email')
            ->notEmptyString('email', 'Email is required');

        $validator
            //->allowEmpty('avatar')
            ->allowEmptyFile('avatar')
            ->add('avatar', [
                'validExtension' => [
                    'rule' => ['extension', ['jpg', 'jpeg']], // default  ['gif', 'jpeg', 'png', 'jpg']
                    'message' => __('Only these files extension are allowed: .jpg / .jpeg')
                ]
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'), ['errorField' => 'user_group_id']);

        return $rules;
    }
}
