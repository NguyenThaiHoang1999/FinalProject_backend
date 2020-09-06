<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Session;

class CategoryProduct extends Controller
{
    public function add_category_product(){
       
    	return view('admin.add_category_product');
    }

    public function all_category_product(){
       
        $all_category_product = DB::table('tbl_category_product')->paginate(3);
        
        $manager_category_product  = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
      

    }
    public function save_category_product(Request $request){
      
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->slug_category_product;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect('all-category-product');
    }
    public function unactive_category_product($category_product_id){
       
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect('all-category-product');

    }
    public function active_category_product($category_product_id){
        
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect('all-category-product');
    }
    public function edit_category_product($category_product_id){
        
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
       
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect('all-category-product');
    }
    public function delete_category_product($category_product_id){
       
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        
       
        return Redirect('all-category-product');
    }

    //End Function Admin Page
    
}
