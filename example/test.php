<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Hug\HArray\HArray as HArray;

$array1 = [
    'jack' => 12,
    'billy' => 7,
    'tom' => 14,
    'garett' => 4
];

$array2 = [
    [
        'id' => 1,
        'name' => 'jack',
        'size' => 1.78,
        'weight' => 87.4
    ],
    [
        'id' => 2,
        'name' => 'billy',
        'size' => 1.75,
        'weight' => 68.4
    ],
    [
        'id' => 3,
        'name' => 'tom',
        'size' => 1.69,
        'weight' => 57.2
    ],
    [
        'id' => 4,
        'name' => 'garett',
        'size' => 1.72,
        'weight' => 75.7
    ]
];

$object1 = (object) $array1;
$object2 = (object) $array2;

$text1 = "Demain dès l'aube à l'heure où blanchit la campagne, je partirai. Vois-tu je sais que tu m'attends. J'irai par la forêt, j'irai par la montagne. Je ne puis demeurer loin de toi plus longtemps. Je marcherai les yeux fixés sur mes pensées, sans rien voir au dehors, sens entendre aucun bruit, seul inconnu, le dos courbé, les mains croisées, triste, et le jour sere pour moi comme la nuit. Je ne regarderai ni l'or du soir qui tombe, ni les voiles au loin descendant vers Harfleur, Et quand j'arriverai, je mettrai sur ta tombe Un bouquet de houx vert et de bruyère en fleur.";


/* ************************************************* */
/* ************* HArray::shuffle_assoc ************* */
/* ************************************************* */

// error_log('Before shuffle_assoc');
// error_log(print_r($array1, true));
// HArray::shuffle_assoc($array1);
// error_log('After shuffle_assoc');
// error_log(print_r($array1, true));


/* ************************************************* */
/* ********** HArray::array_sort_by_column ********* */
/* ************************************************* */

// error_log('Before array_sort_by_column');
// error_log(print_r($array2, true));
// HArray::array_sort_by_column($array2, 'name');
// error_log('After array_sort_by_column');
// error_log(print_r($array2, true));


/* ************************************************* */
/* ***************** HArray::msort ***************** */
/* ************************************************* */

// error_log('Before msort');
// error_log(print_r($array2, true));
// $array2 = HArray::msort($array2, 'name');
// // $array2 = HArray::msort($array2, 'name', SORT_ASC);
// // $array2 = HArray::msort($this->array2, 'weight', SORT_ASC);
// error_log('After msort');
// error_log(print_r($array2, true));


/* ************************************************* */
/* *********** HArray::recursive_implode *********** */
/* ************************************************* */

// error_log('Before recursive_implode');
// error_log(print_r($array2, true));
// error_log('After recursive_implode');
// error_log(HArray::recursive_implode('-', $array2));


/* ************************************************* */
/* ************* HArray::object_to_array ************* */
/* ************************************************* */

// error_log('Before object_to_array');
// error_log(print_r($object1, true));
// $result = HArray::object_to_array($object1);
// // $result = HArray::object_to_array($object2);
// error_log('After object_to_array');
// error_log(print_r($result, true));


/* ************************************************* */
/* *************** HArray::sub_count *************** */
/* ************************************************* */

// error_log('sub_count array 1');
// error_log(HArray::sub_count($array1));

// error_log('sub_count array 2');
// error_log(HArray::sub_count($array2));


/* ************************************************* */
/* ************ HArray::string_to_array ************ */
/* ************************************************* */

// error_log('string_to_array 8');
// error_log(print_r(HArray::string_to_array($text1, 8), true));

// error_log('string_to_array 150');
// error_log(print_r(HArray::string_to_array($text1, 150), true));

