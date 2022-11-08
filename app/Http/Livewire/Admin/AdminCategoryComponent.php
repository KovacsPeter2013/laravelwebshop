<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoryComponent extends Component
{



	public function deleteCategory($id){ // wire:click.prevent="deleteCategory"  (admin-category-component.blade.php)

		$category = Category::find($id);
		$category->delete();
		session()->flash('message', 'Kategória törlése sikeres');
	}





    public function render()
    {


    	$categories = Category::paginate(5);


        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
