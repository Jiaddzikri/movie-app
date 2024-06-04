
@extends('layouts.main')

@section('content')
  <div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 md:px-20 py-16 flex flex-col md:flex-row">
      <img src="https://image.tmdb.org/t/p/w500/{{ $movieDetails['poster_path'] }}" alt="parasite" class="w-96">
      <div class="ml-2 md:ml-24 mt-8 md:mt-0">
        <h2 class="text-4xl font-semibold">{{ $movieDetails['title'] }}</h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
          <svg class="fill-current text-orange-500 w-4" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve">
            <path
              d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z" />
          </svg>
          <span class="ml-2">{{ $movieDetails['vote_average'] }}</span>
          <span class="mx-2">|</span>

          <span>{{ \Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y') }}</span>
          <span class="mx-2">|</span>
          <span>
            @foreach ($movieDetails['genres'] as $genre)
              {{ $genre['name'] }}@if (!$loop->last)
                ,
              @endif
            @endforeach
          </span>
        </div>
        <p class="text-gray-500 mt-8">
          {{ $movieDetails['overview'] }}
        </p>
        <div class="mt-12">
          <h4 class="text-white font-semibold">Featured Crew</h4>
          <div class="flex mt-4 gap-10">
            @foreach ($credits['crew'] as $crew)
              @if ($loop->index < 2)
                <div>
                  <div>{{ $crew['name'] }}</div>
                  <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                </div>
              @endif
            @endforeach

          </div>
        </div>
        <div class="mt-12">
          <button
            class="flex items-center gap-4 bg-orange-500 text-white rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
            <svg class="w-6 fill-current" white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 142.448 142.448" xml:space="preserve">
              <path style="fill:#fff;"
                d="M142.411,68.9C141.216,31.48,110.968,1.233,73.549,0.038c-20.361-0.646-39.41,7.104-53.488,21.639
                                                                      C6.527,35.65-0.584,54.071,0.038,73.549c1.194,37.419,31.442,67.667,68.861,68.861c0.779,0.025,1.551,0.037,2.325,0.037
                                                                      c19.454,0,37.624-7.698,51.163-21.676C135.921,106.799,143.033,88.377,142.411,68.9z M111.613,110.336
                                                                      c-10.688,11.035-25.032,17.112-40.389,17.112c-0.614,0-1.228-0.01-1.847-0.029c-29.532-0.943-53.404-24.815-54.348-54.348
                                                                      c-0.491-15.382,5.122-29.928,15.806-40.958c10.688-11.035,25.032-17.112,40.389-17.112c0.614,0,1.228,0.01,1.847,0.029
                                                                      c29.532,0.943,53.404,24.815,54.348,54.348C127.91,84.76,122.296,99.306,111.613,110.336z" />
              <path style="fill:#fff;"
                d="M94.585,67.086L63.001,44.44c-3.369-2.416-8.059-0.008-8.059,4.138v45.293
                                                                      c0,4.146,4.69,6.554,8.059,4.138l31.583-22.647C97.418,73.331,97.418,69.118,94.585,67.086z" />
            </svg>
            <span>Play Trailer</span>
          </button>
        </div>

      </div>
    </div>
  </div>
  <div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 md:px-20 py-16">
      <h2 class="font-semibold text-4xl"><a href="/cast?movie={{ $id }}">Cast ></a></h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-8">
        @foreach ($credits['cast'] as $cast)
          @if ($loop->index < 10)
            <div class="mt-12">
              <a href="">
                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt=""
                  class="w-96 md:w-full hover:opacity-75 transition-ease-in-out duration-150">
              </a>
              <div class="mt-3">
                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                <div class="text-gray-400 text-sm">
                  <span>{{ $cast['character'] }}</span>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="user-reviews border-b border-gray-800">
    <div class="container mx-auto px-4 md:px-20 py-16">
      <h2 class="font-semibold text-4xl"><a href="/reviews?movie={{ $id }}">Reviews ></a></h2>
      @foreach ($reviews as $review)
        @if ($loop->index < 5)
          <div class="py-4 px-5 border  border-gray-500 mt-12 overflow-hidden">
            <div class="flex items-center gap-5">
              <div>
                @if ($review['author_details']['avatar_path'])
                  <img src="https://image.tmdb.org/t/p/w500/{{ $review['author_details']['avatar_path'] }}"
                    class="w-16 h-16 rounded-full" alt="reviewer-profile">
                @else
                  <img src="/images/default.png" class="w-16 h-16 rounded-full" alt="reviewer-profile">
                @endif
              </div>
              <div>
                <h2 class="font-semibold text-orange-500">{{ $review['author'] }}
                </h2>
                <span class="text-gray-500 text-sm">{{\Carbon\Carbon::parse($review["created_at"])->format("D m, Y")}}</span>
              </div>
            </div>
            <div class="expand-review-content mt-5" style="max-height: 100px">
              <p>
                {{ $review['content'] }}
              </p>
            </div>
          </div>
          <div class="flex justify-between border border-gray-800 border-t-0 py-4 px-5">
            <div class="flex gap-2 items-center">
              <svg class="fill-current text-orange-500 w-4" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve">
                <path
                  d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z" />
              </svg>
              <div>
                @if ($review['author_details']['rating'])
                  <span>{{ $review['author_details']['rating'] . '/10' }}</span>
                @else
                  <span>unrated</span>
                @endif
              </div>
            </div>
            <button type="button" class="expand-review-button px-8 py-2 flex items-center font-semibold"><svg
                class="w-8 fill-current" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path
                style="background-color: black"
                  d="M1395 736q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z" />
              </svg></button>
          </div>
        @endif
      @endforeach
    </div>
  </div>
@endsection
