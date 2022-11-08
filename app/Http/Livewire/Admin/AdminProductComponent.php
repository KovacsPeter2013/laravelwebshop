<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component{


	use WithPagination;

	public $searcTerm;


	public function deleteProduct($id){ //  <a href="" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times 2x text-danger"></i></a> (admin-product-component.blade)

		$product = Product::find($id);


		if($product->image){

			unlink('assets/images/products'.'/'.$product->image);

		}


		if ($product->images) {

				$images = explode(',', $product->images);

				foreach ($images as $image) {

					if($image){

			unlink('assets/images/products'.'/'.$image);

					}
					


				}
		}


		$product->delete();
		session()->flash('message', 'Termék törlése sikeres');

	}





    public function render(){

    	$search = '%'. $this->searcTerm . '%';
    	$products = Product::where('name', 'LIKE', $search)
    	->orWhere('stock_status', 'LIKE', $search)
    	->orWhere('regular_price', 'LIKE', $search)
    	->orWhere('sale_price', 'LIKE', $search)
    	->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.base');
    }
}
