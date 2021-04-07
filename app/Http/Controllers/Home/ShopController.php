<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Cart;
use Carbon\Carbon;
use App\Banner;
use App\Category;
use App\Product;
use App\Brand;
use App\Article;
use App\CustomerInvoice;
use App\Invoice;
use Illuminate\Support\Facades\Session;
if(!isset($_SESSION)){
    session_start();
}

class ShopController extends HomeController
{
    public function __construct()
    {
    	parent::__construct();
    }

    //Lay theo trang chu
    public function index()
    {
        //check trang dang hien thi
    	$data = [
            'products' => '',
            'is_home' => 1
        ];

        //lay danh sach san pham theo danh muc
        $categories = $this->categories;

        $list = [];

        foreach ($categories as $key => $category) {
            if ($category->parent_id == 0 && $category->position == 1) {
                $ids[] = $category->id;

                foreach ($categories as $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id;
                    }
                }

                $list[$key] ['category'] = $category;
                $list[$key] ['products'] = Product::where('is_active', 1)
                ->whereIn('category_id', $ids)
                ->limit(6)->orderBy('id', 'desc')
                ->get();
            }
        }

        //Phan san pham noi bat
        $productsHot = Product::where(['is_active' => 1, 'is_hot' => 1])
                                ->orderBy('id', 'desc')
                                ->paginate(4);


        //Phan thuong hieu
        $productsBrand = Brand::where('is_active', 1)
                                ->orderBy('id', 'desc')
                                ->get();

        //Phan san pham khuyen mai
        $productsSale = Product::Where('is_active', 1)->where('sale', '>', 0) 
                                ->orderBy('id', 'desc')
                                ->paginate(4);
        
        //Danh sach bai viet
        $articles = Article::latest()->paginate(2);


