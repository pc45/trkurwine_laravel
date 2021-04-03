<?php

namespace App\Http\Livewire;

use App\Models\Shippers;
use Livewire\Component;
use Livewire\WithPagination;

class SearchShipper extends Component
{
    public $term = "";
    use WithPagination;

    public function render()
    {
        sleep(1);
        $shippers = Shippers::search($this->term)->paginate(10);

        $data = [
            'shippers' => $shippers,
        ];
        return view('livewire.search-shipper', $data);
    }
}
