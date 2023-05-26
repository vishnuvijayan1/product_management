<?php

use App\Models\Area;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\Localization;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function testHelperFunction()
{
    return "Test Helper Function Successfully";
}

function localizeValidationFormElements()
{
    $language = app()->getLocale();
    $form_elements = Localization::select('key','en','ar')->where('type', 'form_element')->where('status', 1)->get()->toArray();
    $response = [];
    foreach($form_elements as $key => $form_element ){
        $resp[$form_element['key']] = $language == 'en' ? $form_element['en'] : $form_element['ar'];
    }
    return $response;
}

function getMessageText($message_key)
{
    $language = app()->getLocale();
    $message_array = Localization::select('key','en','ar')->where('key',$message_key)->where('type', 'message')->where('status', 1)->first();
    if($message_array)
    {
        $message =  $language == 'en' ? $message_array['en'] : $message_array['ar'];
    }
    else
    {
        $message = $message_key;
    }
    return $message;
}

function getPerPageLimit($per_page)
{
    if($per_page == "" || $per_page == null) {
        return 10;
    }
    return $per_page;
}

function getLocalTimeFromUtc($utc_time, $local_time_zone = "Asia/Kuwait")
{
    // $utc_time must be in y-m-d H:i:s Format
    // $local_time_zone in "Asia/Kuwait" format
    if(!$local_time_zone) $local_time_zone = "Asia/Kuwait";
    $given_utc_time  = Carbon::createFromFormat('Y-m-d H:i:s', $utc_time, 'UTC');
    return $given_utc_time->setTimezone($local_time_zone)->toDateTimeString();
}

function getReadableLocalTimeFromUtc($utc_time, $local_time_zone = "Asia/Kuwait")
{
    // $utc_time must be in y-m-d H:i:s Format
    // $local_time_zone in "Asia/Kuwait" format
    if(!$local_time_zone) $local_time_zone = "Asia/Kuwait";
    $given_utc_time  = Carbon::createFromFormat('Y-m-d H:i:s', $utc_time, 'UTC');
    return $given_utc_time->setTimezone($local_time_zone)->format('d-m-Y h:i A');
}

function getReadableDate($date)
{
    if($date)
    {
        return date('d-m-Y', strtotime($date));
    }
    else
    {
        return null;
    }

}

function getUtcTimeFromLocal($local_time, $local_time_zone = "Asia/Kuwait")
{
    // $local_time must be in y-m-d H:i:s Format
    // $local_time_zone in "Asia/Kuwait" format
    if(!$local_time_zone) $local_time_zone = "Asia/Kuwait";
    $given_local_time  = Carbon::createFromFormat('Y-m-d H:i:s', $local_time, $local_time_zone);
    return $given_local_time->setTimezone('UTC')->toDateTimeString();
}

function getLocalTimeZone($local_time_zone = "Asia/Kuwait")
{
    if(!$local_time_zone) $local_time_zone = "Asia/Kuwait";
    return $local_time_zone;
}

function getDbDateTimeFormat($date_time)
{
    if($date_time)
    {
        return date('Y-m-d H:i:s', strtotime($date_time));
    }
    else
    {
        return null;
    }

}

function getDbDateFormat($date)
{
    if($date)
    {
        return date('Y-m-d', strtotime($date));
    }
    else
    {
        return null;
    }

}

