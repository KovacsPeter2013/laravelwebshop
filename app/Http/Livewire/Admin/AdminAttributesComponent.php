<?php

namespace App\Http\Livewire\Admin;
use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributesComponent extends Component{


    public function deleteAttribute($attribute_id){

        $pattribute = ProductAttribute::find($attribute_id);
        $pattribute->delete();
        session()->flash('message', 'Termék attribútum sikeresen törölve');

    }




    public function render(){


        $pattributes = ProductAttribute::paginate(10);     // Ezen megy végig a foreach a view fájlban : pattributes
        return view('livewire.admin.admin-attributes-component', ['pattributes' => $pattributes])->layout('layouts.base');
    }
}
