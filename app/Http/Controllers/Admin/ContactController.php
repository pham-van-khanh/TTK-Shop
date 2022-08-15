<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Jobs\PayEmail;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
   public function contact()
   {
    return view('page.contact');
   }
   public function addContact(ContactRequest $request,Contact $contact)
   {
    $contact = new Contact;
    $contact->fill($request->all());
    $contact->status = 0;
    PayEmail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
    $contact->save();
    Session::flash('success','Gửi thành công');
    return view('page.contact');
   }
   public function index()
   {
    $contact = Contact::select('contacts.*')
    ->orderBy('id','DESC')->Paginate(5);
    return view('admin.contact.index',compact('contact'));
   }
   public function changeSTTcontact($contact)
   {
    $contact = Contact::find($contact);
    if($contact->status == 0){
        $contact->status =1;
    }
    else {
        $contact->status = 0;
    }
    $contact->save();
    Session::flash('success','Đổi trạng thái thư gửi thành công');
    return redirect()->route('contact-list');
   }
}
