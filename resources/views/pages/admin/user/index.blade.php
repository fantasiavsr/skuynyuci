@extends('Layouts.core')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background-color: #F1F3F6">
            @include('Partials.navbaradmin')

            <!-- Begin Page Content -->
            <div class="container pt-3">

                <!-- Page Heading -->
                {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Admin Page</h1>
                    </div>
                </div> --}}

                {{-- Content Row --}}
                <div class="row">

                    {{-- Col  --}}
                    <div class="col">

                        {{-- Payment --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">User</h3>
                            </div>
                        </div>
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userall as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->level }}</td>\
                                                    <td>
                                                        <a href="{{ route('admin.user.edit', ['id' => $item->id]) }}"
                                                            class="btn">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.user.delete', ['id' => $item->id]) }}"
                                                            method="POST" onclick="return confirm('Are you sure?')">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger"><i
                                                                    class="fas fa-fw fa-trash"></i></button>
                                                        </form>
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

                <br>
                <br><br>
            </div>


            <!-- Scroll to Top Button-->
            @include('Partials.scrolltotop')

            <!-- Logout Modal-->
            @include('Partials.logoutmodal')
        @endsection
