<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use \Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.date_of_sale','orders.total_payment','orders.status','orders.registeredby','orders.route')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->get();



        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        
        return view('orders.create', compact('customers', "products"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $order = Order::create([
                'date_of_sale' => Carbon::now()->toDateTimeString(),
                'total_payment' => $request->total_payment,
                'customer_id' => Customer::find($request->customer)->id,
                'status' => 1,
                'registeredby' => $request->user()->id,
            ]);

            $rawProductId = $request->product_id;
            $rawQuantity = $request->quantity;

            for ($i = 0; $i < count($rawProductId); $i++) {
                $product = Product::find($rawProductId[$i]);
                $quantity = $rawQuantity[$i];

                $order-> orderdetail()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'registeredby' => $request->user()->id,
                    'subtotal'=> $product->price_sale*$quantity,
                ]);
            }

            $order->save();
            DB::commit();
            $order->save();
            DB::commit();

            // Generate bill (PDF).
            $pdfName = 'uploads/bills/bill_' . $order->id . '_' . Carbon::now()->format('YmdHis') . '.pdf';

            $order = Order::find($order->id);
            $customer = Customer::where("id", $order->customer_id)->first();
            $details = OrderDetail::with('product')
                ->where('ordersdetails.order_id', '=', $order->id)
                ->get();

            $pdf = PDF::loadView('orders.bill', compact("order", "customer", "details"))
                ->setPaper('letter')
                ->output();



            file_put_contents($pdfName, $pdf);

            $order->route = $pdfName;
            $order->save();


            return redirect()->route("orders.index")->with("successMsg", "The orders has been created.");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("successMsg", $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $order = Order::find($id);
        $customer = Customer::where("id", $order->customer_id)->first();
         $details = OrderDetail::select('products.name','products.price_sale','ordersdetails.quantity','ordersdetails.subtotal')
         ->join('products','ordersdetails.product_id','=','products.id')
         ->where('ordersdetails.order_id', '=', $id)
         ->get();
        

        

         return view("orders.show", compact("order","customer","details"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with("successMsg", "Order deleted.");
    }
    public function changestatusorder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}
