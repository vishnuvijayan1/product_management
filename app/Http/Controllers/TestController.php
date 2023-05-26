<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Stock;
use App\Models\StockHistory;
use App\Models\User;
use App\Models\UserBoutique;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testFunction(){
//        return testHelperFunction();
        return Request::route()->getName();
    }

    public function testTryCatch(Request $request)
    {
        try
        {

        }
        catch (\Exception $exception)
        {
            return response()->json(
                [
                    'success' => false,
                    'status_code' => 500,
                    'message' => 'Something Went To Wrong',
                    'message_code' => 'try_catch',
                    'exception' => $exception->getMessage(),
                    'errors' => []
                ], 200);
        }

    }

    public function testTimeZone()
    {
        $timestamp = '2022-10-25 17:30:00';
//        return getLocalTimeFromUtc('2022-10-25 12:30:00');
//        return getUtcTimeFromLocal('2022-10-25 18:00:00', 'Asia/Kolkata');
        $time_zone = getLocalTimeZone("Asia/Kuwait");
      //  Carbon::setLocale('ar');
        $start = Carbon::tomorrow($time_zone);
        $start_time = $start->toDateTimeString();
        $end = $start->addDay(5);
        $end_time = $end->toDateTimeString();
       //return $start_time." 00000 ".$end_time;
       return $start->diffForHumans();
    }

    public function updateUserBoutique()
    {
        $users = User::get();
        foreach ($users as $user)
        {
            $boutique_count = UserBoutique::where('user_id', $user->id)->count();
            if(!$boutique_count)
            {
                $user_boutique = new UserBoutique();
                $user_boutique->user_id = $user->id;
                $user_boutique->name = $user->first_name." ".$user->last_name." Boutique" ;
                $user_boutique->name_ar = $user->first_name." ".$user->last_name." Boutique";
                $user_boutique->save();
            }
        }





        $products = Product::get();
        foreach ($products as $product)
        {
            $boutique_id = UserBoutique::where('user_id', $product->user_id)->first()->id;
            $product->user_boutique_id = $boutique_id;
            $product->save();
        }
        return "Success" ;
    }

    public function updateProductStock()
    {
        $product_variants = ProductVariant::get();
        foreach ($product_variants as $product_variant)
        {
            $product = $product_variant->product;
            $user_boutique = $product->boutique;
            $stock_count = Stock::where('product_variant_id', $product_variant->id)->where('user_boutique_id', $user_boutique->id)->count();
            if(!$stock_count)
            {
                $stock = new Stock();
                $stock->user_boutique_id = $user_boutique->id;
                $stock->product_variant_id = $product_variant->id;
                $stock->quantity = $product_variant->quantity;
                $stock->created_by_admin_id = 1;
                $stock->updated_by_admin_id = 1;
                $stock->save();

                $stock_history = new StockHistory();
                $stock_history->stock_id = $stock->id;
                $stock_history->user_boutique_id = $user_boutique->id;
                $stock_history->product_variant_id = $product_variant->id;
                $stock_history->quantity = $product_variant->quantity;
                $stock_history->add_by = "AddByAdmin";
                $stock_history->stock_type = "Add";
                $stock_history->created_by_admin_id = 1;
                $stock_history->updated_by_admin_id = 1;
                $stock_history->stock_type = "Add";
                $stock_history->save();
            }
        }





        $products = Product::get();
        foreach ($products as $product)
        {
            $boutique_id = UserBoutique::where('user_id', $product->user_id)->first()->id;
            $product->user_boutique_id = $boutique_id;
            $product->save();
        }
        return "Success" ;
    }


}
