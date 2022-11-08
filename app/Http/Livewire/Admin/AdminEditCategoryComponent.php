<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;





class AdminEditCategoryComponent extends Component{


	public $category_slug;
	public $category_id;
	public $name;
	public $slug;
	public $scategory_id;
	public $scategory_slug;


	public function mount($category_slug, $scategory_slug=null){ // $scategory_slug = null  Opcionális paraméter web.php: {scategory_slug?}'

		if($scategory_slug){
			
			$this->scategory_slug = $scategory_slug;
			$scategory = Subcategory::where('slug', $scategory_slug)->first();
			$this->scategory_id = $scategory->category_id;
			$this->name = $scategory->name;
			$this->slug = $scategory->slug;
			//dd($this->category_id);
		}else{
	

			$this->category_slug = $category_slug;
			$category = Category::where('slug', $category_slug)->first();
			$this->category_id = $category->id;
			$this->name = $category->name;
			$this->slug = $category->slug;

		}

	}


	public function generateslug(){

		$this->slug = Str::slug($this->name);
	}	




		public function updated($fields){

		$this->validateOnly($fields, [

            'name'=> 'required',
			'slug'=> 'required | unique:categories' // A categories az adatbázis tábla neve. És a unique akadályozza meg, hogy mégegyszer ugyanazt a kategória nevet ne lehessen megadni

		]);
	}






	public function updateCategory(){ //<form class="form-horizontal" wire:submit.prevent="updateCategory"> edmin-edit-category-comopnent.blade.php

		$this->validate([


			'name'=> 'required',
			'slug'=> 'required | unique:categories' // A categories az adatbázis tábla neve. És a unique akadályozza meg, hogy mégegyszer ugyanazt a kategória nevet ne lehessen megadni

		]);

		if ($this->scategory_id) {
			
			$scategory = Subcategory::find($this->scategory_id);
			$scategory->name = $this->name;
			$scategory->slug = $this->slug;
			$scategory->category_id = $this->category_id;
			$scategory->save();
		}else{

		    $category = Category::find($this->category_id);
			$category->name = $this->name;
			$category->slug = $this->slug;
			$category->save();
		}

		session()->flash('messages', 'Kategória frissítése sikeres');
	}


    public function render(){

		$categories = Category::all();
        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories])->layout('layouts.base'); // A paraméterek a view fájlba mennek
    }
}
