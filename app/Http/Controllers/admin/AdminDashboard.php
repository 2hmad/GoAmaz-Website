<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdRequest;
use App\Models\ProductCounter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class AdminDashboard extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('admin-email')) {
            $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::years(1));
            $data = DB::table('admins')->where('email', '=', Session::get('admin-email'))->first();
            $users = DB::table('users')->limit(5)->orderBy('id', 'DESC')->get();
            $country = Analytics::performQuery(Period::days(30), 'ga:sessions',  ['dimensions' => 'ga:country', 'sort' => '-ga:sessions']);
            $results = collect($country['rows'] ?? [])->map(function (array $dateRow) {
                return [
                    'country' =>  $dateRow[0],
                    'sessions' => (int) $dateRow[1],
                ];
            });
            return view('admin/dashboard', compact('data', 'users', 'results'), ['analyticsData' => $analyticsData]);
        }
        return redirect("admin/login")->with('error', 'عذراً قم بتسجيل الدخول اولاً');
    }
    public function users()
    {
        $data = DB::table('admins')->where('email', '=', Session::get('admin-email'))->first();
        $users = DB::table('users')->orderBy('id', 'DESC')->get();
        return view("admin/users", compact('users', 'data'));
    }
    public function statistics()
    {
        $analyticsData = ProductCounter::get();
        $data = DB::table('admins')->where('email', '=', Session::get('admin-email'))->first();
        $country = Analytics::performQuery(Period::days(30), 'ga:sessions',  ['dimensions' => 'ga:country', 'sort' => '-ga:sessions']);
        $results = collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country' =>  $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
        return view('admin/statistics', compact('data', 'analyticsData', 'results'));
    }
    public function ads()
    {
        $data = DB::table('admins')->where('email', '=', Session::get('admin-email'))->first();
        $ads = DB::table('ads')->get();
        return view('admin/ads', compact('data', 'ads'));
    }
    public function add_ad(AddAdRequest $request)
    {
        if ($request->validated()) {
            $add = DB::table('ads')->insert([
                'url' => $request->input('product-url'),
                'image' => $request->input('product-image'),
                'title' => $request->input('product-title'),
                'price' => $request->input('product-price'),
                'currency' => $request->input('currency'),
                'merchant' => $request->input('merchant-name'),
                'logo' => $request->input('merchant-logo'),
            ]);
            if ($add) {
                return redirect()->back()->with('success', 'Successfully');
            }
        }
    }
    public function delete_ad($id)
    {
        DB::table('ads')->where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
