<?php

namespace App\Http\Controllers;

use App\Models\customerorder;
use App\Models\Order;
use App\Models\OrderDetails;
use Yajra\Datatables\Facades\Datatables;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class POSController extends Controller
{

    function MakeOrder
    (){
        $order_id = OrderDetails::latest()->first()->id;

        $OrderDetails = DB::table('orders')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price','orders.Quantity','orders.Total')
        ->leftjoin('book_details','book_details.id','orders.Book_id')

       ->where('orders.Order_id' , $order_id)
       ->simplepaginate(10);



        $bookdata = DB::table('book_details')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price')
        ->simplepaginate(10);


        $OrderTotal = DB::table('orders')
        ->select(DB::raw('SUM(Total) as GrandTotal') )
        ->where('orders.Order_id' , $order_id)
        ->get();

       // $sum = Order::where('orders.Order_id', '$order_id')->sum('Total');

		return view('staff.Order')->with(compact('bookdata','OrderDetails','OrderTotal'));





    }

    public function searchbooks(Request $request)
    {
        $order_id = OrderDetails::latest()->first()->id;
        // $OrderDetails = Order::findOrFail($order_id);
         $OrderDetails = DB::table('orders')
         ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price','orders.Quantity','orders.Total')
         ->leftjoin('book_details','book_details.id','orders.Book_id')

         ->where('orders.Order_id' , $order_id)
         ->simplepaginate(10);

         $OrderTotal = DB::table('orders')
        ->select(DB::raw('SUM(Total) as GrandTotal') )
        ->where('orders.Order_id' , $order_id)
        ->get();
        $bookdata = DB::table('book_details')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price')
        ;
        if( $request->input('search')){
            $bookdata = $bookdata->where('id', 'LIKE', "%" . $request->search . "%");
        }
        $bookdata = $bookdata->paginate(10);
        return view('staff.Order')->with(compact('bookdata','OrderDetails','OrderTotal'));
    }

function CreateOrder(Request $request){


    if ($request->isMethod('get')) {
        return redirect()->back();

    }

    if ($request->isMethod('post')) {
        $data['customer_id']=$request->customer_id;
        $data['AmountPaid'] = 0;



        if (OrderDetails::create($data)) {
            return redirect()->route('MakeOrder');
        }
    }

}

function AddOrder(Request $request){

    if ($request->isMethod('get')) {
        return redirect()->back();

    }

    if ($request->isMethod('post')) {
        $order_id = OrderDetails::latest()->first()->id; // get last id from table
        $data['Order_id']=$order_id;
        $data['Book_id'] = $request->Book_id;
        $data['Quantity'] = $request->quantity;
        $data['Total'] = $request->total;




        if (Order::create($data)) {
            return redirect()->route('MakeOrder');
        }
    }
}

function DeleteOrder(){
    $order_id = OrderDetails::latest()->first()->id;
    if(Order::firstOrFail()->where('Order_id', $order_id)->delete()){
        return redirect()->route('MakeOrder');
    }
}


function AddTotal(Request $request){

    if ($request->isMethod('get')) {
        return redirect()->back();
    }

    if ($request->isMethod('post')) {
        $this->validate($request, [


        ]);
        $data['AmountPaid'] = $request->AmountPaid;
        $order_id = OrderDetails::latest()->first()->id;

        if(OrderDetails::where('id',$order_id)->update($data)){
            $order_id = OrderDetails::latest()->first()->id;
            $OrderDetails = DB::table('orders')
            ->select('book_details.id','order_details.AmountPaid','customer_details.CustomerName','customer_details.ContactNumber','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price','orders.Quantity','orders.Total')
            ->leftjoin('book_details','book_details.id','orders.Book_id')
            ->leftjoin('order_details','order_details.id','orders.Order_id')
            ->leftJoin('customer_details','customer_details.id','order_details.customer_id')
            ->where('orders.Order_id' , $order_id)
    ->get();

    $OrderTotal = DB::table('orders')
        ->select(DB::raw('SUM(Total) as GrandTotal') )
        ->where('orders.Order_id' , $order_id)
        ->get();
    return view('Staff.PrintOrderReceipt')->with(compact('OrderDetails','OrderTotal'));
        }
    }
}
}
