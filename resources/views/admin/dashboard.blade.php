@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
    <div class="inner-content">
        <div class="status-panel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="status-box">
                            <div class="upper">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="#888888"/>
                                        <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                        <rect width="1600" height="1034" transform="translate(-191 -141)" fill="#F8F8F8"/>
                                        <g id="Rectangle 31" filter="url(#filter0_d_0_1)">
                                        <rect x="-31" y="-31" width="332" height="140" rx="10" fill="white"/>
                                        </g>
                                        <circle id="Ellipse 10" cx="12" cy="12" r="23" fill="#E6EFF9"/>
                                        <g id="pie-chart 2">
                                        <path id="Vector" d="M21.2099 15.89C20.5737 17.3944 19.5787 18.7202 18.3118 19.7513C17.0449 20.7823 15.5447 21.4874 13.9424 21.8047C12.34 22.1221 10.6843 22.0421 9.12006 21.5718C7.55578 21.1014 6.13054 20.255 4.96893 19.1066C3.80733 17.9582 2.94473 16.5427 2.45655 14.9839C1.96837 13.4251 1.86948 11.7704 2.16851 10.1646C2.46755 8.55874 3.15541 7.05058 4.17196 5.77199C5.18851 4.49339 6.5028 3.48327 7.99992 2.82996" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_2" d="M22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7362 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2V12H22Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </g>
                                        <defs>
                                        <filter id="filter0_d_0_1" x="-81" y="-81" width="432" height="240" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                        <feOffset/>
                                        <feGaussianBlur stdDeviation="25"/>
                                        <feComposite in2="hardAlpha" operator="out"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                        </filter>
                                        <clipPath id="clip0_0_1">
                                        <rect width="1600" height="1034" fill="white" transform="translate(-191 -141)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                                    
                                </div>
                                <label>Total Report</label>
                            </div>
                            <div class="lower">
                                <label>0</label>
                                <div class="stat-img">
                                    <img src="assets/images/line-graph.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="status-box">
                            <div class="upper">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="#888888"/>
                                        <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                        <rect width="1600" height="1034" transform="translate(-547 -141)" fill="#F8F8F8"/>
                                        <g id="Rectangle 32" filter="url(#filter0_d_0_1)">
                                        <rect x="-31" y="-31" width="332" height="140" rx="10" fill="white"/>
                                        </g>
                                        <circle id="Ellipse 11" cx="12" cy="12" r="23" fill="#E6EFF9"/>
                                        <g id="briefcase 1">
                                        <path id="Vector" d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_2" d="M16 21V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V21" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </g>
                                        <defs>
                                        <filter id="filter0_d_0_1" x="-81" y="-81" width="432" height="240" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                        <feOffset/>
                                        <feGaussianBlur stdDeviation="25"/>
                                        <feComposite in2="hardAlpha" operator="out"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                        </filter>
                                        <clipPath id="clip0_0_1">
                                        <rect width="1600" height="1034" fill="white" transform="translate(-547 -141)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                                                                                      
                                </div>
                                <label>Total Jobs</label>
                            </div>
                            <div class="lower">
                                <label>{{count($AllJobs)}}</label>
                                <div class="stat-img">
                                    <img src="assets/images/bar-graph.png" alt="Graph">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="status-box">
                            <div class="upper">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="#888888"/>
                                        <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                        <rect width="1600" height="1034" transform="translate(-903 -141)" fill="#F8F8F8"/>
                                        <g id="Rectangle 43" filter="url(#filter0_d_0_1)">
                                        <rect x="-31" y="-31" width="332" height="140" rx="10" fill="white"/>
                                        </g>
                                        <circle id="Ellipse 12" cx="12" cy="12" r="23" fill="#E6EFF9"/>
                                        <g id="archive 2">
                                        <path id="Vector" d="M21 8V21H3V8" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_2" d="M23 3H1V8H23V3Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_3" d="M10 12H14" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </g>
                                        <defs>
                                        <filter id="filter0_d_0_1" x="-81" y="-81" width="432" height="240" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                        <feOffset/>
                                        <feGaussianBlur stdDeviation="25"/>
                                        <feComposite in2="hardAlpha" operator="out"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                        </filter>
                                        <clipPath id="clip0_0_1">
                                        <rect width="1600" height="1034" fill="white" transform="translate(-903 -141)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                                                                                                                                        
                                </div>
                                <label>Total Vendors</label>
                            </div>
                            <div class="lower">
                                <label>{{count($AllVendor)}}</label>
                                <div class="stat-img">
                                    <img src="assets/images/round-graph.png" alt="Graph">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="status-box">
                            <div class="upper">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="#888888"/>
                                        <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                        <rect width="1600" height="1034" transform="translate(-903 -141)" fill="#F8F8F8"/>
                                        <g id="Rectangle 43" filter="url(#filter0_d_0_1)">
                                        <rect x="-31" y="-31" width="332" height="140" rx="10" fill="white"/>
                                        </g>
                                        <circle id="Ellipse 12" cx="12" cy="12" r="23" fill="#E6EFF9"/>
                                        <g id="archive 2">
                                        <path id="Vector" d="M21 8V21H3V8" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_2" d="M23 3H1V8H23V3Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_3" d="M10 12H14" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </g>
                                        <defs>
                                        <filter id="filter0_d_0_1" x="-81" y="-81" width="432" height="240" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                        <feOffset/>
                                        <feGaussianBlur stdDeviation="25"/>
                                        <feComposite in2="hardAlpha" operator="out"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                        </filter>
                                        <clipPath id="clip0_0_1">
                                        <rect width="1600" height="1034" fill="white" transform="translate(-903 -141)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                                                                                                                                        
                                </div>
                                <label>Total Inspection</label>
                            </div>
                            <div class="lower">
                                <label>{{count($AllInspector)}}</label>
                                <div class="stat-img">
                                    <img src="assets/images/line-graph.png" alt="Graph">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="report-table-panel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="report-table-box">
                            <h3>Pending Jobs</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name of Supplier</th>
                                        <th>Location of Supplier</th>
                                        <th>Inspection Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shri Dakshineswari Maa Polyfabs Ltd</td>
                                        <td>Singur, Hooghly </td>
                                        <td>05.09.2023</td>
                                        <td><span class="status ongoing">Ongoing</span></td>
                                        <td>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-751 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-591" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="eye 1">
                                                    <path id="Vector" d="M0.666504 7.99996C0.666504 7.99996 3.33317 2.66663 7.99984 2.66663C12.6665 2.66663 15.3332 7.99996 15.3332 7.99996C15.3332 7.99996 12.6665 13.3333 7.99984 13.3333C3.33317 13.3333 0.666504 7.99996 0.666504 7.99996Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-641" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-751 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-782 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-622" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="edit-3 1">
                                                    <path id="Vector" d="M8 13.3334H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M11 2.33328C11.2652 2.06806 11.6249 1.91907 12 1.91907C12.1857 1.91907 12.3696 1.95565 12.5412 2.02672C12.7128 2.09779 12.8687 2.20196 13 2.33328C13.1313 2.4646 13.2355 2.6205 13.3066 2.79208C13.3776 2.96367 13.4142 3.14756 13.4142 3.33328C13.4142 3.519 13.3776 3.7029 13.3066 3.87448C13.2355 4.04606 13.1313 4.20196 13 4.33328L4.66667 12.6666L2 13.3333L2.66667 10.6666L11 2.33328Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-672" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-782 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-813 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-653" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="Rectangle 45" filter="url(#filter1_d_0_1)">
                                                    <rect x="59" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="trash-2 1">
                                                    <path id="Vector" d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_3" d="M6.6665 7.33337V11.3334" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_4" d="M9.3335 7.33337V11.3334" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-703" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <filter id="filter1_d_0_1" x="9" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-813 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shri Dakshineswari Maa Polyfabs Ltd</td>
                                        <td>Singur, Hooghly </td>
                                        <td>05.09.2023</td>
                                        <td><span class="status ongoing">Ongoing</span></td>
                                        <td>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-751 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-591" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="eye 1">
                                                    <path id="Vector" d="M0.666504 7.99996C0.666504 7.99996 3.33317 2.66663 7.99984 2.66663C12.6665 2.66663 15.3332 7.99996 15.3332 7.99996C15.3332 7.99996 12.6665 13.3333 7.99984 13.3333C3.33317 13.3333 0.666504 7.99996 0.666504 7.99996Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-641" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-751 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-782 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-622" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="edit-3 1">
                                                    <path id="Vector" d="M8 13.3334H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M11 2.33328C11.2652 2.06806 11.6249 1.91907 12 1.91907C12.1857 1.91907 12.3696 1.95565 12.5412 2.02672C12.7128 2.09779 12.8687 2.20196 13 2.33328C13.1313 2.4646 13.2355 2.6205 13.3066 2.79208C13.3776 2.96367 13.4142 3.14756 13.4142 3.33328C13.4142 3.519 13.3776 3.7029 13.3066 3.87448C13.2355 4.04606 13.1313 4.20196 13 4.33328L4.66667 12.6666L2 13.3333L2.66667 10.6666L11 2.33328Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-672" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-782 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-813 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-653" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="Rectangle 45" filter="url(#filter1_d_0_1)">
                                                    <rect x="59" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="trash-2 1">
                                                    <path id="Vector" d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M12.6668 4.00004V13.3334C12.6668 13.687 12.5264 14.0261 12.2763 14.2762C12.0263 14.5262 11.6871 14.6667 11.3335 14.6667H4.66683C4.31321 14.6667 3.97407 14.5262 3.72402 14.2762C3.47397 14.0261 3.3335 13.687 3.3335 13.3334V4.00004M5.3335 4.00004V2.66671C5.3335 2.31309 5.47397 1.97395 5.72402 1.7239C5.97407 1.47385 6.31321 1.33337 6.66683 1.33337H9.3335C9.68712 1.33337 10.0263 1.47385 10.2763 1.7239C10.5264 1.97395 10.6668 2.31309 10.6668 2.66671V4.00004" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_3" d="M6.6665 7.33337V11.3334" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_4" d="M9.3335 7.33337V11.3334" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-703" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <filter id="filter1_d_0_1" x="9" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-813 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="report-table-box">
                            <h3>Current Reports</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name of Supplier</th>
                                        <th>Location of Supplier</th>
                                        <th>Inspection Date</th>
                                        <th>Lot No.:</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shri Dakshineswari Maa Polyfabs Ltd</td>
                                        <td>Singur, Hooghly </td>
                                        <td>05.09.2023</td>
                                        <td>I-01</td>
                                        <td>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-751 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-591" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="eye 1">
                                                    <path id="Vector" d="M0.666504 7.99996C0.666504 7.99996 3.33317 2.66663 7.99984 2.66663C12.6665 2.66663 15.3332 7.99996 15.3332 7.99996C15.3332 7.99996 12.6665 13.3333 7.99984 13.3333C3.33317 13.3333 0.666504 7.99996 0.666504 7.99996Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-641" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-751 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shri Dakshineswari Maa Polyfabs Ltd</td>
                                        <td>Singur, Hooghly </td>
                                        <td>05.09.2023</td>
                                        <td>I-01</td>
                                        <td>
                                            <button type="button" class="btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#888888"/>
                                                    <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                                    <rect width="1600" height="1034" transform="translate(-751 -385)" fill="#F8F8F8"/>
                                                    <g id="Rectangle 44" filter="url(#filter0_d_0_1)">
                                                    <rect x="-591" y="-111" width="688" height="393" rx="10" fill="white"/>
                                                    </g>
                                                    <g id="eye 1">
                                                    <path id="Vector" d="M0.666504 7.99996C0.666504 7.99996 3.33317 2.66663 7.99984 2.66663C12.6665 2.66663 15.3332 7.99996 15.3332 7.99996C15.3332 7.99996 12.6665 13.3333 7.99984 13.3333C3.33317 13.3333 0.666504 7.99996 0.666504 7.99996Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path id="Vector_2" d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#00CF53" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_d_0_1" x="-641" y="-161" width="788" height="493" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset/>
                                                    <feGaussianBlur stdDeviation="25"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_1"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1" result="shape"/>
                                                    </filter>
                                                    <clipPath id="clip0_0_1">
                                                    <rect width="1600" height="1034" fill="white" transform="translate(-751 -385)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                                
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <h1>Admin Dashboard</h1> --}}
@endsection
@push('scripts')
@endpush