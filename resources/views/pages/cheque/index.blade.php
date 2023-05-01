@extends('pages.layouts.partial.main')
@section('content')

<div class="pagetitle">
    <h1>Manage Cheque</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>

            <li class="breadcrumb-item active">Cheque</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card-header"> Manage Cheque <a href="{{url('cheque/create')}}"><button type="button" class="btn btn-success btn-floated "><span class="fa fa-plus"></span>Add cheque</button></a></div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Cheque</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cheques as $cheque)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{$cheque->photo}}" alt="" height="50px" width="50px" style="border-radius: 50%;"></td>
                                <td>{{$cheque->first_name}} {{$cheque->last_name}}</td>
                                <td>{{$cheque->address}}</td>
                                <td>{{$cheque->phone}}</td>
                                <td>
                                    @if ($cheque->status)
                                    <span class="badge badge-success" style="background-color:green;">Active</span>
                                    @else
                                    <span class="badge badge-danger" style="background-color:red;">Inactive</span>
                                    @endif
                                </td>
                                <td class="centre" style="display:flex;">

                                    @if($cheque['status']=='1')
                                    <a href="{{ url('cheque/offStatus',$cheque->id) }}"><button class="btn btn-warning btn-sm" type="reset">Deactive</button></a>

                                    @else($cheque['status']=='0')
                                    <a href="{{ url('cheque/onStatus',$cheque->id) }}"><button class="btn btn-warning btn-sm" type="reset">Active</button></a>

                                    @endif

                                    <a href="{{ route('cheque.edit',$cheque->id) }}"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</button></a>
                                    &nbsp;
                                    <form action="{{ route('cheque.destroy',$cheque->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are You sure you want to Delete?');"><i class="far fa-trash-alt"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection