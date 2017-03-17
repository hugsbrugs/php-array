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

        $this->object2 = (object) $this->array2;

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
        $test = HArray::array_sort_by_column($this->array2, 'name');
        $this->assertInternalType('null', $test);
    }

    /**
     *
     */
    public function testCanSortArrayByColumnDescWithArray()
    {
        $test = HArray::array_sort_by_column($this->array2, 'name', SORT_DESC);
        $this->assertInternalType('null', $test);
    }

    /**
     *
     */
    public function testCanSortArrayByColumnAscWithArray()
    {
        $test = HArray::array_sort_by_column($this->array2, 'weight', SORT_ASC);
        $this->assertInternalType('null', $test);
    }


    /* ************************************************* */
    /* ***************** HArray::msort ***************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanMSortWithArray()
    {
        $test = HArray::msort($this->array2, 'name');
        $this->assertInternalType('array', $test);
    }

    /**
     *
     */
    public function testCanMSortDescWithArray()
    {
        $test = HArray::msort($this->array2, 'name', SORT_DESC);
        $this->assertInternalType('array', $test);// SORT_REGULAR
    }

    /**
     *
     */
    public function testCanMSortAscWithArray()
    {
        $test = HArray::msort($this->array2, 'weight', SORT_ASC);
        $this->assertInternalType('array', $test);// SORT_REGULAR
    }


    /* ************************************************* */
    /* *********** HArray::recursive_implode *********** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanFindHArrayWithDefaultLang()
    {
        $test = HArray::recursive_implode('-', $this->array2);
        $this->assertInternalType('string', $test);
    }


    /* ************************************************* */
    /* ************* HArray::object_to_array ************* */
    /* ************************************************* */

    /**
     *
     */
    public function testCanObjectToArray1()
    {
        $test = HArray::object_to_array($this->object1);
        $this->assertInternalType('array', $test);
    }

    /**
     *
     */
    public function testCanObjectToArray2()
    {
        $test = HArray::object_to_array($this->object2);
        $this->assertInternalType('array', $test);
    }

    /* ************************************************* */
    /* *************** HArray::sub_count *************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanSubCountArray1()
    {
        $test = HArray::sub_count($this->array1);
        $this->assertInternalType('integer', $test);
    }

    /**
     *
     */
    public function testCanSubCountArray2()
    {
        $test = HArray::sub_count($this->array2);
        $this->assertInternalType('integer', $test);
    }

    /* ************************************************* */
    /* ************ HArray::string_to_array ************ */
    /* ************************************************* */

    /**
     *
     */
    public function testCanStringToArray()
    {
        $test = HArray::string_to_array($this->text1, 8);
        $this->assertInternalType('array', $test);
    }

    /**
     *
     */
    public function testCannoStringToArray()
    {
        $test = HArray::string_to_array($this->text1, 150);
        $this->assertInternalType('array', $test);
    }

    /* ************************************************* */
    /* ************** HArray::array_insert ************* */
    /* ************************************************* */

    /**
     *
     */
    public function testCanArrayInsert()
    {
        $array = ['pomme', 'poire', 'fraise', 'banane'];
        $test = HArray::array_insert($array, 'kiwi', 2);
        $this->assertInternalType('array', $test);
        $this->assertEquals(count($test), 5);

        $array = ['pomme', 'poire', 'fraise', 'banane'];
        $test = HArray::array_insert($array, ['kiwi', 'mangue'], 2);
        $this->assertInternalType('array', $test);
        $this->assertEquals(count($test), 6);
    }

}

