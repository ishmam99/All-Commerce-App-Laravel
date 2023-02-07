<?php

namespace App\Http\Controllers\Dashboard;

use App\Library\Utilities;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Expense;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ReportController extends Controller
{
    public function suppliersReport(): View
    {
        Utilities::checkPermissions(['report.all', 'report.supplier']);
        $store = Utilities::getActiveStore();
        $suppliers = User::suppliersQuery(['*'], $store?->id)
            ->with('purchases')
            ->get();

        return view('dashboard.reports.suppliers', compact('suppliers'));
    }

    public function customersReport(): View
    {
        Utilities::checkPermissions(['report.all', 'report.customer']);
        $store = Utilities::getActiveStore();
        $customers = User::getCustomers(['*'], $store?->id);
        $customers->load(['orders', 'sales']);
        return view('dashboard.reports.customers', compact('customers'));
    }

    public function saleReports()
    {
        Utilities::checkPermissions(['report.all', 'report.sale']);
        $dates = $this->dateRangeToDates(request('date_range'));
        $store = Utilities::getActiveStore();
        $sales = Sale::query()
            ->withSum('products as total_quantity', 'product_sale.quantity')
            ->when($store, function ($query) use ($store) {
                return $query->where('store_id', $store->id);
            })
            ->whereBetween('created_at', [$dates->start_date, $dates->end_date])
            ->get();
        return view('dashboard.reports.sale', compact('sales', 'dates'));
    }

    public function purchaseReports()
    {
        Utilities::checkPermissions(['report.all', 'report.purchase']);
        $dates = $this->dateRangeToDates(request('date_range'));
        $store = Utilities::getActiveStore();
        $purchases = Purchase::query()
            ->withSum('products as total_discount', 'product_purchase.discount')
            ->when($store, function ($query) use ($store) {
                return $query->where('store_id', $store->id);
            })
            ->whereBetween('created_at', [$dates->start_date, $dates->end_date])
            ->latest()
            ->get();
        return view('dashboard.reports.purchase', compact('purchases', 'dates'));
    }

    public function expenseReports()
    {
        Utilities::checkPermissions(['report.all', 'report.expense']);
        $store = Utilities::getActiveStore();
        $dates = $this->dateRangeToDates(request('date_range'));
        $expenses = Expense::query()
            ->when($store, function ($query) use ($store) {
                return $query->where('store_id', $store->id);
            })
            ->whereBetween('date', [$dates->start_date, $dates->end_date])
            ->with(['addedBy', 'expenseBy', 'store'])
            ->get();
        return view('dashboard.reports.expense', compact('expenses', 'dates'));
    }

    public function stockReports()
    {
        Utilities::checkPermissions(['report.all', 'report.stock']);
        $store = Utilities::getActiveStore();
        $products = Product::query()
            ->with(['categories', 'stores'])
            ->when($store, function ($query) use ($store) {
                return $query->whereHas('stores', fn($query) => $query->where('store_id', $store->id));
            })
            ->orderBy('name')
            ->get();
        return view('dashboard.reports.stock', compact('products', 'store'));
    }

    private function dateRangeToDates($dateRange = null)
    {
        if ($dateRange) {
            try {
                $dateRange = explode(' - ', $dateRange);
                $dateRange['start_date'] = Carbon::createFromFormat('m/d/Y H:i:s', $dateRange[0] . ' 00:00:00');
                $dateRange['end_date'] = Carbon::createFromFormat('m/d/Y H:i:s', $dateRange[1] . ' 23:59:59');
                $dateRange['range'] = $dateRange['start_date']->format('m/d/Y') . ' - ' . $dateRange['end_date']->format('m/d/Y');
                return (object)$dateRange;
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Something Wrong! Please try again.');
            }
        }
        $dateRange['start_date'] = Carbon::today()->subDays(29);
        $dateRange['end_date'] = Carbon::now()->setTime(23, 59, 59);
        $dateRange['range'] = $dateRange['start_date']->format('m/d/Y') . ' - ' . $dateRange['end_date']->format('m/d/Y');
        return (object)$dateRange;
    }

    // OLD
    // public function stock()
    // {
    //     $data['products'] = [];
    //     if (is_null(session('store_id'))) {
    //         $data['products'] = Product::with('Categories')->orderBy('name')->get();
    //         $data['title'] = 'Warehouse';
    //     } else {
    //         $store = Store::findOrFail(session('store_id'));
    //         if (request()->has('app')) {
    //             if (request()->app == 1) {
    //                 $id = [1, session('store_id')];
    //                 $data['title'] = $store->name . ' with Mobile App';
    //                 $data['products'] = Product::with(['Stores', 'Categories'])->whereHas('Stores', function ($q) use ($id) {
    //                     return $q->whereIn('store_id', $id);
    //                 })->orderBy('name')->get();
    //             } else {
    //                 $data['title'] = $store->name;
    //                 $data['products'] = $store->Products()->with('Categories')->orderBy('name')->get();
    //             }
    //         } else {
    //             $data['title'] = $store->name;
    //             $data['products'] = $store->Products()->with('Categories')->orderBy('name')->get();
    //         }
    //     }
    //     $data['stores'] = Store::get();
    //     $data['stockreport'] = true;
    //     return view('admin.warehouse.stock.index', $data);
    // }
}
