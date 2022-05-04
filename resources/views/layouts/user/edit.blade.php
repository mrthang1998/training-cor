<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            User Edit
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <form method="post" action="{{route('user.update',  $user['id'])}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Full name</label>
                        <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter full name" value="{{$user['name']}}">
                    </div>

                    <div class="form-group">
                        <label>Full name</label><br>
                        @if ($user['gender'] == 1)
                            <input type="radio" id="male" name="gender" value="1" checked>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="2">
                            <label for="female">Female</label><br>
                        @elseif ($user['gender'] == 2)
                            <input type="radio" id="male" name="gender" value="1">
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="2" checked>
                            <label for="female">Female</label><br>
                        @else
                            <input type="radio" id="male" name="gender" value="1">
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="2">
                            <label for="female">Female</label><br>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{$user['address']}}">
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter number phone" value="{{$user['phone_number']}}">
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="submit" class="btn btn-info">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>