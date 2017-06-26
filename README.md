# Number to Word

Very easy and light package for converting number to word on different languages.

## Installation
### Composer
Add Number to Word to your composer.json file

    "rohit/number-to-word": "^1.0"
Run `composer install` to get the latest version of package

Or you can directly run the `composer require` command

    composer require rohit/number-to-word

### Configuration
After the package install is completed you need to configure `config/app.php` and add `Providers` and `Aliases`

```php
    'providers` => [
        .......
        .......
        Rohit\NumberToWord\NumberToWordServiceProvider::class
    ]
```
```php
    'aliases' => [
        ......
        ......
        'NumberToWord' => Rohit\NumberToWord\Facades\NumberToWord::class
    ]
```

### Vendor Publish
After the above steps, you need to publish vendor for this packge. It will create `line-pay.php` file under `config` folder. This folder contains the configuration for your locales.

    php artisan vendor:publish --provider="Rohit\NumberToWord\NumberToWordServiceProvider"

The file `number-to-word.php` will contain the following structure. The following structure is for english. You can add configs for other languages as well.
```php
    <?php

    return [
        'en' => [
            'use-space' => true,
            'and-word' => 'and',
            'ending-word' => 'only',
            'divisors' => [
                'Trillion' => 1000000000000,
                'Billion' => 1000000000,
                'Million' => 1000000,
                'Thousand' => 1000,
                'Hundred' => 100,
            ],
            'mapping' => [
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
            ],
        ],
        'th' => [
            'use-space' => false,
            'and-word' => '',
            'ending-word' => '',
            'divisors' => [
                'ล้าน' => 1000000,
                'แสน' => 100000,
                'หมื่น' => 10000,
                'พัน' => 1000,
                'ร้อย' => 100,
            ],
            'mapping' => [
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
                12 => 'สิบสอง',
                13 => 'สิบสาม',
                14 => 'สิบสี่',
                15 => 'สิบห้า',
                16 => 'สิบหก',
                17 => 'สิบเจ็ด',
                18 => 'สิบแปด',
                19 => 'สิบเก้า',
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
            ],
        ],
        'np' => [
            'use-space' => true,
            'and-word' => '',
            'ending-word' => 'मात्र',
            'divisors' => [
                'अरब' => 1000000000,
                'करोड' => 10000000,
                'लाख' => 100000,
                'हजार' => 1000,
                'सय' => 100,
            ],
            'mapping' => [
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
            ],
        ]
    ];

```
### Functions
* #### Convert To Word
    You can convert any number to word depending on your config
    ```php
    NumberToWord::convertNumberToWord(1364, 'en');
    NumberToWord::convertNumberToWord(1364, 'th');
    NumberToWord::convertNumberToWord(1364, 'np');
    ```
    The result of the above function will be as follows:
    ```php
    One Thousand Three Hundred and Sixty Four Only
    หนึ่งพันสามร้อยหกสิบสี่
    एक हजार तीन सय चौसठी मात्र
    ```
