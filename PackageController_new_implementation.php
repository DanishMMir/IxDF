<?php

namespace Modules\Package\Http\Controllers;

use App\Helpers\Helpers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Deal\Services\DealServiceInterface;
use Modules\Package\Repositories\PackageRepositoryInterface;
use Modules\Package\Services\PackageServiceInterface;

class PackageController extends Controller
{
    private DealServiceInterface $dealService;

    private PackageServiceInterface $packageService;

    private PackageRepositoryInterface $packageRepository;

    public function __construct(DealServiceInterface $dealService, PackageServiceInterface $packageService)
    {
        $this->dealService = $dealService;
        $this->packageService = $packageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Renderable
    {
        $deal = $this->dealService->getCurrentDeal();

        if ($deal === null) {
            abort(404); // TODO: Migration - check if any issues as it does not redirect to no-vehicle page
        }

        $backUrl = config('app.trade_in_enabled') ? route('redesign.tradeIn') : route('dashboard');
        $completeUrl = route('redesign.completeCarePackage');
        $nextUrl = route('redesign.paymentMethod');
        $skipUrl = route('redesign.skipCarePackage');

        $vehicle = $deal->vehicle;

        $packages = $this->packageService->getPackagesForCarJSON($vehicle);

        $package = $deal->packages;

        $dealership = $vehicle->dealership;
        $paymentSettings = $deal->getPaymentSettings($dealership, false);
        $incentives = $deal->incentives;
        $vouchers = $deal->voucherCodes;
        $reservation_enabled = Helpers::isReservationEnabled();

        $userData = $this->getUserData();

        $vehicleImage = null !== ($vehicleImages = explode(',', $vehicle->stock->images)) ? $vehicleImages[0] : null;

        $imageUrl = config('app.logo_url') ?? asset('images/emails/keyloop-logo-white.png');

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


    /** @return array<string,string|null> */
    private function getUserData(): array
    {
        $user = Auth::check() ? Auth::user() : null;

        return [
            'firstName' => Session::get('clean.first_name', $user?->first_name),
            'familyName' => Session::get('clean.surname', $user?->last_name),
            'email' => Session::get('clean.email', $user?->email),
            'phone' => Session::get('clean.telephone', $user?->phone),
        ];
    }
}
