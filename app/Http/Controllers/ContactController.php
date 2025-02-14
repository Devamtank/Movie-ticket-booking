<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Display the contact form
    public function showContactForm()
    {
        return view('pages.contact-us'); // Change to your view's name if needed
    }

    // Handle the contact form submission
    public function sendContactMessage(Request $req)
    {
        // Validate form data
        $req->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create new Contact entry
        $con = new Contact();
        $con->Name = $req->name;
        $con->Email = $req->email;
        $con->Subject = $req->subject;
        $con->Message = $req->message;
        $con->save();  // Save the data to the database

        // Redirect to a page with success message
        return redirect()->route('contact.show')->with('success', 'Message sent successfully!');
    }
}
