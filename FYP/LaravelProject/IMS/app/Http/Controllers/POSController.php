<?php

namespace App\Http\Controllers;

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
        $OrderDetails = OrderDetails::findOrFail($order_id);

        $bookdata = DB::table('book_details')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price')
        ->simplepaginate(10);


		return view('staff.Order',compact('bookdata','OrderDetails'));



    }

    public function searchbooks(Request $request)
    {
        $order_id = OrderDetails::latest()->first()->id;
        $OrderDetails = OrderDetails::findOrFail($order_id);
        $bookdata = DB::table('book_details')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price')
        ;
        if( $request->input('search')){
            $bookdata = $bookdata->where('id', 'LIKE', "%" . $request->search . "%");
        }
        $bookdata = $bookdata->paginate(10);
        return view('staff.Order',compact('bookdata','OrderDetails'));
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
}
