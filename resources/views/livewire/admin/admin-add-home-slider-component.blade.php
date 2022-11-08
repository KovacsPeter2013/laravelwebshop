<div>
   <div class="container" style="padding: 30px 0;">
   		<div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						<div class="row">
   							<div class="col-md-6">
   								Új slider hozzáadás
   							</div>
   							<div class="col-md-6">
   								<a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">Összes slider</a>
   							</div>
   						</div>
   					</div>
   					<div class="panel-body">

   						@if(Session::has('message'))

   							<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
   						@endif

   						<form class="form-horizontal" wire:submit.prevent="addSlide">
   							<div class="form-group">
   								<label class="col-md-4 contol-label">Cím</label>
   								<div class="col-md-4">
   									<input type="text" name="" placeholder="Cím" class="form-control input-md" wire:model="title"/>
   								</div>
   							</div>
  				   			<div class="form-group">
   								<label class="col-md-4 contol-label">Alcím</label>
   								<div class="col-md-4">
   									<input type="text" name="" placeholder="Alcím" class="form-control input-md" wire:model="subtitle"/>
   								</div>
   							</div>

     						<div class="form-group">
   								<label class="col-md-4 contol-label">Ár</label>
   								<div class="col-md-4">
   									<input type="text" name="" placeholder="Ár" class="form-control input-md" wire:model="price"/>
   								</div>
   							</div>
   							<div class="form-group">
   								<label class="col-md-4 contol-label">Link</label>
   								<div class="col-md-4">
   									<input type="text" name="" placeholder="Link" class="form-control input-md" wire:model="link"/>
   								</div>
   							</div>


   							<div class="form-group">
   								<label class="col-md-4 contol-label">Fotó</label>
   								<div class="col-md-4">
   									<input type="file" class="input-file" wire:model="image"/>

   									@if($image)
   									<img src="{{$image->temporaryUrl()}}" width="120"/>
   									@endif
   								</div>
   							</div>

			               <div class="form-group">
   								<label class="col-md-4 contol-label">Státusz</label>
   								<div class="col-md-4">
   									<select class="form-control" wire:model="status">
   										<option value="0">Inaktív</option>
   										<option value="1">Aktív</option>
   									</select>
   								</div>
   							</div>


   							<div class="form-group">
   								 
   								<div class="col-md-4">
   									<button type="submit" class="btn btn-primary">Mentés</button>
   								</div>
   							</div>


   						</form>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</div>
