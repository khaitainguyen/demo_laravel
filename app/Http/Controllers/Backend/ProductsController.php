<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductsModel;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //
    public function index() {
        //$products = ProductsModel::all();
        $products = DB::table('products')->paginate(10);

        // truyền dữ liệu xuống view
        $data = [];
        $data["products"] = $products;
        return view("backend.products.index", $data);
    }

    public function create() {

        return view("backend.products.create");
    }

    public function edit($id) {
        $product = ProductsModel::findOrFail($id);

        // truyền dữ liệu xuống view
        $data = [];
        $data["product"] = $product;

        return view("backend.products.edit", $data);
    }

    public function delete($id) {
        $product = ProductsModel::findOrFail($id);
        // truyền dữ liệu xuống view
        $data = [];
        $data["product"] = $product;

        return view("backend.products.delete", $data);
    }

    public function store(Request $request) {

        // validate dữ liệu

        $validatedData = $request->validate([

            'product_name' => 'required',
            'product_desc' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',

        ]);

        $product_name = $request->input('product_name', '');
        $product_desc = $request->input('product_desc', '');
        $product_publish = $request->input('product_publish', '');
        $product_quantity = $request->input('product_quantity', 0);
        $product_price = $request->input('product_price', 0);

        $product = new ProductsModel();
        // khi $product_publish không được nhập dữ liệu
        // ta sẽ gán giá trị là thời gian hiện tại theo định dạng Y-m-d H:i:s
        if (!$product_publish) {
            $product_publish = date("Y-m-d H:i:s");
        }

        // gán dữ liệu từ request cho các thuộc tính của biến $product
        // $product là đối tượng khởi tạo từ model ProductsModel
        $product->product_name = $product_name;
        $product->product_desc = $product_desc;
        $product->product_publish = $product_publish;
        $product->product_quantity = $product_quantity;
        $product->product_price = $product_price;

        // gắn tạm product_image là rỗng "" vì ta chưa upload ảnh
        $product->product_image = "";
        // lưu sản phẩm

        $product->save();

        // chuyển hướng về trang /backend/product/index
        return redirect("/backend/product/index")->with('status', 'Them san pham thanh cong !');

    }
    public function update(Request $request, $id){
        $validateData =$request->validate(
        [
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            ]);

        $product_name = $request->input('product_name', '');
        $product_desc = $request->input('product_desc', '');
        $product_publish = $request->input('product_publish', '');
        $product_quantity = $request->input('product_quantity', 0);
        $product_price = $request->input('product_price', 0);



        // khi $product_publish không được nhập dữ liệu
        // ta sẽ gán giá trị là thời gian hiện tại theo định dạng Y-m-d H:i:s
        if (!$product_publish) {
            $product_publish = date("Y-m-d H:i:s");
        }

        // lấy đối tượng model dựa trên biến $id

        $product = ProductsModel::findOrFail($id);

        // gán dữ liệu từ request cho các thuộc tính của biến $product
        // $product là đối tượng khởi tạo từ model ProductsModel

        $product->product_name = $product_name;
        $product->product_desc = $product_desc;
        $product->product_publish = $product_publish;
        $product->product_quantity = $product_quantity;
        $product->product_price = $product_price;

        // gắn tạm product_image là rỗng "" vì ta chưa upload ảnh
        $product->product_image = "";

        // lưu sản phẩm
        $product->save();
        // chuyển hướng về trang /backend/product/edit/id
        return redirect("/backend/product/edit/$id")->with('status', 'cập nhật sản phẩm thành công !');
    }

    // xóa sản phẩm thật sự trong CSDL
    public function destroy($id) {





        echo "<br> id " . $id;
        // lấy đối tượng model dựa trên biến $id
        $product = ProductsModel::findOrFail($id);
        $product->delete();
        return redirect("/backend/product/index")->with('status', 'xóa sản phẩm thành công !');
    }

}
