<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Console\View\Components\Alert;

class APIController extends Controller
{
    
    public function getProducts() {
        $products = Products::all();
        $user = Users::first();
        Session::put('user', $user);    
        return view('shop')->with('products',$products);
    }

    public function getAddToCart(Request $req, $id)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Session::has('user')) {
            // Kiểm tra xem sản phẩm có tồn tại hay không
            if (Products::where('product_id', $id)->first()) {
                // Tìm kiếm sản phẩm với ID tương ứng
                $productsProducts = Products::where('product_id', $id)->first();

                // Lấy giỏ hàng hiện tại từ session hoặc gán giá trị null nếu không tồn tại
                $oldCart = Session('cart') ? Session::get('cart') : null;

                // Tạo một đối tượng Cart mới và khởi tạo giỏ hàng mới
                $cart = new Cart($oldCart);

                // Thêm sản phẩm vào giỏ hàng
                $cart->add($productsProducts, $id);

                // Đặt giỏ hàng mới vào session
                $req->session()->put('cart', $cart);

                // Chuyển hướng người dùng trở lại trang trước đó
                // return redirect()->back();
                return '<script>alert("Thêm vào giỏ hàng thành công.");window.location.assign("/shop");</script>';
            } else {
                // Hiển thị thông báo lỗi và chuyển hướng về trang chủ nếu không tìm thấy sản phẩm
                return '<script>alert("Không tìm thấy sản phẩm này.");window.location.assign("/");</script>';
            }
        } else {
            // Hiển thị thông báo yêu cầu đăng nhập và chuyển hướng đến trang đăng nhập nếu người dùng chưa đăng nhập
            return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");</script>';
        }
    }
    public function showCart() {
        if (Session('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('shopping_cart')->with([
                'cart' => Session::get('cart'),
                'product_cart' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        }
    }

    public function getDelItemCart($id)
        {
            // Lấy giỏ hàng hiện tại từ session hoặc gán giá trị null nếu không tồn tại
            $oldCart = Session::has('cart') ? Session::get('cart') : null;

            // Tạo một đối tượng Cart mới và khởi tạo giỏ hàng mới
            $cart = new Cart($oldCart);

            // Xóa một mục khỏi giỏ hàng dựa trên ID của sản phẩm
            $cart->removeItem($id);

            // Kiểm tra xem giỏ hàng còn có mục hàng nào hay không
            if (count($cart->items) > 0) {
                // Nếu còn, đặt giỏ hàng mới vào session
                Session::put('cart', $cart);
            } else {
                // Nếu không còn, xóa khóa 'cart' khỏi session
                Session::forget('cart');
            }

            // Chuyển hướng người dùng trở lại trang trước đó
            return redirect()->back();
        }
}
