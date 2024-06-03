<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactsForm;
use Exception;
use Illuminate\Validation\Rule;

class ContactsFormController extends Controller
{
    public function get(){
        $messages = ContactsForm::orderBy('read','ASC')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        return [
            'pagination'=>[
                'total'=> $messages->total(),
                'current_page'=> $messages->currentPage(),
                'per_page'=> $messages->perPage(),
                'last_page'=> $messages->lastPage(),
                'from'=> $messages->firstItem(),
                'to'=> $messages->lastItem(),
            ],
            'messages'=>$messages
        ];
    }


    public function updateRead(Request $request){
        $message_id = $request->id;
        $message = ContactsForm::findOrfail($message_id);
        $message->read = 1;
        $message->save();
    }

    public function delete(Request $request){
        $message = ContactsForm::findOrfail($request->id);
        $message->delete();
    }
}
