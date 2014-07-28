<?php
/*
 * This file is part of the project RMT
 *
 * Copyright (c) 2013, Liip AG, http://www.liip.ch
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Liip\RMT\Tests\Functional;


use Symfony\Component\Yaml\Yaml;

class Issue86Test extends RMTFunctionalTestBase
{
    public function testExplosion()
    {
        $this->createConfig("semantic", "changelog", Yaml::parse(<<<EOY
pre-release-actions:
 - "changelog-update":
    format: semantic
 - "changelog-update":
    format: semantic
EOY
        ));

//        $this->manualDebug();


        // First release must contain as message explaining why there is no commit dump
        exec('./RMT current', $output);
        var_dump($output); exit;
    }

}

