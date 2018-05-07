<?php

namespace App\Http\Controllers\Admin;

use App\Slim;
use App\Tree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TreeController extends Controller
{
    public function viewVideo()
    {
        return view('admin.manageTrees');
    }

    public function getTreeData()
    {
        $trees = Tree::all();
        return $trees;
    }

    public function treeDeatail($id)
    {
        $tree = Tree::find($id);
        if ($tree) {
            return view('admin.treeDetail', ['tree' => $tree]);
        }
        return back();
    }

    public function storeTree(Request $request)
    {
        $new_guid = $this->GUID();
        $final_guid = strtolower($new_guid);
        $tree = new Tree;
        $tree->Common_Name = $request->Common_Name;
        $tree->Scientific_Name = $request->Scientific_Name;
        $tree->Scientific_Family_Name = $request->Scientific_Family_Name;
        $tree->Genus = $request->Genus;
        $tree->Species = $request->Species;
        $tree->Campus_Location = $request->Campus_Location;
        $tree->GlobalID_2 = $final_guid;
        $tree->save();

        return back();
    }

    public function getSingleVideo($id)
    {
        $video = Video::find($id);
        if ($video) {
            return $video;
        }
        return "fail";
    }

    public function updateTreeImage(Request $request)
    {
        $tree = Tree::find($request->tree_id);
        if ($tree) {
            $imageRand = rand(1000, 9999);
            $random_name = $imageRand."_".time()."_".$tree->id;

            if(!is_dir(public_path('uploads/trees'))){
                mkdir(public_path('uploads/trees'));
            }

            $dst = public_path('uploads/trees/');

            $finish_image = $this->uploadImagetoServer($request, $random_name, $dst);

            if ($finish_image['result'] == "success") {
                $tree->image = $finish_image['image'][0]['name'];
                $tree->save();
            }

            return back();
        }
        return back();
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

    public function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function updateTreeBasic(Request $request)
    {
        $tree = Tree::find($request->tree_id);
        if ($tree) {
            $tree->Common_Name = $request->Common_Name;
            $tree->Scientific_Name = $request->Scientific_Name;
            $tree->Scientific_Family_Name = $request->Scientific_Family_Name;
            $tree->Genus = $request->Genus;
            $tree->Species = $request->Species;
            $tree->Campus_Location = $request->Campus_Location;
            $tree->save();

            return back();
        }

        return back();
    }

    public function updateTreeHistory(Request $request)
    {
        $tree = Tree::find($request->tree_id);
        if ($tree) {
            $tree->history = $request->tree_history;
            $tree->save();

            return back();
        }

        return back();
    }

    public function updateTreeLocation(Request $request)
    {
        $tree = Tree::find($request->tree_id);
        if ($tree) {
            $tree->x = $request->location_x;
            $tree->y = $request->location_y;
            $tree->save();

            return back();
        }

        return back();
    }

    public function deleteVideo($id)
    {
        $video = Video::find($id);
        if ($video) {
            $video->delete();
            return "success";
        }
        return "fail";
    }
}
