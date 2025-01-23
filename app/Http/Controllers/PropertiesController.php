<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {

        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%$title%");
        }

        return view('front/property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {

        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('front/property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('front/property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {

    }
}
