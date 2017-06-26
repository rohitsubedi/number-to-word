<?php

namespace Rohit\NumberToWord;

class NumberToWord
{
    protected $divisors;
    protected $useSpace;
    protected $mapping;
    protected $andWord;
    protected $ending;

    /**
     * Assign Variables
     *
     * @param string $lang
     *
     * @return null
     */
    private function assignVariables(string $lang = 'en')
    {
        $this->divisors = config('number-to-word.' . $lang . '.divisors', []);
        $this->useSpace = config('number-to-word.' . $lang . '.use-space', false) ? ' ' : '';
        $this->mapping  = config('number-to-word.' . $lang . '.mapping', []);
        $this->andWord  = config('number-to-word.' . $lang . '.and-word', '');
        $this->ending   = config('number-to-word.' . $lang . '.ending-word', '');
        $this->numbers  = array_flip($this->divisors);
    }

    /**
     * Converts Number to Word
     *
     * @param int $number
     * @param string $lang
     *
     * @return string
     */
    private function convert(int $number, string $lang)
    {
        foreach ($this->divisors as $key => $divisor) {
            $val = floor($number / $divisor);

            if ($val == 0) continue;

            $number     = $number % $divisor;
            $rems[$key] = $val;
        }

        if ($number) {
            $rems['ones'] = $number;
        }

        $countRems  = count($rems);
        $counter    = 0;
        $langString = '';

        foreach ($rems as $key => $rem) {
            $counter++;

            if ($countRems > 1 && $counter == $countRems) {
                $langString.= $this->andWord . $this->useSpace;
            }

            if ($key == 'ones') {
                if (!isset($this->mapping[$rem])) {
                    $val = floor($rem / 10);
                    $rem = $rem % 10;
                    $langString.= $this->useSpace . ($this->mapping[($val * 10)] ?? '') . $this->useSpace;
                }

                $langString.= ($rem ? ($this->mapping[$rem] ?? '') : '');

                break;
            }

            if (isset($this->mapping[$rem])) {
                $langString.= $this->mapping[$rem] . $this->useSpace . $key . $this->useSpace;
                continue;
            }

            $langString.= $this->convert($rem, $lang) . $this->useSpace . $key . $this->useSpace;
        }

        return preg_replace('/\s+/', ' ', $langString);
    }

    /**
     * Assign Variables and return Converted number to word
     *
     * @param int $number
     * @param string $lang
     *
     * @return string
     */
    public function convertNumberToWord(int $number, string $lang = 'en') : string
    {
        $this->assignVariables($lang);

        return trim($this->convert($number, $lang) . $this->useSpace . $this->ending);
    }
}
