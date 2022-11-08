<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\ProductAttribute;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Attributevalue;
use Livewire\WithFileUploads;
use Carbon\Carbon;




class AdminAddProductComponent extends Component{



    use WithFileUploads;
	public $name;			// Ezek vannak átadva a wire:model="" segítségével, az admin-add-product-comoponent.blade-ben	
	public $slug;
	public $short_description; // Pl. <textarea class="form-control" placeholder="Rövid leírás" wire:model="short_description">
	public $description;      // stb...
	public $regular_price;
	public $sale_price;
	public $SKU;
	public $stock_status;
	public $featured;
	public $quantity;
	public $image;
	public $category_id;
	public $images;

	public $attr;
	public $inputs = [];
	public $attribute_arr = [];
	public $attribute_values;


	public function mount(){  // Defaultnak ezek vannak beállítva

		$this->stock_status = 'instock';
		$this->featured = 0;
	}



	public function add(){ // Ez a gombkattintásra megjelenő plussz attribútum mező funkciója

		if(!in_array($this->attr, $this->attribute_arr)){
			array_push($this->inputs, $this->attr);
			array_push($this->attribute_arr, $this->attr);
		}
	}



	public function remove($attr){ // Ez a plussz attribútum  mező eltüntető funkciója

		unset($this->inputs[$attr]);
	}


	public function generateslug(){

		$this->slug = Str::slug($this->name, '-');
	}




	public function updated($fields){

		$this->validateOnly($fields,[

			    'name' => 'required',		
				'slug' => 'required | unique:products', // Ez figyel és szól ha már létezik ilyen termék slug az adatbázisban
				'short_description' => 'required', 
				'regular_price' => 'required | numeric:products',
				'sale_price' => 'numeric',
				'SKU' => 'required',
				'stock_status' => 'required',				
				'quantity' => 'required | numeric',
				'image' => 'required | mimes:jpeg, jpg, png',
				'category_id' => 'required'	 
		]);

	}



	public function addProduct(){


		// Validáció:
		$this->validate([

			    'name' => 'required',		
				'slug' => 'required | unique:products', // Ez figyel és szól ha már létezik ilyen termék slug az adatbázisban
				'short_description' => 'required', 
				'regular_price' => 'required | numeric:products',   // Numeric lehet csak
				'sale_price' => 'numeric',
				'SKU' => 'required',
				'stock_status' => 'required',
				
				'quantity' => 'required | numeric',
				'image' => 'required | mimes:jpeg, jpg, png',	 // Mik lehetnek a mime type-ok
				'category_id' => 'required'	




		]);
		$product = new Product();
		$product->name = $this->name;
		$product->slug = $this->slug;
		$product->short_description = $this->short_description;
		$product->description = $this->description;
		$product->regular_price = $this->regular_price;
		$product->sale_price = $this->sale_price;
		$product->SKU = $this->SKU;
		$product->stock_status = $this->stock_status;
		$product->featured = $this->featured;
		$product->quantity = $this->quantity;
		$imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
		$this->image->storeAs('products', $imageName);
		$product->image = $imageName;


		if ($this->images) {
			
			$imagesname = '';

			foreach ($this->images as $key => $image) {

		       $imgName = Carbon::now()->timestamp.  $key . '.' . $image->extension();
		       $image->storeAs('products', $imgName);

		       $imagesname = $imagesname . ',' . $imgName;

			}

			$product->images = $imagesname;

		}




		$product->category_id = $this->category_id;
		$product->save();


		foreach($this->attribute_values as $key => $attribute_value){

			$avalue = explode("," , $attribute_value);

			foreach($avalue as $avalue){

				$attr_value = new AttributeValue(); // Ez a Model a attributevalues tábla modelje
				$attr_value->product_attribute_id = $key; //  az attributevalues nevű tábla product_attribute_id nevű oszlopa
				$attr_value->value = $avalue;
				$attr_value->product_id = $product->id;
				$attr_value->save();
			}

		}

		session()->flash('message', 'Termék sikeresen létrehozva');

	}





    public function render(){


    	$categories = Category::all();

		$pattributes = ProductAttribute::all();

        return view('livewire.admin.admin-add-product-component', ['categories' => $categories, 'pattributes' => $pattributes])->layout('layouts.base');
    }
}