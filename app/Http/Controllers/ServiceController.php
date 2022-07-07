<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($service_id) {
        $item = Service::where('id', $service_id)->first();

        return view('service.show', [
            'item' => $item
        ]);
    }

    public function showservices(Request $request) {
        $paginate = 10;
        $services = Service::paginate($paginate);

        if (isset($request->orderBy)) {
            if ($request->orderBy == 'price-low-high') {
                $services = Service::orderBy('price')->paginate($paginate);
            }
            if ($request->orderBy == 'price-high-low') {
                $services = Service::orderBy('price', 'desc')->paginate($paginate);
            }
            if ($request->orderBy == 'date-new-old') {
                $services = Service::orderBy('created_at')->paginate($paginate);
            }
            if ($request->orderBy == 'date-old-new') {
                $services = Service::orderBy('created_at', 'desc')->paginate($paginate);
            }
        }

        if ($request->ajax()) {
            return view('sort.order-by', [
                'services' => $services
            ])->render();
        }

        return view('home.index', [
            'services' => $services
        ]);
    }

    public function sortServices(Request $request) {
        $paginate = 10;
        $services = Service::paginate($paginate);

        if (isset($request->orderBy)) {
            if ($request->orderBy == 'price-low-high') {
                $services = Service::orderBy('price')->paginate($paginate);
            }
            if ($request->orderBy == 'price-high-low') {
                $services = Service::orderBy('price', 'desc')->paginate($paginate);
            }
            if ($request->orderBy == 'date-new-old') {
                $services = Service::orderBy('created_at')->paginate($paginate);
            }
            if ($request->orderBy == 'date-old-new') {
                $services = Service::orderBy('created_at', 'desc')->paginate($paginate);
            }
        }

        return response()->json($services);
    }

    public function addService(Request $request) {
        $code = 0;
        if (!isset($request->name) || !isset($request->price)) {
            $code = 1;
        } 
        $service = new Service;
        if ($code == 0) {
            $service->name = $request->name;
            $service->price = $request->price;
            $service->preview_path = $request->preview_path;
            $service->description = $request->description;
            $service->save();
            $currentId = Service::get()->last()->id;
            return array('id' => $currentId, 'code' => 'success');
        } else {
            return array('id' => 0, 'code' => 'fail');
        }
    }
}
