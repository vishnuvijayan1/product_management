<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required|max:200|unique:products,product_name,NULL,id,deleted_at,NULL',
                'quantity' => 'required|integer',
                'price' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'status_code' => 200,
                    'message' => __('messages.validation_error'),
                    'message_code' => 'validation_error',
                    'errors' => $validator->errors()->all()
                ]);
            }

            DB::beginTransaction();
            $products = new Product();
            $products->product_name = $request->product_name;
            $products->quantity = $request->quantity;
            $products->price = $request->price;
            $products->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'status_code' => 200,
                'message' => 'Product Created Successfully',
                'message_code' => 'created_success',
            ]);

        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(
                [
                    'success' => false,
                    'status_code' => 500,
                    'message' => __('messages.something_went_wrong'),
                    'message_code' => 'try_catch',
                    'exception' => $exception->getMessage(),
                    'errors' => []
                ], 500);
            }
        }

        public function delete(Request $request)
        {
            $product = Product::where('id', $request->product_id)->first();
            $product->delete();

            return redirect('/home');
        }

        public function generateInvoice(Request $request)
        {
            $product = Product::where('id', $request->product_id)->first();
            return view('products.generate-invoice', compact('product'));
        }

    }
