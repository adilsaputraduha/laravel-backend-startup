<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
}
