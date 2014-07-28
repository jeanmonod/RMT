<?php
/*
 * This file is part of the project RMT
 *
 * Copyright (c) 2013, Liip AG, http://www.liip.ch
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Liip\RMT\Tests\Unit\Config;

use Liip\RMT\Config\Handler;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Issue68
 * @package Liip\RMT\Tests\Unit\Config
 * @see https://github.com/liip/RMT/issues/68
 */
class Issue68Test extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider getYmlForActionListParsing
     */
    public function testActionListParsing($rawConfig)
    {
        $handler = new Handler(Yaml::parse($rawConfig));
        $config = $handler->getConfigForBranch('master');
        var_dump($config); exit();
    }

    public function getYmlForActionListParsing() {
        return array(
            // Associative array
//            array(<<<EOY
//version-generator: toto
//version-persister: tata
//prerequisites:
//    working-copy-check: ~
//    tests-check:
//        opt1: val1
//    tests-check:
//        opt2: val2
//EOY
//            ),
            // List of arrays
            array(<<<EOY
master:
  version-generator: toto
  version-persister: tata
  pre-release-actions:
    - working-copy-check
    - tests-check:
        opt1: val1
    - tests-check:
        opt2: val2
_default:
  version-generator: titi
EOY
            )
        );
    }

}
