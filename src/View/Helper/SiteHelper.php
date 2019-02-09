<?php

namespace App\View\Helper;

use Cake\View\Helper;

class SiteHelper extends Helper
{

////////////////////////////////////////////////////////////////////////////////

    public function counties($id = null) {
        $counties = array(
            'AB' => 'Alba',
            'AR' => 'Arad',
            'AG' => 'Arges',
            'BC' => 'Bacau',
            'BH' => 'Bihor',
            'BN' => 'Bistrita-Nasaud',
            'BT' => 'Botosani',
            'BV' => 'Brasov',
            'BR' => 'Braila',
            'B' => 'Bucuresti',
            'BZ' => 'Buzau',
            'CS' => 'Caras-Severin',
            'CL' => 'Calarasi',
            'CJ' => 'Cluj',
            'CT' => 'Constanta',
            'CV' => 'Covasna',
            'DB' => 'Dambovita',
            'DJ' => 'Dolj',
            'GL' => 'Galati',
            'GR' => 'Giurgiu',
            'GJ' => 'Gorj',
            'HR' => 'Harghita',
            'HD' => 'Hunedoara',
            'IL' => 'Ialomita',
            'IS' => 'Iasi',
            'IF' => 'Ilfov',
            'MM' => 'Maramures',
            'MH' => 'Mehedinti',
            'MS' => 'Mures',
            'NT' => 'Neamt',
            'OT' => 'Olt',
            'PH' => 'Prahova',
            'SM' => 'Satu Mare',
            'SJ' => 'Salaj',
            'SB' => 'Sibiu',
            'SV' => 'Suceava',
            'TR' => 'Teleorman',
            'TM' => 'Timis',
            'TL' => 'Tulcea',
            'VS' => 'Vaslui',
            'VL' => 'Valcea',
            'VN' => 'Vrancea'
        );
        if($id) {
            if(isset($counties[$id])) {
                return $counties[$id];
            }
        } else {
            return $counties;
        }
    }

////////////////////////////////////////////////////////////////////////////////

}