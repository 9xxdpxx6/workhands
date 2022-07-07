@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    <div class="container mt-3">
        <form action="{{ route('addService') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена*</label>
                <input type="number" class="form-control" id="price" name="price" min="0.00" step="1" value="{{ $item->price ?? 0.00 }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label><br>
                <textarea class="form-control" id="description" name="description" style="height: 100px">{{ $item->description ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="img1" class="form-label">Изображение 1</label>
                <input type="text" class="form-control" id="img1" name="img1" value="{{ $item->preview_path ?? '' }}">
            </div>
            @php
                if ($item) {
                    $img2 = "";
                    $img3 = "";
                    if ($item->images->count() >= 2)
                        $img2 = $item->images->offsetGet(1)->img_path;
                    if ($item->images->count() == 3)
                        $img3 = $item->images->offsetGet(2)->img_path;
                }
            @endphp
            <div class="mb-3">
                <label for="img2" class="form-label">Изображение 2</label>
                <input type="text" class="form-control" id="img2" name="img2" value="{{ $img2 ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="img3" class="form-label">Изображение 3</label>
                <input type="text" class="form-control" id="img3" name="img3" value="{{ $img3 ?? '' }}">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('home') }}" type="submit" class="btn btn-outline-primary">Вернуться к списку</a>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection