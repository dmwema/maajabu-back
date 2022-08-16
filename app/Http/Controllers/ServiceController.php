<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tarif;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Service as ResourcesService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return ResourcesService::collection($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = time() . '.' . $request->img_url->extension();
        $pathImage = $request->file('img_url')->storeAs(
            'services',
            $filename,
            'public'
        );
        if ($service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'img_url' => $pathImage,
        ])) {
            return redirect()->back()->with('success', 'Service enregistré avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        $service->img_url = env('APP_URL') . Storage::url($service->img_url);
        $tarif = $service->tarifs;
        $reservations = $service->reservations;
        return [
            'service' => $service
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $service = Service::find($request->id);

        $service->name = $request->name;
        $service->type = $request->type;
        $service->description = $request->description;

        if (empty($request->img_url)) {
            if ($service->img_url == "") {
                $pathImage = "default.png";
            } else {
                $pathImage = $service->img_url;
            }
        } else {
            $filename = time() . '.' . $request->img_url->extension();
            $pathImage = $request->file('img_url')->storeAs(
                'services',
                $filename,
                'public'
            );
            Storage::disk('public')->delete($service->img_url);
        }
        $service->img_url = $pathImage;

        if ($service->save()) {
            return redirect()->route('admin.service')->with('success', 'Service modifié avec succès');
        }
        return redirect()->route('admin.service')->with('fail', 'Une erreur est survenue lors de la modification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $service = Service::find($request->id);
        if (Storage::disk('public')->exists($service->img_url)) {
            Storage::disk('public')->delete($service->img_url);
        }
        if ($service->delete()) {
            return redirect()->back()->with('success', 'Service supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    public function get_infos()
    {
        $infos = Service::all();
        $tarifs = Tarif::all();
        return view('users.admin.service', ['services' => $infos, 'tarifs' => $tarifs]);
    }

    public function edit_service(Request $request)
    {
        $service = Service::find($request->id);
        $tarifs = Tarif::all();

        return view('users.admin.service_edit', ['service' => $service, 'tarifs' => $tarifs]);
    }
}
