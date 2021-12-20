<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Weather extends Component
{
    protected $city;
    protected $startDate;
    protected $endDate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $city = '',
        $startDate = '',
        $endDate = ''
    )
    {
        $this->city = $city;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     * @throws \Exception
     */
    public function render()
    {
        return view(
            'components.weather',
            [
                'city' => $this->city,
                'startDate' => $this->startDate,
                'endDate' => $this->endDate,
                'id' => bin2hex(random_bytes(16))
            ]
        );
    }
}
