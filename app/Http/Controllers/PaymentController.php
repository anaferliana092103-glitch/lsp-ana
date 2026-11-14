<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CompanyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class PaymentController extends Controller {
 public function index(Request $request): View { $payments=$request->user()->payments()->with('order.product','order.service')->latest()->get(); $orders=$request->user()->orders()->with('product','service')->whereIn('status',['Konfirmasi Berhasil','Disetujui'])->latest()->get(); return view('payments.index',compact('payments','orders')); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['order_id'=>['required','exists:orders,id'],'method'=>['required','in:Transfer Bank,E-Wallet,QRIS'],'amount'=>['required','integer','min:1'],'proof'=>['required','image','mimes:jpg,jpeg,png','max:5120']]); $order=$request->user()->orders()->with(['product','service'])->findOrFail($data['order_id']); $data['user_id']=$request->user()->id; $data['proof']=$request->file('proof')->store('payments','public'); $data['paid_at']=now(); $data['status']='Menunggu Verifikasi'; Payment::create($data); $item=$order->product?->name ?? $order->service?->name ?? 'Layanan CCTV'; $company=CompanyProfile::current(); $message="Halo Admin PT Net Koneksi Nusantara, saya ingin mengonfirmasi pembayaran berlangganan.\n\nNama: {$request->user()->name}\nProduk/Layanan: {$item}\nNominal: Rp ".number_format($data['amount'],0,',','.')."\nMetode Pembayaran: {$data['method']}\nTanggal Pembayaran: ".now()->format('d/m/Y H:i')."\nStatus: Menunggu Verifikasi\n\nSaya sudah mengunggah bukti pembayaran melalui website. Mohon diperiksa. Terima kasih.\n\nBukti tersimpan di website. Saya akan melampirkan foto bukti ini secara manual di WhatsApp."; return redirect()->away(wa_link($company->whatsapp, $message)); }
}
