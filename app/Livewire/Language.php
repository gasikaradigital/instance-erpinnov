<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class Language extends Component
{
    public $currentLocale;

    public function mount()
    {
        $this->currentLocale = app()->getLocale();
    }

    public function setLocale($locale)
    {
        if (!in_array($locale, ['fr', 'en'])) {
            return;
        }

        session()->put('locale', $locale);
        App::setLocale($locale);
        $this->currentLocale = $locale;

        $this->redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.language');
    }
}
