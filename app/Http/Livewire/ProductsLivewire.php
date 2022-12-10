<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Images;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithPagination;

class ProductsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category = '';
    public $paginate = 10;
    public $brand = '';
    public $search = '';
    public $page = 1;
    public $sort_type = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $featured = DB::table('products')
            ->where('type', 'Featured Products')
            ->offset(0)
            ->limit(3)
            ->get();

        $categories = Category::where('status', 'enabled')->orderByDesc('id')->get();
        $brands = Brand::where('status', 'enabled')->orderByDesc('id')->get();

        if($this->category == '' and $this->brand == ''){
            $allproducts = DB::table('products')
                ->where('status', 'Publish')
                ->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%')
                ->orderBy('id', $this->sort_type)
                ->paginate($this->paginate);
        }elseif($this->category != '') {
            $allproducts = DB::table('products')
                ->where('status', 'Publish')
                ->where('name', 'like', '%'.$this->search.'%')
                ->where('category', $this->category)
                ->orderBy('id', $this->sort_type)
                ->paginate($this->paginate);
        }elseif($this->brand != '') {
            $allproducts = DB::table('products')
                ->where('status', 'Publish')
                ->where('name', 'like', '%'.$this->search.'%')
                ->where('brand', $this->brand)
                ->orderBy('id', $this->sort_type)
                ->paginate($this->paginate);
        }
        
        return view('livewire.products-livewire',[
            'allproducts' => $allproducts,
            'featured' => $featured,
            'brands' => $brands,
            'categories'=> $categories,
        ]);
    }

    public function sortbycategory($catevalue){
        $this->category =  $catevalue;
    }

    public function sortbybrand($brandvalue){
        $this->brand =  $brandvalue;
    }
}
