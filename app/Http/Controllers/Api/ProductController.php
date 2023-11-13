<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function store(Request $request)
    {
        
       
        $product = Product::create(
            [
                'name' => $request->name,
                'category_id' => '2',
                'qr_code' => $this->generateQrCode()

            ]

        );

        return response()->json([
            'data' => $product,
            'message' => 'created successfully',
            'status' => 200

        ]);
    }


    public function generateQrCode()
    {
        $code = md5(time() . mt_rand(1, 100000));

        $image = \QrCode::format('png')
            ->size(200)->errorCorrection('H')
            ->generate($code);
        $output_file = '/imgs/qr-code/img-' . time() . '.png';
        \Storage::disk('local')->put($output_file, $image);
       return $output_file;
    }
}
