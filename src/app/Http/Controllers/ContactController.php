<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);

        $genderText = [
            '1' => '男性', 
            '2' => '女性',
            '3' => 'その他',
        ];

        $contact['gender_text'] = $genderText[$contact['gender']];

        $category = \App\Models\Category::find($contact['category_id']);
        $contact['category_text'] = $category ? $category->content : '未選択';

        $contact['tel'] = $tel;

        return view('confirm', compact('contact'));
    }
    //
    public function store(ContactRequest $request)
    {
        if ($request->input('action') === 'back')
        {
            return redirect()
            ->route('contacts.index')
            ->withInput();
        }

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
