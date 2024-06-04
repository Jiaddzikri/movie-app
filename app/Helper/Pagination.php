<?php

namespace App\Helper;

class Pagination 
{

  public static function paginate(int $currentPage, $totalPages): array
  {
    $startingPage = $currentPage <= 2 ? 1 : $currentPage - 2;
    $lastPage = $currentPage > $totalPages - 2 ? $totalPages : $currentPage + 2;

    return [
      "currentPage" => $currentPage,
      "startingPage" => $startingPage,
      "lastPage" => $lastPage,
      "totalPages" => $totalPages
    ];
  }
}
