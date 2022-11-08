<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component{

	use WithFileUploads;

	public $title;
	public $subtitle;
	public $price;
	public $link;
	public $image;
	public $status;
	

	public function mount(){


		$this->status = 0;
	}


	public function addSlide(){ // Funkció meghívása: <form class="form-horizontal" wire:submit.prevent="addSlide"> (dmin-add-home-slider:)

		$slider = new HomeSlider();

		$slider->title = $this->title;
		$slider->subtitle = $this->subtitle;
		$slider->price = $this->price;
		$slider->link = $this->link;
		$imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
		$this->image->storeAs('sliders', $imagename); // Itt van megadva melyik mappába mentse
		$slider->image = $imagename;
		$slider->status = $this->status;

		$slider->save();

		session()->flash('message', 'Slider sikeresen létrehozva');
	}


    public function render(){
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
