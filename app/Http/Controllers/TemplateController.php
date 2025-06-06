<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    public function index()
    {

        $search = request('search');
        if ($search) {
            $templates = Template::where('name', 'like', "%{$search}%")->paginate();
        } else {
            $templates = Template::paginate();
        }

        return view('templates.index', [
            'templates' => $templates,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:templates',
            'body' => 'required',
        ]);

        Template::create($data);
        return redirect()->route('templates.index')->with('success', __('Template created successfully.'));
    }

    public function show(Template $template)
    {
        return view('templates.show', compact('template'));
    }

    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));

    }

    public function update(Request $request, Template $template)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:templates,name,' . $template->id,
            'body' => 'required',
        ]);

        $template->fill($data);
        $template->save();

        return redirect()->route('templates.index')->with('success', __('Template updated successfully.'));
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('success', __('Template deleted successfully.'));
    }
}
