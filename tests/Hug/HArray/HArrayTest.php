<?php

# For PHP7
// declare(strict_types=1);

// namespace Hug\Tests\HArray;

use PHPUnit\Framework\TestCase;

use Hug\HArray\HArray as HArray;

/**
 *
 */
final class HArrayTest extends TestCase
{    
    public $array1 = null;
    public $array2 = null;

    public $object1 = null;
    public $object2 = null;

    public $text1 = null;

    function __construct()
    {
        $this->array1 = [
            'jack' => 12,
            'billy' => 7,
            'tom' => 14,
            'garett' => 4
        ];

        $this->array2 = [
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

        $this->object1 = (object) $this->array1;
        // new stdClass([
        //     'id' => 1,
        //     'name' => 'Edgar',
        //     'color' => '#fe45de'
        // ]);

        $this->object2 = (object) $this->array2;
        // $this->object2 = stdClass([
        //     [
        //         'id' => 1,
        //         'name' => 'Edgar',
        //         'color' => '#fe45de'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'John',
        //         'color' => '#ccc555'
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Paul',
        //         'color' => '#12cd12'
        //     ]
        // ]);

        $this->text1 = "Demain dès l'aube à l'heure où blanchit la campagne, je partirai. Vois-tu je sais que tu m'attends. J'irai par la forêt, j'irai par la montagne. Je ne puis demeurer loin de toi plus longtemps. Je marcherai les yeux fixés sur mes pensées, sans rien voir au dehors, sens entendre aucun bruit, seul inconnu, le dos courbé, les mains croisées, triste, et le jour sere pour moi comme la nuit. Je ne regarderai ni l'or du soir qui tombe, ni les voiles au loin descendant vers Harfleur, Et quand j'arriverai, je mettrai sur ta tombe Un bouquet de houx vert et de bruyère en fleur.";
    }

    /* ************************************************* */
    /* ************* HArray::shuffle_assoc ************* */
    /* ************************************************* */

    /**
     *
     */
    public function testCanShuffleAssocWithArray()
    {
        $this->assertTrue( HArray::shuffle_assoc($this->array1) );
        $this->assertArrayHasKey('jack', $this->array1);
        $this->assertArrayHasKey('billy', $this->array1);
        $this->assertArrayHasKey('tom', $this->array1);
        $this->assertArrayHasKey('garett', $this->array1);
    }


    /* ************************************************* */
    /* ********** HArray::array_sort_by_column ********* */
    /* ************************************************* */

    /**
     *
     */
    public function testCanSortArrayByColumnWithArray()
    {
        $this->assertInternalType(
            'null',
            HArray::array_sort_by_column($this->array2, 'name')
        );
    }

    /**
     *
     */
    public function testCanSortArrayByColumnDescWithArray()
    {
        $this->assertInternalType(
            'null',
            HArray::array_sort_by_column($this->array2, 'name', SORT_DESC)
        );
    }

    /**
     *
     */
    public function testCanSortArrayByColumnAscWithArray()
    {
        $this->assertInternalType(
            'null',
            HArray::array_sort_by_column($this->array2, 'weight', SORT_ASC)
        );
    }


    /* ************************************************* */
    /* ***************** HArray::msort ***************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanMSortWithArray()
    {
        $this->assertInternalType(
            'array',
            HArray::msort($this->array2, 'name')
        );
    }

    /**
     *
     */
    public function testCanMSortDescWithArray()
    {
        $this->assertInternalType(
            'array',
            HArray::msort($this->array2, 'name', SORT_DESC)
        );// SORT_REGULAR
    }

    /**
     *
     */
    public function testCanMSortAscWithArray()
    {
        $this->assertInternalType(
            'array',
            HArray::msort($this->array2, 'weight', SORT_ASC)
        );// SORT_REGULAR
    }


    /* ************************************************* */
    /* *********** HArray::recursive_implode *********** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanFindHArrayWithDefaultLang()
    {
        $this->assertInternalType(
            'string',
            HArray::recursive_implode('-', $this->array2)
        );
    }


    /* ************************************************* */
    /* ************* HArray::object_to_array ************* */
    /* ************************************************* */

    /**
     *
     */
    public function testCanObjectToArray1()
    {
        $this->assertInternalType(
            'array',
            HArray::object_to_array($this->object1)
        );
    }

    /**
     *
     */
    public function testCanObjectToArray2()
    {
        $this->assertInternalType(
            'array',
            HArray::object_to_array($this->object2)
        );
    }

    /* ************************************************* */
    /* *************** HArray::sub_count *************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanSubCountArray1()
    {
        $this->assertInternalType(
            'integer',
            HArray::sub_count($this->array1)
        );
    }

    /**
     *
     */
    public function testCanSubCountArray2()
    {
        $this->assertInternalType(
            'integer',
            HArray::sub_count($this->array2)
        );
    }

    /* ************************************************* */
    /* ************ HArray::string_to_array ************ */
    /* ************************************************* */

    /**
     *
     */
    public function testCanStringToArray()
    {
        $this->assertInternalType(
            'array',
            HArray::string_to_array($this->text1, 8)
        );
    }

    /**
     *
     */
    public function testCannoStringToArray()
    {
        $this->assertInternalType(
            'array',
            HArray::string_to_array($this->text1, 150)
        );
    }



}

