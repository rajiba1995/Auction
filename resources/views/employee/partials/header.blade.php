
    <div class="inner-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12">
                    <button type="button" class="btn btn-toggle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="#888888"/>
                            <g id="Frame 2" clip-path="url(#clip0_0_1)">
                            <rect width="1600" height="1034" transform="translate(-172 -28)" fill="#F8F8F8"/>
                            <rect id="Rectangle 28" x="-52" y="-28" width="1480" height="80" fill="white"/>
                            <circle id="Ellipse 9" cx="12" cy="12" r="24" fill="#F5F6F9"/>
                            <g id="grid 1">
                            <path id="Vector" d="M10 3H3V10H10V3Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Vector_2" d="M21 3H14V10H21V3Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Vector_3" d="M21 14H14V21H21V14Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Vector_4" d="M10 14H3V21H10V14Z" stroke="#025EC5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            </g>
                            <defs>
                            <clipPath id="clip0_0_1">
                            <rect width="1600" height="1034" fill="white" transform="translate(-172 -28)"/>
                            </clipPath>
                            </defs>
                        </svg>                                        
                    </button>
                    <div class="search-box">
                        <input type="text" name="" placeholder="Type to search...">
                        <button type="button" class="btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.9999 21L16.6499 16.65" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-12 justify-content-end">
                    <div class="user-initial">
                        JD
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                {{-- <label>{{$loggedInEmployee->name}}</label> --}}
                                <label>Employee</label>
                                <label>Employee</label>
                            </div>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="16" fill="#888888"/>
                                <g id="Frame 2" clip-path="url(#clip0_0_1)">
                                <rect width="1600" height="1034" transform="translate(-1544 -32)" fill="#F8F8F8"/>
                                <rect id="Rectangle 28" x="-1424" y="-32" width="1480" height="80" fill="white"/>
                                <g id="Group 101">
                                <g id="chevron-down (1) 1">
                                <path id="Vector" d="M4 6L8 10L12 6" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                </g>
                                </g>
                                <defs>
                                <clipPath id="clip0_0_1">
                                <rect width="1600" height="1034" fill="white" transform="translate(-1544 -32)"/>
                                </clipPath>
                                </defs>
                            </svg>                                                
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('employee.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>