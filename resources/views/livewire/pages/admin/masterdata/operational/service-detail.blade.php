<div class="d-flex flex-column flex-column-fluid">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Service Finalization</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="cursor: pointer">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary" wire:navigate>Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted"> <a class="text-muted text-hover-primary" wire:click="removeServiceDetailId">Service Operational</a></li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Service Finalization</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                {{-- <a href="../../demo1/dist/apps/ecommerce/sales/listing.html" class="btn btn-sm fw-bold btn-secondary">Recent Orders</a>
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-sm fw-bold btn-primary">New Product</a> --}}
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>


    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Content-->
        <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
            <!--begin::Pos food-->
            <div class="card card-flush card-p-0 bg-transparent w-100 border-0">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Nav-->
                    <ul class="nav nav-pills d-flex justify-content-center nav-pills-custom gap-3 mb-6">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-0">
                            <!--begin::Nav link-->
                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show {{ $tabService === true ? 'active' : '' }}" data-bs-toggle="pill" href="#service" style="width: 200px;height: 180px">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <!--begin::Food icon-->
                                    {{-- <img src="assets/media/svg/food-icons/spaghetti.svg" class="w-50px" alt="" /> --}}
                                    <!--end::Food icon-->
                                    <i class="ki-solid ki-gear fs-5x text-gray-400"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <div class="">
                                    <span class="text-gray-800 fw-bold fs-2 d-block">Services</span>
                                    <span class="text-gray-400 fw-semibold fs-7">All Services</span>
                                </div>
                                <!--end::Info-->
                            </a>
                            <!--end::Nav link-->
                        </li>
                        <li class="nav-item mb-3 me-0">
                            <!--begin::Nav link-->
                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show {{ $tabSparepart === true ? 'active' : '' }}" data-bs-toggle="pill" href="#sparepart" style="width: 200px;height: 180px">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <!--begin::Food icon-->
                                    {{-- <img src="assets/media/svg/food-icons/spaghetti.svg" class="w-50px" alt="" /> --}}
                                    <!--end::Food icon-->
                                    <i class="ki-solid ki-wrench fs-5x text-gray-400"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <div class="">
                                    <span class="text-gray-800 fw-bold fs-2 d-block">Spare Parts</span>
                                    <span class="text-gray-400 fw-semibold fs-7">All Spare Parts</span>
                                </div>
                                <!--end::Info-->
                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Nav-->
                    <!--begin::Tab Content-->
                    <div class="tab-content" >
                        <!--begin::Tap pane-->

                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane show {{ $tabService === true ? 'active' : '' }} card p-5" id="service" >
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column d-grid gap-5 gap-xxl-9 ">
                                <div class="d-flex items-center">

                                    <input type="text" class="form-control form-control-solid" placeholder="Search Service Name" id="search" autocomplete="off" wire:model="searchService" onkeydown="handleSearchServices()" />
                                </div>
                                <div class="table-responsive">
                                    <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5 table-hover">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-muted">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (count($services) < 1) <tr>
                                                <td colspan="6" class="text-center">No Data Found</td>
                                                </tr>
                                                @else
                                                @foreach ( $services as $index => $Service)

                                                <tr wire:key="Service-{{ $Service->id }}" wire:click="addService({{ $Service->id }})" style="cursor: pointer;">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $Service->name }}</td>
                                                    <td>RP {{ number_format($Service->price, 0, ',', '.') }}</td>

                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>


                                    </table>

                                    <div class="mt-4 d-flex justify-content-center" onclick="handleSearchService()">
                                        {{ $services->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane show {{ $tabSparepart === true ? 'active' : '' }} card p-5" id="sparepart">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column d-grid gap-5 gap-xxl-9 ">
                                <div class="d-flex items-center">
                                    <input type="text" class="form-control form-control-solid" placeholder="Search Sparepart Name" id="search" autocomplete="off" wire:model="searchSparepart" onkeydown="handleSearchSparepart()" />
                                </div>
                                <div class="table-responsive">
                                    <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5 table-hover">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-muted">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (count($spareparts) < 1) <tr>
                                                <td colspan="6" class="text-center">No Data Found</td>
                                                </tr>
                                                @else
                                                @foreach ( $spareparts as $index => $sparepart)

                                                <tr wire:key="SparePart-{{ $sparepart->id }}" wire:click="addSparepart({{ $sparepart->id }})" style="cursor: pointer;">
                                                    <td>{{ $index + 1 }}</td>

                                                    <td>{{ $sparepart->name }}</td>
                                                    <td>{{ $sparepart->brand }}</td>
                                                    <td>RP {{ number_format($sparepart->price, 0, ',', '.') }}</td>

                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>


                                    </table>

                                    <div class="mt-4 d-flex justify-content-center" onclick="handleSearchSparepart()">
                                        {{ $spareparts->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Tap pane-->

                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Pos food-->
        </div>
        <!--end::Content-->
        <!--begin::Sidebar-->
        <div class="flex-row-auto w-xl-450px">
            <!--begin::Pos order-->
            <div class="card card-flush bg-body" id="kt_pos_form">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <h3 class="card-title fw-bold text-gray-800 fs-2qx">Details</h3>
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-light-primary fs-4 fw-bold py-4">{{ $data->code }}</a>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <span class="fs-2 text-gray-800">Check</span>
                    <p class="fs-3 text-gray-800">
                        {{ $data->check }}
                    </p>
                    <div class="mb-8">
                        <span class="fs-2 text-gray-800">Set Due Date</span>
                        <input class="form-control form-control-solid" type="date" placeholder="Pick a date" id="kt_datepicker_1" wire:model="target_date" />
                    </div>
                    <span class="fs-2 text-gray-800">Services</span>
                    <!--begin::Table container-->
                    <div class="table-responsive mb-8">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4 my-0">
                            <!--begin::Table head-->
                            <thead>
                                <tr>
                                    <th class="min-w-175px"></th>
                                    <th class="w-125px"></th>
                                    <th class="w-60px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @forelse ($serviceAdd as $index => $service )
                                <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                                    <td class="pe-0">
                                        <div class="d-flex align-items-center">
                                            {{-- <div class="w-50px h-50px"></div> --}}
                                            <i class="ki-solid ki-gear fs-2x text-gray-400"></i>
                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 me-1">{{ $service['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="pe-0">

                                    </td>
                                    <td class="text-end">
                                        <span class="fw-bold text-primary fs-3" data-kt-pos-element="item-total">RP {{ number_format($service['price'], 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                                @empty

                                @endforelse

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>

                    <span class="fs-2 text-gray-800">Spare Parts</span>
                    @forelse ( $sparepartAdd as $sparepart )
                    <div class="table-responsive mb-8">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4 my-0">
                            <!--begin::Table head-->
                            <thead>
                                <tr>
                                    <th class="min-w-175px"></th>
                                    <th class="w-125px"></th>
                                    <th class="w-60px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                                    <td class="pe-0">
                                        <div class="d-flex align-items-center">
                                            {{-- <div class="w-50px h-50px">

                                            </div> --}}
                                            <i class="ki-solid ki-wrench fs-2x text-gray-400"></i>
                                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 me-1">{{ $sparepart['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <!--begin::Dialer-->
                                        <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                            <!--begin::Decrease control-->
                                            <button type="button" wire:click="minQty({{ $sparepart['id'] }})" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                                <i class="ki-duotone ki-minus fs-3x"></i>
                                            </button>
                                            <!--end::Decrease control-->
                                            <!--begin::Input control-->
                                            <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="{{ $sparepart['qty'] }}" />
                                            <!--end::Input control-->
                                            <!--begin::Increase control-->
                                            <button type="button" wire:click="addQty({{ $sparepart['id'] }})" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                                <i class="ki-duotone ki-plus fs-3x"></i>
                                            </button>
                                            <!--end::Increase control-->
                                        </div>
                                        <!--end::Dialer-->
                                    </td>
                                    <td class="text-end">
                                        <span class="fw-bold text-primary fs-3" data-kt-pos-element="item-total">RP {{ number_format($sparepart['price'], 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @empty

                    @endforelse
                    <!--end::Table container-->
                    <!--begin::Summary-->
                    <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                        <!--begin::Content-->
                        <div class="fs-6 fw-bold text-gray-800">
                            <span class="d-block lh-1 mb-2">Subtotal</span>
                            {{-- <span class="d-block mb-2">Discounts</span> --}}
                            <span class="d-block mb-9">Tax</span>
                            <span class="d-block fs-2qx lh-1">Total</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Content-->
                        <div class="fs-6 fw-bold text-gray-800 text-end">
                            <span class="d-block lh-1 mb-2" data-kt-pos-element="total">RP {{ number_format($subTotal, 0, ',', '.') }}</span>
                            {{-- <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span> --}}
                            <span class="d-block mb-9" data-kt-pos-element="tax">RP {{ number_format($tax, 0, ',', '.') }}</span>
                            <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">RP {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Summary-->
                    <!--begin::Payment Method-->
                    <div class="m-0">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
                        <!--end::Title-->
                        <!--begin::Radio group-->
                        <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                            <!--begin::Radio-->
                            <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $payment === 0 ? 'active' : '' }}" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="method" wire:click="setPayment(0)" value="0" wire:model="payment" />
                                <!--end::Input-->
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-dollar fs-2hx mb-2 pe-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="fs-7 fw-bold d-block">Cash</span>
                                <!--end::Title-->
                            </label>
                            <!--end::Radio-->
                            <!--begin::Radio-->
                            <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $payment === 1 ? 'active' : '' }}" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="method" wire:click="setPayment(1)" value="1" wire:model="payment" />
                                <!--end::Input-->
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-credit-cart fs-2hx mb-2 pe-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="fs-7 fw-bold d-block">Card</span>
                                <!--end::Title-->
                            </label>
                            <!--end::Radio-->
                            <!--begin::Radio-->
                            <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $payment === 2 ? 'active' : '' }}" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="method" wire:click="setPayment(2)" value="2" wire:model="payment" />
                                <!--end::Input-->
                                <!--begin::Icon-->
                                <i class="fa fa-qrcode fs-2hx mb-2 pe-0" aria-hidden="true"></i>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="fs-7 fw-bold d-block">QRIS</span>
                                <!--end::Title-->
                            </label>
                            <!--end::Radio-->
                        </div>
                        <!--end::Radio group-->
                        <!--begin::Actions-->
                        <button wire:click="printBill" class="btn btn-primary fs-1 w-100 py-4" {{ $totalPrice ? '' : 'disabled' }}>Print Bills</button>
                        <!--end::Actions-->
                    </div>
                    <!--end::Payment Method-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Pos order-->
        </div>
        <!--end::Sidebar-->
    </div>


</div>
@include('livewire.pages.admin.masterdata.operational.script')
