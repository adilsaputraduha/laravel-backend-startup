<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
    }

    public function list()
    {
        $products = Product::with(['category', 'store'])->get();

        foreach ($products as $product) {
            $product->reviews;
        }
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'product' =>  collect($products)
        ]);
    }

    public function listfilter($id)
    {
        if ($id == 1) {
            $products = Product::with(['category', 'store'])->where('productRating', '>=', 4)->get();

            foreach ($products as $product) {
                $product->reviews;
            }

            if (count($products) == 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => false,
                    'product' =>  collect($products)
                ]);
            } else if (count($products) > 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => true,
                    'product' =>  collect($products)
                ]);
            } else {
                return $this->error('Data gagal ditemukan');
            }
        } else if ($id == 2) {
            $products = Product::with(['category', 'store'])->orderby('productPrice', 'ASC')->get();

            foreach ($products as $product) {
                $product->reviews;
            }

            if (count($products) == 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => false,
                    'product' =>  collect($products)
                ]);
            } else if (count($products) > 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => true,
                    'product' =>  collect($products)
                ]);
            } else {
                return $this->error('Data gagal ditemukan');
            }
        } else {
            $products = Product::with(['category', 'store'])->where('productRating', '>=', 4)->orderby('productPrice', 'ASC')->get();

            foreach ($products as $product) {
                $product->reviews;
            }

            if (count($products) == 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => false,
                    'product' =>  collect($products)
                ]);
            } else if (count($products) > 0) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'isthereproduct' => true,
                    'product' =>  collect($products)
                ]);
            } else {
                return $this->error('Data gagal ditemukan');
            }
        }
    }

    public function listsearch($nama)
    {
        $products = Product::with(['category', 'store'])->where('productName', 'LIKE', '%' . $nama . '%')->get();

        foreach ($products as $product) {
            $product->reviews;
        }

        if (count($products) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'isthereproduct' => false,
                'product' =>  collect($products)
            ]);
        } else if (count($products) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'isthereproduct' => true,
                'product' =>  collect($products)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function listlimit()
    {
        $products = Product::with(['category', 'store'])->limit(5)->get();

        foreach ($products as $product) {
            $product->reviews;
        }
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'product' =>  collect($products)
        ]);
    }

    public function listbycategory($id)
    {
        $products = Product::with(['category', 'store'])->where('productCategory', $id)->get();

        foreach ($products as $product) {
            $product->reviews;
        }

        if (count($products) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'isthereproduct' => false,
                'product' =>  collect($products)
            ]);
        } else if (count($products) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'isthereproduct' => true,
                'product' =>  collect($products)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function listdetail($id)
    {
        $products = Product::with(['category', 'store'])->where('productId', $id)->get();

        foreach ($products as $product) {
            $product->reviews;
        }
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'produk' =>  collect($products)
        ]);
    }

    public function updaterating($rating, $id)
    {
        $data = [
            'productRating' => $rating
        ];
        $this->product->updateRating($data, $id);

        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil diupdate',
            'rating' =>  $data
        ]);
    }

    public function latest()
    {
        $data =  $this->product->latest();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'product' => $data
        ]);
    }

    public function save(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'productName' => 'required',
            'productDescription' => 'required',
            'productStore' => 'required',
            'productCategory' => 'required',
            'productPrice' => 'required',
            'productStock' => 'required',
            'productImage' => 'required',
            'productWeight' => 'required',
            'productLength' => 'required',
            'productWide' => 'required',
            'productHigh' => 'required',
            'productSatuan' => 'required'
        ]);
        // Jika validasi tidak terpenuhi
        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $dataProduct = [
            'productName' => Request()->productName,
            'productDescription' => Request()->productDescription,
            'productStore' => Request()->productStore,
            'productCategory' => Request()->productCategory,
            'productPrice' => Request()->productPrice,
            'productStock' => Request()->productStock,
            'productWeight' => Request()->productWeight,
            'productLength' => Request()->productLength,
            'productWide' => Request()->productWide,
            'productHigh' => Request()->productHigh,
            'productSatuan' => Request()->productSatuan,
            'productStatus' => 1,
            'productRating' => "5",
            'productSold' => "0",
            'productImage' => "default_product.png"
        ];

        $product = Product::create($dataProduct);

        if (!empty($product)) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil disimpan',
                'product' => collect($product)
            ]);
        } else {
            return $this->error('Data gagal disimpan');
        }
    }

    public function saveimage(Request $request)
    {
        $file = '';
        if ($request->productImage->getClientOriginalName()) {
            $file = str_replace(' ', '_', $request->productImage->getClientOriginalName());
            $fileName =  date('mYdHs') . rand(1, 999) . '_' . $file;
            Storage::disk('public')->put($fileName, file_get_contents($request->productImage));
        } else {
            return $this->error('Ada kesalahan');
        }

        $id = $request->productId;
        $dataProduct = [
            'productImage' => $fileName
        ];

        $product = $this->product->updateImage($id, $dataProduct);

        if (!empty($product)) {
            return response()->json([
                'success' => 1,
                'message' => 'Data gambar berhasil disimpan',
                'product' => collect($product)
            ]);
        } else {
            return $this->error('Data gagal disimpan');
        }
    }

    // Partner

    public function partnerlist($id)
    {
        $products = Product::with(['category', 'store'])->where('productStore', $id)->get();

        foreach ($products as $product) {
            $product->reviews;
        }

        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'product' =>  collect($products)
        ]);
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
