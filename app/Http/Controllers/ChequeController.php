<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cheques = Cheque::all();
        foreach ($cheques as $key => $cheque) {
            $cheque->photo = $this->getChequeImage($cheque->photo);
        }
        return view('pages.cheque.index', compact('cheques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $i = 1;
        return view('pages.cheque.create', compact('i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cheque = new cheque();
        $cheque->type = $request->type;
        $cheque->cheque_no = $request->cheque_no;
        $cheque->cheque_date = $request->cheque_date;
        $cheque->amount = $request->amount;
        $cheque->bank_name = $request->bank_name;
        $cheque->party_name = $request->party_name;
        $cheque->party_contact = $request->party_contact;
        $cheque->note = $request->note;
        $cheque->image = $request->image;
        $cheque->status = $request->status;
        $cheque->reminder_days = $request->reminder_days;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/images/cheques', $imageName);
            $cheque->photo = 'images/cheques/' . $imageName;
        }
        $cheque->save();
        return redirect()->route('cheque.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cheque $cheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cheque = Cheque::find($id);
        $cheque->photo = $this->getProfileImage($cheque->photo);
        return view('pages.cheque.edit', compact('cheque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cheque = Cheque::find($id);
        $cheque->type = $request->type;
        $cheque->cheque_no = $request->cheque_no;
        $cheque->cheque_date = $request->cheque_date;
        $cheque->amount = $request->amount;
        $cheque->bank_name = $request->bank_name;
        $cheque->party_name = $request->party_name;
        $cheque->party_contact = $request->party_contact;
        $cheque->note = $request->note;
        $cheque->image = $request->image;
        $cheque->status = $request->status;
        $cheque->reminder_days = $request->reminder_days;


        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/images/cheques', $imageName);
            $this->removeOldProfileImage($cheque->photo);
            $cheque->photo = 'images/cheques/' . $imageName;
        }
        $cheque->save();
        return redirect()->route('cheque.index')->with('msg', 'cheque Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cheque $cheque)
    {
        //
    }

    public function getChequeImage($photo)
    {
        if (empty($photo)) {
            return asset('public/images/logo.png');
        } elseif (file_exists('public/' . $photo)) {
            return asset('public/' . $photo);
        } else {
            return asset('public/images/logo.png');
        }
    }

    public function removeOldChequeImage($photo)
    {
        if (empty($photo)) {
            return true;
        } elseif (file_exists('public/' . $photo)) {
            unlink('public/' . $photo);
            return true;
        } else {
            return true;
        }
    }
}
