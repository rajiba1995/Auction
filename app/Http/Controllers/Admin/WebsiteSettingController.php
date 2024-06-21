<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class WebsiteSettingController extends Controller
{
    public function WebsiteSittengIndex(){
        $data = Setting::get();
        return view('admin.wesite_setting.index', compact('data'));
    }
    public function WebsiteSittengUpdate(Request $request){
        // dd($request->all());

        $request->validate([
            'official_phone1' => 'required|integer|digits:10',
            'official_phone2' => 'nullable|integer|digits:10',
            'official_email' => 'required|email|min:5|max:255',
            'website_link' => 'required|min:5|max:255',
            'full_company_name' => 'required|string|min:1|max:255',
            'pretty_company_name' => 'required|string|min:1|max:255',
            'company_logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'company_favicon' => 'mimes:jpg,jpeg,png,gif|max:1024',
            'company_short_desc' => 'required|string|min:5|max:1000',
            'company_full_address' => 'required|string|min:5|max:1000',
            'google_map_address_link' => 'required|string|min:5',
        ]);

        Setting::where('title', 'official_phone1')->update([
            'content' => $request->official_phone1
        ]);
        Setting::where('title', 'website_link')->update([
            'content' => $request->website_link
        ]);
        Setting::where('title', 'official_phone2')->update([
            'content' => $request->official_phone2
        ]);
        Setting::where('title', 'official_email')->update([
            'content' => $request->official_email
        ]);
        Setting::where('title', 'full_company_name')->update([
            'content' => $request->full_company_name
        ]);
        Setting::where('title', 'pretty_company_name')->update([
            'content' => $request->pretty_company_name
        ]);
        if ($request->hasFile('company_logo')) {
            $logoExtension = $request->file('company_logo')->getClientOriginalExtension();
            $logoPath = $request->file('company_logo')->move('uploads/website/'.time().'.'.$logoExtension);
            Setting::where('title', 'company_logo')->update(['content' => $logoPath]);
        }
        
        if ($request->hasFile('company_favicon')) {
            $faviconExtension = $request->file('company_favicon')->getClientOriginalExtension();
            $faviconPath = $request->file('company_favicon')->move('uploads/website/'.time().'.'.$faviconExtension);
            Setting::where('title', 'company_favicon')->update(['content' => $faviconPath]);
        }
        Setting::where('title', 'company_short_desc')->update([
            'content' => $request->company_short_desc
        ]);
        Setting::where('title', 'company_full_address')->update([
            'content' => $request->company_full_address
        ]);
        Setting::where('title', 'google_map_address_link')->update([
            'content' => $request->google_map_address_link
        ]);

        return redirect()->back()->with('success', 'Content updated');
        
    }
}
