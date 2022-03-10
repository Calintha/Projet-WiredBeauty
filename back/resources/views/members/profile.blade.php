<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon profil') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('members_updateProfile', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        <label for="email">Mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">

                        <button type="submit">Modifier</button>
                        <a href="{{ route('members_profile') }}">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>