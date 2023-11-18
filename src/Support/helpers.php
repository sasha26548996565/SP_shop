<?php

use Domain\Catalog\Filters\FilterManager;
use Domain\Catalog\Models\Category;
use Domain\Catalog\Sorters\Sorter;
use Support\Flash\Flash;

if (function_exists('flash') == false) {
    function flash(): Flash
    {
        return app(Flash::class);
    }
}

if (function_exists('filters') == false) {
    function filters(): array
    {
        return app(FilterManager::class)->getFilterItems();
    }
}

if (function_exists('sorter') == false) {
    function sorter(): Sorter
    {
        return app(Sorter::class);
    }
}

if (function_exists('is_catalog_view') == false) {
    function is_catalog_view(string $view, string $default = 'grid'): bool
    {
        return session()->get('view', $default) == $view;
    }
}

if (function_exists('filter_url') == false) {
    function filter_url(?Category $category, array $params = []): string
    {

        return route('catalog', [
            'category' => $category,
            ...request()->only(['filters', 'sort']),
            ...$params
        ]);
    }
}
