@extends('front.layout.app')
@section('section')
<style>
    #group_list .search-bar{
        max-width: unset !important;
    }
    .show2{
        display: block !important;
    }
</style>

    <div class="main">
        <div class="inner-page">

            <div class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="inner-wrap">
                                <ul>
                                    <li>Home</li>
                                    <li>&nbsp;>&nbsp;Supplier Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="user-dashboard">
                <div class="top-section user-dashboard-top-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-row">
                                    <h2 class="page-heading bg-theme">Supplier Dashboard</h2>
                                </div>

                                <ul class="nav nav-tabs dashboard-tabs" id="dashboardTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="{{route('user_seller_dashboard')}}" class="nav-link {{ (request()->is('seller/groups*')) ? 'active' : '' }}" id="groups-tab">
                                            Groups
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.3964 11.6256C13.1599 11.6256 13.9062 11.3992 14.5411 10.975C15.1759 10.5508 15.6706 9.94787 15.9628 9.24247C16.2549 8.53707 16.3313 7.76088 16.1823 7.01206C16.0333 6.26325 15.6656 5.57543 15.1257 5.03561C14.5857 4.49579 13.8978 4.12821 13.149 3.97935C12.4001 3.8305 11.624 3.90705 10.9186 4.19934C10.2133 4.49162 9.61047 4.98651 9.18641 5.62141C8.76234 6.25631 8.53608 7.00271 8.53623 7.76621C8.53747 8.78954 8.94459 9.77058 9.66826 10.4941C10.3919 11.2176 11.3731 11.6246 12.3964 11.6256ZM12.3964 5.46856C12.8508 5.46856 13.2951 5.60331 13.6729 5.85578C14.0507 6.10825 14.3452 6.4671 14.5191 6.88694C14.6931 7.30678 14.7386 7.76876 14.6499 8.21446C14.5612 8.66017 14.3424 9.06957 14.0211 9.3909C13.6997 9.71223 13.2903 9.93106 12.8446 10.0197C12.3989 10.1084 11.937 10.0629 11.5171 9.88897C11.0973 9.71507 10.7384 9.42057 10.486 9.04272C10.2335 8.66487 10.0987 8.22065 10.0987 7.76621C10.0996 7.15709 10.3419 6.57315 10.7726 6.14244C11.2033 5.71172 11.7873 5.46938 12.3964 5.46856ZM5.1042 13.8943C5.69137 13.8943 6.26534 13.7202 6.75355 13.394C7.24176 13.0678 7.62227 12.6041 7.84697 12.0617C8.07167 11.5192 8.13046 10.9223 8.01591 10.3464C7.90136 9.77053 7.61861 9.24155 7.20343 8.82636C6.78824 8.41118 6.25926 8.12843 5.68338 8.01388C5.1075 7.89933 4.51058 7.95812 3.96811 8.18282C3.42564 8.40752 2.96199 8.78803 2.63578 9.27624C2.30957 9.76445 2.13545 10.3384 2.13545 10.9256C2.13545 11.7129 2.44823 12.4681 3.00498 13.0248C3.56173 13.5816 4.31684 13.8943 5.1042 13.8943ZM5.1042 9.51934C5.38233 9.51934 5.65422 9.60181 5.88547 9.75633C6.11673 9.91085 6.29697 10.1305 6.40341 10.3874C6.50984 10.6444 6.53769 10.9271 6.48343 11.1999C6.42917 11.4727 6.29524 11.7233 6.09857 11.92C5.9019 12.1166 5.65133 12.2506 5.37855 12.3048C5.10576 12.3591 4.82301 12.3312 4.56605 12.2248C4.30909 12.1184 4.08947 11.9381 3.93495 11.7069C3.78043 11.4756 3.69795 11.2037 3.69795 10.9256C3.69795 10.5526 3.84611 10.1949 4.10983 9.93122C4.37356 9.6675 4.73124 9.51934 5.1042 9.51934ZM19.6878 13.8943C20.275 13.8943 20.8489 13.7202 21.3371 13.394C21.8254 13.0678 22.2059 12.6041 22.4306 12.0617C22.6553 11.5192 22.7141 10.9223 22.5995 10.3464C22.485 9.77053 22.2022 9.24155 21.787 8.82636C21.3718 8.41118 20.8429 8.12843 20.267 8.01388C19.6911 7.89933 19.0942 7.95812 18.5517 8.18282C18.0092 8.40752 17.5456 8.78803 17.2194 9.27624C16.8932 9.76445 16.719 10.3384 16.719 10.9256C16.719 11.7129 17.0318 12.4681 17.5886 13.0248C18.1453 13.5816 18.9004 13.8943 19.6878 13.8943ZM19.6878 9.51934C19.9659 9.51934 20.2378 9.60181 20.4691 9.75633C20.7003 9.91085 20.8806 10.1305 20.987 10.3874C21.0934 10.6444 21.1213 10.9271 21.067 11.1999C21.0128 11.4727 20.8788 11.7233 20.6822 11.92C20.4855 12.1166 20.2349 12.2506 19.9621 12.3048C19.6894 12.3591 19.4066 12.3312 19.1496 12.2248C18.8927 12.1184 18.6731 11.9381 18.5185 11.7069C18.364 11.4756 18.2815 11.2037 18.2815 10.9256C18.2815 10.5526 18.4297 10.1949 18.6934 9.93122C18.9571 9.6675 19.3148 9.51934 19.6878 9.51934ZM19.7917 15.4615C19.1068 15.4661 18.4339 15.6414 17.8339 15.9717C17.2635 15.0686 16.4773 14.3218 15.5461 13.7984C14.615 13.2751 13.5683 12.9918 12.5003 12.974C11.4323 12.9918 10.3856 13.2751 9.45446 13.7984C8.52333 14.3218 7.73711 15.0686 7.1667 15.9717C6.5667 15.6414 5.89377 15.4661 5.20889 15.4615C3.9799 15.5215 2.82455 16.0652 1.99506 16.9741C1.16557 17.8829 0.729322 19.083 0.781546 20.3123C0.781546 20.5195 0.863856 20.7182 1.01037 20.8647C1.15688 21.0112 1.3556 21.0936 1.5628 21.0936C1.77 21.0936 1.96871 21.0112 2.11522 20.8647C2.26174 20.7182 2.34405 20.5195 2.34405 20.3123C2.29284 19.4975 2.56488 18.6954 3.10116 18.0798C3.63745 17.4643 4.39476 17.0849 5.20889 17.024C5.64062 17.0273 6.06448 17.14 6.44092 17.3514C6.07273 18.2793 5.88423 19.2687 5.88545 20.267C5.88545 20.4742 5.96776 20.6729 6.11427 20.8194C6.26079 20.9659 6.4595 21.0482 6.6667 21.0482C6.8739 21.0482 7.07262 20.9659 7.21913 20.8194C7.36564 20.6729 7.44795 20.4742 7.44795 20.267C7.44795 17.1068 9.71358 14.5365 12.5003 14.5365C15.287 14.5365 17.5526 17.1068 17.5526 20.267C17.5526 20.4742 17.635 20.6729 17.7815 20.8194C17.928 20.9659 18.1267 21.0482 18.3339 21.0482C18.5411 21.0482 18.7398 20.9659 18.8863 20.8194C19.0328 20.6729 19.1151 20.4742 19.1151 20.267C19.1164 19.2687 18.9279 18.2793 18.5597 17.3514C18.9361 17.14 19.36 17.0273 19.7917 17.024C20.6058 17.0849 21.3631 17.4643 21.8994 18.0798C22.4357 18.6954 22.7078 19.4975 22.6565 20.3123C22.6565 20.5195 22.7389 20.7182 22.8854 20.8647C23.0319 21.0112 23.2306 21.0936 23.4378 21.0936C23.645 21.0936 23.8437 21.0112 23.9902 20.8647C24.1367 20.7182 24.219 20.5195 24.219 20.3123C24.2713 19.083 23.835 17.8829 23.0055 16.9741C22.176 16.0652 21.0207 15.5215 19.7917 15.4615Z" fill="#0076D7"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="{{ route('seller_all_inquiries') }}" class="nav-link {{ (request()->is('seller/all-inquiries*')) ? 'active' : '' }}" id="allinquiries-tab" >
                                            All Inquiries
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.209 10.7422C17.209 10.2028 16.7718 9.76562 16.2324 9.76562H6.17383C5.63447 9.76562 5.19727 10.2028 5.19727 10.7422C5.19727 11.2815 5.63447 11.7188 6.17383 11.7188H16.2324C16.7718 11.7188 17.209 11.2815 17.209 10.7422ZM6.17383 13.6719C5.63447 13.6719 5.19727 14.1091 5.19727 14.6484C5.19727 15.1878 5.63447 15.625 6.17383 15.625H12.2828C12.8221 15.625 13.2593 15.1878 13.2593 14.6484C13.2593 14.1091 12.8221 13.6719 12.2828 13.6719H6.17383Z" fill="#0076D7"/>
                                                <path d="M8.46919 23.0469H5.20312C4.12617 23.0469 3.25 22.1707 3.25 21.0938V3.90625C3.25 2.8293 4.12617 1.95312 5.20312 1.95312H17.2094C18.2864 1.95312 19.1625 2.8293 19.1625 3.90625V9.91211C19.1625 10.4515 19.5998 10.8887 20.1391 10.8887C20.6785 10.8887 21.1157 10.4515 21.1157 9.91211V3.90625C21.1157 1.75234 19.3633 0 17.2094 0H5.20312C3.04922 0 1.29688 1.75234 1.29688 3.90625V21.0938C1.29688 23.2477 3.04922 25 5.20312 25H8.46919C9.00854 25 9.44575 24.5628 9.44575 24.0234C9.44575 23.4841 9.00854 23.0469 8.46919 23.0469Z" fill="#0076D7"/>
                                                <path d="M22.845 14.1393C21.7027 12.997 19.8441 12.9969 18.7025 14.1385L13.3411 19.4881C13.2272 19.6017 13.1432 19.7417 13.0964 19.8956L11.9288 23.7396C11.878 23.9069 11.873 24.0848 11.9144 24.2546C11.9558 24.4245 12.0421 24.5802 12.1642 24.7054C12.2863 24.8305 12.4398 24.9206 12.6086 24.9662C12.7774 25.0118 12.9554 25.0112 13.1239 24.9645L17.0656 23.8727C17.2278 23.8277 17.3757 23.7416 17.4948 23.6227L22.845 18.2825C23.9873 17.1402 23.9873 15.2816 22.845 14.1393ZM16.2967 22.059L14.3137 22.6083L14.894 20.6977L18.5117 17.0881L19.893 18.4694L16.2967 22.059ZM21.4646 16.9009L21.2754 17.0897L19.8943 15.7086L20.0829 15.5204C20.4637 15.1396 21.0832 15.1396 21.464 15.5204C21.8447 15.9012 21.8447 16.5207 21.4646 16.9009ZM16.2324 5.85938H6.17383C5.63447 5.85938 5.19727 6.29658 5.19727 6.83594C5.19727 7.37529 5.63447 7.8125 6.17383 7.8125H16.2324C16.7718 7.8125 17.209 7.37529 17.209 6.83594C17.209 6.29658 16.7718 5.85938 16.2324 5.85938Z" fill="#0076D7"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a  href="{{ route('seller_live_inquiries') }}" class="nav-link {{ (request()->is('seller/live-inquiries*')) ? 'active' : '' }}" id="liveinquiries-tab">
                                            Live Inquiries
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1151_262)">
                                                <path d="M19.7983 9.16754L13.2115 2.58068M13.2115 2.58068L9.05138 6.74078M13.2115 2.58068C13.6901 2.10201 13.6901 1.32594 13.2115 0.847278C12.7328 0.368616 11.9568 0.368616 11.4781 0.847278L7.31798 5.00739C6.83932 5.48605 6.83932 6.26212 7.31798 6.74078C7.79664 7.21945 8.57272 7.21945 9.05138 6.74078M9.05138 6.74078L15.6382 13.3276M17.3716 15.061L21.5317 10.9009C22.0104 10.4222 22.0104 9.64615 21.5317 9.16749C21.053 8.68883 20.277 8.68883 19.7983 9.16749L15.6382 13.3276C15.1595 13.8063 15.1595 14.5823 15.6382 15.061C16.1169 15.5397 16.8929 15.5397 17.3716 15.061ZM14.2515 11.9409L10.4381 8.1275C9.67223 8.89337 9.67223 10.1351 10.4381 10.9009L11.4781 11.9409C12.244 12.7068 13.4857 12.7068 14.2515 11.9409Z" stroke="#0076D7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.2713 10.7119L0.940227 19.4322C0.352239 19.9799 0.335637 20.9062 0.904192 21.4748C1.46059 22.0312 2.3599 22.0271 2.91142 21.4755C2.92319 21.4637 2.935 21.4512 2.94677 21.4387L11.6671 12.1076M3.61552 20.7194L1.65956 18.7634M22.5506 22.0606V21.0741C22.5506 20.2651 21.8948 19.6093 21.0858 19.6093H14.7002C13.8912 19.6093 13.2354 20.2651 13.2354 21.0741V22.0606M11.2743 24.512H24.5117V23.5255C24.5117 22.7165 23.8559 22.0606 23.0469 22.0606H12.7392C11.9301 22.0606 11.2743 22.7165 11.2743 23.5255V24.512Z" stroke="#0076D7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1151_262">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>                                                
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a  href="{{ route('seller_pending_inquiries') }}" class="nav-link {{ (request()->is('seller/pending-inquiries*')) ? 'active' : '' }}" id="pendingresults-tab">
                                            Pending Results
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1151_279)">
                                                <path d="M12.4619 0.732422C18.961 0.732422 24.2295 6.00093 24.2295 12.5C24.2295 18.9991 18.961 24.2676 12.4619 24.2676" stroke="#0076D7" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.4619 5.14551V12.5002L18.3457 18.384" stroke="#0076D7" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.20591 1.52563C8.20591 1.52563 8.48979 1.41201 8.80342 1.31401C9.11704 1.21602 9.48076 1.11328 9.48076 1.11328M4.63232 3.71104C4.63232 3.71104 4.8584 3.50518 5.11787 3.30356C5.37734 3.10195 5.68203 2.87832 5.68203 2.87832M2.05034 7.00952C2.05034 7.00952 2.19004 6.7375 2.36245 6.45781C2.53486 6.17808 2.74194 5.86191 2.74194 5.86191M0.787012 11.0033C0.787012 11.0033 0.822607 10.6996 0.886133 10.3772C0.949658 10.0549 1.03291 9.68618 1.03291 9.68618M1.00239 15.1867C1.00239 15.1867 0.929346 14.8897 0.875977 14.5655C0.822607 14.2413 0.771484 13.8668 0.771484 13.8668M2.66914 19.0296C2.66914 19.0296 2.49673 18.7771 2.3332 18.4921C2.16963 18.2071 1.99062 17.8742 1.99062 17.8742M5.57617 22.0456C5.57617 22.0456 5.32627 21.8694 5.07324 21.6597C4.82021 21.45 4.53599 21.201 4.53599 21.201M9.35532 23.8524C9.35532 23.8524 9.05952 23.7749 8.74912 23.6671C8.43872 23.5593 8.08521 23.4255 8.08521 23.4255" stroke="#0076D7" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="30 57"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1151_279">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>                                                
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a  href="{{ route('seller_confirmed_inquiries') }}" class="nav-link {{ (request()->is('seller/confirmed-inquiries*')) ? 'active' : '' }}" id="confirmed-tab">
                                            Confirmed
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1151_284)">
                                                <path d="M16.7969 8.98438C16.5164 8.98438 16.2402 9.00078 15.9672 9.02969C15.9978 8.7552 16.014 8.4793 16.0156 8.20312C16.0156 3.89531 12.5109 0.390625 8.20312 0.390625C3.89531 0.390625 0.390625 3.89531 0.390625 8.20312C0.390625 12.5109 3.89531 16.0156 8.20312 16.0156C8.47969 16.0156 8.75547 15.9965 9.02969 15.9676C8.99998 16.243 8.98486 16.5198 8.98438 16.7969C8.98438 21.1047 12.4891 24.6094 16.7969 24.6094C21.1047 24.6094 24.6094 21.1047 24.6094 16.7969C24.6094 12.4891 21.1047 8.98438 16.7969 8.98438ZM8.20312 15.2344C4.32617 15.2344 1.17188 12.0801 1.17188 8.20312C1.17188 4.32617 4.32617 1.17188 8.20312 1.17188C12.0801 1.17188 15.2344 4.32617 15.2344 8.20312C15.2344 8.52383 15.2063 8.84336 15.1633 9.15898C14.8813 9.21914 14.6062 9.29766 14.3363 9.3875C14.4109 8.99883 14.4531 8.60312 14.4531 8.20312C14.4531 4.75703 11.6492 1.95312 8.20312 1.95312C4.75703 1.95312 1.95312 4.75703 1.95312 8.20312C1.95312 11.6492 4.75703 14.4531 8.20312 14.4531C8.60312 14.4531 8.99844 14.4109 9.3875 14.3363C9.29766 14.6062 9.21953 14.8813 9.15898 15.1629C8.84234 15.2082 8.52299 15.2321 8.20312 15.2344ZM9.74961 13.4473C8.80172 13.7281 7.79529 13.7459 6.83808 13.4987C5.88087 13.2514 5.00893 12.7485 4.31563 12.0438C4.34906 11.8056 4.45564 11.5837 4.62065 11.4088C4.78565 11.2338 5.00093 11.1145 5.23672 11.0672L6.6793 10.7746C6.76914 10.7488 6.8543 10.7129 6.93672 10.6727L8.20312 12.3727L9.47227 10.6691C9.5625 10.7137 9.65625 10.7535 9.75703 10.782L11.1695 11.0672C11.2551 11.0844 11.3359 11.1137 11.4145 11.1488C10.7243 11.8074 10.1602 12.5862 9.74961 13.4473ZM6.25 8.20312C6.03477 8.20312 5.85938 8.02773 5.85938 7.8125C5.85938 7.59727 6.03477 7.42188 6.25 7.42188V8.20312ZM6.55469 6.64062H6.25C6.14727 6.64062 6.04922 6.6582 5.9543 6.6832C5.89274 6.50038 5.8607 6.30892 5.85938 6.11602C5.85989 5.63371 6.05172 5.1713 6.39276 4.83026C6.7338 4.48922 7.19621 4.29739 7.67852 4.29688H8.72812C9.21036 4.2975 9.67267 4.48937 10.0136 4.8304C10.3546 5.17143 10.5464 5.63378 10.5469 6.11602C10.5469 6.30937 10.5121 6.50039 10.452 6.6832C10.3556 6.65627 10.2562 6.64196 10.1562 6.64062H9.07656C8.56281 6.64004 8.0562 6.52037 7.59648 6.29102L7.51406 6.25H7.42188C7.07695 6.25 6.76953 6.40273 6.55469 6.64062ZM10.1562 7.42188C10.3715 7.42188 10.5469 7.59727 10.5469 7.8125C10.5469 8.02773 10.3715 8.20312 10.1562 8.20312V7.42188ZM9.375 8.20312C9.375 8.84922 8.84922 9.375 8.20312 9.375C7.55703 9.375 7.03125 8.84922 7.03125 8.20312V7.42188C7.03125 7.23203 7.16758 7.07305 7.34727 7.03828C7.88633 7.28945 8.48203 7.42188 9.07656 7.42188H9.375V8.20312ZM7.60195 10.0516C7.79258 10.1141 7.99219 10.1562 8.20312 10.1562C8.41445 10.1562 8.61406 10.1141 8.80469 10.0516C8.82656 10.0895 8.85 10.1266 8.87539 10.1625L8.20312 11.0648L7.53125 10.1633C7.55625 10.127 7.57969 10.0898 7.60195 10.0516ZM12.0434 10.6109C11.8272 10.4597 11.5823 10.3544 11.3238 10.3016L9.94102 10.0234C9.74812 9.96756 9.58434 9.83919 9.48398 9.66523C9.70051 9.47805 9.87333 9.24563 9.99023 8.98438H10.1562C10.8023 8.98438 11.3281 8.45859 11.3281 7.8125C11.3281 7.5625 11.248 7.33203 11.1145 7.14141C11.2544 6.81761 11.3271 6.46876 11.3281 6.11602C11.3274 5.42657 11.0532 4.76557 10.5657 4.27806C10.0782 3.79055 9.41718 3.51635 8.72773 3.51562H7.67812C6.98875 3.51645 6.32785 3.7907 5.84042 4.2782C5.353 4.7657 5.07885 5.42664 5.07812 6.11602C5.07812 6.46953 5.15312 6.81836 5.2918 7.1418C5.15297 7.33791 5.07832 7.57222 5.07812 7.8125C5.07812 8.45859 5.60391 8.98438 6.25 8.98438H6.41563C6.53257 9.24583 6.70552 9.47839 6.92227 9.66562C6.82383 9.83594 6.66914 9.96563 6.49453 10.016L5.08203 10.3012C4.79229 10.3593 4.51976 10.4832 4.28538 10.6632C4.05101 10.8432 3.86103 11.0745 3.73008 11.3395C3.08205 10.422 2.73421 9.32634 2.73438 8.20312C2.73438 5.1875 5.1875 2.73438 8.20312 2.73438C11.2188 2.73438 13.6719 5.1875 13.6719 8.20312C13.6719 8.73086 13.5934 9.25 13.4461 9.75039C12.9496 9.98723 12.4794 10.2757 12.0434 10.6109ZM16.7969 23.8281C12.9199 23.8281 9.76562 20.6738 9.76562 16.7969C9.76562 12.9199 12.9199 9.76562 16.7969 9.76562C20.6738 9.76562 23.8281 12.9199 23.8281 16.7969C23.8281 20.6738 20.6738 23.8281 16.7969 23.8281Z" fill="#0076D7"/>
                                                <path d="M22.4848 10.634L23.2531 10.4918C23.2014 10.2137 23.1389 9.93774 23.066 9.66445L22.3113 9.8668C22.3789 10.1188 22.4371 10.377 22.4848 10.634ZM16.4059 3.90625C16.7441 3.90625 17.0469 3.76016 17.2613 3.52969C19.491 4.71758 21.2371 6.73438 22.0781 9.11445L22.8148 8.8543C21.902 6.2707 19.9984 4.08477 17.5703 2.81016C17.5719 2.78477 17.5777 2.76016 17.5777 2.73438C17.5777 2.08828 17.052 1.5625 16.4059 1.5625C15.7598 1.5625 15.234 2.08828 15.234 2.73438C15.234 3.38047 15.7598 3.90625 16.4059 3.90625ZM16.4059 2.34375C16.6211 2.34375 16.7965 2.51914 16.7965 2.73438C16.7965 2.94961 16.6211 3.125 16.4059 3.125C16.1906 3.125 16.0152 2.94961 16.0152 2.73438C16.0152 2.51914 16.1906 2.34375 16.4059 2.34375ZM2.51445 14.366L1.74609 14.5082C1.79766 14.7852 1.86055 15.0637 1.9332 15.3355L2.68789 15.1332C2.62008 14.8798 2.56222 14.6239 2.51445 14.366ZM8.59336 21.0938C8.25508 21.0938 7.95234 21.2398 7.73789 21.4703C5.50859 20.2824 3.7625 18.2656 2.92109 15.8855L2.18437 16.1457C3.09727 18.7293 5.00078 20.9152 7.42891 22.1898C7.42734 22.2152 7.42148 22.2398 7.42148 22.2656C7.42148 22.9117 7.94727 23.4375 8.59336 23.4375C9.23945 23.4375 9.76523 22.9117 9.76523 22.2656C9.76523 21.6195 9.23945 21.0938 8.59336 21.0938ZM8.59336 22.6562C8.37813 22.6562 8.20273 22.4809 8.20273 22.2656C8.20273 22.0504 8.37813 21.875 8.59336 21.875C8.80859 21.875 8.98398 22.0504 8.98398 22.2656C8.98398 22.4809 8.80859 22.6562 8.59336 22.6562ZM21.4172 13.3484C21.4168 13.3484 21.4168 13.3484 21.4172 13.3484C21.0496 12.9809 20.5418 12.8238 20.0238 12.9168C19.7168 12.9723 19.4242 13.132 19.1773 13.3789L14.8434 17.7121L13.6344 16.5027C13.3871 16.2563 13.0945 16.0965 12.7883 16.0414C12.2699 15.9477 11.7625 16.1051 11.3949 16.4727C11.0273 16.8402 10.8699 17.348 10.9633 17.866C11.0188 18.173 11.1785 18.4656 11.4254 18.7125L13.7387 21.0262C14.0336 21.3219 14.4258 21.4844 14.8434 21.4844C15.2609 21.4844 15.6531 21.3219 15.948 21.0266L21.3867 15.5879C21.6336 15.341 21.7934 15.0484 21.8488 14.7414C21.9418 14.2238 21.7848 13.716 21.4172 13.3484ZM21.0797 14.6031C21.0457 14.7918 20.9273 14.9426 20.8344 15.0355L15.3957 20.4742C15.1008 20.7695 14.5863 20.7695 14.291 20.4742L11.9773 18.1605C11.8844 18.0672 11.766 17.9164 11.732 17.7277C11.7077 17.602 11.7146 17.4722 11.7522 17.3498C11.7898 17.2274 11.8569 17.1162 11.9477 17.0258C12.0961 16.877 12.2922 16.7969 12.5004 16.7969C12.5492 16.7969 12.5992 16.8012 12.6496 16.8102C12.8379 16.8441 12.9891 16.9625 13.082 17.0555L14.8434 18.8168L19.7297 13.9309C19.823 13.8379 19.9738 13.7195 20.1625 13.6855C20.2883 13.661 20.4181 13.6678 20.5407 13.7052C20.6632 13.7427 20.7747 13.8096 20.8653 13.9003C20.9559 13.9909 21.0228 14.1024 21.0602 14.2249C21.0976 14.3475 21.1043 14.4774 21.0797 14.6031Z" fill="#0076D7"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1151_284">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>                                                
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a  href="{{ route('seller_history_inquiries') }}" class="nav-link {{ (request()->is('seller/history-inquiries*')) ? 'active' : '' }}" id="history-tab">
                                            History
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1151_288)">
                                                <path d="M23.5162 15.517C22.062 14.0629 19.9176 13.71 18.1279 14.4576V5.83564C18.1279 5.47889 17.989 5.1435 17.7368 4.89128L13.2371 0.391091C13.1319 0.286345 13.0099 0.19991 12.8763 0.135355L12.8754 0.134916C12.8693 0.131941 12.8632 0.128917 12.857 0.126088C12.8454 0.12034 12.8335 0.115084 12.8214 0.110333C12.6543 0.0379706 12.4743 0.000428282 12.2923 0L1.45164 0C0.673307 0 0.0400391 0.633219 0.0400391 1.4116V23.5884C0.0400391 24.3668 0.673258 25 1.45159 25H16.7163C17.4616 25 18.0806 24.4173 18.1255 23.6734C18.1261 23.6636 18.1264 23.6538 18.1264 23.644V23.5429C18.7303 23.7951 19.3782 23.9248 20.0326 23.9246C21.2942 23.9246 22.5557 23.4444 23.5162 22.484C24.4466 21.5535 24.9591 20.3164 24.9591 19.0005C24.9591 17.6846 24.4466 16.4475 23.5162 15.517ZM16.4626 4.99663H13.2393C13.2107 4.9966 13.1833 4.98521 13.163 4.96498C13.1428 4.94474 13.1314 4.91731 13.1314 4.88869V1.66509L16.4626 4.99663ZM17.1509 23.6266C17.1312 23.8507 16.9426 24.0245 16.7163 24.0245H1.45164C1.21117 24.0245 1.01562 23.8289 1.01562 23.5884V1.4116C1.01562 1.17113 1.21122 0.975534 1.45164 0.975534H12.1559V4.88869C12.1559 5.48611 12.6419 5.97217 13.2394 5.97217H17.1524V15.0037C16.9379 15.1584 16.7362 15.33 16.5491 15.517C15.6187 16.4475 15.1062 17.6847 15.1062 19.0006C15.1062 20.3165 15.6187 21.5536 16.5491 22.4841C16.7357 22.6707 16.937 22.842 17.1509 22.9964V23.6266H17.1509ZM22.8263 21.7942C21.2858 23.3347 18.7794 23.3347 17.2389 21.7942C16.4927 21.048 16.0817 20.0558 16.0817 19.0006C16.0817 17.9453 16.4927 16.9531 17.2389 16.2069C18.0091 15.4366 19.0209 15.0515 20.0326 15.0515C21.0443 15.0515 22.056 15.4366 22.8263 16.2069C23.5725 16.9531 23.9835 17.9453 23.9835 19.0006C23.9835 20.0558 23.5725 21.048 22.8263 21.7942Z" fill="#0076D7"/>
                                                <path d="M3.47697 7.77436H10.2771C10.5464 7.77436 10.7648 7.55599 10.7648 7.28659C10.7648 7.0172 10.5464 6.79883 10.2771 6.79883H3.47697C3.20763 6.79883 2.98921 7.0172 2.98921 7.28659C2.98921 7.55599 3.20758 7.77436 3.47697 7.77436ZM11.9731 15.5746H3.47697C3.20763 15.5746 2.98921 15.793 2.98921 16.0624C2.98921 16.3318 3.20763 16.5502 3.47697 16.5502H11.9731C12.2425 16.5502 12.4609 16.3318 12.4609 16.0624C12.4609 15.793 12.2425 15.5746 11.9731 15.5746ZM11.9731 18.4999H3.47697C3.20763 18.4999 2.98921 18.7183 2.98921 18.9877C2.98921 19.2571 3.20763 19.4754 3.47697 19.4754H11.9731C12.2425 19.4754 12.4609 19.2571 12.4609 18.9877C12.4609 18.7183 12.2425 18.4999 11.9731 18.4999ZM14.7158 12.6494H3.47697C3.20763 12.6494 2.98921 12.8678 2.98921 13.1372C2.98921 13.4066 3.20763 13.6249 3.47697 13.6249H14.7158C14.9851 13.6249 15.2035 13.4066 15.2035 13.1372C15.2035 12.8678 14.9851 12.6494 14.7158 12.6494ZM3.4282 10.7312H12.2281C12.4975 10.7312 12.7159 10.5128 12.7159 10.2434C12.7159 9.97404 12.4975 9.75567 12.2281 9.75567H3.4282C3.15885 9.75567 2.94043 9.97404 2.94043 10.2434C2.94043 10.5128 3.1588 10.7312 3.4282 10.7312Z" fill="#0076D7"/>
                                                <path d="M14.656 10.7309C14.9255 10.7309 15.144 10.5124 15.144 10.2429C15.144 9.97337 14.9255 9.75488 14.656 9.75488C14.3865 9.75488 14.168 9.97337 14.168 10.2429C14.168 10.5124 14.3865 10.7309 14.656 10.7309Z" fill="#0076D7"/>
                                                <path d="M21.7577 17.2757C21.5672 17.0852 21.2584 17.0852 21.0678 17.2757L20.0328 18.3107L19.0141 17.292C18.8236 17.1015 18.5148 17.1015 18.3242 17.292C18.1338 17.4824 18.1338 17.7913 18.3242 17.9818L19.3429 19.0005L18.3079 20.0355C18.1174 20.226 18.1174 20.5348 18.3079 20.7253C18.4032 20.8206 18.528 20.8682 18.6528 20.8682C18.7776 20.8682 18.9024 20.8205 18.9977 20.7253L20.0327 19.6903L21.0514 20.709C21.1467 20.8043 21.2715 20.8519 21.3963 20.8519C21.5212 20.8519 21.646 20.8042 21.7412 20.709C21.9317 20.5185 21.9317 20.2097 21.7412 20.0192L20.7225 19.0005L21.7576 17.9655C21.9482 17.775 21.9482 17.4661 21.7577 17.2757Z" fill="#0076D7"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1151_288">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>                                                                                             
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row filter-row">
                            <div class="col-lg-12 col-12" id="group_list">
                                <div class="search-bar">
                                    <form>
                                        <input type="search" name="" placeholder="Search for Service, Category, Location, etc">
                                        <button type="submit" class="btn-search btn-animated">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M20.9999 21.0004L16.6499 16.6504" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 col-12">
                                <div class="date-filters">
                                    <input type="hidden" id="filterStartDate">
                                    <div id="filterSelectedStartDate" class="selected-date selected-start-date"></div>
                                    <div class="between">
                                        <img src="assets/images/arrow-right-2.png" alt="">
                                    </div>
                                    <input type="hidden" id="filterEndDate">
                                    <div id="filterSelectedEndDate" class="selected-date selected-end-date"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="tab-content dashboard-tab-content">
                    <div class="tab-pane fade show active" id="groups" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <ul class="supplier-groups-table">
                                            <li class="heading-row">
                                                <div class="groups-th">Groups({{count($group_wise_list)}})</div>
                                                <div class="created-by-business-name-th">Created by(Business Name)</div>
                                                <div class="created-by-name-th">Created by(Name)</div>
                                                <div class="phone-number-th">Phone Number</div>
                                            </li>
                                            @foreach ( $group_wise_list as $item ) 
                                            @if($item->GroupWacthListData && $item->SellerData)
                                            <li class="data-row">
                                                <div class="groups-td">
                                                    <img src="{{asset('frontend/assets/images/group.png')}}" alt="Group">
                                                    {{ ucfirst($item->GroupWacthListData->group_name) }}
                                                </div>
                                                <div class="created-by-business-name-td">{{ ucfirst($item->SellerData->business_name) }}</div>
                                                <div class="created-by-name-td">{{ ucfirst($item->SellerData->name) }}</div>
                                                <div class="phone-number-td">{{$item->SellerData->country_code}}-{{$item->SellerData->mobile}}</div>
                                            </li>
                                            @endif
                                            @endforeach                                         
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                
            </section>
            
        </div>
    </div>

    @endsection
    @section('script')
    <script>
        $(document).ready(function(){
            $('#group_wies_search').keyup(function(){
                var selectedValue = $(this).val().toLowerCase(); // Convert to lowercase for case-insensitive comparison
                $('.item').show();
                var found = false; // Flag to track if any items are found
                $('.item').each(function() {
                    var group_name = $(this).find('.group_name').text().toLowerCase(); // Get location text and convert to lowercase
                    if (group_name.indexOf(selectedValue) === -1) {
                        $(this).hide(); // Hide the item if location doesn't match
                    } else {
                        found = true; // Set the flag to true if at least one item is found
                    }
                });
                if (!found) {
                    $('#noDataAlert').remove(); // Remove the alert if items are found
                    var append = `<div class="alert alert-danger" id="noDataAlert" role="alert">
                    No data found
                    </div>`;
                    $('.dashboard-groups').append(append);
                } else {
                    $('#noDataAlert').remove(); // Remove the alert if items are found
                }
            });
        });
        $("input[name='inquiry_type']").click(function() {
            var inputval = $(this).val();
            var id = $(this).attr('data-id');
            if(inputval == "existing-inquiry") {
                $("#inquiryoptions"+id).show();
            } else {
                $("#inquiryoptions"+id).hide();
            }
        });
    
    
    </script>
    @endsection