<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User List
        </h2>
    </x-slot>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="table-responsive">
                                    <table class="table table-striped table-user">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Full Name</th>
                                          <th>Gender</th>
                                          <th>Address</th>
                                          <th>Email</th>
                                          <th>Phone Number</th>
                                          <th>Created At</th>
                                          <th>Updated At</th>
                                          <th style="width: 120px">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th>{{ $loop->index + 1 }}</th>
                                                <th>{{ $user['name'] }}</th>
                                                @if ($user['gender'] == 1)
                                                    <th>Male</th>
                                                @elseif ($user['gender'] == 2)
                                                    <th>Female</th>
                                                @else 
                                                    <th></th>
                                                @endif
                                                <th>{{ $user['address'] }}</th>
                                                <th>{{ $user['email'] }}</th>
                                                <th>{{ $user['phone_number'] }}</th>
                                                <th>{{ $user['created_at'] }}</th>
                                                <th>{{ $user['updated_at'] }}</th>
                                                <td class="table-action">
                                                    <a class="btn btn-success" href="{{route('user.edit',  $user['id'])}}"><i class="fas fa-edit"></i></a>
                                                    <form method="post" action="{{route('user.destroy',  $user['id'])}}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
            </div>
        </div>
    </div>

</x-app-layout>
