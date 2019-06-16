<?php 

class jobSeekerCest{


    public function main(AcceptanceTester $I){
        $I->maximizeWindow();
        $I->amOnUrl('https://google.com');
        $I->fillField(['css' => 'input.gLFyf'], 'MoroSystems');
        $this->wsClick($I, ['css' => 'input.gNO89b']);
        for ($i=1; $i <= 5; $i++) {
            $this->wsClick($I, ['css' => '.srg > .g:nth-child('.$i.') h3']);
            try {
                $I->see('morosystems');
                $I->click(['css' => '#menu-secondary-menu > li.headerLanguage > a > img']);
                $this->wsClick($I, ['css'=>'.js-careerLink']);
            } catch (Exception $e) {
                $I->moveBack();
                continue;
            }
            break;
        }
        $I->comment("\e[1;32mTest finished press enter to close window.\e[0m");
        $I->pause('rep');
    }


    private function wsClick(AcceptanceTester $I, $selector){
        $I->waitForElementClickable($selector);
        $I->scrollTo($selector,0,-100);
        $I->click($selector);
    }

}
