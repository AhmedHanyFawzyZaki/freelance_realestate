@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Property {{ $property->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/properties') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/properties/' . $property->id . '/edit') }}" title="Edit Property"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/properties', $property->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Property',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Cover Image </th>
                                      <td> <img src="{{url('/')}}/propertyImage/{{$property->cover_image}}" height="100"> </td>
                                    </tr>
                                    <tr>
                                      <th> Main Image </th>
                                      <td> <img src="{{url('/')}}/propertyImage/{{$property->main_image}}" height="100"> </td>
                                    </tr>
                                    <tr>
                                      <th> Price </th>
                                      <td> {{ $property->price }} </td>
                                    </tr>
                                    <tr>
                                      <th> Name </th>
                                      <td> {{ $property->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Introduction </th>
                                      <td> {!! $property->introduction !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th>
                                      <td> {!! $property->description !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Name Arabic </th>
                                      <td> {{ $property->name_ar }} </td>
                                    </tr>
                                    <tr>
                                      <th> Introduction Arabic </th>
                                      <td> {!! $property->introduction_ar !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Description Arabic </th>
                                      <td> {!! $property->description_ar !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Name Spanish </th>
                                      <td> {{ $property->name_sp }} </td>
                                    </tr>
                                    <tr>
                                      <th> Introduction Spanish </th>
                                      <td> {!! $property->introduction_sp !!} </td>
                                    </tr>
                                    <tr>
                                      <th> Description Spanish </th>
                                      <td> {!! $property->description_sp !!} </td>
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
