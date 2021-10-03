<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->transactions = new Transaction();
    }

    public function save(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'transactionUserId' => 'required',
            'transactionTotalItem' => 'required',
            'transactionTotalPrice' => 'required',
            'transactionCostShipping' => 'required',
            'transactionTotalTransfer' => 'required',
            'transactionName' => 'required',
            'transactionPhone' => 'required',
            'transactionMethod' => 'required'
        ]);
        // Jika validasi tidak terpenuhi
        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $paymentCode = "INV-PYM-" . now()->format('Ymd') . "-" . rand(100, 999);
        $transactionCode = "INV-PYM-" . now()->format('Ymd') . "-" . rand(100, 999);
        $uniqueCode = rand(100, 999);
        $status = "DIPROSES";
        $expiredAt = now()->addDay();
        $createdAt = now();

        $dataTransaction = array_merge($request->all(), [
            'transactionPaymentCode' => $paymentCode,
            'transactionCode' => $transactionCode,
            'transactionUniqueCode' => $uniqueCode,
            'transactionStatus' => $status,
            'transactionExpiredAt' => $expiredAt,
            'transactionCreatedAt' => $createdAt
        ]);

        DB::beginTransaction();

        $transaction = Transaction::create($dataTransaction);

        foreach ($request->products as $product) {
            $dataDetail = [
                'detailTransactionId' => $transaction->id,
                'detailProductId' => $product['detailProductId'],
                'detailTotalItem' => $product['detailTotalItem'],
                'detailTotalPrice' => $product['detailTotalPrice'],
                'detailNote' => $product['detailNote']
            ];

            $transactionDetail = TransactionDetail::create($dataDetail);;
        }

        if (!empty($transaction) && !empty($transactionDetail)) {
            DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi berhasil',
                'transaksi' => collect($transaction)
            ]);
        } else {
            DB::rollback();
            return $this->error('Transaksi gagal');
        }
    }

    public function history($id)
    {
        $transaction = Transaction::with(['customer'])->where('transactionUserId', $id)->orderBy("transactionId", "desc")->get();

        foreach ($transaction as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->product->store;
            }
        }

        if (count($transaction) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => false,
                'transaksis' => collect($transaction)
            ]);
        } else if (count($transaction) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => true,
                'transaksis' => collect($transaction)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function historytransaksidetail($id)
    {
        $transaction = Transaction::with(['customer'])->where('transactionId', $id)->orderBy("transactionId", "desc")->get();

        foreach ($transaction as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->product->store;
            }
        }

        if (count($transaction) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => false,
                'transaksidetail' => collect($transaction)
            ]);
        } else if (count($transaction) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => true,
                'transaksidetail' => collect($transaction)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function historybystatus($id, $status)
    {
        $transaction = Transaction::with(['customer'])->where('transactionUserId', $id)->where('transactionStatus', $status)->orderBy("transactionId", "desc")->get();

        foreach ($transaction as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->product->store;
            }
        }

        if (count($transaction) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => false,
                'transaksis' => collect($transaction)
            ]);
        } else if (count($transaction) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => true,
                'transaksis' => collect($transaction)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function cancel($id)
    {
        $transaksi = Transaction::where('transactionId', $id)->first();
        if ($transaksi) {

            $data = [
                'transactionStatus' => 'BATAL'
            ];

            $model = new Transaction();
            $model->updateData($id, $data);

            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function uploadbukti(Request $request)
    {
        $file = '';
        if ($request->image->getClientOriginalName()) {
            $file = str_replace(' ', '_', $request->image->getClientOriginalName());
            $fileName =  date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->image->storeAs('public/images/transfer', $fileName);
        } else {
            return $this->error('Ada kesalahan');
        }

        return response()->json([
            'success' => 1,
            'message' => 'Berhasil upload bukti pembayaran',
            'image' => $file
        ]);
    }

    // Partner history
    public function partnerhistory($id)
    {
        $transaction = Transaction::with(['customer'])->where('transactionStore', $id)->orderBy("transactionId", "desc")->get();

        foreach ($transaction as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->product->store;
            }
        }

        if (count($transaction) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => false,
                'transaksis' => collect($transaction)
            ]);
        } else if (count($transaction) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => true,
                'transaksis' => collect($transaction)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function partnerhistorybystatus($id, $status)
    {
        $transaction = Transaction::with(['customer'])->where('transactionStore', $id)->where('transactionStatus', $status)->orderBy("transactionId", "desc")->get();

        foreach ($transaction as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->product->store;
            }
        }

        if (count($transaction) == 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => false,
                'transaksis' => collect($transaction)
            ]);
        } else if (count($transaction) > 0) {
            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'istheretransaction' => true,
                'transaksis' => collect($transaction)
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function partnerchangestatus($id)
    {
        $transaksi = Transaction::where('transactionId', $id)->first();
        if ($transaksi) {

            $data = [
                'transactionStatus' => 'DIKIRIM'
            ];

            $model = new Transaction();
            $model->updateData($id, $data);

            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    public function partnerchangedelivery($id, $delivery)
    {
        $transaksi = Transaction::where('transactionId', $id)->first();
        if ($transaksi) {

            $data = [
                'transactionDeliveryDetail' => $delivery
            ];

            $model = new Transaction();
            $model->updateData($id, $data);

            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
        }
    }

    // public function partnerresi()
    // {
    //     $resi = now()->format('Ymd') . rand(100, 999);

    //     if ($resi) {
    //         return response()->json([
    //             'success' => 1,
    //             'message' => 'Data berhasil ditemukan',
    //             'resi' => $resi
    //         ]);
    //     } else {
    //         return $this->error('Data gagal ditemukan');
    //     }
    // }


    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
