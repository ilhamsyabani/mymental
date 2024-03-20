<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\OrExpr;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function checkout(Request $request)
    {
        $this->validate($request, [
            'date_book' => 'required|date',
            'time_book' => 'required',
        ]);
        $request->request->add([
            'status' => 'Unpaid',
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,

        ]);

        $order = Order::create($request->all());
        // Mendapatkan bulan, tanggal, dan tahun saat ini
        $bulan = date('m'); // Format dua digit untuk bulan (01 - 12)
        $tanggal = date('d'); // Format dua digit untuk tanggal (01 - 31)
        $tahun = date('Y'); // Format empat digit untuk tahun (misalnya, 2024)

        // Mendapatkan tiga kode unik tambahan secara acak
        $unik1 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2); // Dua karakter acak dari alfabet
        $unik2 = substr(str_shuffle('0123456789'), 0, 2); // Dua angka acak
        $unik3 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2); // Dua karakter acak dari alfabet dan angka

        // Membuat kode unik untuk pesanan dengan format 'MY/[bulan][tanggal][tahun]/[3 kode unik tambahan]'
        $kode = 'MY/' . $bulan . $tanggal . $tahun . '/' . $unik1 . $unik2 . $unik3 . '/' . $order->id;
        $order->kode = $kode;
        $order->save();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->kode,
                'gross_amount' => $order->price,
            ),
            'customer_details' => array(
                'first_name' => $order->name,
                'email' => $order->email,
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::where('kode', $request->order_id)->first();
                $order->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('livewire.pages.orders.edit', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {

        // Validate the incoming request data
        $data = $request->validate([
            // 'kode' => 'required',
            // 'name' => 'required',
            // 'email' => 'required',
            // 'date_book' => 'required|date',
            // 'time_book' => 'required',
            // 'doctor_id' => 'required',
            'zoom_link' => 'required',
        ]);

        // Update the post with the new data
        // $order->kode = $data['kode'];
        // $order->name = $data['name'];
        // $order->email = $data['email'];
        // $order->date_book = $data['date_book'];
        // $order->time_book = $data['time_book'];
        // $order->doctor_id = $data['doctor_id'];
        $order->zoom_link = $data['zoom_link'];


        // Save the updated or$order to the database
        $order->save();

        // Redirect back to the post index page with a success message
        return redirect()->route('orders-index')->with('status', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
