<?php

namespace App\Http\Controllers\User;

use Auth;
use DateTime;
use App\Slim;
use App\Tree;
use App\User;
use App\Admin;
use App\Review;
use App\Favorite;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Auth::user();
        return view('user.home', ['employee' => $employee]);
    }

    public function getDashboardEvent()
    {
        $myArray = array();

        $holidays = Holiday::all();

        foreach ($holidays as $holiday) {
            $myArray[] = array(
                'start' => $holiday->date,
                'color' => '#21dfbd',
                'title' => 'holiday',
                'rendering' => 'background',
                'description' => $holiday->title,
                'className' => 'm-fc-event--light m-fc-event--solid-primary'
            );
        }

        $events = Event::all();

        foreach ($events as $event) {
            $myArray[] = array(
                'start' => $event->event_date." ".$event->event_start,
                'description' => $event->event_note,
                'end' => $event->event_date." ".$event->event_end,
                'title' => $event->event_title,
                'color' => '#7636f3',
                'className' => "m-fc-event--light m-fc-event--solid-primary",
            );
        }

        return $myArray;
    }

    public function profile()
    {
        $employee = Auth::user();
        return view('user.profile', ['employee' => $employee]);
    }

    public function profileUpdateAvatar(Request $request)
    {
        $employee = Auth::user();
        if ($employee) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$employee->id;

            if(!is_dir(public_path('uploads/avatars/'.$employee->unique_id))){
                mkdir(public_path('uploads/avatars/'.$employee->unique_id));
            }

            $dst = public_path('uploads/avatars/'.$employee->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $employee->avatar = $finish_image['image'][0]['name'];
                $employee->save();

                $avatar_url = asset('/uploads/avatars/'.$employee->unique_id.'/'.$employee->avatar);

                return $avatar_url;
            }

            return $finish_image->result;
        }
        return "fail";
    }

    public function profileUpdateCover(Request $request)
    {
        $employee = Auth::user();
        if ($employee) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$employee->id;

            if(!is_dir(public_path('uploads/covers/'.$employee->unique_id))){
                mkdir(public_path('uploads/covers/'.$employee->unique_id));
            }

            $dst = public_path('uploads/covers/'.$employee->unique_id.'/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "fail") {
                return $finish_image['reason'];
            }

            if ($finish_image['result'] == "success") {
                $employee->cover = $finish_image['image'][0]['name'];
                $employee->save();

                $avatar_url = asset('/uploads/covers/'.$employee->unique_id.'/'.$employee->cover);

                return $avatar_url;
            }

            return $finish_image->result;
        }
        return "fail";
    }

    public function uploadImagetoServer($imgdata, $name, $path)
    {
        $files = array();
        $result = array();
        $rules = [
            'file' => 'image',
            'slim[]' => 'image'
        ];

        $validator = Validator::make($imgdata->all(), $rules);
        $errors = $validator->errors();

        if($validator->fails()){
            $result = array('result' => 'fail', 'reson' => 'validator');
            return $result;
        }

        // Get posted data
        $images = Slim::getImages();

        // No image found under the supplied input name
        if ($images == false) {
            $result = array('result' => 'fail', 'reson' => 'image');
            return $result;
        } else {
            foreach ($images as $image) {
                // save output data if set
                if (isset($image['output']['data'])) {
                    // Save the file
                    $origine_name = $image['input']['name'];
                    $file_type = pathinfo($origine_name, PATHINFO_EXTENSION);
                    $finalName = $name.".".$file_type;

                    // We'll use the output crop data
                    $data = $image['output']['data'];
                    $output = Slim::saveFile($data, $finalName, $path, false);
                    array_push($files, $output);
                    $result = array('result' => 'success', 'image' => $files);
                    return $result;
                }
                // save input data if set
                if (isset ($image['input']['data'])) {
                    // Save the file
                    $origine_name = $image['input']['name'];
                    $file_type = pathinfo($origine_name, PATHINFO_EXTENSION);
                    $finalName = $name.".".$file_type;

                    $data = $image['input']['data'];
                    $input = Slim::saveFile($data, $finalName, $path, false);
                    array_push($files, $output);

                    $result = array('result' => 'success', 'image' => $files);
                    return $result;
                }
            }
        }
    }

    public function usernameValidate($new_username)
    {
        // return $new_username;
        $admin = Admin::where('username', $new_username)->count();
        $user = User::where('username', $new_username)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function emailValidate($new_email)
    {
        // return $new_username;
        $admin = Admin::where('email', $new_email)->count();
        $user = User::where('email', $new_email)->count();
        $total = $admin + $user;
        if($total != 0){
            return "exist";
        }else{
            return "new";
        }
    }

    public function updateEmployeeUnique(Request $request)
    {
        $employee = Auth::user();
        if ($employee) {
            if ($employee->username != $request->unique_username) {
                $employee->username = $request->unique_username;
                $employee->save();
            }
            if ($employee->email != $request->unique_email) {
                $employee->email = $request->unique_email;
                $employee->save();
            }
            return back();
        }
        return back();
    }

    public function updateEmployeeInfo(Request $request)
    {
        $employee = Auth::user();
        if ($employee) {
            $employee->first_name = $request->firstName;
            $employee->last_name = $request->lastName;
            $employee->birth = $this->encode_date_format($request->birth);
            $employee->save();

            return back();
        }
        return back();
    }

    public function updateEmployeePassOwn(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $current_password = $user->password;
            if (Hash::Check($request->old_password, $current_password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                return "success";
            }
            return "invalidPass";
        }
        return "fail";
    }

    public function decode_date_format($date)
    {
        $selectedDate = DateTime::createFromFormat('Y-m-d', $date);
        $finalDate = $selectedDate->format('m/d/Y');
        return $finalDate;
    }

    public function encode_date_format($date)
    {
        $selectedDate = DateTime::createFromFormat('m/d/Y', $date);
        $finalDate = $selectedDate->format('Y-m-d');
        return $finalDate;
    }

    public function decode_date_time_format($date)
    {
        $selectedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $finalDate = $selectedDate->format('m/d/Y');
        return $finalDate;
    }

    public function encode_time_format($time)
    {
        return date( "g:i A", strtotime($time));
    }

    public function decode_time_format($time)
    {
        return date( "H:i:s", strtotime($time));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function film()
    {
        return view('user.info');
    }

    public function howItWork()
    {
        return view('user.favorite');
    }

    public function sendContactEmail(Request $request)
    {
        $userName = $request->username;
        $userEmail = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        Mail::to('chol.r@hotmail.com')->send(new ContactUs($userName, $userEmail, $subject, $message));
        if(Mail::failures())
        {
            return "fail";
        }
        return "success";
    }

    public function getsingleTree($id)
    {
        $tree = Tree::find($id);
        if ($tree) {
            $html = view('user.treeDetailUser',compact('tree'))->render();
            return response()->json(['html'=>$html, "result" => "success"]);
        }
        return response()->json(["result" => "fail"]);
    }

    public function addFavoriteTree($id)
    {
        $tree = Tree::find($id);
        if ($tree) {
            $isfavorite = Favorite::where('tree_id', $tree->id)->where('user_id', Auth::user()->id)->first();
            if ($isfavorite) {
                $isfavorite->delete();
                return "removed";
            } else {
                $favorite = new Favorite;
                $favorite->user_id = Auth::user()->id;
                $favorite->tree_id = $tree->id;
                $favorite->save();

                return "added";
            }
        }
        return "fail";
    }

    public function addReviewTree(Request $request)
    {
        $tree = Tree::find($request->tree_id);
        if ($tree) {
            $review = new Review;
            $review->tree_id = $tree->id;
            $review->user_id = Auth::user()->id;
            $review->review = $request->tree_review;
            $review->save();

            $html = view('user.treeReview',compact('tree'))->render();
            return response()->json(['html'=>$html, "result" => "success"]);
        }
        return response()->json(["result" => "fail"]);
    }

    public function favoriteTrees()
    {
        $trees = Favorite::where('user_id', Auth::user()->id)->join('trees', 'trees.id', '=', 'favorites.tree_id')->select('trees.*')->get();
        return $trees;
    }
}
