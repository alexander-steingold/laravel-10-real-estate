<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(private ItemService $itemService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->itemService->index();
        $targets = Item::$target;
        $types = Item::$type;
        $features = Item::$features;
        return view('frontend.item.index',
            [
                'items' => $items,
                'targets' => $targets,
                'types' => $types,
                'features' => $features,
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
