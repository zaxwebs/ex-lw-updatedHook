<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $users = [
        [
            'name' => 'Zack',
            'settings' => [
                'notifications' => false,
                'theme' => 1,
                'key' => '4225965860'
            ]
        ],
        [
            'name' => 'Sarah',
            'settings' => [
                'notifications' => false,
                'theme' => 1,
                'key' => '2535230536'
            ]
        ],
        [
            'name' => 'James',
            'settings' => [
                'notifications' => false,
                'theme' => 1,
                'key' => '0524548004'
            ]
        ]
    ];

    public $rooms = [5, 7, 8, 21];

    public function updatedUsers($value, $key)
    {
        dd($value, $key);
    }

    public function updatedRooms($value, $key)
    {
        dd($value, $key);
    }

    public function render()
    {
        return view('livewire.index');
    }
}
