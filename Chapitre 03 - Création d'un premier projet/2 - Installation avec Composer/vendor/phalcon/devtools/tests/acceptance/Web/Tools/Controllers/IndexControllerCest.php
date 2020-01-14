<?php
declare(strict_types=1);

namespace Phalcon\DevTools\Tests\Acceptance\Web\Tools\Controllers;

use AcceptanceTester;

final class IndexControllerCest
{
    /**
     * @covers \Phalcon\Devtools\Web\Tools\Controllers\IndexController::indexAction
     * @param AcceptanceTester $I
     */
    public function testIndexAction(AcceptanceTester $I): void
    {
        $I->amOnPage('/webtools.php/');
        $I->see('Dashboard');
        $I->see('Welcome to WebTools');
    }
}
