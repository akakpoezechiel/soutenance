<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantRequest;
use App\Repositories\RestaurantRepository;
use Illuminate\Http\Request;

class SignRestoController extends Controller
{
    public function index()
    {
        return view('Restaurant.sign_up');
    }

    protected $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    // Fonction pour enregistrer un restaurant
    public function store(RestaurantRequest $request)
    {
        $this->restaurantRepository->create($request->all());

        return redirect()->back()->with('success', 'Restaurant enregistré avec succès.');
    }

    public function success()
    {
        return back()->with('success');
    }
}
