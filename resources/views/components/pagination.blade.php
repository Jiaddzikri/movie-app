<nav aria-label="page-navigation">
  <ul class="flex items-center -space-x-px h-5 bg-red-500 text-base">
    @if ($currentPage >= 4)
      <li>
        <a href="/{{$url}}?page=1{{$query}}"
          class="z-10 flex items-center justify-center px-4 h-10 text-orange-500 border {{ $currentPage ? 'border-orange-300 bg-orange-50 hover:bg-orange-100 hover:text-orange-700' : 'border-gray-300 bg-white' }}">1</a>
      </li>

      <li>
        <span class="z-10 flex items-end justify-center px-4 h-10 ">...</span>
      </li>
    @endif
    @for ($startingPage; $startingPage <= $lastPage; $startingPage++)
      <li>
        <a href="/{{$url}}?page={{ $startingPage . $query}}"
          class="z-10 flex items-center justify-center px-4 h-10 text-orange-500 border {{ $currentPage == $startingPage ? 'border-orange-300 bg-orange-50 hover:bg-orange-100 hover:text-orange-700' : 'border-gray-300 bg-white' }}">{{ $startingPage }}</a>
      </li>
    @endfor

    @if ($currentPage < $totalPage - 2)
      <li>
        <span class="z-10 flex items-end justify-center px-4 h-10 ">...</span>
      </li>

      <li>
        <a href="/{{$url}}?page={{ $totalPage . $query}}"
          class="z-10 flex items-center justify-center px-4 h-10 text-orange-500 border {{ $currentPage ? 'border-orange-300 bg-orange-50 hover:bg-orange-100 hover:text-orange-700' : 'border-gray-300 bg-white' }}">{{ $totalPage }}</a>
      </li>
    @endif
  </ul>
</nav>
