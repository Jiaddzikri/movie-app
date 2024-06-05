@extends('layouts.main')

@section('content')
  <div class="container mx-auto pt-16 px-20">
    <div class="persons">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Actors</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach ($persons as $person)
          <x-person-card :person="$person" />
        @endforeach
      </div>

      <div class="flex justify-center items-center my-12">
        <x-pagination :url="'actor'" :currentPage="$currentPage" :startingPage="$startingPage" :lastPage="$lastPage" :totalPage="$totalPage"  />
      </div>
    </div>
  </div>
@endsection
