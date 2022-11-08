<div>
    <style>
    nav svg {
        height: 20px;
    }

    nav .hidden {
        display: block !important;
    }

    .sclist {
        list-style: none;
    }
    </style>
    <div class="container" style="padding: 30px 0; ">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        Összes attribútun
                    </div>
                    <div class="row">
                        <a href="{{route('admin.add_attributes')}}" class="btn btn-success pull-right">Új hozzáadása</a>
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
                                <th>Név</th>
                                <th>Hozzáadva</th>
                                <th>Művelet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pattributes as $pattribute)

                            <tr>
                                <td>{{$pattribute->id}}</td>
                                <td>{{$pattribute->name}}</td>
                                <td>{{$pattribute->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.edit_attribute', ['attribute_id' =>$pattribute->id])}}"><i
                                            class="fa fa-edit fa-2x"></i></a>
                                    <a href="#"
                                        onclick="confirm('Biztosan törlöd ezt a kategóriát?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{$pattribute->id}})"
                                        style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>