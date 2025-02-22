<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class MovieController extends Controller
{
    public function store()
    {
        $url = [
                    [
                        "Movie_ID"=> 1,
                        "Title"=> "The Irishman",
                        "Duration"=> "1 hour 20 minutes",
                        "Views"=> "21.1k",
                        "Genre"=> "comedy",
                        "Poster"=> "https=>//m.media-amazon.com/images/M/MV5BMGUyM2ZiZmUtMWY0OC00NTQ4LThkOGUtNjY2NjkzMDJiMWMwXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_FMjpg_UX1000_.jpg",
                        "Overall_rating"=> 7.9,
                        "Theater_name"=> "abc movies",
                        "Start_time"=> "2020-04-04T09:00:00",
                        "End_time"=> "2020-04-04T12:00:00",
                        "Description"=> "An aging hitman recalls his time with the mob and the intersecting events with his friend, Jimmy Hoffa, through the 1950-70s.",
                        "Theater_room_no"=> 1
                    ],
                    [
                        "Movie_ID"=> 2,
                        "Title"=> "Parasite",
                        "Duration"=> "1 hour 20 minutes",
                        "Views"=> "21.1k",
                        "Genre"=> "comedy",
                        "Poster"=> "https=>//m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg",
                        "Overall_rating"=> 7.2,
                        "Theater_name"=> "abc movies",
                        "Start_time"=> "2020-04-04T10:00:00",
                        "End_time"=> "2020-04-04T13:00:00",
                        "Description"=> "A poor family, the Kims, con their way into becoming the servants of a rich family, the Parks. But their easy life gets complicated when their deception is threatened with exposure.",
                        "Theater_room_no"=> 2
                    ],
                    [
                        "Movie_ID"=> 3,
                        "Title"=> "The Favourite",
                        "Duration"=> "1 hour 20 minutes",
                        "Views"=> "21.1k",
                        "Genre"=> "comedy",
                        "Poster"=> "https=>//m.media-amazon.com/images/M/MV5BMTg1NzQwMDQxNV5BMl5BanBnXkFtZTgwNDg2NDYyNjM@._V1_.jpg",
                        "Overall_rating"=> 7,
                        "Theater_name"=> "abc movies",
                        "Start_time"=> "2020-04-04T11:00:00",
                        "End_time"=> "2020-04-04T14:00:00",
                        "Description"=> "In early 18th century England, a frail Queen Anne occupies the throne and her close friend, Lady Sarah, governs the country in her stead. When a new servant, Abigail, arrives, her charm endears her to Sarah.",
                        "Theater_room_no"=> 3
                    ],
                    [
                        "Movie_ID"=> 4,
                        "Title"=> "The Farewell I",
                        "Duration"=> "1 hour 20 minutes",
                        "Views"=> "21.1k",
                        "Genre"=> "comedy",
                        "Poster"=> "https=>//m.media-amazon.com/images/M/MV5BMWE3MjViNWUtY2VjYS00ZDBjLTllMzYtN2FkY2QwYmRiMDhjXkEyXkFqcGdeQXVyODQzNTE3ODc@._V1_.jpg",
                        "Overall_rating"=> 6.9,
                        "Theater_name"=> "abc movies",
                        "Start_time"=> "2020-04-04T12:00:00",
                        "End_time"=> "2020-04-04T15:00:00",
                        "Description"=> "A Chinese family discovers their grandmother has only a short while left to live and decide to keep her in the dark, scheduling a wedding to gather before she dies.",
                        "Theater_room_no"=> 4
                    ],
                    [
                        "Movie_ID"=> 5,
                        "Title"=> "Shoplifters",
                        "Duration"=> "1 hour 20 minutes",
                        "Views"=> "21.1k",
                        "Genre"=> "comedy",
                        "Poster"=> "https=>//m.media-amazon.com/images/M/MV5BYWZmOTY0MDAtMGRlMS00YjFlLWFkZTUtYmJhYWNlN2JjMmZkXkEyXkFqcGdeQXVyODAzODU1NDQ@._V1_.jpg",
                        "Overall_rating"=> 8.9,
                        "Theater_name"=> "abc movies",
                        "Start_time"=> "2020-04-04T13:00:00",
                        "End_time"=> "2020-04-04T16:00:00",
                        "Description"=> "A family of small-time crooks take in a child they find outside in the cold.",
                        "Theater_room_no"=> 5
                    ]
                ];
        
        foreach($url as $data)
        {
            Movie::create([
                'movie_id' => $data['Movie_ID'],
                'title' => $data['Title'],
                'duration' => $data['Duration'],
                'genre' => $data['Genre'],
                'views' => $data['Views'],
                'overall_rating' => $data['Overall_rating'],
                'poster' => $data['Poster'],
                'theater_name' => $data['Theater_name'],
                'start_time' => $data['Start_time'],
                'end_time' => $data['End_time'],
                'description' => $data['Description'],
                'theater_room_no' => $data['Theater_room_no']
            ]);
        }
        return response()->json('Success Insert');
    }

    public function new_movies(request $request)
    {
        // dd($request->all());
        $movie = Movie::get();

        return response()->json(['data' => $movie]);
    }

    public function specific_movie_theater(request $request)
    {
        $movie = Movie::where('theater_name', $request->theater_name)->where('created_at', $request->d_date)->get();

        return response()->json(['data' => $movie]);
    }

    public function timeslot(request $request)
    {
        $movie = Movie::where('theater_name', $request->theater_name)->where('start_time', '>=', $request->time_start)->where('end_time', '<=' ,$request->time_end)->get();

        return response()->json(['data' => $movie]);
    }
}
