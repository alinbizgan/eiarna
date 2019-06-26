<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Productrating extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}