function productData($product_data_array, $time_zone = null)
{
    if($time_zone == null)
    {
        $time_zone = getLocalTimeZone();
    }
    $time_zone = getLocalTimeZone("Asia/Kuwait");
    if(app()->getLocale() == 'ar')
    {
        $name_array['name'] = "name_ar as name";
        $name_array['title'] = "title_ar as name";
        $name_array['description'] = "description_ar as description";
    }
    else
    {
        $name_array['name'] = "name";
        $name_array['title'] = "title";
        $name_array['description'] = "description";
    }
    $product_data = [];
    foreach ($product_data_array as $key => $product_data_item)
    {
        if($product_data_item->type == 'Sale')
        {
            $product_temp_data = [
                "id" => $product_data_item->id,
                "product_id" => $product_data_item->product->id,
                "product_variant_id" => $product_data_item->product->product_inventory->id,
                "boutique_id" => $product_data_item->product->boutique->id,
                "boutique_name" => (string) $product_data_item->product->boutique()->select($name_array['name'])->first()->name,
                "name" => (string) $product_data_item->product->name,
                "attribute_values" => (string) $product_data_item->product->product_inventory->getAttributeValueOnly(),
                "sale_type" => (string) $product_data_item->type,
                "product_type" => (string) $product_data_item->product->type,
                "available_quantity" => (string) $product_data_item->product->product_inventory->availableStockQuantity(),
                "final_price" => (string) $product_data_item->product->product_inventory->final_price,
                "regular_price" => (string) $product_data_item->product->product_inventory->regular_price,
                "bid_start_price" => "",
                "bid_value" => "",
                "estimate_start_price" => "",
                "estimate_end_price" => "",
                "start_time" => "",
                "end_time" => "",
                "auction_status" => "",
                "auction_status_text" => "",
                "description" => (string) $product_data_item->product->description,
                "favorite_status" => (string) $product_data_item->getFavoriteStatus(),
                "cart_status" => (string) $product_data_item->getCartStatus(),
                "thumb_image" => (string) $product_data_item->product->product_inventory->default_image->thumb_image,
                "original_image" => (string) $product_data_item->product->product_inventory->default_image->original_image,
            ];
        }
        elseif($product_data_item->type == 'Auction')
        {
            $product_temp_data = [
                "id" => $product_data_item->id,
                "product_id" => $product_data_item->product->id,
                "product_variant_id" => $product_data_item->product->product_inventory->id,
                "boutique_id" => $product_data_item->product->boutique->id,
                "boutique_name" => (string) $product_data_item->product->boutique()->select($name_array['name'])->first()->name,
                "name" => (string) $product_data_item->product->name,
                "attribute_values" => (string) $product_data_item->product->product_inventory->getAttributeValueOnly(),
                "sale_type" => (string) $product_data_item->type,
                "product_type" => (string) $product_data_item->product->type,
                "available_quantity" => (string) $product_data_item->product->product_inventory->availableStockQuantity(),
                "final_price" => "",
                "regular_price" => "",
                "bid_start_price" => (string) $product_data_item->product->product_inventory->bid_start_price,
                "bid_value" => (string) $product_data_item->product->product_inventory->bid_value,
                "estimate_start_price" => (string) $product_data_item->product->product_inventory->estimate_start_price,
                "estimate_end_price" => (string) $product_data_item->product->product_inventory->estimate_end_price,
                "start_time" => (string) getLocalTimeFromUtc($product_data_item->bid_start_time, $time_zone),
                "end_time" => (string) getLocalTimeFromUtc($product_data_item->bid_end_time, $time_zone),
                "auction_status" => (string) $product_data_item->getAuctionStatus(),
                "auction_status_text" => (string) $product_data_item->getAuctionStatusText(),
                "favorite_status" => (string) $product_data_item->getFavoriteStatus(),
                "cart_status" => (string) $product_data_item->getCartStatus(),
                "description" => (string) $product_data_item->product->description,
                "thumb_image" => (string) $product_data_item->product->product_inventory->default_image->thumb_image,
                "original_image" => (string) $product_data_item->product->product_inventory->default_image->original_image,
            ];
        }
        else
        {

        }

        array_push($product_data, $product_temp_data);
    }
    return $product_data;
}

