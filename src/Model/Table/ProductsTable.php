<?php
namespace App\Model\Table;

use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productoptions', [
            'foreignKey' => 'product_id'
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
                    'message' => 'Numele este deja folosit',
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
                    'message' => 'Doar litere mici si linute, cu un total de 3-50 caractere',
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
            ->allowEmpty('description');

        $validator
            ->allowEmpty('image');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }

////////////////////////////////////////////////////////////////////////////////

}
