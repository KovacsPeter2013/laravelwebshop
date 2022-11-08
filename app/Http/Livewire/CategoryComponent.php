<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
class CategoryComponent extends Component
{


	public $sorting; 
	public $pagesize; 
    public $category_slug; 


	public function mount( $category_slug){
		$this->sorting = 'default';
		$this->pagesize = 12; // Itt lehet beaállítni mennyi terméket mutasson a listában kezdésnek
        $this->category_slug = $category_slug;
	}

	public function store($product_id, $product_name, $product_price){

		Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product'); // ez dob be egy darabot a kosárba

		session()->flash('success_message', 'Sikeresen a kosárba téve');
		return redirect()->route('product.cart');
	}



	#use WithPagination; Ezért nem működött a pagination (a tutorialban berakatta ide ezt)
    public function render()
    {

        $category = Category::where('slug', $this->category_slug)->first();

        $category_id = $category->id;
        $category_name = $category->name;


    	// Ez a shopcomponent.blade-ben az option value-jai. Azokat nézi melyik van kiválasztva és aszerint rendezi
    	if ($this->sorting == 'date') {
    	
    	    $products = Product::where('category_id', $category_id)->orderBy('created_at', 'ASC')->paginate($this->pagesize);
    	}else if ($this->sorting == 'price'){

    	    $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);

    	}else if($this->sorting == 'price-desc'){

    	    $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
    	}
    	else{

    	    $products = Product::where('category_id', $category_id)->paginate($this->pagesize);
    	}


    	$categories = Category::all();

        return view('livewire.category-component', ['products' => $products, 'categories' => $categories, 'category_name' =>$category_name])->layout('layouts.base');
    }
}
