<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getServices()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function choiceService(Service $service)
    {
        session()->put('service', $service);

        if (auth()->user()->role == UserRole::ADMIN) {
            return to_route('profits.index');
        }

        return redirect('/');
    }
}
