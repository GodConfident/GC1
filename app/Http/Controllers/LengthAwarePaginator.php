<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LengthAwarePaginator extends Controller
{
    public function __construct($items, $total, $perPage, $currentPage = null, array $options = [])
    {
        foreach ($options as $key => $value) {
          $this->{$key} = $value;
        }
        $this->total = $total;
        $this->perPage = $perPage;
        $this->lastPage = (int) ceil($total / $perPage);
        $this->path = $this->path != '/' ? rtrim($this->path, '/') : $this->path;
        $this->currentPage = $this->setCurrentPage($currentPage, $this->lastPage);
        $this->items = $items instanceof Collection ? $items : Collection::make($items);
    }
}
