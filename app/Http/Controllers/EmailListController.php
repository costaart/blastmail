<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email-list.index', [
            'emailLists' => EmailList::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:2048',
        ]);

        $file = $request->file('file');
        $fileHandle = fopen($file->getRealPath(), 'r');
        $items = [];

        while (($row = fgetcsv($fileHandle, null, ',')) !== false) {
            // dd($row);
            if($row[0] == 'nome' && $row[1] == 'email') {
                continue;
            }

            $items[] = [
                'name' => $row[0],
                'email' => $row[1],
            ];

        }

        fclose($fileHandle);

        $emailList = EmailList::create([
            'title' => $data['title'],
        ]);

        $emailList->subscribers()->createMany($items);

        return to_route('email-list.index')->with('success', 'Email list created successfully.');

        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        //
    }
}
