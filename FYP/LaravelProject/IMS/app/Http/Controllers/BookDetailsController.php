<?php

namespace App\Http\Controllers;

use App\Models\BookDetails;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookDetailsController extends Controller
{
    function BookDetailsDashboard(){
        $bookdata = DB::table('users')
        ->select('users.name','book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.StockQuantity','book_details.Price')
        ->join('book_details','users.id','book_details.user_id')->simplepaginate(10);
        if(Session()->has('LoggedUser')){

            $user = Users::where('id','=', session('LoggedUser'))->first();
            $userdata = [
                'LoggedUserInfo'=> $user
            ];


        }
        //get data from table
		return view('staff.BookDetails',$userdata,compact('bookdata'));

    }





    function registerBook(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'BookName' => 'required|min:3',
                'Author' => 'required|min:3',
                'Publication' => 'required|min:3',
                'StockQuantity' => 'required|numeric',
                'Price' => 'required|numeric',




            ]);
            $data['BookName'] = $request->BookName;
            $data['Author'] = $request->Author;
            $data['Publication'] = $request->Publication;
            $data['SecondaryNumber'] = $request->SecondaryNumber;
            $data['StockQuantity'] = $request->StockQuantity;
            $data['Price'] = $request->Price;
            $data['user_id']=$request->user_id;







            if (BookDetails::create($data)) {
                return redirect()->route('bookDetails')->with('success', 'Record is Inserted');
            }
        }


    }


    public function generateBarcode(Request $request){
        $id= $request->Book_id;
        $book = BookDetails::findOrFail($id);
		return view('staff.Barcode', compact('book'));
    }

    public function generatebarcodeAction(Request $request){
        $id = $request->book_id;
        $book = BookDetails::findOrFail($id);
        return view('staff.PrintBarcode')->with('book',$book);
    }


}
