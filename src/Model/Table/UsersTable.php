<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            // ->allowEmpty('role')
            // ->allowEmpty('first_name')
            ->notBlank('first_name', 'Preumele este obligatoriu')
            ->add('first_name', [
                'rule1' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Preumele trebuie sa aibe minim 2 caractere',
                ],
                'rule2' => [
                    'rule' => ['maxLength', 20],
                    'message' => 'Preumele trebuie sa aibe maxim 20 de caractere',
                ]
            ])
            ->notBlank('last_name', 'Numele este obligatoriu')
            ->add('last_name', [
                'rule1' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Numele trebuie sa aibe minim 2 caractere',
                ],
                'rule2' => [
                    'rule' => ['maxLength', 20],
                    'message' => 'Numele trebuie sa aibe maxim 20 de caractere',
                ]
            ])
            ->notBlank('password', 'Parola este obligatorie')
            ->add('password', [
                'rule1' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Parola trebuie sa aibe maxim 2 caractere',
                ],
                'rule2' => [
                    'rule' => ['maxLength', 20],
                    'message' => 'Parola trebuie sa aibe maxim 20 de caractere',
                ]
            ])
            // ->allowEmpty('phone')
            ->notBlank('phone', 'Numarul de telefon este obligatoriu')
            ->notBlank('email', 'Emailul este olbigatoriu')
            ->add('email', [
                'rule1' => [
                    'rule' => 'email',
                    'message' => 'Va rugam introduceti un email valid',
                ],
                'rule2' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Emailul este deja folosit',
                ]
            ])
            ->allowEmpty('uuid')
            ->add('active', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('active')
            ->add('login_count', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('login_count')
            ->add('login_last', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('login_last');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

////////////////////////////////////////////////////////////////////////////////

}
