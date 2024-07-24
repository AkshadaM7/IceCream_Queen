<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;//to access product
//use Flasher\Laravel\Facade\Flasher; // Use the Flasher facade

class AdminController extends Controller
{
    public function view_category()
    { 
        $data= Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        // Ensure to use the Flasher facade correctly
        toastr()->timeout(10000)->closeButton()->addwarning('Category added successfully!');

        return redirect()->back();
    }
    public function delete_category($id)
    {
        $data=Category::find($id);

        $data->delete();
        toastr()->timeout(10000)->closeButton()->addwarning('Category deleted successfully!');

        return redirect()->back();

    }
    public function edit_category($id)
    {
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));

    }
    public function update_category(Request $request, $id)
    {
        $data=Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        toastr()->timeout(10000)->closeButton()->addwarning('Category updated successfully!');
        return redirect('/view_category');
    }
    public function add_product()
    {
        $category= Category::all();
        return view('admin.add_product',compact('category'));

    }
    public function upload_product(Request $request)//request since it is post
    {
    
        $data=new Product;
        $data->title=$request->title;//title from product table for name,description field from add_product_blade
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        $image=$request->image;
        if ($image)//if there is a image upload it
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();//will give unique name using time function n store it in imagename n move it in product folder
            $request->image->move('products',$imagename);//we are taking image from blade
            $data->image=$imagename;//for approving image with unique name
            $data->save();
            toastr()->timeout(10000)->closeButton()->addwarning('Product added successfully!');
            return redirect()->back();
        }}
        public function view_product()
{
    $product = Product::paginate(3); // Change 10 to the number of items you want per page
    return view('admin.view_product', compact('product'));
}
    public function delete_product($id)
    {
        $data=Product::find($id);
        $image_path=public_path('products'.$data->image);
        if (file_exists($image_path))//if there is a image upload it
        {

            unlink($image_path);
        }
            
        $data->delete();
        toastr()->timeout(10000)->closeButton()->addwarning('Product deleted successfully!');

        return redirect()->back();

    }
    public function update_product($id)
    {
        $data= Product::find($id);
        $category=Category::all();
        return view('admin.update_page',compact('data','category'));

    }
     public function edit_product(Request $request,$id)
    {
        $data= Product::find($id);
        $data->title=$request->title;//title from product table for name,description field from add_product_blade
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        $image=$request->image;
        if ($image)//if there is a image upload it
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();//will give unique name using time function n store it in imagename n move it in product folder
            $request->image->move('products',$imagename);//we are taking image from blade
            $data->image=$imagename;//for approving image with unique name
        }
            $data->save();
            toastr()->timeout(10000)->closeButton()->addwarning('Product updated successfully!');
            return redirect('view_product');
        }

        public function product_search(Request $request){
            $search=$request-> search;
            $product=Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
            return view('admin.view_product', compact('product'));

        }
        public function view_orders()
{
    $data=Order::all();
    return view('admin.order', compact('data'));
}

public function on_the_way($id)
{
    $data=Order::find($id);
    $data->statsu='On the way';
    $data->save();
    return redirect('/view_orders');
}
public function delivered($id)
{
    $data=Order::find($id);
    $data->statsu='Delivered';
    $data->save();
    return redirect('/delivered');
}
public function print_pdf($id)
{
    $data=Order::find($id);
    $data->statsu='Delivered';
    $data->save();
    return redirect('/delivered');
}

    }
    
        
    