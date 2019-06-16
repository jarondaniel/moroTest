<?php 

class jobSeekerCest{

    public function main(AcceptanceTester $I){
        $I->maximizeWindow();
        $I->amOnUrl('https://google.com');
        $I->fillField(['css' => 'input.gLFyf'], 'MoroSystems');//main input field
        $this->wsClick($I, ['css' => 'input.gNO89b']);//search button
        for ($i=1; $i <= 5; $i++) {
            $this->wsClick($I, ['css' => '.srg > .g:nth-child('.$i.') h3']);//$ith of the results (first two are ommited)
            try {
                $I->see('morosystems');//check it is a moro webpage
                $I->see('references');//check it is an english webpage
                $I->click(['css' => '#menu-secondary-menu > li.headerLanguage > a > img']);//switch to czech version
                $this->wsClick($I, ['css'=>'.js-careerLink']);//click to career
            } catch (Exception $e) {
                $I->moveBack();//if page is wrong, go back to results
                continue;
            }
            break;
        }
        $I->comment("\e[1mTest finished press enter to close window.\e[0m");
        $I->pause();//
    }


    private function wsClick(AcceptanceTester $I, $selector){
        $I->waitForElementClickable($selector);
        $I->scrollTo($selector,0,-100);
        $I->click($selector);
    }

}
