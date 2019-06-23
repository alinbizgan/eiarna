<?php
namespace App\Model\Table;

use App\Model\Entity\Order;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdersTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Orderproducts', [
            'foreignKey' => 'order_id',
            'dependent' => true,
        ]);
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notBlank('first_name', 'Prenumele este obligatoriu')
            ->add('first_name', [
                'rule1' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Prenumele trebuie sa aiba minim 2 caractere',
                ],
                'rule2' => [
                    'rule' => ['maxLength', 20],
                    'message' => 'Prenumele trebuie sa aiba maxim 20 de caractere',
                ]
            ]);

        $validator
            ->notBlank('last_name', 'Numele este obligatoriu')
            ->add('last_name', [
                'rule1' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Numele trebuie sa aiba minim 2 caractere',
                ],
                'rule2' => [
                    'rule' => ['maxLength', 20],
                    'message' => 'Numele trebuie sa aiba maxim 20 de caractere',
                ]
            ]);

        $validator
            ->notBlank('email', 'E-mailul este obligatoriu')
            ->add('email', [
                'rule1' => [
                    'rule' => 'email',
                    'message' => 'Va rugam introduceti un email valid',
                ],
            ]);

        $validator
            ->notBlank('phone', 'Numarul de telefon este obligatoriu');

        $validator
            ->notEmpty('billing_address');

        $validator
            ->notEmpty('billing_city');

        $validator
            ->notEmpty('billing_zip');

        $validator
            ->notEmpty('billing_county');

        $validator
            ->notEmpty('shipping_address');

        $validator
            ->notEmpty('shipping_city');

        $validator
            ->notEmpty('shipping_zip');

        $validator
            ->notEmpty('shipping_county');

        $validator
            ->decimal('weight')
            ->allowEmpty('weight');

        $validator
            ->integer('order_item_count')
            ->allowEmpty('order_item_count');

        $validator
            ->decimal('subtotal')
            ->allowEmpty('subtotal');

        $validator
            ->decimal('tax')
            ->allowEmpty('tax');

        $validator
            ->decimal('shipping')
            ->allowEmpty('shipping');

        $validator
            ->decimal('total')
            ->allowEmpty('total');

        $validator
            ->allowEmpty('order_type');

        // $validator
        //     ->allowEmpty('creditcard_number');

        // $validator->notEmpty('creditcard_number', 'This field is required', function ($context) {
        //     return $context['data']['payment_method'] === 'credit_card';
        // });
        // $validator->allowEmpty('creditcard_number', function ($context) {
        //     return isset($context['data']['payment_method']) && ($context['data']['payment_method'] != 'credit_card');
        // });

        // $validator
        //     ->add('creditcard_number', [
        //         'cc' => [
        //             'rule' => 'cc',
        //             'message' => 'Please enter valid Credit Card',
        //             'on' => function ($context) {
        //                 return $context['data']['payment_method'] == 'credit_card';
        //             }
        //         ],
        //     ]);


        // $validator->add('creditcard_number', 'cc', [
        //     'rule' => 'cc',
        //     'message' => 'Please enter valid Credit Card',
        //     'on' => function ($context) {
        //         return ($context['data']['payment_method'] == 'credit_card');
        //     }
        // ]);

        $validator
            ->allowEmpty('authorization');

        $validator
            ->allowEmpty('transaction');

        $validator
            ->allowEmpty('status');

        $validator
            ->allowEmpty('ip_address');

        $validator
            ->allowEmpty('referer_cookie');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationReview(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->allowEmpty('creditcard_number', function ($context) {
            return $context['data']['payment_method'] === 'cod';
        });

        $validator->add('creditcard_number', 'cc', [
            'rule' => 'cc',
            'message' => 'Va rugam introduceti un card de credit valid',
            'on' => function ($context) {
                return $context['data']['payment_method'] === 'credit_card';
            }
        ]);

        $validator->notEmpty('creditcard_number', 'Cardul de credit este obligatoriu', function ($context) {
            return $context['data']['payment_method'] === 'credit_card';
        });

        $validator->allowEmpty('creditcard_code', function ($context) {
            return $context['data']['payment_method'] === 'cod';
        });

        $validator->add('creditcard_code', 'custom', [
            'rule' => ['custom', '/^[0-9]{3,4}$/i'],
            'message' => 'Va rugam introduceti un CVC valid',
            'on' => function ($context) {
                return $context['data']['payment_method'] === 'credit_card';
            }
        ]);

        $validator->notEmpty('creditcard_code', 'CSC is required', function ($context) {
            return $context['data']['payment_method'] === 'credit_card';
        });

        $validator->notEmpty('creditcard_month', 'Month is required', function ($context) {
            return $context['data']['payment_method'] === 'credit_card';
        });

        $validator->notEmpty('creditcard_year', 'Year is required', function ($context) {
            return $context['data']['payment_method'] === 'credit_card';
        });

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->isUnique(['email']));
    //     return $rules;
    // }

////////////////////////////////////////////////////////////////////////////////

}
