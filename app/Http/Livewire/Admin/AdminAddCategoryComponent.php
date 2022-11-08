<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;




class AdminAddCategoryComponent extends Component{





	
	public $name;// hozzákötés az elküldő formban(admin-add-category-component.blade-ben): wire:model="name"
	public $slug;// hozzákötés az elküldő formban(admin-add-category-component.blade-ben): wire:model="slug"


	public $category_id;







	public function generateslug(){ // Itt generálódik a slug. Az inputmezőben így van ráhívva a name mezőre: wire:keyup="generateslug"

		$this->slug = Str::slug($this->name);
	}


	public function updated($fields){

		$this->validateOnly($fields, [

            'name'=> 'required',
			'slug'=> 'required | unique:categories' // A categories az adatbázis tábla neve. És a unique akadályozza meg, hogy mégegyszer ugyanazt a kategória nevet ne lehessen megadni

		]);
	}

	public function storeCategory(){ // Ez a form submitnál hívódik meg:  wire:submit.prevent="stroreCategory" 

		$this->validate([

			'name'=> 'required',
			'slug'=> 'required | unique:categories' // A categories az adatbázis tábla neve

		]);


		if ($this->category_id) {
			
			$scategory = new Subcategory();
			$scategory->name = $this->name;
			$scategory->slug = $this->slug;
			$scategory->category_id = $this->category_id;
			$scategory->save();

		}else{

	    $category = new Category();
		$category->name = $this->name;
		$category->slug = $this->slug;
		$category->save();

		}
		session()->flash('messages', 'Kategória sikeresen létrejött');


		
		
	}

    public function render(){

    	$categories = Category::all();
        return view('livewire.admin.admin-add-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
