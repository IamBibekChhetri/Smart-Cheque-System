@extends('pages.layouts.partial.main')
@section('content')

<div class="pagetitle">
    <h1>Manage Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card-header"> Manage User <a href="{{url('user/create')}}"><button type="button" class="btn btn-success btn-floated "><span class="fa fa-plus"></span>Add User</button></a></div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
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
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{$user->profile_image}}" alt="" height="50px" width="50px" style="border-radius: 50%;"></td>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    @if ($user->status)
                                    <span class="badge badge-success" style="background-color:green;">Active</span>
                                    @else
                                    <span class="badge badge-danger" style="background-color:red;">Inactive</span>
                                    @endif
                                </td>
                                <td class="centre" style="display:flex;">

                                    @if($user['status']=='1')
                                    <a href="{{ url('user/offStatus',$user->id) }}"><button class="btn btn-warning btn-sm" type="reset">Deactive</button></a>

                                    @else($user['status']=='0')
                                    <a href="{{ url('user/onStatus',$user->id) }}"><button class="btn btn-warning btn-sm" type="reset">Active</button></a>

                                    @endif

                                    <a href="{{ route('user.edit',$user->id) }}"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</button></a>
                                    &nbsp;
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
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