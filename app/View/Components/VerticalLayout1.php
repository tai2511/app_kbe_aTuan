<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VerticalLayout1 extends Component
{

    public $data;
    public $country;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data, $country)
    {
        $this->data = $data;
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->data;
        $country = $this->country;
        return view('components.vertical-layout1', compact('data', 'country'));
    }
}
