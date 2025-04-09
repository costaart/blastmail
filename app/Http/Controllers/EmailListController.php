<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request('search');
        if ($search) {
            $emailLists = EmailList::withCount('subscribers')
            ->where('title', 'like', "%{$search}%")
            ->orWhere('id', $search)
            ->paginate(1);
        } else {
            $emailLists = EmailList::withCount('subscribers')->paginate(1);
        }

        return view('email-list.index', [
            'emailLists' => $emailLists,
            'search' => $search,
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
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:2048',
        ]);

        $items = $this->readCsvFile($request->file('file'));

        // Garante q esse insert não role caso ocorra algum erro
        DB::transaction(function () use ($request, $items) {
            $emailList = EmailList::create([
                'title' => $request->title,
            ]);
    
            $emailList->subscribers()->createMany($items);
        });

        return to_route('email-list.index')->with('success', 'Email list created successfully.');
    }

    private function readCsvFile($file):array
    {
        $items = [];
        $fileHandle = fopen($file->getRealPath(), 'r');

        while (($row = fgetcsv($fileHandle, null, ',')) !== false) {
            if ($row[0] == 'nome' && $row[1] == 'email') {
                continue;
            }

            $items[] = [
                'name' => $row[0],
                'email' => $row[1],
            ];
        }

        fclose($fileHandle);

        return $items;
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
