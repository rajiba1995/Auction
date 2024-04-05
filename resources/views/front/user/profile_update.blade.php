@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">
@php
     $prodserv = session('prodserv');
     $prodserv = $prodserv?$prodserv:"productdetails";
@endphp
        <div class="profile-page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @include('front.user.layout.sidebar')
                    <div class="col-xxl-9 col-xl-8 col-12 profile-right">
                        <div class="sidebar-toggler">
                            <span class="sidebar-opener" id="sidebarOpener">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M385.1 219.9 199.2 34c-20-20-52.3-20-72.3 0s-20 52.3 0 72.3L276.7 256 126.9 405.7c-20 20-20 52.3 0 72.3s52.3 20 72.3 0l185.9-185.9c19.9-19.9 19.9-52.3 0-72.2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                            </span>
                        </div>
                        <div class="tab-panes-wrapper">
                            <div class="tab-content">
                                <div class="tab-pane {{ (request()->is('my/profile*')) ? 'active' : '' }}" id="productsServices" role="tabpanel" aria-labelledby="productsServices-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="{{route('user.profile')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                               Back
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <div class="m-2">
                                                @if (session('success'))
                                                    <div class="alert alert-success" id="message_div">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="inner">
                                                <p>UPDATE<strong>->FILL YOUR BASIC INFORMATIONS</strong> </p>
                                                <form action="{{route('user.profile.update')}}" class="input-form" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">First Name*</label>
                                                                <input type="text" class="form-control border-red" name="first_name" value="{{$data->first_name}}">
                                                                @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Last Name*</label>
                                                                <input type="text" class="form-control border-red" name="last_name" value="{{$data->last_name}}">
                                                                @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-5 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Profile Image*</label>
                                                                <div class="profile-image-upload-box border-red">
                                                                    <div class="profile-img-box">
                                                                        <img src="{{$data->image?asset($data->image):asset('frontend/assets/images/person-2.png')}}" alt="">
                                                                    </div>
                                                                    <div class="cta-box">
                                                                        <label for="profileImgUpload" class="custom-upload">
                                                                            <input type="file" name="profile_image" id="profileImgUpload">
                                                                            <span class="btn btn-animated">Upload Image</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @error('profile_image')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Short Bio</label>
                                                                <textarea class="form-control border-red short-bio" name="short_bio">{{$data->short_bio}}</textarea>
                                                                @error('short_bio')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Name of your business*</label>
                                                                <input type="text" class="form-control border-red" name="business_name" value="{{$data->business_name}}">
                                                                @error('business_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Address*</label>
                                                                <textarea class="form-control border-red address" name="address">{{$data->address}}</textarea>
                                                                @error('address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">State*</label>
                                                                <select class="form-control border-red" id="inputState" name="state">
                                                                    <option value="" selected hidden>Select State</option>
                                                                    <option value="Arunachal Pradesh" {{$data->state=="Arunachal Pradesh"?"selected":""}}>Arunachal Pradesh</option>
                                                                    <option value="Assam" {{$data->state=="Assam"?"selected":""}}>Assam</option>
                                                                    <option value="Bihar" {{$data->state=="Bihar"?"selected":""}}>Bihar</option>
                                                                    <option value="Chhattisgarh" {{$data->state=="Chhattisgarh"?"selected":""}}>Chhattisgarh</option>
                                                                    <option value="Goa" {{$data->state=="Goa"?"selected":""}}>Goa</option>
                                                                    <option value="Gujarat" {{$data->state=="Gujarat"?"selected":""}}>Gujarat</option>
                                                                    <option value="Haryana" {{$data->state=="Haryana"?"selected":""}}>Haryana</option>
                                                                    <option value="Himachal Pradesh" {{$data->state=="Himachal Pradesh"?"selected":""}}>Himachal Pradesh</option>
                                                                    <option value="Jammu and Kashmir" {{$data->state=="Jammu and Kashmir"?"selected":""}}>Jammu and Kashmir</option>
                                                                    <option value="Jharkhand" {{$data->state=="Jharkhand"?"selected":""}}>Jharkhand</option>
                                                                    <option value="Karnataka" {{$data->state=="Karnataka"?"selected":""}}>Karnataka</option>
                                                                    <option value="Kerala" {{$data->state=="Kerala"?"selected":""}}>Kerala</option>
                                                                    <option value="Madya Pradesh" {{$data->state=="Madya Pradesh"?"selected":""}}>Madya Pradesh</option>
                                                                    <option value="Maharashtra" {{$data->state=="Maharashtra"?"selected":""}}>Maharashtra</option>
                                                                    <option value="Manipur" {{$data->state=="Manipur"?"selected":""}}>Manipur</option>
                                                                    <option value="Meghalaya" {{$data->state=="Meghalaya"?"selected":""}}>Meghalaya</option>
                                                                    <option value="Mizoram" {{$data->state=="Mizoram"?"selected":""}}>Mizoram</option>
                                                                    <option value="Nagaland" {{$data->state=="Nagaland"?"selected":""}}>Nagaland</option>
                                                                    <option value="Orissa" {{$data->state=="Orissa"?"selected":""}}>Orissa</option>
                                                                    <option value="Punjab" {{$data->state=="Punjab"?"selected":""}}>Punjab</option>
                                                                    <option value="Rajasthan" {{$data->state=="Rajasthan"?"selected":""}}>Rajasthan</option>
                                                                    <option value="Sikkim" {{$data->state=="Sikkim"?"selected":""}}>Sikkim</option>
                                                                    <option value="Tamil Nadu" {{$data->state=="Tamil Nadu"?"selected":""}}>Tamil Nadu</option>
                                                                    <option value="Telangana" {{$data->state=="Telangana"?"selected":""}}>Telangana</option>
                                                                    <option value="Tripura" {{$data->state=="Tripura"?"selected":""}}>Tripura</option>
                                                                    <option value="Uttaranchal" {{$data->state=="Uttaranchal"?"selected":""}}>Uttaranchal</option>
                                                                    <option value="Uttar Pradesh" {{$data->state=="Uttar Pradesh"?"selected":""}}>Uttar Pradesh</option>
                                                                    <option value="West Bengal" {{$data->state=="West Bengal"?"selected":""}}>West Bengal</option>
                                                                    <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                                                    <option value="Andaman and Nicobar Islands" {{$data->state=="Andaman and Nicobar Islands"?"selected":""}}>Andaman and Nicobar Islands</option>
                                                                    <option value="Chandigarh" {{$data->state=="Chandigarh"?"selected":""}}>Chandigarh</option>
                                                                    <option value="Dadar and Nagar Haveli" {{$data->state=="Dadar and Nagar Haveli"?"selected":""}}>Dadar and Nagar Haveli</option>
                                                                    <option value="Daman and Diu" {{$data->state=="Daman and Diu"?"selected":""}}>Daman and Diu</option>
                                                                    <option value="Delhi" {{$data->state=="Delhi"?"selected":""}}>Delhi</option>
                                                                    <option value="Lakshadeep" {{$data->state=="Lakshadeep"?"selected":""}}>Lakshadeep</option>
                                                                    <option value="Pondicherry" {{$data->state=="Pondicherry"?"selected":""}}>Pondicherry</option>

                                                                  </select>
                                                                  @error('state')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">City*</label>
                                                                <select class="form-control" id="inputDistrict" name="city">
                                                                    <option value="">-- select one -- </option>
                                                                    <option value="{{$data->city}}" {{$data->city?"selected":""}}>{{$data->city}}</option>
                                                                </select>
                                                                @error('city')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Pincode*</label>
                                                                <input type="text" class="form-control border-red" name="pincode" value="{{$data->pincode}}">
                                                                @error('pincode')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Email Id*</label>
                                                                <input type="email" class="form-control border-red" name="email" value="{{$data->email}}">
                                                                @error('email')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Phone Number*</label>
                                                                <input type="phone" class="form-control border-red" name="phone_number" value="{{$data->mobile}}">
                                                                @error('phone_number')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Business Type*</label>
                                                                <select class="form-control border-red" name="business_type">
                                                                    <option selected disabled>Select Business</option>
                                                                    @foreach ( $business_data as $item )
                                                                    <option value="{{ $item->name }}" {{$data->business_type == $item->name?"selected":""}}>{{ $item->name }}</option>
                                                                @endforeach
                                                                </select>
                                                                @error('business_type')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Total no, of Employee*</label>
                                                                <input type="text" class="form-control border-red" name="employee" value="{{$data->employee}}">
                                                                @error('employee')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Year of Establishment*</label>
                                                                <input type="text" class="form-control border-red" name="Establishment_year" value="{{$data->Establishment_year}}">
                                                                @error('Establishment_year')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Legal Status of Firm</label>
                                                                <select class="form-control border-red" name="legal_status">
                                                                    <option selected hidden>Select Legal Status</option>
                                                                    @foreach ( $legal_status_data as $item )
                                                                    <option value="{{ $item->name }}" {{$data->legal_status == $item->name?"selected":""}}>{{ $item->name }}</option>
                                                                @endforeach
                                                                </select>
                                                                @error('legal_status')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <div class="form-submit-row">
                                                        <button type="submit" class="btn btn-animated btn-submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
    var AndraPradesh = [
    "Anantapur",
    "Chittoor",
    "East Godavari",
    "Guntur",
    "Kadapa",
    "Krishna",
    "Kurnool",
    "Prakasam",
    "Nellore",
    "Srikakulam",
    "Visakhapatnam",
    "Vizianagaram",
    "West Godavari"
    ];
    var ArunachalPradesh = [
    "Anjaw",
    "Changlang",
    "Dibang Valley",
    "East Kameng",
    "East Siang",
    "Kra Daadi",
    "Kurung Kumey",
    "Lohit",
    "Longding",
    "Lower Dibang Valley",
    "Lower Subansiri",
    "Namsai",
    "Papum Pare",
    "Siang",
    "Tawang",
    "Tirap",
    "Upper Siang",
    "Upper Subansiri",
    "West Kameng",
    "West Siang",
    "Itanagar"
    ];
    var Assam = [
    "Baksa",
    "Barpeta",
    "Biswanath",
    "Bongaigaon",
    "Cachar",
    "Charaideo",
    "Chirang",
    "Darrang",
    "Dhemaji",
    "Dhubri",
    "Dibrugarh",
    "Goalpara",
    "Golaghat",
    "Hailakandi",
    "Hojai",
    "Jorhat",
    "Kamrup Metropolitan",
    "Kamrup (Rural)",
    "Karbi Anglong",
    "Karimganj",
    "Kokrajhar",
    "Lakhimpur",
    "Majuli",
    "Morigaon",
    "Nagaon",
    "Nalbari",
    "Dima Hasao",
    "Sivasagar",
    "Sonitpur",
    "South Salmara Mankachar",
    "Tinsukia",
    "Udalguri",
    "West Karbi Anglong"
    ];
    var Bihar = [
    "Araria",
    "Arwal",
    "Aurangabad",
    "Banka",
    "Begusarai",
    "Bhagalpur",
    "Bhojpur",
    "Buxar",
    "Darbhanga",
    "East Champaran",
    "Gaya",
    "Gopalganj",
    "Jamui",
    "Jehanabad",
    "Kaimur",
    "Katihar",
    "Khagaria",
    "Kishanganj",
    "Lakhisarai",
    "Madhepura",
    "Madhubani",
    "Munger",
    "Muzaffarpur",
    "Nalanda",
    "Nawada",
    "Patna",
    "Purnia",
    "Rohtas",
    "Saharsa",
    "Samastipur",
    "Saran",
    "Sheikhpura",
    "Sheohar",
    "Sitamarhi",
    "Siwan",
    "Supaul",
    "Vaishali",
    "West Champaran"
    ];
    var Chhattisgarh = [
    "Balod",
    "Baloda Bazar",
    "Balrampur",
    "Bastar",
    "Bemetara",
    "Bijapur",
    "Bilaspur",
    "Dantewada",
    "Dhamtari",
    "Durg",
    "Gariaband",
    "Janjgir Champa",
    "Jashpur",
    "Kabirdham",
    "Kanker",
    "Kondagaon",
    "Korba",
    "Koriya",
    "Mahasamund",
    "Mungeli",
    "Narayanpur",
    "Raigarh",
    "Raipur",
    "Rajnandgaon",
    "Sukma",
    "Surajpur",
    "Surguja"
    ];
    var Goa = ["North Goa", "South Goa"];
    var Gujarat = [
    "Ahmedabad",
    "Amreli",
    "Anand",
    "Aravalli",
    "Banaskantha",
    "Bharuch",
    "Bhavnagar",
    "Botad",
    "Chhota Udaipur",
    "Dahod",
    "Dang",
    "Devbhoomi Dwarka",
    "Gandhinagar",
    "Gir Somnath",
    "Jamnagar",
    "Junagadh",
    "Kheda",
    "Kutch",
    "Mahisagar",
    "Mehsana",
    "Morbi",
    "Narmada",
    "Navsari",
    "Panchmahal",
    "Patan",
    "Porbandar",
    "Rajkot",
    "Sabarkantha",
    "Surat",
    "Surendranagar",
    "Tapi",
    "Vadodara",
    "Valsad"
    ];
    var Haryana = [
    "Ambala",
    "Bhiwani",
    "Charkhi Dadri",
    "Faridabad",
    "Fatehabad",
    "Gurugram",
    "Hisar",
    "Jhajjar",
    "Jind",
    "Kaithal",
    "Karnal",
    "Kurukshetra",
    "Mahendragarh",
    "Mewat",
    "Palwal",
    "Panchkula",
    "Panipat",
    "Rewari",
    "Rohtak",
    "Sirsa",
    "Sonipat",
    "Yamunanagar"
    ];
    var HimachalPradesh = [
    "Bilaspur",
    "Chamba",
    "Hamirpur",
    "Kangra",
    "Kinnaur",
    "Kullu",
    "Lahaul Spiti",
    "Mandi",
    "Shimla",
    "Sirmaur",
    "Solan",
    "Una"
    ];
    var JammuKashmir = [
    "Anantnag",
    "Bandipora",
    "Baramulla",
    "Budgam",
    "Doda",
    "Ganderbal",
    "Jammu",
    "Kargil",
    "Kathua",
    "Kishtwar",
    "Kulgam",
    "Kupwara",
    "Leh",
    "Poonch",
    "Pulwama",
    "Rajouri",
    "Ramban",
    "Reasi",
    "Samba",
    "Shopian",
    "Srinagar",
    "Udhampur"
    ];
    var Jharkhand = [
    "Bokaro",
    "Chatra",
    "Deoghar",
    "Dhanbad",
    "Dumka",
    "East Singhbhum",
    "Garhwa",
    "Giridih",
    "Godda",
    "Gumla",
    "Hazaribagh",
    "Jamtara",
    "Khunti",
    "Koderma",
    "Latehar",
    "Lohardaga",
    "Pakur",
    "Palamu",
    "Ramgarh",
    "Ranchi",
    "Sahebganj",
    "Seraikela Kharsawan",
    "Simdega",
    "West Singhbhum"
    ];
    var Karnataka = [
    "Bagalkot",
    "Bangalore Rural",
    "Bangalore Urban",
    "Belgaum",
    "Bellary",
    "Bidar",
    "Vijayapura",
    "Chamarajanagar",
    "Chikkaballapur",
    "Chikkamagaluru",
    "Chitradurga",
    "Dakshina Kannada",
    "Davanagere",
    "Dharwad",
    "Gadag",
    "Gulbarga",
    "Hassan",
    "Haveri",
    "Kodagu",
    "Kolar",
    "Koppal",
    "Mandya",
    "Mysore",
    "Raichur",
    "Ramanagara",
    "Shimoga",
    "Tumkur",
    "Udupi",
    "Uttara Kannada",
    "Yadgir"
    ];
    var Kerala = [
    "Alappuzha",
    "Ernakulam",
    "Idukki",
    "Kannur",
    "Kasaragod",
    "Kollam",
    "Kottayam",
    "Kozhikode",
    "Malappuram",
    "Palakkad",
    "Pathanamthitta",
    "Thiruvananthapuram",
    "Thrissur",
    "Wayanad"
    ];
    var MadhyaPradesh = [
    "Agar Malwa",
    "Alirajpur",
    "Anuppur",
    "Ashoknagar",
    "Balaghat",
    "Barwani",
    "Betul",
    "Bhind",
    "Bhopal",
    "Burhanpur",
    "Chhatarpur",
    "Chhindwara",
    "Damoh",
    "Datia",
    "Dewas",
    "Dhar",
    "Dindori",
    "Guna",
    "Gwalior",
    "Harda",
    "Hoshangabad",
    "Indore",
    "Jabalpur",
    "Jhabua",
    "Katni",
    "Khandwa",
    "Khargone",
    "Mandla",
    "Mandsaur",
    "Morena",
    "Narsinghpur",
    "Neemuch",
    "Panna",
    "Raisen",
    "Rajgarh",
    "Ratlam",
    "Rewa",
    "Sagar",
    "Satna",
    "Sehore",
    "Seoni",
    "Shahdol",
    "Shajapur",
    "Sheopur",
    "Shivpuri",
    "Sidhi",
    "Singrauli",
    "Tikamgarh",
    "Ujjain",
    "Umaria",
    "Vidisha"
    ];
    var Maharashtra = [
    "Ahmednagar",
    "Akola",
    "Amravati",
    "Aurangabad",
    "Beed",
    "Bhandara",
    "Buldhana",
    "Chandrapur",
    "Dhule",
    "Gadchiroli",
    "Gondia",
    "Hingoli",
    "Jalgaon",
    "Jalna",
    "Kolhapur",
    "Latur",
    "Mumbai City",
    "Mumbai Suburban",
    "Nagpur",
    "Nanded",
    "Nandurbar",
    "Nashik",
    "Osmanabad",
    "Palghar",
    "Parbhani",
    "Pune",
    "Raigad",
    "Ratnagiri",
    "Sangli",
    "Satara",
    "Sindhudurg",
    "Solapur",
    "Thane",
    "Wardha",
    "Washim",
    "Yavatmal"
    ];
    var Manipur = [
    "Bishnupur",
    "Chandel",
    "Churachandpur",
    "Imphal East",
    "Imphal West",
    "Jiribam",
    "Kakching",
    "Kamjong",
    "Kangpokpi",
    "Noney",
    "Pherzawl",
    "Senapati",
    "Tamenglong",
    "Tengnoupal",
    "Thoubal",
    "Ukhrul"
    ];
    var Meghalaya = [
    "East Garo Hills",
    "East Jaintia Hills",
    "East Khasi Hills",
    "North Garo Hills",
    "Ri Bhoi",
    "South Garo Hills",
    "South West Garo Hills",
    "South West Khasi Hills",
    "West Garo Hills",
    "West Jaintia Hills",
    "West Khasi Hills"
    ];
    var Mizoram = [
    "Aizawl",
    "Champhai",
    "Kolasib",
    "Lawngtlai",
    "Lunglei",
    "Mamit",
    "Saiha",
    "Serchhip",
    "Aizawl",
    "Champhai",
    "Kolasib",
    "Lawngtlai",
    "Lunglei",
    "Mamit",
    "Saiha",
    "Serchhip"
    ];
    var Nagaland = [
    "Dimapur",
    "Kiphire",
    "Kohima",
    "Longleng",
    "Mokokchung",
    "Mon",
    "Peren",
    "Phek",
    "Tuensang",
    "Wokha",
    "Zunheboto"
    ];
    var Odisha = [
    "Angul",
    "Balangir",
    "Balasore",
    "Bargarh",
    "Bhadrak",
    "Boudh",
    "Cuttack",
    "Debagarh",
    "Dhenkanal",
    "Gajapati",
    "Ganjam",
    "Jagatsinghpur",
    "Jajpur",
    "Jharsuguda",
    "Kalahandi",
    "Kandhamal",
    "Kendrapara",
    "Kendujhar",
    "Khordha",
    "Koraput",
    "Malkangiri",
    "Mayurbhanj",
    "Nabarangpur",
    "Nayagarh",
    "Nuapada",
    "Puri",
    "Rayagada",
    "Sambalpur",
    "Subarnapur",
    "Sundergarh"
    ];
    var Punjab = [
    "Amritsar",
    "Barnala",
    "Bathinda",
    "Faridkot",
    "Fatehgarh Sahib",
    "Fazilka",
    "Firozpur",
    "Gurdaspur",
    "Hoshiarpur",
    "Jalandhar",
    "Kapurthala",
    "Ludhiana",
    "Mansa",
    "Moga",
    "Mohali",
    "Muktsar",
    "Pathankot",
    "Patiala",
    "Rupnagar",
    "Sangrur",
    "Shaheed Bhagat Singh Nagar",
    "Tarn Taran"
    ];
    var Rajasthan = [
    "Ajmer",
    "Alwar",
    "Banswara",
    "Baran",
    "Barmer",
    "Bharatpur",
    "Bhilwara",
    "Bikaner",
    "Bundi",
    "Chittorgarh",
    "Churu",
    "Dausa",
    "Dholpur",
    "Dungarpur",
    "Ganganagar",
    "Hanumangarh",
    "Jaipur",
    "Jaisalmer",
    "Jalore",
    "Jhalawar",
    "Jhunjhunu",
    "Jodhpur",
    "Karauli",
    "Kota",
    "Nagaur",
    "Pali",
    "Pratapgarh",
    "Rajsamand",
    "Sawai Madhopur",
    "Sikar",
    "Sirohi",
    "Tonk",
    "Udaipur"
    ];
    var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
    var TamilNadu = [
    "Ariyalur",
    "Chennai",
    "Coimbatore",
    "Cuddalore",
    "Dharmapuri",
    "Dindigul",
    "Erode",
    "Kanchipuram",
    "Kanyakumari",
    "Karur",
    "Krishnagiri",
    "Madurai",
    "Nagapattinam",
    "Namakkal",
    "Nilgiris",
    "Perambalur",
    "Pudukkottai",
    "Ramanathapuram",
    "Salem",
    "Sivaganga",
    "Thanjavur",
    "Theni",
    "Thoothukudi",
    "Tiruchirappalli",
    "Tirunelveli",
    "Tiruppur",
    "Tiruvallur",
    "Tiruvannamalai",
    "Tiruvarur",
    "Vellore",
    "Viluppuram",
    "Virudhunagar"
    ];
    var Telangana = [
    "Adilabad",
    "Bhadradri Kothagudem",
    "Hyderabad",
    "Jagtial",
    "Jangaon",
    "Jayashankar",
    "Jogulamba",
    "Kamareddy",
    "Karimnagar",
    "Khammam",
    "Komaram Bheem",
    "Mahabubabad",
    "Mahbubnagar",
    "Mancherial",
    "Medak",
    "Medchal",
    "Nagarkurnool",
    "Nalgonda",
    "Nirmal",
    "Nizamabad",
    "Peddapalli",
    "Rajanna Sircilla",
    "Ranga Reddy",
    "Sangareddy",
    "Siddipet",
    "Suryapet",
    "Vikarabad",
    "Wanaparthy",
    "Warangal Rural",
    "Warangal Urban",
    "Yadadri Bhuvanagiri"
    ];
    var Tripura = [
    "Dhalai",
    "Gomati",
    "Khowai",
    "North Tripura",
    "Sepahijala",
    "South Tripura",
    "Unakoti",
    "West Tripura"
    ];
    var UttarPradesh = [
    "Agra",
    "Aligarh",
    "Allahabad",
    "Ambedkar Nagar",
    "Amethi",
    "Amroha",
    "Auraiya",
    "Azamgarh",
    "Baghpat",
    "Bahraich",
    "Ballia",
    "Balrampur",
    "Banda",
    "Barabanki",
    "Bareilly",
    "Basti",
    "Bhadohi",
    "Bijnor",
    "Budaun",
    "Bulandshahr",
    "Chandauli",
    "Chitrakoot",
    "Deoria",
    "Etah",
    "Etawah",
    "Faizabad",
    "Farrukhabad",
    "Fatehpur",
    "Firozabad",
    "Gautam Buddha Nagar",
    "Ghaziabad",
    "Ghazipur",
    "Gonda",
    "Gorakhpur",
    "Hamirpur",
    "Hapur",
    "Hardoi",
    "Hathras",
    "Jalaun",
    "Jaunpur",
    "Jhansi",
    "Kannauj",
    "Kanpur Dehat",
    "Kanpur Nagar",
    "Kasganj",
    "Kaushambi",
    "Kheri",
    "Kushinagar",
    "Lalitpur",
    "Lucknow",
    "Maharajganj",
    "Mahoba",
    "Mainpuri",
    "Mathura",
    "Mau",
    "Meerut",
    "Mirzapur",
    "Moradabad",
    "Muzaffarnagar",
    "Pilibhit",
    "Pratapgarh",
    "Raebareli",
    "Rampur",
    "Saharanpur",
    "Sambhal",
    "Sant Kabir Nagar",
    "Shahjahanpur",
    "Shamli",
    "Shravasti",
    "Siddharthnagar",
    "Sitapur",
    "Sonbhadra",
    "Sultanpur",
    "Unnao",
    "Varanasi"
    ];
    var Uttarakhand = [
    "Almora",
    "Bageshwar",
    "Chamoli",
    "Champawat",
    "Dehradun",
    "Haridwar",
    "Nainital",
    "Pauri",
    "Pithoragarh",
    "Rudraprayag",
    "Tehri",
    "Udham Singh Nagar",
    "Uttarkashi"
    ];
    var WestBengal = [
    "Alipurduar",
    "Bankura",
    "Birbhum",
    "Cooch Behar",
    "Dakshin Dinajpur",
    "Darjeeling",
    "Hooghly",
    "Howrah",
    "Jalpaiguri",
    "Jhargram",
    "Kalimpong",
    "Kolkata",
    "Malda",
    "Murshidabad",
    "Nadia",
    "North 24 Parganas",
    "Paschim Bardhaman",
    "Paschim Medinipur",
    "Purba Bardhaman",
    "Purba Medinipur",
    "Purulia",
    "South 24 Parganas",
    "Uttar Dinajpur"
    ];
    var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
    var Chandigarh = ["Chandigarh"];
    var DadraHaveli = ["Dadra Nagar Haveli"];
    var DamanDiu = ["Daman", "Diu"];
    var Delhi = [
    "Central Delhi",
    "East Delhi",
    "New Delhi",
    "North Delhi",
    "North East Delhi",
    "North West Delhi",
    "Shahdara",
    "South Delhi",
    "South East Delhi",
    "South West Delhi",
    "West Delhi"
    ];
    var Lakshadweep = ["Lakshadweep"];
    var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];

    $("#inputState").change(function () {
    var StateSelected = $(this).val();
    var optionsList;
    var htmlString = "";

    switch (StateSelected) {
        case "Andra Pradesh":
        optionsList = AndraPradesh;
        break;
        case "Arunachal Pradesh":
        optionsList = ArunachalPradesh;
        break;
        case "Assam":
        optionsList = Assam;
        break;
        case "Bihar":
        optionsList = Bihar;
        break;
        case "Chhattisgarh":
        optionsList = Chhattisgarh;
        break;
        case "Goa":
        optionsList = Goa;
        break;
        case "Gujarat":
        optionsList = Gujarat;
        break;
        case "Haryana":
        optionsList = Haryana;
        break;
        case "Himachal Pradesh":
        optionsList = HimachalPradesh;
        break;
        case "Jammu and Kashmir":
        optionsList = JammuKashmir;
        break;
        case "Jharkhand":
        optionsList = Jharkhand;
        break;
        case "Karnataka":
        optionsList = Karnataka;
        break;
        case "Kerala":
        optionsList = Kerala;
        break;
        case "Madya Pradesh":
        optionsList = MadhyaPradesh;
        break;
        case "Maharashtra":
        optionsList = Maharashtra;
        break;
        case "Manipur":
        optionsList = Manipur;
        break;
        case "Meghalaya":
        optionsList = Meghalaya;
        break;
        case "Mizoram":
        optionsList = Mizoram;
        break;
        case "Nagaland":
        optionsList = Nagaland;
        break;
        case "Orissa":
        optionsList = Orissa;
        break;
        case "Punjab":
        optionsList = Punjab;
        break;
        case "Rajasthan":
        optionsList = Rajasthan;
        break;
        case "Sikkim":
        optionsList = Sikkim;
        break;
        case "Tamil Nadu":
        optionsList = TamilNadu;
        break;
        case "Telangana":
        optionsList = Telangana;
        break;
        case "Tripura":
        optionsList = Tripura;
        break;
        case "Uttaranchal":
        optionsList = Uttaranchal;
        break;
        case "Uttar Pradesh":
        optionsList = UttarPradesh;
        break;
        case "West Bengal":
        optionsList = WestBengal;
        break;
        case "Andaman and Nicobar Islands":
        optionsList = AndamanNicobar;
        break;
        case "Chandigarh":
        optionsList = Chandigarh;
        break;
        case "Dadar and Nagar Haveli":
        optionsList = DadraHaveli;
        break;
        case "Daman and Diu":
        optionsList = DamanDiu;
        break;
        case "Delhi":
        optionsList = Delhi;
        break;
        case "Lakshadeep":
        optionsList = Lakshadeep;
        break;
        case "Pondicherry":
        optionsList = Pondicherry;
        break;
    }

    for (var i = 0; i < optionsList.length; i++) {
        htmlString =
        htmlString +
        "<option value='" +
        optionsList[i] +
        "'>" +
        optionsList[i] +
        "</option>";
    }
    $("#inputDistrict").html(htmlString);
    });

</script>
@endsection