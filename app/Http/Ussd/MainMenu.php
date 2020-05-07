<?php

namespace App\Http\Ussd;

use App\Http\Ussd\MainMenu;
use Sparors\Ussd\State;

class MainMenu extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Application ready! Build something amazing.');
    }

    protected function afterRendering(string $argument): void
    {
    	$this->decision->any(MainMenu::class);
    }
}
