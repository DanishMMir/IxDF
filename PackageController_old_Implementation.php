<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\CarePackage;
use App\Models\Deal;
use App\Models\DealCarePackage;
use App\Models\Incentive;
use App\Models\VoucherCode;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    // ...
    // ...
    // ...

    public function index(Request $request, Deal $deal)
    {
        if (config('app.trade_in_enabled')) {
            $backUrl = route('redesign.tradeIn');
        } else {
            $backUrl = route('dashboard');
        }

        $completeUrl = route('redesign.completeCarePackage');
        $nextUrl = route('redesign.paymentMethod');
        $skipUrl = route('redesign.skipCarePackage');
        $car = $deal->getCurrentCar();

        if (! $car) {
            return redirect()->route('redesign.noVehicle');
        }

        $packages = CarePackage::getPackagesForCarJSON($deal->current_car_id);

        $package = $deal->packages;

        $dealership = $car->getDealership();
        $paymentSettings = $deal->getPaymentSettings($dealership, false);
        $incentives = $deal->incentives;
        $vouchers = $deal->voucherCodes;
        $reservation_enabled = Helpers::isReservationEnabled();

        $userData = [
            'name' => ! empty(session('clean.first_name')) ? session(
                'clean.first_name'
            ) : (Auth::check() ? Auth::user()->first_name : ''),
            'familyName' => ! empty(session('clean.surname')) ? session(
                'clean.surname'
            ) : (Auth::check() ? Auth::user()->last_name : ''),
            'email' => ! empty(session('clean.email')) ? session(
                'clean.email'
            ) : (Auth::check() ? Auth::user()->email : ''),
            'phone' => ! empty(session('clean.telephone')) ? session(
                'clean.telephone'
            ) : (Auth::check() ? Auth::user()->phone : ''),
        ];

        $vehicleImages = explode(',', $car->stock_data->images);
        $vehicleImage = null;

        if ($vehicleImages) {
            $vehicleImage = $vehicleImages[0];
        }

        $imageUrl = config('app.logo_url') ?? ((config('app.new_branding_enabled', false))
            ? asset('images/emails/keyloop-logo-white.png')
            : asset('images/emails/silverbullet-logo-white.png'));

        $statuses = $deal->getSectionStatuses();

        $discountedPrices = $deal->getCarePackagesDiscountPrices();

        return view('main.carePackage', compact(
            'deal',
            'package',
            'packages',
            'dealership',
            'incentives',
            'vouchers',
            'paymentSettings',
            'statuses',
            'imageUrl',
            'vehicleImage',
            'completeUrl',
            'skipUrl',
            'backUrl',
            'nextUrl',
            'reservation_enabled',
            'userData',
            'discountedPrices'
        ));
    }
    // ...
    // ...
    // ...
}
