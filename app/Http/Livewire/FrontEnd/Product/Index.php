<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;
//    protected $queryString = [
//        'brandInputs' => ['except' => '', 'as' => 'brand'],
//        'priceInput' => ['except' => '', 'as' => 'price'],
//    ];

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $this->products = product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand_id', $this->brandInputs);
            })
            ->when($this->priceInput, function ($q) {
                $q->when($this->priceInput == 'hight-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'desc');
                })->when($this->priceInput == 'low-to-hight', function ($q2) {
                    $q2->orderBy('selling_price', 'asc');
                });

            })
            ->where('status', '0')->get();
        return view('livewire.front-end.product.index', ['products' => $this->products, 'category' => $this->category]);
    }
}
