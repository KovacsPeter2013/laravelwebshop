<div>
	<style>
		nav svg{
			height: 20px;
		}

		nav .hidden{
			display: block !important;
		}

		.sclist{
			list-style: none;			
		}
	</style>
    <div class="container" style="padding: 30px 0; ">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<div class="row">
                        Minden Kategória            
                    </div>
                    <div class="row">
                        <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Új hozzáadása</a>
                    </div>
    			</div>
    			<div class="panel-body">

                    @if(Session::has('message'))

                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif

    				<table class="table table-striped">
    					<thead>
    						<tr>
    							<th>Id</th>
    							<th>Category name</th>
    							<th>Slug</th>
								<th>Alkategória</th>
    							<th>Művelet</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach ($categories as $category)

    						<tr>
    							<td>{{$category->id}}</td>
    							<td>{{$category->name}}</td>
    							<td>{{$category->slug}}</td>
							    <td>
									<ul class="sclist">
										@foreach($category->subCategories as $scategory)
										<li><i class="fa fa-caret-right"></i>{{$scategory->name }} <a href="{{route('admin.editcategory', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug])}}"><i class="fa fa-edit"></i></a></li>
										@endforeach
									</ul>
								</td>	
    							<td>
                                    <a href="{{route('admin.editcategory', ['category_slug' =>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>      
                                    <a href="#" onclick="confirm('Biztosan törlöd ezt a kategóriát?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>               
                                </td>
    						</tr>

    						@endforeach
    					</tbody>    					
    				</table>
    				{{$categories->links()}}
    			</div>
    		</div>
    	</div>
    </div>
</div>
