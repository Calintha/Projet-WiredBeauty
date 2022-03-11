<x-app-layout>
    <x-slot name="header">
        <div class="container-fluid">
            <div class="border border-3 my-5 bg-white rounded-3">
                <h2 class="text-center float-center mt-1 fw-bold">{{ __('My profile') }}<i class="fas fa-user float-end mx-3 mt-1"></i></h2>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="container">
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 fw-bold">
                                Company :
                            </div>
                            <div class="col-9">
                                {{ Auth::user()->company->c_name }}, {{ Auth::user()->company->c_detail }}
                            </div>
                            <div class="col-3 fw-bold">
                                Mail :
                            </div>
                            <div class="col-9">
                                {{ Auth::user()->company->c_email }}
                            </div>
                            <div class="col-3 fw-bold">
                                Phone :
                            </div>
                            <div class="col-9">
                                {{ Auth::user()->company->c_telephone }}
                            </div>
                            <div class="col-3 fw-bold">
                                Address :
                            </div>
                            <div class="col-9">
                                {{ Auth::user()->company->c_no_street }}, {{ Auth::user()->company->c_streetname }}, {{ Auth::user()->company->c_postalcode }}, {{ Auth::user()->company->c_city }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="justify-content-center">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('members_updateProfile', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        <label for="email">Mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">

                        <button class="btn btn-dark mt-3" type="submit">Validate</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>