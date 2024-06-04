<div class="mt-8">
  <a href="/{{$url}}/{{ $movie['id'] }}">
    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt=""
      class="hover:opacity-75 transition-ease-in-out duration-150">
  </a>
  <div class="mt-3">
    <a href="/{{$url}}/{{ $movie['id'] }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] ?? $movie["name"] }}</a>
    <div class="flex items-center text-gray-500 text-sm mt-1">
      <svg class="fill-current text-orange-500 w-4" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve">
        <path
          d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z" />
      </svg>
      <span class="ml-2">{{ $movie['vote_average'] }}</span>
      <span class="mx-2">|</span>

      <span>{{ \Carbon\Carbon::parse($movie['release_date'] ?? $movie["first_air_date"])->format('M d, Y') }}</span>
    </div>
    <div class="text-gray-400 text-sm">
      <span>
        @foreach ($movie['genre_ids'] as $genreId)
          {{ $genres->get($genreId) }} @if (!$loop->last)
            ,
          @endif
        @endforeach
      </span>
    </div>
  </div>
</div>
