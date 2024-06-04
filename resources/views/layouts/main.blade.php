<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Movie App</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-sans bg-white text-black">
  <nav class="border-b border-gray-500">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-20 py-6">
      <ul class="flex flex-col  md:flex-row items-center">
        <li class="flex gap-3 items-center">
          <a href="" class="block w-[50px] h-[50px] bg-white rounded-full"></a>
          <h1 class="font-semibold text-xl">Movie App</h1>
        </li>
        <li class="md:ml-16 mt-3 md:mt-0">
          <a href="{{route("movies.movies")}}" class="hover:text-gray-500">Movies</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{route("movies.tvShow")}}" class="hover:text-gray-500">Tv Shows</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{route("movies.actors")}}" class="hover:text-gray-500">Actors</a>
        </li>
      </ul>
      <div class="flex items-center flex-col md:flex-row">
        <div class="relative">
          <input
            class="border border-gray-500 mt-4 md:mt-0 rounded-full w-64 px-4 py-1 focus:outline-none focus:shadow-outline"
            type="text" placeholder="search...">
        </div>
        <div class="md:ml-4 mt-4 md:mt-0">
          <a href="">
            <div class="w-[30px] h-[30px] bg-white rounded-full"></div>
          </a>
        </div>
      </div>
    </div>
  </nav>
  @yield('content')

  <script src="{{asset("js/app.js")}}"></script>
</body>
</html>
