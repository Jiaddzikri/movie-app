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
          <a href="{{ route('movies.movies') }}" class="hover:text-gray-500">Movies</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{ route('movies.tvShow') }}" class="hover:text-gray-500">Tv Shows</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{ route('movies.actors') }}" class="hover:text-gray-500">Actors</a>
        </li>
      </ul>
      <div class="flex items-center flex-col md:flex-row">
        <div class="relative">
          <form class="flex gap-3" action="{{ route('movies.search') }}" method="GET">
            <input
              class="border border-gray-500 mt-4 md:mt-0 rounded-full w-64 px-4 py-1 focus:outline-none focus:shadow-outline"
              type="text" placeholder="search..." name="query">
              <button type="submit" class="flex justify-center items-center rounded-full px-4 py-1 focus:outline focus:shadow-outline bg-orange-500 text-white">Search</button>
          </form>
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
  <footer class="border-t border-gray-500">
    <div class="container px-20 py-10 text-center">
      <h2 class="font-bold text-orange-500 text-2xl">Movie App</h2>
      <span class="text-gray-500 text-sm mt-3">Made By Jiad Dzikri Ramadia</span>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