        //tra ve view
    	return view('home.home', [
    		'data' => $data,
            'list' => $list,
            'productsHot' => $productsHot,
            'productsBrand' => $productsBrand,
            'productsSale' => $productsSale,
            'articles' => $articles,

    	]);
    }

    //Lấy san pham theo tung loai danh mục sản phẩm
    public function categoryProducts ($slug)
    {
    	//Check trang dang hien thi
    	$data = [
            'products' => '',
            'is_category' => 1
        ];

        //Lay danh sach san pham
		$cate = Category::where(['slug' => $slug])->first();
		if ($cate) {
			$categories = $this->categories;
			$ids = [];

			foreach ($categories as $key => $category) {
				if ($cate->id == $category->id) {
					$ids[] = $cate->id;

					foreach ($categories as $key => $child) {
						if ($child->parent_id == $cate->id) {
							$ids[] = $child->id;
						}
					}
				}
			}

            // step 2 : lấy list sản phẩm theo thể loại
            $products = Product::where('is_active', 1)
                                ->whereIn('category_id', $ids)
                                ->orderBy('id', 'desc')
                                ->paginate(12);


            //Lay thuong hieu
            $brands = Brand::where('is_active', 1)
                                    ->orderBy('id', 'desc')
                                    ->get();

            //Lay list bai viet theo danh muc tin tuc
            $articles = Article::where('is_active', 1)
                                ->whereIn('parent_id', $ids)
                                ->orderBy('id', 'desc')
                                ->paginate(5);


            //Du lieu tra ve view
            if ($cate->position == 0) {
                return view ('home.category_article', [
                    'articles' => $articles,
                    'cate' => $cate,
                    'namePage' => $cate->name,

                ]);

            } else {
                return view ('home.category_product', [
                    'data' => $data,
                    'cate' => $cate,
                    'products' => $products,
                    'namePage' => $cate->name,
                    'brands' => $brands,

                ]);
            }

		} else {

            return $this->notfound();
        }

		
    }

    //Lấy theo trang chi tiết sản phẩm
    public function getProduct ($category, $slug, $id)
    {

        //kiem trang trang dang hien thi
    	$data = [
            'products' => '',
            'is_detail' => 1
        ];

        //Lay danh sach chi tiet san pham
        $product = Product::where('id', $id)->where('slug', $slug)
                            ->first();

        //Neu khong co san pham se tra trang khong tim thay
        if (!$product) {
            return $this->notfound();
        }

        //Lay danh muc san pham
        $category = Category::find($product->category_id);


        //san pham lien quan
        $relateProducts = Product::whereNotIn('id', [$id])->where([
            'is_active' => 1,
            'category_id' => $product->category_id
        ])->orderBy('id', 'desc')->paginate(4);


        //tra ve view
    	return view ('home.detail_product', [
			'data' => $data,
            'productTitle' => $product->name,
            'product' => $product,
            'category' => $category,
            'relateProducts' => $relateProducts,

    	]);
    }

    //Lay theo trang chi tiet bai viet
    public function articleDetail ($slug, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->notfound();
        }

        //tra ve view hien thi
        return view ('home.article_detail', [
            'article' => $article,
            'articleName' => $article->name,

        ]);
    }

    //Them gio hang
    public function getAddCart (Request $request, $id)
    {
        //Tim id san pham tuong ung
        $product = Product::find($id);

        //check du so luong hay khong
        if ($product->stock < 1) {
            Toastr::success('Sản phẩm bạn đặt đã hết hàng','Xin lỗi');
            return redirect()->back();
        }

        //Check gia khuyen mai hay khong
        if ($product->sale > 0) {
            $price = $product->sale;
        } else {
            $price = $product->price;
        }

        //Them vao gio hang
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $price,
            'weight' => 1,
            'options' => [
                'image' => $product->image,

            ]
        ]);

        //Thanh cong se thong bao
        Toastr::success('Bạn đã đặt hàng thành công','Chúc mừng');

        //Tro ve trang danh sach gio hang
        return redirect()->route('get.listCart');

    }

    //trang danh sach gio hang
    public function getListCart()
    {
        $shoppings = \Cart::content();

        // // // //tra ve view hien thi
        return view ('home.list_cart', [
            'shoppings' => $shoppings,
            'nameCart' => $nameCart = 'Trang giỏ hàng của bạn',

        ]);
    }

    //xoa gio hang
    public function getDeleteCart(Request $request, $rowId)
    {
        // if ($request->ajax()){
        //     \Cart::remove($rowID);
        //     return response(['msg' => 'Bạn có muốn xóa không?']);
        // }
        // Toastr::success('Đã xóa sản phẩm khỏi giỏ hàng của bạn','Chúc mừng');

        \Cart::remove($rowId);

        //Thong bao cho nguoi dung khi xoa thanh cong
        Toastr::success('Đã xóa sản phẩm khỏi giỏ hàng của bạn','Chúc mừng');

        return redirect()->route('get.listCart');
    }


    //Cap nhat so luong san pham trong gio hang
    public function postUpdateCart(Request $request, $rowId)
    {
        
        if ($request != null) {
            $qty = $request->input('qty');
            $productId = $request->input('name');
            $product = Product::find($productId);

            if ($product->stock < $qty) {
               //Hien thong bao
               Toastr::success('Không đủ số lượng sản phẩm để cập nhật giỏ hàng của bạn','Xin lỗi');
               //Tro ve trang danh sach san pham
               return redirect()->route('get.listCart');
            }

            \Cart::update($rowId, $qty);

            //Thong bao cho nguoi dung khi xoa thanh cong
            Toastr::success('Đã cập nhật số lượng trong giỏ hàng của bạn','Chúc mừng');

            return redirect()->route('get.listCart');
        }

    }

    //Phan thanh toan cua khach hang
    public function postToPay(Request $request)
    {
        if (\Cart::subtotal() > 0) {
            $data = $request->except('_token');
            $data['created_at'] = Carbon::now();
            $data['total_money'] = str_replace(',', '', \Cart::subtotal(0));

            if (Session::get('customer_id')) {
                $data['customer_id'] = Session::get('customer_id');
            }

            $customerInvoiceId = CustomerInvoice::insertGetId($data);
            if ($customerInvoiceId) {
                $customerInvoice = CustomerInvoice::find($customerInvoiceId);
                $data['invoice_code'] = 'DH-'.$customerInvoiceId.'-'.date('d').date('m').date('y');
                $update = $customerInvoice->update($data);

                $shoppings = \Cart::content();

                //Thong bao cho nguoi dung khi xoa thanh cong
                Toastr::success('Gửi đơn hàng thành công, chúng tôi sẽ liên hệ bạn','Chúc mừng');

                foreach ($shoppings as $key => $item) {
                    //dat hang xong tru so luong cua san pham
                    $product = Product::findorFail($item->id);
                    $current_stock = $product->stock;
                    $product->stock = $current_stock - $item->qty;
                    $product->save();

                    //chen data vao bang invoice
                    Invoice::insert([
                        'customer_invoice' => $customerInvoiceId,
                        'product_id' => $item->id,
                        'price' => $item->price,
                        'sale' => $item->sale,
                        'qty' => $item->qty,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                }

                \Cart::destroy();
            }

            return redirect()->back();

        } else {
            return redirect()->route('get.home');
        }
    }



}
