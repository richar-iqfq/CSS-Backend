<?php

namespace App\Classes\Search;

use Illuminate\Http\Request;

/**
 * Builds the filter search for specific requests
 */
class SearchBuilder
{
    protected $modelName; // Eloquent Model Name

    protected $request;

    public function __construct($modelName, Request $request)
    {
        $this->modelName = $modelName;

        $this->request = $request;
    }

    /**
     * Apply filters with applyFilters
     */
    public function filter() 
    {
        $query = $this->applyFilters();
        return $query;
    }

    /**
     * Retrive the filters classes inside ./Filters/{modelName}/{filters}
     */
    private function getFilters()
    {
        $filtersName = []; // Empty array for filters

        $path = __DIR__ . '/Filters/' . $this->modelName; // Main path

        if(file_exists($path)){

            $allFilters = scandir($path); // Retrive filters

            $filters = array_diff($allFilters, array('.', '..')); // Remove . ..

            foreach ($filters as $key => $filter) {

                $filtersName[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter); // Clean string

            }
            
        }

        return $filtersName;
    }

    /**
     * Call filters and apply filters
     */
    private function applyFilters()
    {
        $model = $this->getModel(); // Retrieve model

        $query = $model->newQuery(); // Start query

        $filters = $this->getFilters(); // Retrieve filters

        foreach ($filters as $key =>$filter) {
            
            $filterClass = __NAMESPACE__ . '\\Filters\\' . $this->modelName . '\\' . $filter; // Filter route
            
            if (class_exists($filterClass)) {
                
                $query = $filterClass::apply($query, $this->request); // Apply filter

            }

        }

        return $query;
    }

    /**
     * Get the full model route
     */
    private function getModel()
    {
        try {
            
            return app('App\\Models\\' . $this->modelName);

        } catch (\Exception $e) {

            abort(500);
        
        }
    }
}
