<?php
namespace Rohit\Tests;

use Orchestra\Testbench\TestCase;
use Rohit\NumberToWord\NumberToWord;

/**
 * @coversDefaultClass Rohit\NumberToWord\NumberToWord
 */
class NumberToWordTest extends TestCase
{
    protected $numberToWord;

    /**
     * Setup config
     *
     * @param  $app
     *
     * @return null
     */
    protected function getEnvironmentSetUp($app)
    {
        // English Config
        $app['config']->set('number-to-word.en.use-space', true);
        $app['config']->set('number-to-word.en.and-word', 'and');
        $app['config']->set('number-to-word.en.ending-word', 'Only');
        $app['config']->set('number-to-word.en.divisors', [
            'Trillion' => 1000000000000,
            'Billion' => 1000000000,
            'Million' => 1000000,
            'Thousand' => 1000,
            'Hundred' => 100,
        ]);
        $app['config']->set('number-to-word.en.mapping', [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Fourty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninty',
        ]);

        // Thai Config
        $app['config']->set('number-to-word.th.use-space', false);
        $app['config']->set('number-to-word.th.and-word', '');
        $app['config']->set('number-to-word.th.ending-word', '');
        $app['config']->set('number-to-word.th.divisors', [
            'ล้าน' => 1000000,
            'แสน' => 100000,
            'หมื่น' => 10000,
            'พัน' => 1000,
            'ร้อย' => 100,
        ]);
        $app['config']->set('number-to-word.th.mapping', [
            1 => 'หนึ่ง',
            2 => 'สอง',
            3 => 'สาม',
            4 => 'สี่',
            5 => 'ห้า',
            6 => 'หก',
            7 => 'เจ็ด',
            8 => 'แปด',
            9 => 'เก้า',
            10 => 'สิบ',
            11 => 'สิบเอ็ด',
            20 => 'ยี่สิบ',
            21 => 'ยี่สิบเอ็ด',
            30 => 'สามสิบ',
            31 => 'สามสิบเอ็ด',
            40 => 'สี่สิบ',
            41 => 'สี่สิบเอ็ด',
            50 => 'ห้าสิบ',
            51 => 'ห้าสิบเอ็ด',
            60 => 'หกสิบ',
            61 => 'หกสิบเอ็ด',
            70 => 'เจ็ดสิบ',
            71 => 'เจ็ดสิบเอ็ด',
            80 => 'แปดสิบ',
            81 => 'แปดสิบเอ็ด',
            90 => 'เก้าสิบ',
            91 => 'เก้าสิบเอ็ด',
        ]);

        // Nepali Config
        $app['config']->set('number-to-word.np.use-space', true);
        $app['config']->set('number-to-word.np.and-word', '');
        $app['config']->set('number-to-word.np.ending-word', 'मात्र');
        $app['config']->set('number-to-word.np.divisors', [
            'अरब' => 1000000000,
            'करोड' => 10000000,
            'लाख' => 100000,
            'हजार' => 1000,
            'सय' => 100,
        ]);
        $app['config']->set('number-to-word.np.mapping', [
            1 => 'एक',
            2 => 'दुई',
            3 => 'तीन',
            4 => 'चार',
            5 => 'पाच',
            6 => 'छ',
            7 => 'सात',
            8 => 'आठ',
            9 => 'नौ',
            10 => 'दस',
            11 => 'एघार',
            12 => 'बाह्र',
            13 => 'तेह्र',
            14 => 'चौध',
            15 => 'पन्ध्र',
            16 => 'सोह्र',
            17 => 'सत्र',
            18 => 'अठार',
            19 => 'उन्नाइस',
            20 => 'बिस',
            21 => 'एक्काइस',
            22 => 'बाइस',
            23 => 'तेइस',
            24 => 'चौबिस',
            25 => 'पच्चिस',
            26 => 'छबिस',
            27 => 'सत्ताइस',
            28 => 'अठ्ठाइस',
            29 => 'उनन्तीइस',
            30 => 'तीस',
            31 => 'एकतीस',
            32 => 'बतीस',
            33 => 'तेतीस',
            34 => 'चौतीस',
            35 => 'पैतीस',
            36 => 'छतीस',
            37 => 'सैतीस',
            38 => 'अड्तीस',
            39 => 'उनन्चालिस',
            40 => 'चालिस',
            41 => 'एकचालिस',
            42 => 'बयालिस',
            43 => 'तिरचालिस',
            44 => 'चवालिस',
            45 => 'पैतालिस',
            46 => 'छयालिस',
            47 => 'सड्चालिस',
            48 => 'अड्चालिस',
            49 => 'उनन्पचास',
            50 => 'पचास',
            51 => 'एक्काउन्न',
            52 => 'बाउन्न',
            53 => 'तिरपन्न',
            54 => 'चवन्न',
            55 => 'पचपन्न',
            56 => 'छपन्न',
            57 => 'सन्ताउन्न',
            58 => 'अन्ठाउन्न',
            59 => 'उनन्साठी',
            60 => 'साठी',
            61 => 'एकसठी',
            62 => 'बैसठी',
            63 => 'तिरसठी',
            64 => 'चौसठी',
            65 => 'पैन्सठी',
            66 => 'छैसठी',
            67 => 'सड्सठी',
            68 => 'अड्सठी',
            69 => 'उनन्सत्तरी',
            70 => 'सत्तरी',
            71 => 'एकत्तर',
            72 => 'बहत्तर',
            73 => 'तिरत्तर',
            74 => 'चौरत्तर',
            75 => 'पचत्तर',
            76 => 'छयत्तर',
            77 => 'सतत्तर',
            78 => 'अठत्तर',
            79 => 'उननस्सी',
            80 => 'अस्सी',
            81 => 'एक्कास्सी',
            82 => 'बयास्सी',
            83 => 'तिरास्सी',
            84 => 'चौरास्सी',
            85 => 'पचास्सी',
            86 => 'छयास्सी',
            87 => 'सतास्सी',
            88 => 'अठास्सी',
            89 => 'उनन्नब्बे',
            90 => 'नब्बे',
            91 => 'एकानब्बे',
            92 => 'बयानब्बे',
            93 => 'तिरानब्बे',
            94 => 'चौरानब्बे',
            95 => 'पन्चानब्बे',
            96 => 'छयानब्बे',
            97 => 'सन्तानब्बे',
            98 => 'अन्ठानब्बे',
            99 => 'उनन्सय',
        ]);
    }

