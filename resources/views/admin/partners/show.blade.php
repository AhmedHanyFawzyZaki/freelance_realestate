@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Partner {{ $partner->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/partners') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/partners/' . $partner->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/partners', $partner->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Partner',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Image </th>
                                      <td> <img src="{{url('/')}}/partnerImage/{{$partner->image}}" height="100"> </td>
                                    </tr>
                                    <tr>
                                      <th> Name </th>
                                      <td> {{ $partner->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th>
                                      <td> {!! $partner->description !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Name Arabic </th>
                                      <td> {{ $partner->name_ar }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description Arabic </th>
                                      <td> {!! $partner->description_ar !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Name Spanish </th>
                                      <td> {{ $partner->name_sp }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description Spanish </th>
                                      <td> {!! $partner->description_sp !!} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
