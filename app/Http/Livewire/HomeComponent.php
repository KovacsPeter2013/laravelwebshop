<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\Sale;
use Carbon\Carbon;



class HomeComponent extends Component{



    public function render(){


    	$sliders = HomeSlider::where('status', 1)->get(); // itt kérdezi le a főoldalon a slidereket az adatbázisból 



    	$latest_products  = Product::orderBy('created_at', 'DESC')->get()->take(8);

    	$category         = HomeCategory::find(1);	
    	$cats             = explode(',', $category->sel_categories); // Ezek a @php környékén történnek (home-component.blade-ben) kicsit bonyolultabb
    	$categories       = Category::wherein('id', $cats)->get();
    	$no_of_products   = $category->no_of_products;
    	$sproducts        = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8); // take(8) = csak 8 rekord lekérdezése
        $sale             = Sale::find(1); // Visszaszámláló
        return view('livewire.home-component', ['sliders' => $sliders, 'latest_products' => $latest_products, 'categories' => $categories, 'no_of_products' => $no_of_products, 'sproducts' => $sproducts, 'sale' => $sale] )->layout('layouts.base'); // layouts.base = layouts mappában a base.blade.php;
    }
}
