<div>
   <div class="container" style="padding: 30px 0;">
   		
   		<div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						Beállítások
   					</div>

   					<div class="panel-body">

   						@if(Session::has('message'))

   						<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
   						@endif
   						<form class="form-horizontal" wire:submit.prevent="saveSettings">
   							<div class="form-group">
   								<label class="col-md-4 control-label">Email</label>

   								<div class="col-md-4">
   									<input type="email"  placeholder="email" class="form-control input-md" wire:model="email">
   									@error('email') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>

   						<div class="form-group">
   								<label class="col-md-4 control-label">Telefonszám</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Telefonszám" class="form-control input-md"  wire:model="phone">
   									@error('phone') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>

   					    <div class="form-group">
   								<label class="col-md-4 control-label">Telefonszám2</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Telefonszám2" class="form-control input-md"  wire:model="phone2">
   									@error('phone2') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>

   					     <div class="form-group">
   								<label class="col-md-4 control-label">Cím</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Cím" class="form-control input-md"  wire:model="address">
   									@error('address') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>

   					     <div class="form-group">
   								<label class="col-md-4 control-label">Térkép</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Térkép" class="form-control input-md"  wire:model="map">
   									@error('map') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>


   						 <div class="form-group">
   								<label class="col-md-4 control-label">Twitter</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Twitter" class="form-control input-md" wire:model="twitter">
   									@error('twitter') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>



   					       <div class="form-group">
   								<label class="col-md-4 control-label">Facebook</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Facebook" class="form-control input-md" wire:model="facebook">
   									@error('facebook') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>


   							 <div class="form-group">
   								<label class="col-md-4 control-label">Pinterest</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Pinterest" class="form-control input-md" wire:model="pinterest">
   									@error('pinterest') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>



   							 <div class="form-group">
   								<label class="col-md-4 control-label">Instagram</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Instagram" class="form-control input-md" wire:model="instagram">
   									@error('instagram') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>



   							 <div class="form-group">
   								<label class="col-md-4 control-label">Youtube</label>

   								<div class="col-md-4">
   									<input type="text"  placeholder="Youtube" class="form-control input-md" wire:model="youtube">
   									@error('youtube') <p class="text-danger">{{$message}}</p>@enderror
   								</div>
   							</div>


   							 <div class="form-group">
   								<label class="col-md-4 control-label">Pinterest</label>
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
