@extends('layouts.main')

@section('content')
  <div class="container mx-auto pt-16 px-20">
    <div class="movies">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Search : {{ $search }}</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach ($datas as $data)
          @if ($data['media_type'] == 'person')
            <x-person-card :person="$data" />
          @else
            @if ($data['media_type'] == 'movie')
              <x-movie-card :url="'movie'" :movie="$data" :genres="$genres" />
            @else
              <x-movie-card :url="'tv-show'" :movie="$data" :genres="$genres" />
            @endif
          @endif
        @endforeach
      </div>
      <div class="flex justify-center items-center my-12">
        <x-pagination :url="'search'" :query="'&query=' . $search" :currentPage="$currentPage" :startingPage="$startingPage" :lastPage="$lastPage"
          :totalPage="$totalPage" />
      </div>
    </div>
  </div>
@endsection
