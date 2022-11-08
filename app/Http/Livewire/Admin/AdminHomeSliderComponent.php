<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component{



	// Slider törlése:
	public function deleteSlide($slide_id){ // wire:click.prevent="deleteSlide({{$slider->id}})"  (admin-home-slider-component.blade)


		$slider = HomeSlider::find($slide_id);
		$slider->delete();
		session()->flash('message', 'Slide sikeresen törölve!');

	}





    public function render(){

    	$sliders = HomeSlider::all();

        return view('livewire.admin.admin-home-slider-component', ['sliders'=>$sliders])->layout('layouts.base');
    }
}
