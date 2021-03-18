<?php


namespace App\Services;

use App\Product;
use Illuminate\Support\Collection;

/**
 * Class ProductService
 * @package App\Http\Services
 */
class ProductService
{
    /**
     * @param  string $search
     * @return Collection|null;
     */
    public function search(string $search): ?Collection
    {
        return Product::query()->with(['type', 'tags'])
            ->where('name', 'LIKE', "%" . $search . "%")
            ->orWhereHas('type', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%" . $search . "%");
            })
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%" . $search . "%");
            })
            ->get();
    }
}
