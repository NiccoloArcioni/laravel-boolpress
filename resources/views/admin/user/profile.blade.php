@extends('layouts.dashboard')

@section('content')
    <h1>Dati Utente</h1>
    <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ Auth::user()->name }}</li>
        <li class="list-group-item">{{ Auth::user()->email }}</li>
        @if (Auth::user()->api_token)
            <li class="list-group-item">{{ Auth::user()->api_token }}</li>
        @else
            <form action="{{ route('admin.generate-token') }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn">Generate API Token</button>
            </form>
        @endif
    </ul>
</div>
@endsection