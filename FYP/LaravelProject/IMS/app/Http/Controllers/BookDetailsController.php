<?php

namespace App\Http\Controllers;

use App\Models\BookDetails;
use App\Models\CustomerDetails;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class BookDetailsController extends Controller
{
    function BookDetailsDashboard(){
        $bookdata = DB::table('book_details')
        ->select('book_details.id','book_details.BookName','book_details.Author','book_details.Publication','book_details.Price')
        ->simplepaginate(10);

        //get data from table
		return view('staff.BookDetails',compact('bookdata'));

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
                'Price' => 'required|numeric',




            ]);
            $data['BookName'] = $request->BookName;
            $data['Author'] = $request->Author;
            $data['Publication'] = $request->Publication;

             $data['Price'] = $request->Price;







            if (BookDetails::create($data)) {
                return redirect()->route('bookDetails')->with('success', 'Record is Inserted');
            }
        }


    }


    public function editBook(Request $request){
        $id= $request->User_id;
        $editbook = BookDetails::findOrFail($id);
        return view('staff.BookDetailsEdit', compact('editbook'));

    }
    public function editActionBook(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'BookName' => 'required|min:3',
                'Author' => 'required|min:3',
                'Publication' => 'required|min:3',
                'Price' => 'required|numeric',

            ]);
            $data['BookName'] = $request->BookName;
            $data['Author'] = $request->Author;
            $data['Publication'] = $request->Publication;

             $data['Price'] = $request->Price;
            $id = $request->book_id;

            if(BookDetails::where('id',$id)->update($data)){
                return redirect()->route('bookDetails')->with('success', 'Record is Updated');
            }
        }
    }

    public function deleteBook(Request $request)
    {
        try{
            $id= $request->User_id;
            if(BookDetails::findOrFail($id)->delete()){

                return redirect()->route('bookDetails')->with('success', 'Record is Deleted');
            }}
            catch (Exception $e ){
                return redirect()->back()->with('fail','Unable to DELETE : Due to Existing Transaction of Book');}


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
