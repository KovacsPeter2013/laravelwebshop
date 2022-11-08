<div>
    <div class="container" style="padding: 30px 0;">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Új termék attribútum hozzáadása
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.attributes')}}" class="btn btn-success pull-right">Összes
                                    attribútum </a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('messages'))

                        <div class="alert alert-success" role="alert">{{Session::get('messages')}}</div>

                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeAttribute">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Attribútum neve</label>
                                <div class="col-md-4">
                                    <input type="text" name="" placeholder="Attribútum neve"
                                        class="form-control input-md" wire:model="name">

                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Elküldés</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>