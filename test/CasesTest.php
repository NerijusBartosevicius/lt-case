<?php

declare(strict_types=1);

use NeriBa\LTCase\CaseException;
use NeriBa\LTCase\LTCase;
use PHPUnit\Framework\TestCase;

/**
 * @author: Nerijus Bartoševičius
 * @created: 2022-11-16
 */
class CasesTest extends TestCase
{
    private string $phrase = ' !"#$%&\'()*+,-./0123456789:;kęstutis<=>?@[]mažvydas^_`';

    /**
     * @throws CaseException
     */
    public function test_kil_case_result(): void
    {
        $this->assertEquals(
            'Kęstučio Mažvydo',
            LTCase::get($this->phrase, 'kil')
        );
    }

    /**
     * @throws CaseException
     */
    public function test_nau_case_result(): void
    {
        $this->assertEquals(
            'Kęstučiui Mažvydui',
            LTCase::get($this->phrase, 'nau')
        );
    }

    /**
     * @throws CaseException
     */
    public function test_gal_case_result(): void
    {
        $this->assertEquals(
            'Kęstutį Mažvydą',
            LTCase::get($this->phrase, 'gal')
        );
    }

    /**
     * @throws CaseException
     */
    public function test_ina_case_result(): void
    {
        $this->assertEquals(
            'Kęstučiu Mažvydu',
            LTCase::get($this->phrase, 'ina')
        );
    }

    /**
     * @throws CaseException
     */
    public function test_vie_case_result(): void
    {
        $this->assertEquals(
            'Kęstutyje Mažvyde',
            LTCase::get($this->phrase, 'vie')
        );
    }

    /**
     * @throws CaseException
     */
    public function test_non_existent_case_result(): void
    {
        $this->expectException(CaseException::class);

        $this->assertEquals(
            'Kęstuti Mažvydai',
            LTCase::get($this->phrase, 'xxx')
        );
    }
}