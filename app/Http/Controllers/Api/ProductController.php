<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        $posts = Product::orderBy('product_id', 'desc')->get();
        return response()->json($posts);
    }

   
    public function save_images($requeste_img)
    {   
        // $avatars = [];
        // foreach (json_decode($requeste_img) as $item) {
        //     $image_parts = explode(";base64,", $item);
        //     $image_content = $image_parts[1];
        //     $image_type = explode("data:image/",$image_parts[0])[1];
        //     $image_content = base64_decode($image_content);
        //     $image = imagecreatefromstring($image_content);
        //     $image_name = uniqid().'.'.$image_type;
        //     // $image_path = 'C:/Users/admin/Desktop/tien.ho21/reactjs-laravel/original_reactjs/public/image/people/avatar/'.$image_name;
        //     $image_path = 'storage/avatar/'.$image_name;
        //     imagepng($image, $image_path, 0);
        //     imagedestroy($image);
        //     array_push($avatars, $image_name);
        // }
        // return json_encode($avatars);
        
    }

    public function store(Request $request)
    {   
        

        $pro= new Product();
        $pro->product_name=$request->product_name;
        $pro->category_id=$request->category_id;
        $pro->brand_id=$request->brand_id;
        $pro->product_desc=$request->product_desc;
        $pro->product_content=$request->product_content;
        $pro->product_price=$request->product_price;
        $pro->product_image=$request->product_image;
        $pro->product_status=$request->product_status;
        $pro->save();
        

        // $request->merge(['avatar' => $this->save_images($request->avatar)]);
        // Product::create($request->all());

        // return $this->index();
        return response()->json($pro,200);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return $this->index();
    }

    public function update($id, Request $request)
    {
        if (Product::where('id', $id)->get("image")[0]["image"] != $request->avatar) {
            $request->merge(['image' => $this->save_images($request->avatar)]);
        }
        Product::where('id', $id)->update($request->all());
        return $this->index();
    }
}
