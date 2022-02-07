@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endpush

@section('content')
    <form class="form">
        <div class="form__wrapper">
            <label for="url">Ссылка</label>
            <input type="text" name="url" id="url" placeholder="https://example.com" class="form__input" autofocus>
            <span class="form__error" data-input="url"></span>
        </div>

        <div class="form__success">
            Ваша сокращенная ссылка: <a href=""></a>
        </div>

        <button class="form__btn">Сократить</button>
    </form>
@endsection

@push('js')
    <script src="{{asset('js/home.js')}}"></script>
@endpush