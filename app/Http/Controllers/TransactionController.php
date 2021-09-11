<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
        $this->transaction = new Transaction();
        $this->transactionDetails = new TransactionDetail();
        $this->middleware('auth');
    }

    public function index()
    {
        $data['transactionDiproses'] = $this->transaction->list();
        return view('order', $data);
    }

    public function detail()
    {
        $data = [
            'transactionDiproses' => $this->transaction->listStatusDiproses(),
            'transactionDikirim' => $this->transaction->listStatusDikirim(),
            'transactionBatal' => $this->transaction->listStatusBatal(),
        ];
        return view('orderbystatus', $data);
    }

    public function detailtransaction($id)
    {
        $data = [
            'transaction' => $this->transaction->listdetail($id),
            'transactionDetails' => $this->transactionDetails->list($id)
        ];
        return view('order-detail', $data);
    }

    public function updatestatus(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect('/transaction')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            $stock = 0;
            $totalbeli = 0;
            $total = 0;
            $productId = 0;
            $id = Request()->id;
            $products = $this->transaction->listProductOrder($id);

            if (Request()->status == "DIKIRIM") {
                foreach ($products as $product) {
                    $stock = $product->productStock;
                    $totalbeli = $product->detailTotalItem;
                    $total = $stock - $totalbeli;
                    $productId = $product->productId;
                    $dataone = [
                        'productStock' => $total
                    ];
                    $this->product->updateStock($dataone, $productId);
                }
            }

            $data = [
                'transactionStatus' => Request()->status
            ];

            $this->transaction->updatestatus($id, $data);
            return redirect('/transaction')->with('success-message', 'Data updated successfully');
        }
    }

    public function updatestatusdetail(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect('/transaction-by-status')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            $stock = 0;
            $totalbeli = 0;
            $total = 0;
            $productId = 0;
            $id = Request()->id;
            $products = $this->transaction->listProductOrder($id);

            if (Request()->status == "DIKIRIM") {
                foreach ($products as $product) {
                    $stock = $product->productStock;
                    $totalbeli = $product->detailTotalItem;
                    $total = $stock - $totalbeli;
                    $productId = $product->productId;
                    $dataone = [
                        'productStock' => $total
                    ];
                    $this->product->updateStock($dataone, $productId);
                }
            }

            $data = [
                'transactionStatus' => Request()->status
            ];

            $this->transaction->updatestatus($id, $data);
            return redirect('/transaction-by-status')->with('success-message', 'Data updated successfully');
        }
    }
}
