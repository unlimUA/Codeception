<?php
namespace Step\MuzzaWeb;
use \Page\MuzzaWeb\MainPage;
class CheckSliders extends \WebGuy
{

    public function checkSliders()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->waitForElement(MainPage::$twagBox_banner);
        $I->seeElement(MainPage::$twagBox_banner);
        $I->seeInPageSource('Twagbox.com');
        $I->click(MainPage::$slider_next_button);
        $I->wait(1);
        $I->seeElement(MainPage::$linkJam_banner);
        $I->seeInPageSource('LinkJam');
        $I->click(MainPage::$slider_prev_button);
        $I->wait(1);
//        $I->seeElement(MainPage::$twagBox_banner);
//        $I->click(MainPage::$slider_pager);
//        $I->wait(1);
//        $I->seeElement(MainPage::$linkJam_banner);
//        $I->click(MainPage::$slider_pager);
//        $I->wait(1);
//        $I->seeElement(MainPage::$twagBox_banner);
        $I->click(MainPage::$twagBox_banner);
//        $I->wait(2);
        $I->seeCurrentUrlEquals('http://twagbox.com/');
//
    }

}