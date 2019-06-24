<?php
namespace App\Model\Table;

use App\Model\Entity\Productoption;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductcrosssaleTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('productcrosssale');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BaseProduct', [
            'foreignKey' => 'base_product_id',
            'propertyName' => 'BaseProduct',
            'className' => 'Products'
        ]);

        $this->belongsTo('CrossProduct', [
            'foreignKey' => 'cross_sale_product_id',
            'propertyName' => 'CrossProduct',
            'className' => 'Products'
        ]);
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('base_product_id')
            ->notEmpty('base_product_id');

        $validator
            ->integer('cross_sale_product_id')
            ->notEmpty('cross_sale_product_id');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['base_product_id'], 'BaseProduct'));
        $rules->add($rules->existsIn(['cross_sale_product_id'], 'CrossProduct'));
        return $rules;
    }

////////////////////////////////////////////////////////////////////////////////

}
