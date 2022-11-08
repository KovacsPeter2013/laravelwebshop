<div>
	<div class="container" style="padding: 30px 0;">
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3>Termék szerkesztése</h3>
							</div>
							<div class="col-md-6">
								<a href="{{route('admin.products')}}" class="btn btn-success pull-right">Összes Termék</a>
							</div>
						</div>
					</div>

					<div class="panel-body">

						@if(Session::has('message'))

						<div class="alert alert-success" role="alert" >{{Session::get('message')}}</div>

						@endif

						<form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
							<div class="form-group">
								<label class="col-md-4 control-label">Temék neve</label>
								<div class="col-md-4">
									<input type="text" placeholder="Termék neve" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
										 @error('name') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Termék slug</label>
								<div class="col-md-4">
									<input type="text" placeholder="Termék slug" class="form-control input-md" wire:model="slug"/>
										 @error('slug') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>
								<div class="form-group">
								<label class="col-md-4 control-label">Rövid leírás</label>
								<div class="col-md-4">
									
									<textarea class="form-control" placeholder="Rövid leírás" wire:model="short_description"></textarea>
										 @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>

								<div class="form-group">
								<label class="col-md-4 control-label">Termék Leírása</label>
								<div class="col-md-4">
									
									<textarea class="form-control" placeholder="leírás" wire:model="description"></textarea>
										 @error('description') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>




							<div class="form-group">
								<label class="col-md-4 control-label">Regular price</label>
								<div class="col-md-4">
									<input type="text" placeholder="Regular price" class="form-control input-md" wire:model="regular_price"/>
										 @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Akciós Ár</label>
								<div class="col-md-4">
									<input type="text" placeholder="Sale price" class="form-control input-md" wire:model="sale_price"/>
										 @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">SKU</label>
								<div class="col-md-4">
									<input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
										 @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>





     						<div class="form-group">
								<label class="col-md-4 control-label">Raktár</label>
								<div class="col-md-4">
									<select class="form-control" wire:model="stock_status">
										<option value="instock">Raktáron</option>
										<option value="outofstock">Nincs raktáron</option>
									</select>
										 @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Kiemelt</label>
								<div class="col-md-4">
									<select class="form-control" wire:model="featured">
										<option value="0">Nem</option>
										<option value="1">Igen</option>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Darabszám</label>
								<div class="col-md-4">
									<input type="text" placeholder="Darabszám" class="form-control input-md" wire:model="quantity"/>
										 @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Termék fotó</label>
								<div class="col-md-4">
									<input type="file"  class="input-file" wire:model="newimage"/>
									@if($newimage)

										<img src="{{$newimage->temporaryUrl()}}"  width="120"/>

										@else
											<img src="{{asset('assets/images/products')}}/{{$image}}" width="120" />

									@endif
										 @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Termék galéria</label>
								<div class="col-md-4">
									<input type="file"  class="input-file" wire:model="newimages" multiple="" />
									@if($newimages)

										@foreach($newimages as $newimage)

										@if($newimage)

											<img src="{{$newimage->temporaryUrl()}}" width="120" />

										@endif

										@endforeach

										@else
										
										@foreach($images as $image)

										@if($image)

										<img src="{{asset('assets/images/products')}}/{{$image}}" width="120" />
										@endif
										@endforeach	

									@endif
										
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kategória</label>
								<div class="col-md-4">
									<select class="form-control" wire:model="category_id">
										<option value="0">Válassz kategóriát</option>

										@foreach($categories as $category)

										<option value="{{$category->id}}">{{$category->name}}</option>

										@endforeach


									</select>
										 @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
								</div>
							</div>
							<div class="form-group">
                                <label class="col-md-4 control-label">Termék attribútumok</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="attr">
                                        <option value="0">Válassz attribútumot</option>

                                        @foreach($pattributes as $pattribute)

                                        <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info" wire:click.prevent="add">Hozzáadás</button>
                                </div>
                            </div>

							@foreach($inputs as $key => $value)

							<div class="form-group">
                                <label class="col-md-4 control-label">{{$pattributes->where('id', $attribute_arr[$key])->first()->name}}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{$pattributes->where('id', $attribute_arr[$key])->first()->name}}" class="form-control input-md"
                                        wire:model="attribute_values.{{$value}}" />
                                
                                </div>

								<div class="col-md-1">
									<button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Eltávolít</button>
								</div>
                            </div>
							@endforeach






							<div class="form-group">
								<label class="col-md-4 control-label"></label>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">Frissítés</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