    /**
     * Test Setup
     */
    public function setUp()
    {
        parent::setUp();

        $this->numberToWord = app(NumberToWord::class);
    }

    /**
     * @covers ::convertNumberToWord
     */
    public function testConvertNumberToWord()
    {
        $number   = 8;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Eight Only');
        $this->assertEquals($thResult, 'แปด');
        $this->assertEquals($npResult, 'आठ मात्र');

        $number   = 45;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Fourty Five Only');
        $this->assertEquals($thResult, 'สี่สิบห้า');
        $this->assertEquals($npResult, 'पैतालिस मात्र');

        $number   = 364;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Three Hundred and Sixty Four Only');
        $this->assertEquals($thResult, 'สามร้อยหกสิบสี่');
        $this->assertEquals($npResult, 'तीन सय चौसठी मात्र');

        $number   = 1364;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'One Thousand Three Hundred and Sixty Four Only');
        $this->assertEquals($thResult, 'หนึ่งพันสามร้อยหกสิบสี่');
        $this->assertEquals($npResult, 'एक हजार तीन सय चौसठी मात्र');

        $number   = 15473;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Fifteen Thousand Four Hundred and Seventy Three Only');
        $this->assertEquals($thResult, 'หนึ่งหมื่นห้าพันสี่ร้อยเจ็ดสิบสาม');
        $this->assertEquals($npResult, 'पन्ध्र हजार चार सय तिरत्तर मात्र');

        $number   = 635473;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Six Hundred and Thirty Five Thousand Four Hundred and Seventy Three Only');
        $this->assertEquals($thResult, 'หกแสนสามหมื่นห้าพันสี่ร้อยเจ็ดสิบสาม');
        $this->assertEquals($npResult, 'छ लाख पैतीस हजार चार सय तिरत्तर मात्र');

        $number   = 1547460;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'One Million Five Hundred and Fourty Seven Thousand Four ' .
            'Hundred and Sixty Only');
        $this->assertEquals($thResult, 'หนึ่งล้านห้าแสนสี่หมื่นเจ็ดพันสี่ร้อยหกสิบ');
        $this->assertEquals($npResult, 'पन्ध्र लाख सड्चालिस हजार चार सय साठी मात्र');

        $number   = 51547460;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Fifty One Million Five Hundred and Fourty Seven Thousand ' .
            'Four Hundred and Sixty Only');
        $this->assertEquals($thResult, 'ห้าสิบเอ็ดล้านห้าแสนสี่หมื่นเจ็ดพันสี่ร้อยหกสิบ');
        $this->assertEquals($npResult, 'पाच करोड पन्ध्र लाख सड्चालिस हजार चार सय साठी मात्र');

        $number   = 876785432;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Eight Hundred and Seventy Six Million Seven Hundred and Eighty Five ' .
            'Thousand Four Hundred and Thirty Two Only');
        $this->assertEquals($thResult, 'แปดร้อยเจ็ดสิบหกล้านเจ็ดแสนแปดหมื่นห้าพันสี่ร้อยสามสิบสอง');
        $this->assertEquals($npResult, 'सतास्सी करोड सड्सठी लाख पचास्सी हजार चार सय बतीस मात्र');

        $number   = 6485938264;
        $enResult = $this->numberToWord->convertNumberToWord($number, 'en');
        $thResult = $this->numberToWord->convertNumberToWord($number, 'th');
        $npResult = $this->numberToWord->convertNumberToWord($number, 'np');

        $this->assertEquals($enResult, 'Six Billion Four Hundred and Eighty Five Million Nine Hundred and ' .
            'Thirty Eight Thousand Two Hundred and Sixty Four Only');
        $this->assertEquals($thResult, 'หกพันสี่ร้อยแปดสิบห้าล้านเก้าแสนสามหมื่นแปดพันสองร้อยหกสิบสี่');
        $this->assertEquals($npResult, 'छ अरब अड्चालिस करोड उनन्साठी लाख अड्तीस हजार दुई सय चौसठी मात्र');
    }
}
