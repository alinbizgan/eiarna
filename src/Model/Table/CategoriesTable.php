<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
            'foreignKey' => 'category_id'
        ]);
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->add('name', [
                'rule1' => [
                    'rule' => 'notBlank',
                    'message' => 'Va rugam introduceti un nume valid',
                ],
                'rule2' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Numele exista deja',
                ]
            ]);

        $validator
            ->add('slug', [
                'rule1' => [
                    'rule' => 'notBlank',
                    'message' => 'Va rugam introduceti un slug valid',
                ],
                'rule2' => [
                    'rule' => ['custom', '/^[a-z\-]{3,50}$/'],
                    'message' => 'Doar litere mici si liniute cu un total de 3-50 de caractere',
                    'allowEmpty' => false,
                    'required' => false,
                ],
                'rule3' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Slug deja folosit',
                ]
            ]);

        $validator
            ->integer('sort')
            ->allowEmpty('sort');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }

////////////////////////////////////////////////////////////////////////////////

}
