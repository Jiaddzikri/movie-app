<?php

namespace App\Http\Controllers;

use App\Helper\Pagination;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MoviesController extends Controller
{
  private function headers(): array
  {
    return [
      "Authorization" => "Bearer " . env("TMDB_BEARER_TOKEN"),
      "accept" => "application/json"
    ];
  }

  private function genres(): Collection
  {
    $getGenres = Http::withHeaders($this->headers())->get(
      "https://api.themoviedb.org/3/genre/movie/list"
    )->json()["genres"];

    $genres = collect($getGenres)->mapWithKeys(function ($genre) {
      return [$genre["id"] => $genre["name"]];
    });
    return $genres;
  }

  public function index()
  {
    $popularMovies = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/movie/popular")->json()["results"];

    return view('index', [
      'popularMovies' => $popularMovies,
      'genres' => $this->genres()
    ]);
  }

  public function show(string $id)
  {
    $movieDetails = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/movie/" . $id)->json();
    $credits = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/movie/" . $id . "/credits");
    $reviews = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/movie/" . $id . "/reviews")->json()["results"];

    return view("show", [
      "id" => $id,
      "movieDetails" => $movieDetails,
      "credits" => $credits,
      "reviews" => $reviews
    ]);
  }

  public function movies(Request $request)
  {
    $currentPage = $request->input("page", 1);
    $topRated = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/movie/top_rated?page=" . $currentPage)->json();
    $paginate = Pagination::paginate($currentPage, $topRated["total_pages"]);

    return view("movies", [
      "movies" => $topRated["results"],
      "genres" => $this->genres(),
      "currentPage" => $paginate["currentPage"],
      "startingPage" => $paginate["startingPage"],
      "lastPage" => $paginate["lastPage"],
      "totalPage" => $paginate["totalPages"]
    ]);

  }

  public function tvShow(Request $request)
  {
    $currentPage = $request->input("page", 1);
    $topRated = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/tv/top_rated?page=" . $currentPage)->json();
    $paginate = Pagination::paginate($currentPage, $topRated["total_pages"]);

    return view("tv-show", [
      "movies" => $topRated["results"],
      "genres" => $this->genres(),
      "currentPage" => $paginate["currentPage"],
      "startingPage" => $paginate["startingPage"],
      "lastPage" => $paginate["lastPage"],
      "totalPage" => $paginate["totalPages"],
    ]);
  }

  public function tvShowDetail(string $id)
  {

    $movieDetails = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/tv/" . $id)->json();
    $credits = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/tv/" . $id . "/credits");
    $reviews = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/tv/" . $id . "/reviews")->json()["results"];

    return view("show", [
      "id" => $id,
      "movieDetails" => $movieDetails,
      "credits" => $credits,
      "reviews" => $reviews
    ]);
  }

  public function actors(Request $request)
  {
    $currentPage = $request->input("page", 1);
    $persons = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/person/popular")->json();
    $paginate = Pagination::paginate($currentPage, $persons["total_pages"]);
    return view("persons", [
      "persons" => $persons["results"],
      "currentPage" => $paginate["currentPage"],
      "startingPage" => $paginate["startingPage"],
      "lastPage" => $paginate["lastPage"],
      "totalPage" => $paginate["totalPages"]
    ]);
  }

  public function actor(string $id)
  {
    $person = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/person/" . $id)->json();
    $movies = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/person/" . $id . "/movie_credits")->json()["cast"];
    $tvShows = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/person/" . $id . "/tv_credits")->json()["cast"];

    return view("person-detail", [
      "person" => $person,
      "movies" => $movies,
      "genres" => $this->genres(),
      "tvShows" => $tvShows
    ]);
  }

  public function search(Request $request)
  {
    $search = $request->get("query", "");
    $currentPage = $request->get("page", 1);

    $response = Http::withHeaders($this->headers())->get("https://api.themoviedb.org/3/search/multi?query=" . $search . "&" . "page=" . $currentPage);
    $status = $response->ok();

    $datas = $response->json();
    $paginate = Pagination::paginate($currentPage, $datas["total_pages"]);

    return view("search", [
      "datas" => $datas["results"],
      "genres" => $this->genres(),
      "search" => $search,
      "status" => $status,
      "currentPage" => $paginate["currentPage"],
      "startingPage" => $paginate["startingPage"],
      "lastPage" => $paginate["lastPage"],
      "totalPage" => $paginate["totalPages"]
    ]);
  }
}