function cartData($cart_data_array, $time_zone = null)
{
    if($time_zone == null) $time_zone = getLocalTimeZone();
    if(app()->getLocale() == 'ar')
    {
        $name_array['name'] = "name_ar as name";
        $name_array['title'] = "title_ar as name";
        $name_array['description'] = "description_ar as description";
    }
    else
    {
        $name_array['name'] = "name";
        $name_array['title'] = "title";
        $name_array['description'] = "description";
    }
    $product_data = [];
    foreach ($cart_data_array as $key => $cart_data_item)
    {
        if($cart_data_item->sale_type == 'Sale')
        {
            $is_available = 1;
            $is_available_text = __('messages.product_available');
            if($cart_data_item->sale_type != $cart_data_item->product->sale_type)
            {
                $is_available_text = __('messages.product_currently_unavailable');
                $is_available = 0;
            }
            $product_temp_data = [
                "id" => $cart_data_item->product_for_auction_or_sale->id,
                "cart_id" => $cart_data_item->id,
                "product_id" => $cart_data_item->product->id,
                "product_variant_id" => $cart_data_item->product_variant->id,
                "boutique_id" => $cart_data_item->product->boutique->id,
                "boutique_name" => (string) $cart_data_item->product->boutique()->select($name_array['name'])->first()->name,
                "name" => (string) $cart_data_item->product->getProductName(),
                "attribute_values" => (string) $cart_data_item->product_variant->getAttributeValueOnly(),
                "sale_type" => (string) $cart_data_item->sale_type,
                "type" => (string) $cart_data_item->product->type,
                "available_quantity" => (string) $cart_data_item->product_variant->availableStockQuantity(),
                "ordered_quantity" => (string) $cart_data_item->quantity,
                "final_price" => (string) $cart_data_item->product_variant->final_price,
                "regular_price" => (string) $cart_data_item->product_variant->regular_price,
                "bid_start_price" => "",
                "bid_value" => "",
                "estimate_start_price" => "",
                "estimate_end_price" => "",
                "start_time" => "",
                "end_time" => "",
                "auction_status" => "",
                "auction_status_text" => "",
                "favorite_status" => (string) $cart_data_item->product_for_auction_or_sale->getFavoriteStatus(),
                "cart_status" => (string) $cart_data_item->product_for_auction_or_sale->getCartStatus(),
                "description" => (string) $cart_data_item->product->description,
                "thumb_image" => (string) $cart_data_item->product_variant->default_image->thumb_image,
                "original_image" => (string) $cart_data_item->product_variant->default_image->original_image,
                "is_available" => (string) $is_available,
                "is_available_text" => (string) $is_available_text

            ];
        }
        elseif($cart_data_item->sale_type == 'Auction')
        {
            $is_available = 1;
            $is_available_text = __('messages.product_available');
            if($cart_data_item->sale_type != $cart_data_item->product->sale_type)
            {
                $is_available_text = __('messages.product_currently_unavailable');
                $is_available = 0;
            }

            $product_temp_data = [
                "id" => $cart_data_item->product_for_auction_or_sale->id,
                "cart_id" => $cart_data_item->id,
                "product_id" => $cart_data_item->product->id,
                "product_variant_id" => $cart_data_item->product_variant->id,
                "boutique_id" => $cart_data_item->product->boutique->id,
                "boutique_name" => (string) $cart_data_item->product->boutique()->select($name_array['name'])->first()->name,
                "name" => (string) $cart_data_item->product->getProductName(),
                "attribute_values" => (string) $cart_data_item->product_variant->getAttributeValueOnly(),
                "sale_type" => (string) $cart_data_item->sale_type,
                "type" => (string) $cart_data_item->product->type,
                "available_quantity" => (string) $cart_data_item->product_variant->availableStockQuantity(),
                "ordered_quantity" => (string) $cart_data_item->quantity,
                "final_price" => "",
                "regular_price" => "",
                "bid_start_price" => (string) $cart_data_item->product_variant->bid_start_price,
                "bid_value" => (string) $cart_data_item->product_variant->bid_value,
                "estimate_start_price" => (string) $cart_data_item->product_variant->estimate_start_price,
                "estimate_end_price" => (string) $cart_data_item->product_variant->estimate_end_price,
                "start_time" => (string) getLocalTimeFromUtc($cart_data_item->product_for_auction_or_sale->bid_start_time, $time_zone),
                "end_time" => (string) getLocalTimeFromUtc($cart_data_item->product_for_auction_or_sale->bid_end_time, $time_zone),
                "auction_status" => (string) $cart_data_item->product_for_auction_or_sale->getAuctionStatus(),
                "auction_status_text" => (string) $cart_data_item->product_for_auction_or_sale->getAuctionStatusText(),
                "favorite_status" => (string) $cart_data_item->product_for_auction_or_sale->getFavoriteStatus(),
                "cart_status" => (string) $cart_data_item->product_for_auction_or_sale->getCartStatus(),
                "description" => (string) $cart_data_item->product->description,
                "thumb_image" => (string) $cart_data_item->product_variant->default_image->thumb_image,
                "original_image" => (string) $cart_data_item->product_variant->default_image->original_image,
                "is_available" => (string) $is_available,
                "is_available_text" => (string) $is_available_text,

            ];
        }
        else
        {

        }

        array_push($product_data, $product_temp_data);
    }
    return $product_data;
}



function getProductVariantAttributeValue($product_variant_id, $attribute_id)
{
    $attribute_value = null;
    $product_attribute = DB::table('product_attributes')->where('product_variant_id', $product_variant_id)->where('attribute_id', $attribute_id)->first();
    if($product_attribute)
    {
        $attribute_value = $product_attribute->attribute_value_id;
    }
    return $attribute_value;
}

function addressDataSingle($address_item)
{
    if(app()->getLocale() == 'ar')
    {
        $name_array['name'] = "name_ar as name";
    }
    else
    {
        $name_array['name'] = "name";
    }
    $address_array_temp = [];
    if($address_item)
    {
        $address_array_temp = [
            "id" => $address_item->id,
            "first_name" => (string) $address_item->first_name,
            "last_name" => (string) $address_item->last_name,
            "contact_number" => (string) $address_item->contact_number,
            "country_id" => $address_item->country_id,
            "country" => (string) Country::where('id', $address_item->country_id)->select($name_array['name'])->first()->name,
            "governorate_id" => $address_item->governorate_id,
            "governorate" => (string) Governorate::where('id', $address_item->governorate_id)->select($name_array['name'])->first()->name,
            "area_id" => $address_item->area_id,
            "area" => (string) Area::where('id', $address_item->area_id)->select($name_array['name'])->first()->name,
            "avenue" => (string) $address_item->avenue,
            "block" => (string) $address_item->block,
            "street" => (string) $address_item->street,
            "building" => (string) $address_item->building,
            "floor" => (string) $address_item->floor,
            "apartment" => (string) $address_item->apartment,
            "pin_code" => (string) $address_item->pin_code,
            "notes" => (string) $address_item->notes,
            "is_default" => (string) $address_item->is_default,
        ];
    }
  return  $address_array_temp;
}
