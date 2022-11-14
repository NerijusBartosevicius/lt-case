<?php
/**
 * @author: Nerijus Bartoševičius
 * @created: 2022-11-12
 */

namespace NeriBa\LTCase;

class LTCase
{
    /*
     * kilmininkas / genitive (ko?)
     */
    static private $kil = array(
        'a' => 'os',
        'as' => 'o',
        'ė' => 'ės',
        'tis' => 'čio',
        'dis' => 'džio',
        'is' => 'io',
        'us' => 'aus',
        'tys' => 'čio',
        'dys' => 'džio',
        'ys' => 'io'
    );

    /*
     * naudininkas / dative (kam?)
     */
    static private $nau = array(
        'a' => 'ai',
        'as' => 'ui',
        'ė' => 'ei',
        'tis' => 'čiui',
        'dis' => 'džiui',
        'is' => 'iui',
        'us' => 'ui',
        'tys' => 'čiui',
        'dys' => 'džiui',
        'ys' => 'iui'
    );

    /*
     * galininkas / accusative (ką?)
     */
    static private $gal = array(
        'a' => 'ą',
        'as' => 'ą',
        'ė' => 'ę',
        'is' => 'į',
        'us' => 'ų',
        'ys' => 'į'
    );

    /*
     * įnagininkas / instrumental (kuo?)
     */
    static private $ina = array(
        'a' => 'a',
        'as' => 'u',
        'ė' => 'e',
        'tis' => 'čiu',
        'dis' => 'džiu',
        'is' => 'iu',
        'us' => 'u',
        'tys' => 'čiu',
        'dys' => 'džiu',
        'ys' => 'iu'
    );

    /*
     *  vietininkas / locative (kur? kame?)
     */
    static private $vie = array(
        'a' => 'oje',
        'as' => 'e',
        'ė' => 'ėje',
        'is' => 'yje',
        'us' => 'uje',
        'ys' => 'yje'
    );

    /*
     * šauksmininkas / vocative
     */
    static private $sau = array(
        'a' => 'a',
        'as' => 'ai',
        'ė' => 'e',
        'is' => 'i',
        'us' => 'au',
        'ys' => 'y'
    );

    /**
     * @param  string  $phrase
     *
     * @return string
     */
    static protected function preparePhrase($phrase)
    {
        return mb_convert_case(trim(mb_eregi_replace('([^a-ž]+)', ' ', $phrase)), MB_CASE_TITLE);
    }

    /**
     * @param  string  $phrase
     * @param  string  $case
     *
     * @return string
     * @throws CaseException
     */
    static protected function toCase($phrase, $case = 'sau')
    {
        if (property_exists(self::class, $case)) {
            foreach (self::$$case as $from => $to) {
                if (mb_substr($phrase, -mb_strlen($from)) === $from) {
                    return mb_substr($phrase, 0, -mb_strlen($from)).$to;
                }
            }
        } else {
            throw new CaseException(
                'Wrong case! Possible cases: '.implode(',', array_keys(get_class_vars(self::class)))
            );
        }

        return $phrase;
    }

    /**
     * @param  string  $phrase
     * @param  string  $case
     * @param  string  $encoding
     *
     * @return string
     * @throws CaseException
     */
    static public function get($phrase, $case = 'sau', $encoding = 'UTF-8')
    {
        mb_internal_encoding($encoding);

        $modifiedCase = array_map(
            static function ($part) use ($case) {
                return self::toCase($part, $case);
            },
            explode(' ', self::preparePhrase($phrase))
        );

        return $modifiedCase ? implode(' ', $modifiedCase) : $phrase;
    }

}