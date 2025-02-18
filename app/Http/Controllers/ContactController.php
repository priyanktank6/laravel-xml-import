<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ContactController extends Controller
{
    public function importXml(Request $request)
    {
        // Validate the uploaded XML file
        $request->validate([
            'file' => 'required|mimes:xml|max:10240',
        ]);

        // Load the XML file
        $xml = simplexml_load_file($request->file('file')->getRealPath());
        
        // Iterate through XML and insert each contact
        foreach ($xml->contact as $contact) {
            Contact::create([
                'name' => (string) $contact->name,
                'email' => (string) $contact->email,
                'phone' => (string) $contact->phone,
            ]);
        }

        return redirect()->back()->with('success', 'Contacts imported successfully!');
    }
}
