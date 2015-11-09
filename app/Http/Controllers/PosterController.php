<?php

namespace App\Http\Controllers;

use App\Poster;
use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Intervention\Image\Facades\Image;
use Jenssegers\Agent\Agent;
use Validator;
use View;

class PosterController extends Controller
{
    public function showAll(Poster $poster){
        $posters = $poster->all();
        return view('index', ['posters' => $posters]);
    }

    public function show($id, Poster $poster){
        $poster_ = $poster->firstOrCreate($id);
        return view('index', ['poster' => $poster_]);
    }

    public function getAdd(){
        return view('posters.add');
    }

    public function postAdd(Request $request, Agent $agent){
        $data = $request->all();
        $validation = Validator::make($data, Poster::getValidationRules());
        if ($validation->fails()) {
            return view('message', ['OKs' => [], 'errors' => $validation->errors()->all()]);
        }
        $original_image_dir = 'images/original/';
        $small_image_dir = 'images/small/';
        $original_image_name = $original_image_dir."no_image.jpg";
        $small_image_name = $small_image_dir."no_image_sml.jpg";
        if ($request->hasFile('image')){
            $time = time();
            $original_image_name = $original_image_dir.$time.'.jpg';
            $small_image_name = $small_image_dir.$time.'.jpg';
            Image::make(Input::file('image'))->save($original_image_name)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($small_image_name);
        }
        else{

        }

        $data['image'] = $original_image_name;
        $data['image_sml'] = $small_image_name;
        $data['author_ip'] = $request->getClientIp();
        $data['author_browser'] = $agent->browser();
        $data['author_country'] = "Ukraine";
        Poster::create($data);
        return view('message', array('OKs' => ['Poster created'], 'errors' => ['']));
    }

    public function getPoster($id){
        $poster = Poster::find($id);
        if (!$poster) App::abort(404);
        return view('posters/view', array('poster' => $poster));
    }

    public function sortPosters($direction)
    {
        if (Request::ajax()) {
            $posters = Poster::orderBy('created_at', $direction)->get();
            dd($posters);
            return View::make('posters/all_previews', array(
                    'posters' => $posters)
            );
        }
    }
}
