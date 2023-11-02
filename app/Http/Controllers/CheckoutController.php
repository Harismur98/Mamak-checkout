<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    private $pricingRules = [
        'B001' => ['name' => 'Kopi', 'price' => 2.5],
        'F001' => ['name' => 'Roti Kosong', 'price' => 1.5],
        'B002' => ['name' => 'Teh Tarik', 'price' => 2.0],
    ];

    public function calculateTotal(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'items' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $items = explode(',', $request->input('items'));
        $itemCounts = array_count_values($items);
        $totalPrice = 0;

        foreach ($itemCounts as $item => $count) {
            if (isset($this->pricingRules[$item])) {
                $itemInfo = $this->pricingRules[$item];
                $price = $itemInfo['price'];

                // Apply pricing rules
                if ($item === 'B001') {
                    // Buy 1 get 1 free for Kopi
                    $count = round($count / 2, 0);
                }
                elseif ($item === 'B002') {
                    // Buy 1 get 1 free for Teh Tarik
                    $count = round($count / 2, 0)  ;

                } elseif ($item === 'F001') {
                    // Discount for Roti Kosong when buying 2 or more
                    $price = $count > 1 ? 1.2 : 1.5;
                    
                }

                $totalPrice += $price * $count;
            }
            else {
                // Handle invalid item code
                return response()->json(['error' => "Invalid item code: $item"], 400);
            }
        }

        return response()->json(['total_price' => 'RM' . number_format($totalPrice, 2)]);
    }
}
