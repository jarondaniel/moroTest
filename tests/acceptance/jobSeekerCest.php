<?php 

class jobSeekerCest{

    public function main(AcceptanceTester $I){
        $I->maximizeWindow();
        $I->amOnUrl('https://google.com');
        $I->fillField(['css' => 'input.gLFyf'], 'MoroSystems');//main input field
        $this->wsClick($I, ['css' => 'input.gNO89b']);//search button
        for ($i=1; $i <= 8; $i++) {
            try {
                $this->wsClick($I, ['css' => '#rso > div.g:nth-child('.$i.') div.r > a']);//$ith of the results (first two are ommited)
            } catch (Exception $e) {
                continue;
            }

            try {
                $I->see('morosystems');//check it is a moro webpage
                $I->see('reference');
                $this->wsClick($I, ['css' => '#menu-hlavni-menu span.btn__text']);//contact page
                $I->see('MoroSystems, s.r.o.');
            } catch (Exception $e) {
                $I->moveBack();//if page is wrong, go back to results
                continue;
            }
            break;
        }
        $I->comment("\e[1mTest finished press enter to close window.\e[0m");
        $I->pause();
    }


    private function wsClick(AcceptanceTester $I, $selector){
        $I->waitForElementClickable($selector, 3);
        $I->scrollTo($selector,0,-100);
        $I->click($selector);
    }

}
