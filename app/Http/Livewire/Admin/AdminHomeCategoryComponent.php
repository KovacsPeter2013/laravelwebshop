<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;




class AdminHomeCategoryComponent extends Component{



	public $selected_categories = []; // bindolás: wire:model="selected_categories" az admin-homecategory-component.blade-ben
	public $numberofproducts; // bindolás:  wire:model="numberofproducts"    ugyanabban a fájlban


	public function mount(){

		$category = HomeCategory::find(1);
		$this->selected_categories = explode(',', $category->selected_categories);
		$this->numberofproducts = $category->no_of_products;

	}


     public function updateHomeCategory(){ // wire:submit.prevent="updateHomeCategory"


     	$category = HomeCategory::find(1); // 1-es id az adatbázisban
     	$category->sel_categories = implode(',', $this->selected_categories);
     	$category->no_of_products = $this->numberofproducts;
     	$category->save();
     	session()->flash('message', 'Kezdőlap kategória sikeresen frissítve');


     }

    public function render(){

    	$categories = Category::all();
    	// A tömbben átadott értékeken megy végig a foreach, a view fájlban:
        return view('livewire.admin.admin-home-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
