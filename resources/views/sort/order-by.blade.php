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