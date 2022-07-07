@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    <div class="container my-3 d-md-flex justify-content-between">
        <h5>Сортировка</h5>
        <select class="form-select" aria-label="Default select example" style="width: 300px">
            <option value="1" selected @click="sort('default')">По умолчанию</option=>
            <option value="2" @click="sort('price-low-high')">Сначала дешёвые</option>
            <option value="3" @click="sort('price-high-low')">Сначала дорогие</option>
            <option value="4" @click="sort('date-new-old')">Сначала новые</option>
            <option value="5" @click="sort('data-old-new')">Сначала старые</option>
        </select>
    </div>
    <div class="container mt-md-5">
        <table class="table">
            <thead>
                <tr class="d-none d-md-table-row">
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Фото</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="services-table">
                @foreach($services as $service)
                    <tr>
                        <th class="align-middle" scope="row">{{ $service->id }}</th>
                        <td class="align-middle">{{ $service->name }}</td>
                        <td class="align-middle">{{ $service->price }}</td>
                        @php
                            $image = '/assets/no_image.png';
                            if ($service->preview_path)
                                $image = $service->preview_path;
                        @endphp
                        <td class="align-middle d-none d-md-block"><img src="{{ $image }}" alt="{{ $service->name }}" width="100"></td>
                        <td class="align-middle text-end d-none d-md-table-cell"><a href="{{ route('service', [$service->id]) }}" role="button" class="btn btn-outline-success">Перейти</a></td>
                        <td class="align-middle text-end d-table-cell d-md-none">
                            <a href="{{ route('service', [$service->id]) }}" role="button" class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container d-flex justify-content-center my-4">
            {{ $services->appends(request()->query())->links() }}	
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        let app = new Vue({
            el: '#app',

            data: {
                services: []
            },

            created() {
                fetch("{{ route('sort') }}")
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                            console.log(response);
                        }

                        throw new Error('Network response was not ok');
                    })
                    .then((json) => {
                        this.services.push({
                            id: json.data.id,
                            name: json.name,
                            price: json.price,
                            preview: json.preview_path,
                            description: json.description,
                            created: json.created_at
                        });
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            methods: {
                sort(sortKey) {
                    alert('asdf');
                    if (sortKey == 'price-low-high') {
                        return services.sortBy(services, 'price')
                    }
                    if (sortKey == 'price-high-low') {
                        return services.sortBy(services, 'price')
                    }
                    if (sortKey == 'date-new-old') {
                        return services.sortBy(services, 'created_at')
                    }
                    if (sortKey == 'data-old-new') {
                        return services.sortBy(services, 'created_at')
                    }

                    this.reverse = (this.sortKey == sortKey) ? !this.reverse : false;

                    this.sortKey = sortKey;
                },
            }
        });
        let data = axios.get("{{ route('sort') }}").then((response) => {
                    console.log(response.data.data);
                    response.data.data.forEach(el => {
                        app.services.push({
                            id: el.id,
                            name: el.name,
                            price: el.price,
                            preview: el.preview_path,
                            description: el.description,
                            created: el.created_at
                        });
                    });
                })
                .catch((error) => console.log(error.response.data));
        console.log(app.services);
        let list = document.querySelector('.services-table');
    </script>
@endsection