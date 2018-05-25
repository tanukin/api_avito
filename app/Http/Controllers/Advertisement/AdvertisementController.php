<?php

namespace App\Http\Controllers\Advertisement;

use App\Core\Advertisement\Services\AdvertisementService;
use App\Http\Requests\Advertisement\AdvertisementStore;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdvertisementController extends BaseController
{
    /**
     * @var AdvertisementService
     */
    private $advertisementService;

    public function __construct()
    {
    }

    public function index()
    {
        // @TODO
    }

    public function store(AdvertisementStore $request)
    {
        $this->advertisementService->create($request->all());
    }

    public function show($id)
    {
        // @TODO
    }

    public function update($id)
    {
        // @TODO
    }

    public function destroy($id)
    {
        // @TODO
    }
}
